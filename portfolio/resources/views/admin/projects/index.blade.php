<x-layout>
    <section class="space-y-8">
        <header class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">Studio / Manage</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Project library</h1>
                <p class="mt-2 max-w-xl leading-7 text-muted">Create, update, and organize the work featured on your portfolio.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex min-h-11 shrink-0 items-center justify-center gap-2 rounded-md bg-teal px-4 py-2.5 text-sm font-bold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-teal-deep">
                <span aria-hidden="true" class="text-lg leading-none">+</span> New project
            </a>
        </header>

        <div class="flex items-center justify-between border-y border-line py-3 text-sm">
            <p class="font-semibold text-ink">All projects</p>
            <p class="text-muted"><span class="font-bold text-teal">{{ $projects->count() }}</span> {{ Str::plural('project', $projects->count()) }}</p>
        </div>

        @if ($projects->isNotEmpty())
            <div class="divide-y divide-line overflow-hidden rounded-lg border border-line bg-white">
                @foreach ($projects as $project)
                    <article class="grid gap-4 p-4 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center sm:px-5">
                        <div class="flex min-w-0 items-start gap-4">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="" class="size-16 shrink-0 rounded-md bg-paper object-cover sm:size-20" loading="lazy">
                            @else
                                <div class="grid size-16 shrink-0 place-items-center rounded-md bg-teal-soft text-2xl font-bold text-teal sm:size-20" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            @endif
                            <div class="min-w-0 py-1">
                                <h2 class="truncate font-bold text-ink">{{ $project->title }}</h2>
                                <p class="mt-1 line-clamp-2 text-sm leading-6 text-muted">{{ $project->description }}</p>
                                <p class="mt-2 text-xs font-medium text-muted">Updated {{ $project->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 border-t border-line pt-3 sm:border-0 sm:pt-0">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex min-h-10 items-center justify-center rounded-md border border-line px-3 text-sm font-bold text-teal transition-colors hover:border-teal hover:bg-teal-soft">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex min-h-10 items-center justify-center rounded-md px-3 text-sm font-bold text-coral transition-colors hover:bg-coral-soft">Delete</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-lg border border-dashed border-line bg-white px-6 py-12 text-center sm:px-10">
                <span class="mx-auto grid size-12 place-items-center rounded-md bg-citrus text-xl font-bold text-ink" aria-hidden="true">+</span>
                <h2 class="mt-4 text-lg font-bold text-ink">Your project library is empty</h2>
                <p class="mx-auto mt-2 max-w-md leading-7 text-muted">Add your first project to start building your portfolio.</p>
                <a href="{{ route('admin.projects.create') }}" class="mt-5 inline-flex min-h-11 items-center justify-center rounded-md bg-coral px-4 py-2.5 text-sm font-bold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#c9523a]">Create a project</a>
            </div>
        @endif
    </section>
</x-layout>