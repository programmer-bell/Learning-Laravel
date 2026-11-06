<x-layout>
    <section>
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold tracking-tight">Projects</h1>
            <a href="/admin/projects/create" class="rounded-lg bg-stone-900 px-4 py-2 text-sm font-semibold text-white hover:bg-stone-700">New Project</a>
        </div>

        <div class="mt-8 overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm">
            <table class="w-full text-left">
                <tbody class="divide-y divide-stone-200">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-6 py-4 font-medium">{{ $project->title }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="/admin/projects/{{ $project->id }}/edit" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">Edit</a>
                                <form method="POST" action="/admin/projects/{{ $project->id }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-4 text-sm font-semibold text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>