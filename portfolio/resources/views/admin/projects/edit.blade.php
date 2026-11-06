<x-layout>
    <section class="mx-auto max-w-3xl space-y-7">
        <header class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">Studio / Edit project</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Edit project</h1>
                <p class="mt-2 max-w-xl leading-7 text-muted">Update the details visitors see for <span class="font-semibold text-ink">{{ $project->title }}</span>.</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="inline-flex min-h-10 items-center text-sm font-bold text-teal transition-colors hover:text-coral">&larr; Back to projects</a>
        </header>

        <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6 rounded-lg border border-line bg-white p-5 sm:p-8">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-bold text-ink">Project title <span class="text-coral" aria-hidden="true">*</span></label>
                <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required maxlength="255" autocomplete="off" aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}" @error('title') aria-describedby="title-error" @enderror class="mt-2 min-h-11 w-full rounded-md border border-line bg-paper px-3 py-2.5 text-ink placeholder:text-muted/70 focus:border-teal focus:bg-white">
                @error('title')
                    <p id="title-error" role="alert" class="mt-2 text-sm font-medium text-coral">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-bold text-ink">Description <span class="text-coral" aria-hidden="true">*</span></label>
                <textarea id="description" name="description" rows="5" required aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}" @error('description') aria-describedby="description-error" @enderror class="mt-2 w-full resize-y rounded-md border border-line bg-paper px-3 py-2.5 leading-6 text-ink placeholder:text-muted/70 focus:border-teal focus:bg-white">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p id="description-error" role="alert" class="mt-2 text-sm font-medium text-coral">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="github_url" class="block text-sm font-bold text-ink">GitHub URL <span class="font-normal text-muted">(optional)</span></label>
                    <input id="github_url" type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" inputmode="url" autocomplete="url" placeholder="https://github.com/..." aria-invalid="{{ $errors->has('github_url') ? 'true' : 'false' }}" @error('github_url') aria-describedby="github-url-error" @enderror class="mt-2 min-h-11 w-full rounded-md border border-line bg-paper px-3 py-2.5 text-ink placeholder:text-muted/70 focus:border-teal focus:bg-white">
                    @error('github_url')
                        <p id="github-url-error" role="alert" class="mt-2 text-sm font-medium text-coral">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="live_url" class="block text-sm font-bold text-ink">Live URL <span class="font-normal text-muted">(optional)</span></label>
                    <input id="live_url" type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" inputmode="url" autocomplete="url" placeholder="https://example.com" aria-invalid="{{ $errors->has('live_url') ? 'true' : 'false' }}" @error('live_url') aria-describedby="live-url-error" @enderror class="mt-2 min-h-11 w-full rounded-md border border-line bg-paper px-3 py-2.5 text-ink placeholder:text-muted/70 focus:border-teal focus:bg-white">
                    @error('live_url')
                        <p id="live-url-error" role="alert" class="mt-2 text-sm font-medium text-coral">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-bold text-ink">Project image <span class="font-normal text-muted">(optional, up to 2 MB)</span></label>
                @if ($project->image_path)
                    <div class="mt-3 flex items-center gap-4 rounded-md bg-paper p-3">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="Current image for {{ $project->title }}" class="size-16 rounded object-cover sm:size-20">
                        <p class="text-sm leading-6 text-muted">Current image. Choose a new file to replace it.</p>
                    </div>
                @endif
                <input id="image" type="file" name="image" accept="image/*" aria-invalid="{{ $errors->has('image') ? 'true' : 'false' }}" @error('image') aria-describedby="image-error" @enderror class="mt-3 block min-h-12 w-full rounded-md border border-line bg-paper p-2 text-sm text-muted file:mr-4 file:min-h-9 file:rounded file:border-0 file:bg-teal-soft file:px-3 file:font-bold file:text-teal-deep hover:file:bg-citrus">
                @error('image')
                    <p id="image-error" role="alert" class="mt-2 text-sm font-medium text-coral">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-line pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.projects.index') }}" class="inline-flex min-h-11 items-center justify-center rounded-md px-4 py-2.5 text-sm font-bold text-muted transition-colors hover:bg-paper hover:text-ink">Cancel</a>
                <button type="submit" class="inline-flex min-h-11 items-center justify-center rounded-md bg-teal px-5 py-2.5 text-sm font-bold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-teal-deep">Save changes</button>
            </div>
        </form>
    </section>
</x-layout>