<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of universities.
     */
    public function index(Request $request)
    {
        try {
            $query = University::active();

            // Apply filters
            if ($request->filled('country')) {
                $query->byCountry($request->country);
            }

            if ($request->filled('program')) {
                $query->byProgram($request->program);
            }

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('city', 'like', "%{$search}%")
                      ->orWhere('country', 'like', "%{$search}%");
                });
            }

            // Apply sorting
            $sortBy = $request->get('sort', 'qs_ranking');
            $sortOrder = $request->get('order', 'asc');
            
            if ($sortBy === 'qs_ranking') {
                $query->orderBy('qs_ranking', $sortOrder);
            } elseif ($sortBy === 'name') {
                $query->orderBy('name', $sortOrder);
            } elseif ($sortBy === 'tuition') {
                $query->orderBy('tuition_fee_min', $sortOrder);
            }

            $universities = $query->paginate(12);

            // Get unique countries and programs for filters
            $countries = University::active()->distinct()->pluck('country')->sort();
            $programs = University::active()
                ->get()
                ->pluck('programs')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            return view('universities.index', compact('universities', 'countries', 'programs'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('University index error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Failed to load universities.');
        }
    }

    /**
     * Display the specified university.
     */
    public function show(University $university)
    {
        try {
            $university->load('scholarships');
            return view('universities.show', compact('university'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('University show error: ' . $e->getMessage());
            return redirect()->route('universities.index')->with('error', 'University not found.');
        }
    }

    /**
     * Search universities.
     */
    public function search(Request $request)
    {
        try {
            $query = University::active();

            if ($request->filled('q')) {
                $search = $request->q;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('city', 'like', "%{$search}%")
                      ->orWhere('country', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }

            $universities = $query->limit(10)->get();

            return response()->json($universities);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('University search error: ' . $e->getMessage());
            return response()->json(['error' => 'Search failed'], 500);
        }
    }
}
