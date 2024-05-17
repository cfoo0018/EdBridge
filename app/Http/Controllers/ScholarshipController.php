<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(Request $request)
    {
        // Initialize query builder
        $query = Scholarship::query();
    
        // Filtering by provider
        if ($request->has('provider') && $request->provider != '') {
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

        // Filtering by international student
        if ($request->has('gender')) {
            if ($request->gender === '1') {
                $query->where('gender', 'Female');
            } elseif ($request->gender === '0') {
                $query->where('gender', 'Co-Ed');
            }
        }
    
        // Filtering by amount
        if ($request->has('amount_min') && $request->has('amount_max')) {
            $query->whereBetween('amount', [$request->amount_min, $request->amount_max]);
        }
    
        // Sorting
        if ($request->has('sort')) {
            if ($request->sort === 'provider') {
                $query->orderBy('provider');
            } elseif ($request->sort === 'amount') {
                $query->orderBy('amount', 'desc'); // Adjust sorting order as needed
            }
        }
    
        // Paginate results
        $scholarships = $query->paginate(10);
    
        // Get unique providers for dropdown
        $providers = Scholarship::select('provider')->distinct()->pluck('provider');
    
        // Get min and max amount for the slider
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
