<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'user'])->get(); // Eager load category and user relationships
    
        return view('posts.index', compact('posts'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users      = User::all();
        $categories = Category::all();

        $posts = Post::whereNull('parentId')->orderBy('title')->get();

        return view('posts.create', compact('users', 'categories', 'posts'));
    }

    /**
     * Store a newly created post in storage.
     */


   // Store new post in the database;
   public function store(Request $request)
{
    // Validate incoming data
    $data = $request->validate([
        'title' => 'required|string|max:100',
        'content' => 'required|string',
        'published' => 'nullable|boolean',
        'publishedAt' => 'nullable|date',
        'categoryId' => 'nullable|exists:categories,id',
        'metaTitle' => 'nullable|string|max:255',
        'slug' => 'nullable|string|max:255',
        'summary' => 'nullable|string|max:255',
    ]);

    // Default to 'false' if 'published' checkbox is not checked
    $data['published'] = $request->boolean('published', false);

    // Create a new post
    $post = new Post();
    $post->title = $data['title'];
    $post->slug = $data['slug'];
    $post->metaTitle = $data['metaTitle'] ?? $data['title'];  // Default metaTitle to the title if not provided
    $post->content = $data['content'];
    $post->summary = $data['summary'];
    $post->published = $data['published'];
    $post->publishedAt = $data['publishedAt'] ?? null;  // Use the provided 'publishedAt' or null
    $post->categoryId = $data['categoryId'] ?? null;  // Set category if provided
    $post->userId = Auth::id();  // Set the logged-in user as the post's user
    $post->authorId = Auth::id();  // Set the logged-in user as the post's author
    $post->created_at = now();
    $post->updated_at = now();
    $post->save();

    // Redirect to index route with success message
    return redirect()->route('index')  // Assuming 'index' route is your dashboard or post listing page
        ->with('success', 'Post created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('category', 'user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('category', 'user')->findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the dropdown in the edit form
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input, including the categoryId
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'metaTitle' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'categoryId' => 'nullable|exists:categories,id', // Validate categoryId to ensure it's valid
            'published' => 'nullable|boolean',
        ]);
    
        // Find the post by ID
        $post = Post::findOrFail($id);
    
        // Update the post with the validated data
        $post->update($validated);
    
        // Redirect to the posts index or wherever you need to go
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
