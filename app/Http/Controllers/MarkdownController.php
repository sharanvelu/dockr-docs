<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MarkdownController extends Controller
{
    /**
     * Update Markdown using compose Command
     * @throws \Exception
     */
    public function refresh(Request $request)
    {
        $passkey = $request->get('passkey');
        if (isset($passkey)) {
            if (Hash::check($passkey, env('MARKDOWN_REFRESH_PASSKEY'))) {
                shell_exec('cd ' . base_path() . ' && sudo markdown/get.sh');
                cache()->flush();

                return 'Executed Successful';
            }
        }

        return 'Passkey incorrect';
    }
}
