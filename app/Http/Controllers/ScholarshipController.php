<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(Request $request)
    {
        // Save filter visibility state to the session
        if ($request->has('showFilters')) {
            session(['showFilters' => $request->get('showFilters')]);
        }

        $query = Scholarship::query();

        // Filtering by provider
        if ($request->filled('provider')) {
            $query->where('provider', $request->provider);
        }

        // Filtering by international student
        if ($request->filled('international')) {
            $query->where('for_international_students', $request->international == '1');
        }

        // Filtering by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filtering by amount range
        if ($request->filled('amount_min') && $request->filled('amount_max')) {
            $query->whereBetween('amount', [$request->amount_min, $request->amount_max]);
        }

        // Sorting
        if ($request->filled('sort')) {
            $query->orderBy($request->sort, 'asc');
        }

        $scholarships = $query->paginate(9);
        $providers = Scholarship::select('provider')->distinct()->pluck('provider');
        $amountRange = Scholarship::selectRaw('MIN(amount) as min_amount, MAX(amount) as max_amount')->first();

        return view('scholarships.index', compact('scholarships', 'providers', 'amountRange'));
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