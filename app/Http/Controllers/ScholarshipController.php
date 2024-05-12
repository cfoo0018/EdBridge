<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // Display a listing of scholarships.
    public function index(Request $request)
    {
        // Initialize query builder
        $query = Scholarship::query();

        // Filtering by provider
        if ($request->has('provider')) {
            $query->where('provider', $request->provider);
        }

        // Filtering by international student
        if ($request->has('international')) {
            if ($request->international === '1') {
                $query->where('for_international_students', true);
            } elseif ($request->international === '0') {
                $query->where('for_international_students', false);
            }
        }

        // Sorting by provider
        if ($request->has('sort') && $request->sort === 'provider') {
            $query->orderBy('provider');
        }

        // Paginate results
        $scholarships = $query->paginate(10);

        // Get unique providers for dropdown
        $providers = Scholarship::select('provider')->distinct()->pluck('provider');

        return view('scholarships.index', compact('scholarships', 'providers'));
    }

    // Display the specified scholarship.
    public function show($id)
    {
        // Set the previous page URL in the session before redirecting to the scholarship details page
        session(['previous_page' => url()->previous()]);

        $scholarship = Scholarship::findOrFail($id);
        return view('scholarships.show', ['scholarship' => $scholarship]);
    }
}
