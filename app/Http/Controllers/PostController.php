<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /** Aturan validasi dipakai bersama oleh store() & update() */
    private function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'body'  => 'required|string|min:10',
        ];
    }

    // 1. GET /posts
    public function index(Request $request)
    {
        $search = $request->query('search');

        $posts = Post::query()
            ->when($search, fn ($q) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate(6)
            ->withQueryString(); // supaya ?search=... ikut ke link pagination

        return view('posts.index', compact('posts', 'search'));
    }

    // 2. GET /posts/create
    public function create()
    {
        return view('posts.create');
    }

    // 3. POST /posts
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    // 4. GET /posts/{post} — Route Model Binding
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 5. GET /posts/{post}/edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 6. PUT/PATCH /posts/{post}
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate($this->rules());

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post berhasil diperbarui!');
    }

    // 7. DELETE /posts/{post}
    public function destroy(Post $post)
    {
        $post->delete(); // soft delete, karena model pakai SoftDeletes

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dihapus!');
    }
}
