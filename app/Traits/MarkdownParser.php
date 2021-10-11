<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Parsedown;

trait MarkdownParser
{
    /**
     * @throws \Exception
     */
    public function parse($path, $version = null)
    {
        $cacheKey = $this->getKey($path, $version);

        return cache()->remember(
            $cacheKey,  // Key to store the cached data for requested data (as HTML).
            configEnv('markdown.cache.ttl'),   // Time to Live for cached data.
            function () use ($path, $version) {
                $markdownUrl = $this->getMarkdownUrl($path, $version);

                $client = new Client();
                try {
                    $response = $client->get($markdownUrl);
                    $markdown = $response->getBody()->getContents();
                } catch (GuzzleException | \Exception $exception) {
                    logError($exception, 'Error while getting markdown data', __METHOD__);
                    $markdown = configEnv('markdown.empty.error');
                }

                return $this->getHtmlFromMarkdown($markdown);
            });
    }

    /**
     * Get Key for Cache Storage.
     *
     * @param $path
     * @param null $version
     * @return string
     */
    private function getKey($path, $version = null): string
    {
        $path = str_replace('/', '_', $path);
        $path = strtolower($path);
        $path = str_replace('.md', '', $path);
        return $path . '_' . $version;
    }

    /**
     * Get Key for Cache Storage.
     *
     * @param $path
     * @param null $version
     * @return string
     */
    private function getMarkdownUrl($path, $version = null): string
    {
        $repoUrl = configEnv('markdown.raw.repo_url');

        if (!Str::endsWith($repoUrl, '/')) {
            $repoUrl = $repoUrl . '/';
        }

        if (!Str::startsWith($path, '/')) {
            $path = '/' . $path;
        }

        return $repoUrl . $version . $path;
    }

    /**
     * Get HTML from Markdown
     *
     * @param $markdown
     * @return string
     */
    public static function getHtmlFromMarkdown($markdown): string
    {
        $html = new HtmlString(
            (new ParseDown())->text($markdown)
        );

        return $html->toHtml();
    }
}
