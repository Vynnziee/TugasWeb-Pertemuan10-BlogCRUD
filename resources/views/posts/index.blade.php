@extends('layouts.app')

@section('title', 'Semua Post')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Semua Post</h1>

    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    {{-- Bonus: pencarian --}}
    <form method="GET" action="{{ route('posts.index') }}" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Cari judul post..."
            class="flex-1 border border-slate-300 rounded-lg px-4 py-2 text-sm"
        >
        <button class="bg-slate-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-slate-800">Cari</button>
        @if ($search)
            <a href="{{ route('posts.index') }}" class="text-sm text-slate-500 self-center hover:underline">Reset</a>
        @endif
    </form>

    @forelse ($posts as $post)
        <x-card class="mb-4">
            <a href="{{ route('posts.show', $post) }}" class="text-lg font-semibold text-red-600 hover:underline">
                {{ $post->title }}
            </a>
            <p class="text-slate-600 text-sm mt-1">{{ Str::limit($post->body, 120) }}</p>
            <p class="text-xs text-slate-400 mt-2">{{ $post->created_at->diffForHumans() }}</p>
        </x-card>
    @empty
        <p class="text-slate-500">Belum ada post{{ $search ? ' yang cocok dengan pencarian.' : '.' }}</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
