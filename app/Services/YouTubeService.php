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

    public function searchVideos($query, $duration = null, $pageToken = null, $level = null)
    {
        // Generating a unique cache key based on the search parameters
        $cacheKey = "youtube_search_" . md5($query . $duration . $pageToken . $level);

        // Attempt to retrieve the cached response
        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($query, $duration, $pageToken, $level) {
            try {
                // If level is specified, enhance the query to include level-specific keywords
                if ($level) {
                    $level_keywords = [
                        'beginner' => 'introduction',
                        'intermediate' => 'intermediate',
                        'advanced' => 'advanced'
                    ];
                    $query .= ' ' . ($level_keywords[$level] ?? '');
                }

                $params = [
                    'q' => $query,
                    'maxResults' => 6,
                    'type' => 'video',
                    'videoDuration' => $duration ? $this->mapDurationToYouTubeFormat($duration) : null,
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

    /**
     * Map frontend duration to YouTube API duration formats.
     *
     * @param string $duration
     * @return string|null
     */
    private function mapDurationToYouTubeFormat($duration)
    {
        $durations = [
            'short' => 'short', // less than 4 minutes
            'medium' => 'medium', // 4-20 minutes
            'long' => 'long' // longer than 20 minutes
        ];

        return $durations[$duration] ?? null;
    }
}
