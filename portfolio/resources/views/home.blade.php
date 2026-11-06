<x-layout>
    <div class="space-y-20 md:space-y-28">
        <section class="grid items-center gap-12 md:grid-cols-[minmax(0,1.3fr)_minmax(18rem,0.7fr)] md:gap-16">
            <div>
                <p class="inline-flex items-center gap-2 rounded-md bg-citrus px-3 py-1.5 text-xs font-bold uppercase tracking-[0.14em] text-ink">
                    <span class="size-2 rounded-full bg-coral" aria-hidden="true"></span>
                    Developer portfolio
                </p>
                <h1 class="mt-6 max-w-3xl text-5xl font-bold leading-[1.04] text-ink sm:text-6xl md:text-7xl">Building the systems <span class="text-teal">behind the scenes.</span></h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-muted sm:text-xl">Hi, I'm {{ $name }}. I build backend services, explore system design, and automate cloud infrastructure.</p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="#projects" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-md bg-teal px-5 py-3 text-sm font-bold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-teal-deep">Explore projects <span aria-hidden="true">&darr;</span></a>
                    <a href="{{ route('about') }}" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-md border border-line bg-white px-5 py-3 text-sm font-bold text-ink transition duration-200 hover:border-coral hover:text-coral">About me <span aria-hidden="true">&nearr;</span></a>
                </div>
                <p class="mt-8 border-l-2 border-coral pl-4 text-sm font-medium leading-6 text-muted">Backend engineering <span class="mx-1 text-coral">/</span> System architecture <span class="mx-1 text-coral">/</span> DevOps</p>
            </div>

            <figure class="mx-auto w-full max-w-sm">
                <div class="relative rounded-lg bg-teal p-3 shadow-[12px_12px_0_0_#e3f28a]">
                    <img src="https://github.com/programmer-bell.png" alt="Bell's GitHub profile portrait" class="aspect-square w-full rounded-md object-cover" fetchpriority="high">
                    <span class="absolute -left-3 top-6 rounded-r-md bg-coral px-3 py-2 text-xs font-bold uppercase tracking-widest text-white">Build / Learn / Repeat</span>
                </div>
                <figcaption class="mt-6 flex items-center justify-between gap-4 text-xs font-semibold uppercase tracking-widest text-muted">
                    <span>Independent builder</span>
                    <span class="text-teal">Always learning</span>
                </figcaption>
            </figure>
        </section>

        <section id="projects" aria-labelledby="projects-heading" class="scroll-mt-28 border-t border-line pt-10 md:pt-12">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">Selected work</p>
                    <h2 id="projects-heading" class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Projects</h2>
                </div>
                <p class="max-w-sm text-sm leading-6 text-muted">Practical builds and experiments in backend engineering and systems.</p>
            </div>

            @if ($projects->isNotEmpty())
                <div class="mt-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($projects as $project)
                        <article class="group flex min-w-0 flex-col overflow-hidden rounded-lg border border-line bg-white transition duration-200 hover:-translate-y-1 hover:border-teal/40 hover:shadow-lg hover:shadow-ink/5">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }} project preview" class="aspect-[16/10] w-full object-cover" loading="lazy">
                            @else
                                <div class="flex aspect-[16/10] items-end justify-between bg-teal-soft p-5">
                                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-teal-deep">Project / {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span class="text-5xl font-bold leading-none text-coral" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            @endif
                            <div class="flex flex-1 flex-col p-5 sm:p-6">
                                <h3 class="text-xl font-bold text-ink">{{ $project->title }}</h3>
                                <p class="mt-2 flex-1 leading-7 text-muted">{{ $project->description }}</p>
                                <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 border-t border-line pt-4 text-sm font-bold">
                                    @if ($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" rel="noreferrer" class="text-teal hover:text-coral">Source code <span aria-hidden="true">&nearr;</span></a>
                                    @endif
                                    @if ($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" rel="noreferrer" class="text-teal hover:text-coral">Live project <span aria-hidden="true">&nearr;</span></a>
                                    @endif
                                    @if (! $project->github_url && ! $project->live_url)
                                        <span class="text-muted">Project details</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-8 grid gap-6 rounded-lg border border-dashed border-line bg-white p-6 sm:grid-cols-[1fr_auto] sm:items-center sm:p-8">
                    <div>
                        <p class="text-lg font-bold text-ink">The project shelf is being stocked.</p>
                        <p class="mt-2 max-w-xl leading-7 text-muted">New backend builds and systems experiments will appear here. In the meantime, see what I work with and how I approach engineering.</p>
                    </div>
                    <a href="{{ route('about') }}" class="inline-flex min-h-11 items-center justify-center rounded-md bg-coral px-4 py-2.5 text-sm font-bold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#c9523a]">Meet Bell <span class="ml-2" aria-hidden="true">&nearr;</span></a>
                </div>
            @endif
        </section>
    </div>
</x-layout>