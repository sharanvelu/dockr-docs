<?php

namespace App\Package;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class MarkdownParser
{
    protected $cache;
    protected $files;

    public function __construct()
    {
        $this->cache = app(Cache::class);
        $this->files = app(Filesystem::class);
    }

    /**
     * Parse SideBar content from Markdown
     *
     * @param $activePath
     * @param null $version
     * @return string
     */
    public function parseSidebar($activePath, $version = null): string
    {
        // todo : Remove this if statement;
        if (app()->isLocal()) {
            $this->cache->flush();
        }

        $path = 'documentation';
        $version = getVersion($version);

        $content = $this->cache->remember(
            $this->getCacheKey($path, $version),    // Key to store the cached data for requested data (as HTML).
            configEnv('markdown.cache.ttl'),    // Time to Live for cached data.
            function () use ($path, $version) {
                $markdown = $this->getMarkdownContent($path, $version);

                return (new Parsedown())->makeSideBar($markdown, $version);
            }
        );

        return (new Parsedown())->addActiveSidebarItem($content, $activePath);
    }

    /**
     * Parse Page Content from Markdown
     *
     * @param $path
     * @param null $version
     * @return mixed
     */
    public function parse($path, $version = null)
    {
        // todo : Remove this if statement;
        if (app()->isLocal()) {
            $this->cache->flush();
        }

        $version = getVersion($version);

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
        $markdownPath = $this->getMarkdownPath($path, $version);

        return $this->files->get($markdownPath);
    }

    /**
     * Get Markdown Path
     *
     * @param $path
     * @param null $version
     * @return string
     */
    private function getMarkdownPath($path, $version = null): string
    {
        $filename = getMarkdownFileName($path);

        return markdown_path($version, $filename);
    }
}
