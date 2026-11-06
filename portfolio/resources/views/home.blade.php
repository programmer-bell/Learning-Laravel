<x-layout>
    <section>
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Developer Portfolio</p>
        <h1 class="mt-4 text-5xl font-bold tracking-tight sm:text-6xl">Hi, I am {{ $name }}</h1>
        <p class="mt-6 max-w-2xl text-lg leading-8 text-stone-600">I build scalable backend applications.</p>
        <a href="/about" class="mt-10 inline-block rounded-lg bg-stone-900 px-5 py-3 text-sm font-semibold text-white hover:bg-stone-700">About me</a>
    </section>

    <section class="mt-24">
        <h2 class="text-2xl font-bold tracking-tight">Projects</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-2">
            @foreach ($projects as $project)
                <article class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                    @if ($project->image_path)
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="mb-4 aspect-video w-full rounded-xl object-cover">
                    @endif
                    <h3 class="text-lg font-semibold">{{ $project->title }}</h3>
                    <p class="mt-2 leading-7 text-stone-600">{{ $project->description }}</p>
                    <div class="mt-4 flex gap-4 text-sm font-semibold">
                        @if ($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">GitHub</a>
                        @endif
                        @if ($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">Live</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layout>