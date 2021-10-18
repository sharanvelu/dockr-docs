<?php

namespace App\Http\Controllers;

use App\Package\MarkdownParser;

class DocumentController extends Controller
{
    /**
     * @param $version
     * @param $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($version, $path)
    {
        $this->fileExist($path, $version);

        $content = (new MarkdownParser)->parse($path, $version);

        return view('welcome', compact('content'));
    }

    /**
     * Check if the version exists.
     * If not, return not found page
     *
     * @param $version
     * @return void
     */
    public function versionExist($version)
    {
        // todo : check for version exists.
    }

    /**
     * Check if the file exists.
     * If not, return not found page
     *
     * @param $filename
     * @param $version
     * @return void
     */
    public function fileExist($filename, $version)
    {
        $this->versionExist($version);

        // todo : Check for file exist.
    }
}
