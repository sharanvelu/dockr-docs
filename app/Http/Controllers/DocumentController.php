<?php

namespace App\Http\Controllers;

use App\Package\MarkdownParser;

class DocumentController extends Controller
{
    /**
     * Version
     *
     * @var
     */
    private $version;

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
        $this->version = $version;

        $this->checkVersion();

        if ($version !== $this->version) {
            return redirect(getDocsRoute($this->version, $path));
        }

        $this->checkPath($path);

        $sidebarContent = $this->parser->parseSidebar($version, $path);

        $content = $this->content ?? $this->parser->parse($version, $path);

        return view('docs.show', compact('version', 'content', 'sidebarContent'));
    }

    /**
     * Check if the version exists.
     * If not, Set default version.
     *
     * @return void
     */
    private function checkVersion()
    {
        if (!in_array($this->version, getVersionList())) {
            $this->version = getDefaultVersion();
        }
    }

    /**
     * Check if the file exists.
     * If not, return not found page.
     *
     * @param $path
     * @return void
     */
    private function checkPath($path)
    {
        if (!file_exists(markdown_path($this->version, $path))) {
            $this->content = view('docs.not-found.path');
        }
    }
}
