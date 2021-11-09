<?php

namespace App\Http\Controllers;

use App\Package\MarkdownParser;

class DocumentController extends Controller
{
    /**
     * Sidebar Content Version
     *
     * @var
     */
    private $sidebarVersion;

    /**
     * The Content to be displayed if version or path does not exist.
     *
     * @var
     */
    private $content;

    /**
     * Markdown Parser
     *
     * @var
     */
    private $parser;

    public function __construct()
    {
        $this->parser = new MarkdownParser();
    }

    /**
     * Documentation Show Page
     *
     * @param $version
     * @param $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($version, $path)
    {
        $this->pathExist($path, $version);

        $sidebarContent = $this->parser->parseSidebar($path, $this->sidebarVersion ?? $version);

        $content = $this->content ?? $this->parser->parse($path, $version);

        return view('docs.show', compact('content', 'sidebarContent', 'version'));
    }

    /**
     * Check if the version exists.
     * If not, return not found page
     *
     * @param $version
     * @return bool
     */
    private function versionExist($version): bool
    {
        if (in_array($version, getVersionList())) {
            return true;
        }

        $this->sidebarVersion = getDefaultVersion();
        $this->content = view('docs.not-found.version');

        return false;
    }

    /**
     * Check if the file exists.
     * If not, return not found page
     *
     * @param $path
     * @param $version
     * @return void
     */
    private function pathExist($path, $version)
    {
        if ($this->versionExist($version) && !file_exists(markdown_path($version, getMarkdownFileName($path)))) {
            $this->sidebarVersion = getDefaultVersion();
            $this->content = view('docs.not-found.path');
        }
    }
}
