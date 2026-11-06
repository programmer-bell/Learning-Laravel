<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f8f6">
    <meta name="description" content="Bell's portfolio: backend engineering, system architecture, and DevOps projects.">
    <title>{{ $title ?? 'Bell — Backend & Systems' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-paper text-ink antialiased">
    <a href="#main-content" class="sr-only z-50 rounded-md bg-citrus px-4 py-2 font-semibold text-ink focus:not-sr-only focus:fixed focus:left-4 focus:top-4">Skip to content</a>
    <header class="sticky top-0 z-40 border-b border-line bg-paper/95 backdrop-blur-md">
        <nav aria-label="Main navigation" class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-5 py-3.5 sm:px-8">
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3" aria-label="Bell home">
                <span class="grid size-10 place-items-center rounded-md bg-ink text-lg font-bold text-citrus transition duration-200 group-hover:bg-teal">B</span>
                <span>
                    <span class="block text-base font-bold leading-tight">Bell</span>
                    <span class="mt-0.5 hidden text-[10px] font-semibold uppercase tracking-[0.16em] text-muted sm:block">Backend & systems</span>
                </span>
            </div>

            <div class="hidden items-center gap-2 md:flex">
                <a href="{{ route('home') }}" @class(['rounded-md px-4 py-2 text-sm font-semibold transition duration-200', 'bg-teal-soft text-teal-deep' => request()->routeIs('home'), 'text-muted hover:bg-white hover:text-ink' => ! request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('about') }}" @class(['rounded-md px-4 py-2 text-sm font-semibold transition duration-200', 'bg-teal-soft text-teal-deep' => request()->routeIs('about'), 'text-muted hover:bg-white hover:text-ink' => ! request()->routeIs('about')]) @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
                <a href="https://github.com/programmer-bell" target="_blank" rel="noreferrer" class="ml-2 inline-flex items-center gap-2 rounded-md bg-coral px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#c9523a]">GitHub <span aria-hidden="true">&nearr;</span></a>
            </div>

            <details class="relative md:hidden">
                <summary class="flex min-h-11 cursor-pointer list-none items-center gap-2 rounded-md border border-line bg-white px-4 text-sm font-semibold text-ink [&::-webkit-details-marker]:hidden">
                    Menu <span aria-hidden="true" class="text-teal">+</span>
                </summary>
                <div class="absolute right-0 top-[calc(100%+0.75rem)] z-50 grid min-w-48 gap-1 rounded-lg border border-line bg-white p-2 shadow-lg">
                    <a href="{{ route('home') }}" @class(['rounded-md px-3 py-2.5 text-sm font-semibold', 'bg-teal-soft text-teal-deep' => request()->routeIs('home'), 'text-muted hover:bg-paper hover:text-ink' => ! request()->routeIs('home')])>Home</a>
                    <a href="{{ route('about') }}" @class(['rounded-md px-3 py-2.5 text-sm font-semibold', 'bg-teal-soft text-teal-deep' => request()->routeIs('about'), 'text-muted hover:bg-paper hover:text-ink' => ! request()->routeIs('about')])>About</a>
                    <a href="https://github.com/programmer-bell" target="_blank" rel="noreferrer" class="rounded-md px-3 py-2.5 text-sm font-semibold text-coral hover:bg-coral-soft">GitHub <span aria-hidden="true">&nearr;</span></a>
                </div>
            </details>
        </nav>
    </header>

    <main id="main-content" class="page-enter mx-auto min-h-[65vh] max-w-6xl px-5 py-12 sm:px-8 md:py-16">
        @if (session('success'))
            <div role="status" class="mb-8 flex items-center gap-3 rounded-md border border-teal/20 bg-teal-soft px-4 py-3 text-sm font-semibold text-teal-deep">
                <span class="grid size-6 shrink-0 place-items-center rounded-full bg-white text-teal" aria-hidden="true">&#10003;</span>
                {{ session('success') }}
            </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="border-t border-line bg-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-5 py-7 text-sm sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <p class="font-semibold text-ink">Bell <span class="font-normal text-muted">/ Design thoughtfully. Build reliably.</span></p>
            <a href="https://github.com/programmer-bell" target="_blank" rel="noreferrer" class="font-semibold text-teal hover:text-coral">GitHub profile <span aria-hidden="true">&nearr;</span></a>
        </div>
    </footer>
</body>
</html>