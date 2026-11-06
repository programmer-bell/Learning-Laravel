<x-layout>
    <section class="max-w-2xl">
        <h1 class="text-3xl font-bold tracking-tight">Edit Project</h1>

        <form method="POST" action="/admin/projects/{{ $project->id }}" enctype="multipart/form-data" class="mt-8 space-y-5 rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold">Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="mt-2 w-full rounded-lg border border-stone-300 px-3 py-2 focus:border-indigo-500 focus:outline-none">
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold">Description</label>
                <textarea name="description" rows="3" class="mt-2 w-full rounded-lg border border-stone-300 px-3 py-2 focus:border-indigo-500 focus:outline-none">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="mt-2 w-full rounded-lg border border-stone-300 px-3 py-2 focus:border-indigo-500 focus:outline-none">
                    @error('github_url')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold">Live URL</label>
                    <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" class="mt-2 w-full rounded-lg border border-stone-300 px-3 py-2 focus:border-indigo-500 focus:outline-none">
                    @error('live_url')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold">Image</label>
                @if ($project->image_path)
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="mt-2 h-24 rounded-lg object-cover">
                @endif
                <input type="file" name="image" class="mt-2 block text-sm text-stone-600 file:mr-4 file:rounded-lg file:border-0 file:bg-stone-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-stone-900 hover:file:bg-stone-200">
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button class="rounded-lg bg-stone-900 px-4 py-2 text-sm font-semibold text-white hover:bg-stone-700">Update</button>
        </form>
    </section>
</x-layout>