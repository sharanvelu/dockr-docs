<?php

namespace App\Package;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MarkdownParser
{
    protected $cache;

    public function __construct()
    {
        $this->cache = app('cache');
    }

    public function parse($path, $version = null)
    {
        // todo : Remove this if statement;
        if (app()->isLocal()) {
            $this->cache->flush();
        }

        return $this->cache->remember(
            $this->getCacheKey($path, $version),    // Key to store the cached data for requested data (as HTML).
            configEnv('markdown.cache.ttl'),    // Time to Live for cached data.
            function () use ($path, $version) {
                $markdown = $this->getMarkdownContent($path, $version);

                return (new Parsedown())->make($markdown, $version);
            }
        );
    }

    /**
     * Get Key for Cache Storage.
     *
     * @param $path
     * @param null $version
     * @return string
     */
    private function getCacheKey($path, $version = null): string
    {
        $path = $version . '_' . $path;

        $path = str_replace('/', '_', $path);
        $path = str_replace('.md', '', $path);
        $path = str_replace('.', '_', $path);

        return strtolower($path);
    }

    /**
     * @param $path
     * @param $version
     * @return string
     */
    public function getMarkdownContent($path, $version): string
    {
        $markdownUrl = $this->getMarkdownPath($path, $version);

        $client = new Client();
        try {
            $response = $client->get($markdownUrl);
            $markdown = $response->getBody()->getContents();
        } catch (GuzzleException | \Exception $exception) {
            logError($exception, 'Error while getting markdown data', __METHOD__);
            $markdown = configEnv('markdown.empty.error');
        }

        return $markdown;
    }

    /**
     * Get Key for Cache Storage.
     *
     * @param $path
     * @param null $version
     * @return string
     */
    private function getMarkdownPath($path, $version = null): string
    {
        $filename = $this->getMarkdownFileName($path);

        $repoUrl = configEnv('markdown.raw.repo_url');

        $repoUrl = str_replace('$version', $version, $repoUrl);
        $repoUrl = str_replace('$filename', $filename, $repoUrl);

        return ($repoUrl);
    }

    /**
     * Get Markdown FileName from path
     *
     * @param $path
     * @return string
     */
    public function getMarkdownFileName($path): string
    {
        return strtolower($path) . '.md';
    }
}
