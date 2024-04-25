<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YouTubeService;

class YouTubeController extends Controller
{
    protected $youTubeService;
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
        $defaultCourse = 'STEM Education';
        $query = $defaultCourse . ' courses';

        $searchResults = $this->youTubeService->searchVideos($query);
        $videos = $searchResults['items'];
        $nextPageToken = $searchResults['nextPageToken'] ?? null;
        $prevPageToken = $searchResults['prevPageToken'] ?? null;

        if (empty($videos)) {
            $videos = [];
            session()->flash('no-results', 'No default videos found.');
        }

        return view('resourcehub', compact('videos', 'nextPageToken', 'prevPageToken', 'query') + ['allowedCourses' => $this->allowedCourses]);
    }

    public function search(Request $request)
    {
        $course = $request->input('course', 'STEM Education');
        $query = $course . ' courses';
        $pageToken = $request->input('pageToken', null);
        $duration = $request->input('duration', null);
        $level = $request->input('level', null); // Retrieve level from the request

        $searchResults = $this->youTubeService->searchVideos($query, $duration, $pageToken, $level);
        $videos = $searchResults['items'];
        $nextPageToken = $searchResults['nextPageToken'] ?? null;
        $prevPageToken = $searchResults['prevPageToken'] ?? null;

        if (empty($videos)) {
            session()->flash('no-results', 'No videos found for your query. Showing default STEM education content.');
            return redirect()->route('resourcehub');
        }

        return view('resourcehub', compact('videos', 'nextPageToken', 'prevPageToken', 'query', 'level') + ['allowedCourses' => $this->allowedCourses]);
    }
