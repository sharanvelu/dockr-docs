<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Process\Process;

class MarkdownController extends Controller
{
    /**
     * Update Markdown using compose Command
     */
    public function refresh()
    {
        $passkey = request()->get('passkey');
        if (isset($passkey)) {
            if (Hash::check($passkey, env('MARKDOWN_REFRESH_PASSKEY'))) {
                shell_exec('cd ' . base_path() . ' && markdown/get.sh');

                return 'Executed Successful';
            }
        }

        return 'Passkey incorrect';
    }
}
