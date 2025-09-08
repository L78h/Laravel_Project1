@vite('resources/css/app.css')

<div class="p-6">
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 font-semibold">Parent ID</th>
                    <th class="px-4 py-3 font-semibold">ID</th>
                    <th class="px-4 py-3 font-semibold">Title</th>
                    <th class="px-4 py-3 font-semibold">Meta Title</th>
                    <th class="px-4 py-3 font-semibold">Slug</th>
                    <th class="px-4 py-3 font-semibold">Content</th>
                    <th class="px-4 py-3 font-semibold">Created At</th>
                    <th class="px-4 py-3 font-semibold">Updated At</th>
                    <th class="px-4 py-3 font-semibold text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-4 py-3">{{ $category->parentId }}</td>
                    <td class="px-4 py-3">{{ $category->id }}</td>
                    <td class="px-4 py-3">{{ $category->title }}</td>
                    <td class="px-4 py-3">{{ $category->metaTitle }}</td>
                    <td class="px-4 py-3">{{ $category->slug }}</td>
                    <td class="px-4 py-3 truncate max-w-xs">{{ Str::limit($category->content, 30) }}</td>
                    <td class="px-4 py-3">{{ $category->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3">{{ $category->updated_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('categories.show', $category->id) }}" class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
