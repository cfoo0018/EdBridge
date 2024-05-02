<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = strtolower($request->input('query'));

        // Example static data
        $data = [
            ['id' => 1, 'content' => 'Learn about Biology and its fundamental principles.'],
            ['id' => 2, 'content' => 'Discover the world of Computer Science.'],
            ['id' => 3, 'content' => 'Explore advanced Mathematics courses.'],
            ['id' => 4, 'content' => 'Physics: From Newtonian mechanics to quantum physics.'],
            ['id' => 5, 'content' => 'Psychology and human behavior.'],
        ];

        // Filtering data based on query
        $results = array_filter($data, function($item) use ($query) {
            return stripos($item['content'], $query) !== false;
        });

        return view('results', ['results' => $results]);
    }
}
