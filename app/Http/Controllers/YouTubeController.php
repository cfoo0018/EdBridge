<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YouTubeService;

class YouTubeController extends Controller
{
    protected $youTubeService;
    // Define a list of allowed courses
    private $allowedCourses = [
        'STEM Education', 
        'Biology', 
        'Computer Science', 
        'Mathematics', 
        'Physics', 
        'Psychology', 
        'Sociology'
    ];

    public function __construct(YouTubeService $youTubeService)
    {
        $this->youTubeService = $youTubeService;
    }

    public function index()
    {
        // Initialize videos to an empty array if no search has been performed yet
        $videos = [];
        // Pass allowed courses and videos to the view
        return view('resourcehub', ['allowedCourses' => $this->allowedCourses, 'videos' => $videos]);
    }
    

    public function search(Request $request)
    {
        // Retrieve the course from the request and append " courses" to form the query
        $course = $request->input('course', 'STEM Education'); // Default to "STEM Education" if no course is selected
        $query = $course . ' courses'; // Append ' courses' to the query
    
        $pageToken = $request->input('pageToken', null);
        $duration = $request->input('duration', null);
    
        // Fetch search results from the YouTubeService using the modified query
        $searchResults = $this->youTubeService->searchVideos($query, $duration, $pageToken);
        $videos = $searchResults['items'];
        $nextPageToken = $searchResults['nextPageToken'];
        $prevPageToken = $searchResults['prevPageToken'];
    
        // Handle no results
        if (empty($videos)) {
            session()->flash('no-results', 'No videos found for your query. Showing default STEM education content.');
            return redirect()->route('resourcehub');
        }
    
        // Since $allowedCourses is used in the view, ensure it's available as part of the view data
        return view('resourcehub', compact('videos', 'nextPageToken', 'prevPageToken', 'query') + ['allowedCourses' => $this->allowedCourses]);
    }

}
