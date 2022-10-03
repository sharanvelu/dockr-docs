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
        $pushData = $response['push_data'];
        $repo = $response['repository'];

        $data = [
            'image' => [
                'images' => $pushData['images'],
                'tag' => $pushData['tag'],
                'pushed_at' => Carbon::parse($pushData['pushed_at'])
                    ->timezone('Asia/Kolkata')
                    ->format('d-m-Y H:i:s'),
                'pushed_by' => $pushData['pusher'],
            ],
            'repo' => [
                'owner' => $repo['owner'],
                'repo_name' => $repo['repo_name'],
                'repo_url' => $repo['repo_url'],
                'star_count' => $repo['star_count'],
                'status' => $repo['status'],
            ]
        ];

        if (!(is_null($pushData['tag'] ?? null))) {
            Log::channel('docker_hub')->info('Image Pushed', $data);
        }

        return response()->json([], 200);
    }

    /**
     * Notify the GitHub action started
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function githubActions(Request $request)
    {
        Log::channel('docker_hub')->info($request->get('message'), [
            'image' => [
                'Tag' => $request->get('tag'),
                'Started At' => now()->format('d, M Y, H:i:s'),
                'Started By' => $request->get('started_by'),
            ],
            'data' => $request->get('data'),
        ]);

        return response()->json([], 200);
    }
}
