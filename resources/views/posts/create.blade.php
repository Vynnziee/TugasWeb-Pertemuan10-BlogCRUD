@extends('layouts.app')

@section('title', 'Post Baru')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Buat Post Baru</h1>

    @if ($errors->any())
        <x-alert type="danger">Periksa kembali form di bawah, ada input yang belum sesuai.</x-alert>
    @endif

    <x-card>
        <form method="POST" action="{{ route('posts.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2 text-sm"
                >
                @error('title')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Isi</label>
                <textarea
                    name="body"
                    rows="6"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2 text-sm"
                >{{ old('body') }}</textarea>
                @error('body')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <button class="bg-red-600 text-white px-5 py-2 rounded-lg text-sm hover:bg-red-700">
                Simpan
            </button>
        </form>
    </x-card>
@endsection
