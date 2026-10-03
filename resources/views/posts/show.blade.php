@extends('layouts.app')

@section('title', $post->title)

@section('content')
    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <x-card>
        <h1 class="text-2xl font-bold mb-2">{{ $post->title }}</h1>
        <p class="text-xs text-slate-400 mb-4">
            Dibuat {{ $post->created_at->diffForHumans() }}
            @if ($post->updated_at->ne($post->created_at))
                · diperbarui {{ $post->updated_at->diffForHumans() }}
            @endif
        </p>
        <p class="text-slate-700 whitespace-pre-line">{{ $post->body }}</p>
    </x-card>

    <div class="mt-6 flex gap-3">
        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-yellow-600">
            Edit
        </a>

        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Yakin hapus post ini?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                Hapus
            </button>
        </form>

        <a href="{{ route('posts.index') }}" class="text-slate-500 px-4 py-2 text-sm hover:underline">
            ← Kembali
        </a>
    </div>
@endsection
