<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NetworkingPost;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class NetworkingController extends Controller
{
    /**
     * Display a listing of networking posts.
     */
    public function index(Request $request)
    {
        $query = NetworkingPost::with('userProfile');

        // Apply filters
        if ($request->filled('type')) {
            $query->where('post_type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Apply sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
        $query->orderBy($sortBy, $sortOrder);

        $posts = $query->paginate(12);

        // Get unique post types for filters
        $postTypes = NetworkingPost::distinct()->pluck('post_type')->sort();

        return view('networking.index', compact('posts', 'postTypes'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('networking.create');
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'post_type' => 'required|in:question,experience,advice,announcement',
        ]);

        $userProfile = UserProfile::where('user_id', Auth::id())->first();
        
        if (!$userProfile) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your profile first.');
        }

        NetworkingPost::create([
            'user_profile_id' => $userProfile->id,
            'title' => $request->title,
            'content' => $request->content,
            'post_type' => $request->post_type,
            'is_featured' => false,
        ]);

        return redirect()->route('networking.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified post.
     */
    public function show(NetworkingPost $post)
    {
        $post->load('userProfile');
        return view('networking.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(NetworkingPost $post)
    {
        $this->authorize('update', $post);
        return view('networking.edit', compact('post'));
    }

    /**
     * Update the specified post.
     */
    public function update(Request $request, NetworkingPost $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'post_type' => 'required|in:question,experience,advice,announcement',
        ]);

        $post->update($request->only(['title', 'content', 'post_type']));

        return redirect()->route('networking.show', $post)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post.
     */
    public function destroy(NetworkingPost $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return redirect()->route('networking.index')->with('success', 'Post deleted successfully!');
    }
}
