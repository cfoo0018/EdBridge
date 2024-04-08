<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YouTubeService;

class YouTubeController extends Controller
{
    protected $youTubeService;

    public function __construct(YouTubeService $youTubeService)
    {
        $this->youTubeService = $youTubeService;
    }

    public function index()
    {
        
        return $this->search(new Request(['query' => 'STEM education']));
    }

    public function search(Request $request)
    {
        // The 'query' defaults to 'STEM education' if not provided
        $query = $request->input('query', 'STEM education');
        $pageToken = $request->input('pageToken', null);

        
        $duration = $request->input('duration', null);

        // Fetch search results from the YouTubeService
        $searchResults = $this->youTubeService->searchVideos($query, $duration, $pageToken);
        $videos = $searchResults['items'];
        $nextPageToken = $searchResults['nextPageToken'];
        $prevPageToken = $searchResults['prevPageToken'];

        
        if (empty($videos) && $query !== 'STEM education') {
            session()->flash('no-results', 'No videos found for your query. Showing default STEM education content.');
            return redirect()->route('resourcehub');
        }

        return view('resourcehub', compact('videos', 'nextPageToken', 'prevPageToken', 'query'));
    }
}
