<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // Display a listing of scholarships.
    public function index(Request $request)
    {
        $scholarships = Scholarship::query();

        // Filtering by provider
        if ($request->has('provider')) {
            $scholarships->where('provider', $request->provider);
        }
        $scholarships = Scholarship::paginate(10);
        return view('scholarships.index', compact('scholarships'));
    }

    // Display the specified scholarship.
    public function show($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('scholarships.show', ['scholarship' => $scholarship]);
    }
}