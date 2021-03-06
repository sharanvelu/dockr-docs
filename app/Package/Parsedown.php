<?php

namespace App\Package;

use Illuminate\Support\Str;
use ParsedownExtra;

class Parsedown extends ParsedownExtra
{
    /**
     * @param $version
     * @param $markdown
     * @return string
     */
    public function make($version, $markdown): string
    {
        $text = parent::text($markdown);

        $text = $this->addAnchorToHeaders($text);

        $text = $this->addClassToTags($text);

        return $this->replaceLinks($version, $text);
    }

    /**
     * Add Anchors to Headers
     *
     * @param string $text
     * @return string
     */
    public function addAnchorToHeaders(string $text): string
    {
        $lines = explode("\n", $text);

        foreach ($lines as $number => $line) {
            preg_match('/<a name="(.+)">/', $line, $matches);

            if (isset($matches[1])) {
                $name = $matches[1];

                if (isset($lines[$number + 1]) && Str::startsWith($lines[$number + 1], '<h')) {
                    $header = substr_replace($lines[$number + 1],sprintf(' id="%s"', $name), 3, 0);
                    $lines[$number + 1] = $header;
                }
            }
        }

        return implode("\n", $lines);
    }

    /**
     * Replace the version place-holder in links.
     *
     * @param string $version
     * @param string $content
     * @return string
     */
    public static function replaceLinks(string $version, string $content): string
    {
        return str_replace('{{version}}', $version, $content);
    }

    /**
     * Make Sidebar content
     *
     * @param $version
     * @param $markdown
     * @return string
     */
    public function makeSideBar($version, $markdown): string
    {
        $text = parent::text($markdown);

        $text = str_replace('.md', '', $text);

        $text = $this->replaceLinks($version, $text);

        return $this->addListItemClass($text);
    }

    /**
     * Add class names for Sidebar Html tags
     *
     * @param string $text
     * @return string
     */
    public function addListItemClass(string $text): string
    {
        $lines = explode("\n", $text);

        foreach ($lines as $number => $line) {
            preg_match('/<li>([a-zA-z\s]+)/', $line, $matches);
            if (isset($matches[1])) {
                $lines[$number] = '<li class="nav-item"><a class="nav-link has-dropdown" href="#">' . $matches[1] . '</a>';
            }
        }

        return str_replace('<ul>', '<ul class="nav flex-column">', implode("\n", $lines));
    }

    /**
     * Add "active" class to SideBar entry
     *
     * @param string $text
     * @param $activePath
     * @return string
     */
    public function addActiveSidebarItem(string $text, $activePath): string
    {
        $lines = explode("\n", $text);
        $isActivePathAdded = false;

        foreach ($lines as $number => $line) {
            preg_match('/<li><a href="(.+)<\/a><\/li>/', $line, $matches);
            if (isset($matches[1])) {
                $activeClass = '';
                if (!$isActivePathAdded && Str::contains($matches[0], 'href="./' . $activePath . '"')) {
                    $activeClass = ' active';
                    $isActivePathAdded = true;
                }
                $lines[$number] = '<li class="nav-item"><a class="nav-link' . $activeClass . '" href="' . $matches[1] . '</a></li>';
            }
        }

        return implode("\n", $lines);
    }

    /**
     * Add classes to some HTML Tags
     *
     * @param $text
     * @return string
     */
    public function addClassToTags($text)
    {
        // Class Name to Table
        $text = str_replace('<table>', '<table class="table table-bordered">', $text);

        return $text;
    }
}
