<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Scholarship;
use App\Models\NetworkingPost;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        try {
            $featuredUniversities = University::active()
                ->whereNotNull('qs_ranking')
                ->orderBy('qs_ranking')
                ->limit(6)
                ->get();

            $recentScholarships = Scholarship::active()
                ->notExpired()
                ->with('university')
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();

            $featuredPosts = NetworkingPost::featured()
                ->with('userProfile')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            return view('home', compact('featuredUniversities', 'recentScholarships', 'featuredPosts'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Home page load error: ' . $e->getMessage());
            return view('home', [
                'featuredUniversities' => collect(),
                'recentScholarships' => collect(),
                'featuredPosts' => collect(),
            ])->with('warning', 'Some content could not be loaded.');
        }
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }
}
