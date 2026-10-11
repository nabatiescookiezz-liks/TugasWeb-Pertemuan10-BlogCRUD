<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $posts = Post::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts', 'search'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imagePath = null;

        try {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::lower(Str::random(6));

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts', 'public');
                $validated['image'] = $imagePath;
            }

            Post::create($validated);

            return redirect()->route('posts.index')->with('success', 'Postingan berhasil ditambahkan.');
        } catch (Throwable $e) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withInput()->with('error', 'Postingan gagal disimpan. Silakan coba lagi.');
        }
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $newImagePath = null;

        try {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::lower(Str::random(6));

            if ($request->hasFile('image')) {
                $newImagePath = $request->file('image')->store('posts', 'public');
                $validated['image'] = $newImagePath;
            } else {
                unset($validated['image']);
            }

            $oldImagePath = $post->image;
            $post->update($validated);

            if ($newImagePath && $oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('posts.show', $post)->with('success', 'Postingan berhasil diperbarui.');
        } catch (Throwable $e) {
            if ($newImagePath) {
                Storage::disk('public')->delete($newImagePath);
            }

            return back()->withInput()->with('error', 'Postingan gagal diperbarui. Silakan coba lagi.');
        }
    }

    public function destroy(Post $post): RedirectResponse
    {
        try {
            $post->delete();

            return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus.');
        } catch (Throwable $e) {
            return redirect()->route('posts.index')->with('error', 'Postingan gagal dihapus.');
        }
    }
}
