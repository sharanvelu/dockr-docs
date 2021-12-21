<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MarkdownController extends Controller
{
    /**
     * Cache Repository
     *
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $cache;

    public function __construct()
    {
        $this->cache = app(Cache::class);
    }

    /**
     * Update Markdown using compose Command
     */
    public function refresh(Request $request)
    {
        $passkey = $request->get('passkey');
        if (isset($passkey)) {
            if (Hash::check($passkey, env('MARKDOWN_REFRESH_PASSKEY'))) {
                shell_exec('cd ' . base_path() . ' && markdown/get.sh');
                $this->cache->flush();

                return 'Executed Successful';
            }
        }

        return 'Passkey incorrect';
    }
}
