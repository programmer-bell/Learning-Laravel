<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bell — Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-stone-900 antialiased">
    <header class="border-b border-stone-200 bg-white">
        <nav class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">
            <a href="/" class="text-xl font-bold tracking-tight">Bell<span class="text-indigo-600">.</span></a>
            <div class="flex items-center gap-8 text-sm font-medium text-stone-600">
                <a href="/" class="hover:text-stone-900">Home</a>
                <a href="/about" class="hover:text-stone-900">About</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-5xl px-6 py-20">
        @if (session('success'))
            <div class="mb-8 rounded-lg bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('success') }}</div>
        @endif

        {{ $slot }}
    </main>

    <footer class="border-t border-stone-200">
        <div class="mx-auto max-w-5xl px-6 py-8 text-sm text-stone-500">Built with Laravel</div>
    </footer>
</body>
</html>