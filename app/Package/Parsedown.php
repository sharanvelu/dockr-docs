<?php

namespace App\Package;

use Illuminate\Support\Str;
use ParsedownExtra;

class Parsedown extends ParsedownExtra
{
    /**
     * @param $markdown
     * @param $version
     * @return string
     */
    public function make($markdown, $version): string
    {
        $text = parent::text($markdown);

        $text = $this->addAnchorToHeaders($text);

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
     * @param $markdown
     * @param $version
     * @return string
     */
    public function makeSideBar($markdown, $version): string
    {
        $text = parent::text($markdown);

        $text = $this->replaceLinks($version, $text);

        return $this->addListItemClass($text);
    }

    public function addListItemClass(string $text): string
    {
        $lines = explode("\n", $text);

        foreach ($lines as $number => $line) {
            preg_match('/<li>([a-zA-z\s]+)/', $line, $matches);
            if (isset($matches[1])) {
                $lines[$number] = '<li class="nav-item"><a class="nav-link has-dropdown" href="#">' . $matches[1] . '</a>';
            }
            unset($matches);

            preg_match('/<li><a href="(.+)<\/a><\/li>/', $line, $matches);
            if (isset($matches[1])) {
                $lines[$number] = '<li class="nav-item"><a class="nav-link" href="' . $matches[1] . '</a></li>';
            }
        }

        return str_replace('<ul>', '<ul class="nav flex-column">', implode("\n", $lines));
    }
}
