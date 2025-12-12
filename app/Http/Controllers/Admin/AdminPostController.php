<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NetworkingPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Admin Post Controller
 * 
 * Handles CRUD operations for networking posts in the admin panel.
 */
class AdminPostController extends Controller
{
    /**
     * Display a listing of posts
     */
    public function index()
    {
        $posts = NetworkingPost::with('userProfile')->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Display the specified post
     */
    public function show(NetworkingPost $post)
    {
        $post->load('userProfile');
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Update the specified post (e.g., feature/unfeature)
     */
    public function update(Request $request, NetworkingPost $post)
    {
        $validator = Validator::make($request->all(), [
            'is_featured' => 'boolean',
            'is_pinned' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $post->update($validator->validated());
        return redirect()->back()
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post
     */
    public function destroy(NetworkingPost $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
