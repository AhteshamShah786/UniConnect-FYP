<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Admin University Controller
 * 
 * Handles CRUD operations for universities in the admin panel.
 */
class AdminUniversityController extends Controller
{
    /**
     * Display a listing of universities
     */
    public function index()
    {
        $universities = University::latest()->paginate(15);
        return view('admin.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new university
     */
    public function create()
    {
        return view('admin.universities.create');
    }

    /**
     * Store a newly created university
     */
    public function store(Request $request)
    {
        // Validate the request with comprehensive rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|url|max:500',
            'qs_ranking' => 'nullable|integer|min:1',
            'times_ranking' => 'nullable|integer|min:1',
            'programs' => 'nullable|array',
            'programs.*' => 'string|max:255',
            'admission_requirements' => 'nullable|array',
            'admission_requirements.*' => 'string|max:500',
            'tuition_fee_min' => 'nullable|numeric|min:0',
            'tuition_fee_max' => 'nullable|numeric|min:0|gte:tuition_fee_min',
            'currency' => 'nullable|string|max:10',
            'contact_info' => 'nullable|array',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'University name is required.',
            'country.required' => 'Country is required.',
            'city.required' => 'City is required.',
            'description.required' => 'Description is required.',
            'website.url' => 'Please provide a valid website URL.',
            'tuition_fee_max.gte' => 'Maximum tuition fee must be greater than or equal to minimum tuition fee.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        University::create($validator->validated());
        return redirect()->route('admin.universities.index')
            ->with('success', 'University created successfully!');
    }

    /**
     * Display the specified university
     */
    public function show(University $university)
    {
        $university->load('scholarships');
        return view('admin.universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified university
     */
    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    /**
     * Update the specified university
     */
    public function update(Request $request, University $university)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|url|max:500',
            'qs_ranking' => 'nullable|integer|min:1',
            'times_ranking' => 'nullable|integer|min:1',
            'programs' => 'nullable|array',
            'programs.*' => 'string|max:255',
            'admission_requirements' => 'nullable|array',
            'admission_requirements.*' => 'string|max:500',
            'tuition_fee_min' => 'nullable|numeric|min:0',
            'tuition_fee_max' => 'nullable|numeric|min:0|gte:tuition_fee_min',
            'currency' => 'nullable|string|max:10',
            'contact_info' => 'nullable|array',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'University name is required.',
            'country.required' => 'Country is required.',
            'city.required' => 'City is required.',
            'description.required' => 'Description is required.',
            'website.url' => 'Please provide a valid website URL.',
            'tuition_fee_max.gte' => 'Maximum tuition fee must be greater than or equal to minimum tuition fee.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $university->update($validator->validated());
        return redirect()->route('admin.universities.index')
            ->with('success', 'University updated successfully!');
    }

    /**
     * Remove the specified university
     */
    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('admin.universities.index')
            ->with('success', 'University deleted successfully!');
    }
}
