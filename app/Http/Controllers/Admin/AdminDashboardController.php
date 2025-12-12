<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Scholarship;
use App\Models\NetworkingPost;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Admin Dashboard Controller
 * 
 * Displays statistics and overview for the admin panel.
 */
class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics
     */
    public function index()
    {
        // Get statistics
        $stats = [
            'universities' => University::count(),
            'active_universities' => University::where('is_active', true)->count(),
            'scholarships' => Scholarship::count(),
            'active_scholarships' => Scholarship::where('is_active', true)->count(),
            'posts' => NetworkingPost::count(),
            'users' => User::count(),
            'recent_universities' => University::latest()->take(5)->get(),
            'recent_scholarships' => Scholarship::latest()->take(5)->get(),
            'recent_posts' => NetworkingPost::latest()->take(5)->with('userProfile')->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
