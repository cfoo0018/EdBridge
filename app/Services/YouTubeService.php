<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Google\Client;
use Google\Service\YouTube;

class YouTubeService
{
    protected $client;
    protected $youtube;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setDeveloperKey(env('YOUTUBE_API_KEY'));
        $this->youtube = new YouTube($this->client);
    }

    public function searchVideos($query, $duration = null, $pageToken = null)
    {
        // Generating a unique cache key based on the search parameters
        $cacheKey = "youtube_search_" . md5($query . $duration . $pageToken);
        
        // Attempt to retrieve the cached response
        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($query, $duration, $pageToken) {
            try {
                $params = [
                    'q' => $query,
                    'maxResults' => 6,
                    'type' => 'video',
                    'videoDuration' => $duration,
                    'pageToken' => $pageToken,
                ];

                $response = $this->youtube->search->listSearch('snippet', array_filter($params));

                return [
                    'items' => $response->items,
                    'nextPageToken' => $response->nextPageToken ?? null,
                    'prevPageToken' => $response->prevPageToken ?? null,
                ];
            } catch (\Google\Service\Exception $e) {
                Log::error("YouTube API Error: " . $e->getMessage());
                return [
                    'items' => [],
                    'nextPageToken' => null,
                    'prevPageToken' => null,
                ];
            }
        });
    }
}
