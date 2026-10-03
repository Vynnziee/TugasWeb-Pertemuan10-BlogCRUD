<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog') — Laravel Blog CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
    <nav class="bg-white shadow">
        <div class="max-w-3xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="text-xl font-bold text-red-600">📝 Blog CRUD</a>
            <a href="{{ route('posts.create') }}" class="text-sm font-medium bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                + Post Baru
            </a>
        </div>
    </nav>

    <main class="flex-1 max-w-3xl w-full mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-slate-500 py-6">
        Tugas Rutin 10 — Pemrograman Web · Laravel {{ app()->version() }}
    </footer>
</body>
</html>
