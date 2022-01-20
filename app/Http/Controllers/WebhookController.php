<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    protected function dockerHub(Request $request)
    {
        $response = json_decode(json_encode($request->all()), -1);
        $repo = $response['repository'];

        $data = [
            'image' => [
                'images' => $response['push_data']['images'],
                'pushed_at' => Carbon::parse($response['push_data']['pushed_at'])->format('d-m-Y'),
            ],
            'repo' => [
                'name' => $repo['name'],
                'namespace' => $repo['name'],
                'owner' => $repo['owner'],
                'repo_name' => $repo['repo_name'],
                'repo_url' => $repo['repo_url'],
                'star_count' => $repo['star_count'],
                'status' => $repo['status'],
            ]
        ];

        Log::channel('docker_hub')->info('Docker Hub', $data);

        return response()->json([], 200);
    }
}
