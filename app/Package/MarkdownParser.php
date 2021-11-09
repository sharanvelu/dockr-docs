<?php

namespace App\Package;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class MarkdownParser
{
    /**
     * Cache Repository
     *
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $cache;

    /**
     * File System
     *
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $files;

    /**
     * ParseDown Class Instance
     *
     * @var Parsedown
     */
    protected $parser;

    public function __construct()
    {
        $this->cache = app(Cache::class);
        $this->files = app(Filesystem::class);
        $this->parser = new Parsedown();

        // todo : Remove this if statement;
        if (app()->isLocal()) {
            $this->cache->flush();
        }
    }

    /**
     * Parse SideBar content from Markdown
     *
     * @param null $version
     * @param $activePath
     * @return string
     */
    public function parseSidebar($version, $activePath): string
    {
        $path = getSideBarPath();

        $content = $this->cache->remember(
            $this->getCacheKey($version, $path),    // Key to store the cached data for requested data (as HTML).
            configEnv('markdown.cache.ttl'),    // Time to Live for cached data.
            function () use ($version, $path) {
                $markdown = $this->getMarkdownContent($version, $path);

                return $this->parser->makeSideBar($version, $markdown);
            }
        );

        return $this->parser->addActiveSidebarItem($content, $activePath);
    }

    /**
     * Parse Page Content from Markdown
     *
     * @param $version
     * @param $path
     * @return mixed
     */
    public function parse($version, $path)
    {
        return $this->cache->remember(
            $this->getCacheKey($version, $path),    // Key to store the cached data for requested data (as HTML).
            configEnv('markdown.cache.ttl'),    // Time to Live for cached data.
            function () use ($version, $path) {
                $markdown = $this->getMarkdownContent($version, $path);

                return $this->parser->make($version, $markdown);
            }
        );
    }

    /**
     * Get Key for Cache Storage.
     *
     * @param $path
     * @param $version
     * @return string
     */
    private function getCacheKey($version, $path): string
    {
        $path = $version . '_' . $path;

        $path = str_replace('/', '_', $path);
        $path = str_replace('.md', '', $path);
        $path = str_replace('.', '_', $path);

        return strtolower($path);
    }

    /**
     * @param $version
     * @param $path
     * @return string
     */
    public function getMarkdownContent($version, $path): string
    {
        $markdownPath = $this->getMarkdownPath($version, $path);

        return $this->files->get($markdownPath);
    }

    /**
     * Get Markdown Path
     *
     * @param $version
     * @param $path
     * @return string
     */
    private function getMarkdownPath($version, $path): string
    {
        $filename = getMarkdownFileName($path);

        return markdown_path($version, $filename);
    }
}
