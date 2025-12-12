<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Admin Scholarship Controller
 * 
 * Handles CRUD operations for scholarships in the admin panel.
 */
class AdminScholarshipController extends Controller
{
    /**
     * Display a listing of scholarships
     */
    public function index()
    {
        $scholarships = Scholarship::with('university')->latest()->paginate(15);
        return view('admin.scholarships.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new scholarship
     */
    public function create()
    {
        $universities = University::where('is_active', true)->get();
        return view('admin.scholarships.create', compact('universities'));
    }

    /**
     * Store a newly created scholarship
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'university_id' => 'nullable|exists:universities,id',
            'provider' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'coverage' => 'nullable|string|max:255',
            'eligibility_criteria' => 'nullable|array',
            'eligibility_criteria.*' => 'string|max:500',
            'required_documents' => 'nullable|array',
            'required_documents.*' => 'string|max:500',
            'application_deadline' => 'required|date|after:today',
            'announcement_date' => 'nullable|date',
            'application_link' => 'nullable|url|max:500',
            'programs_covered' => 'nullable|array',
            'programs_covered.*' => 'string|max:255',
            'countries_eligible' => 'nullable|array',
            'countries_eligible.*' => 'string|max:255',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Scholarship title is required.',
            'description.required' => 'Description is required.',
            'application_deadline.required' => 'Application deadline is required.',
            'application_deadline.after' => 'Application deadline must be a future date.',
            'university_id.exists' => 'Selected university does not exist.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Scholarship::create($validator->validated());
        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship created successfully!');
    }

    /**
     * Display the specified scholarship
     */
    public function show(Scholarship $scholarship)
    {
        $scholarship->load('university');
        return view('admin.scholarships.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified scholarship
     */
    public function edit(Scholarship $scholarship)
    {
        $universities = University::where('is_active', true)->get();
        return view('admin.scholarships.edit', compact('scholarship', 'universities'));
    }

    /**
     * Update the specified scholarship
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'university_id' => 'nullable|exists:universities,id',
            'provider' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'coverage' => 'nullable|string|max:255',
            'eligibility_criteria' => 'nullable|array',
            'eligibility_criteria.*' => 'string|max:500',
            'required_documents' => 'nullable|array',
            'required_documents.*' => 'string|max:500',
            'application_deadline' => 'required|date',
            'announcement_date' => 'nullable|date',
            'application_link' => 'nullable|url|max:500',
            'programs_covered' => 'nullable|array',
            'programs_covered.*' => 'string|max:255',
            'countries_eligible' => 'nullable|array',
            'countries_eligible.*' => 'string|max:255',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Scholarship title is required.',
            'description.required' => 'Description is required.',
            'application_deadline.required' => 'Application deadline is required.',
            'university_id.exists' => 'Selected university does not exist.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $scholarship->update($validator->validated());
        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship updated successfully!');
    }

    /**
     * Remove the specified scholarship
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship deleted successfully!');
    }
}
