<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\University;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of scholarships.
     */
    public function index(Request $request)
    {
        try {
            $query = Scholarship::active()->notExpired()->with('university');

            // Apply filters from eligibility checker or search
            if ($request->filled('country')) {
                $query->forCountry($request->country);
            }

            if ($request->filled('program')) {
                $query->forProgram($request->program);
            }

            if ($request->filled('coverage')) {
                $query->byCoverage($request->coverage);
            }

            // Handle amount range filter
            if ($request->filled('amount_range')) {
                $range = $request->amount_range;
                if ($range === '0-5000') {
                    $query->where('amount', '<=', 5000);
                } elseif ($range === '5000-10000') {
                    $query->whereBetween('amount', [5000, 10000]);
                } elseif ($range === '10000-25000') {
                    $query->whereBetween('amount', [10000, 25000]);
                } elseif ($range === '25000+') {
                    $query->where('amount', '>=', 25000);
                }
            }

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('provider', 'like', "%{$search}%");
                });
            }

            // Apply sorting
            $sortBy = $request->get('sort', 'application_deadline');
            $sortOrder = $request->get('order', 'asc');
            
            if ($sortBy === 'amount') {
                $query->orderBy('amount', $sortOrder);
            } elseif ($sortBy === 'application_deadline' || $sortBy === 'deadline') {
                $query->orderBy('application_deadline', $sortOrder);
            } elseif ($sortBy === 'title') {
                $query->orderBy('title', $sortOrder);
            } else {
                $query->orderBy('application_deadline', 'asc');
            }

            $scholarships = $query->paginate(12);

            // Get unique countries, programs, and coverage types for filters
            $countries = Scholarship::active()
                ->get()
                ->pluck('countries_eligible')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            $programs = Scholarship::active()
                ->get()
                ->pluck('programs_covered')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            $coverageTypes = Scholarship::active()
                ->distinct()
                ->pluck('coverage')
                ->filter()
                ->sort()
                ->values();

            return view('scholarships.index', compact('scholarships', 'countries', 'programs', 'coverageTypes'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Scholarship index error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Failed to load scholarships.');
        }
    }

    /**
     * Display the specified scholarship.
     */
    public function show(Scholarship $scholarship)
    {
        try {
            $scholarship->load('university');
            return view('scholarships.show', compact('scholarship'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Scholarship show error: ' . $e->getMessage());
            return redirect()->route('scholarships.index')->with('error', 'Scholarship not found.');
        }
    }

    /**
     * Search scholarships.
     */
    public function search(Request $request)
    {
        try {
            $query = Scholarship::active()->notExpired()->with('university');

            if ($request->filled('q')) {
                $search = $request->q;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('provider', 'like', "%{$search}%");
                });
            }

            $scholarships = $query->limit(10)->get();

            return response()->json($scholarships);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Scholarship search error: ' . $e->getMessage());
            return response()->json(['error' => 'Search failed'], 500);
        }
    }

    /**
     * Show eligibility check form.
     */
    public function eligibilityCheck()
    {
        try {
            $countries = Scholarship::active()
                ->get()
                ->pluck('countries_eligible')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            $programs = Scholarship::active()
                ->get()
                ->pluck('programs_covered')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            return view('scholarships.eligibility-check', compact('countries', 'programs'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Eligibility check error: ' . $e->getMessage());
            return redirect()->route('scholarships.index')->with('error', 'Failed to load eligibility checker.');
        }
    }
}
