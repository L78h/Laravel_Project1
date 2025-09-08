@vite('resources/css/app.css')
@extends('layouts.app')
<div class="p-6">
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 font-semibold">ID</th>
                    <th class="px-4 py-3 font-semibold">Post ID</th>
                    <th class="px-4 py-3 font-semibold">Parent ID</th>
                    <th class="px-4 py-3 font-semibold">Title</th>
                    <th class="px-4 py-3 font-semibold">Published</th>
                    <th class="px-4 py-3 font-semibold">Created</th>
                    <th class="px-4 py-3 font-semibold">Published At</th>
                    <th class="px-4 py-3 font-semibold">Content</th>
                    <th class="px-4 py-3 font-semibold">Created At</th>
                    <th class="px-4 py-3 font-semibold">Updated At</th>
                    <th class="px-4 py-3 font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($comments as $comment)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-4 py-3">{{ $comment->id }}</td>
                    <td class="px-4 py-3">{{ $comment->postId }}</td>
                    <td class="px-4 py-3">{{ $comment->parentid }}</td>
                    <td class="px-4 py-3">{{ $comment->title }}</td>
                    <td class="px-4 py-3">
                        @if ($comment->published)
                            <span class="text-green-600 font-semibold">Yes</span>
                        @else
                            <span class="text-red-500 font-semibold">No</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $comment->createdAt }}</td>
                    <td class="px-4 py-3">{{ $comment->publishedAt }}</td>
                    <td class="px-4 py-3 truncate max-w-xs">{{ Str::limit($comment->content, 30) }}</td>
                    <td class="px-4 py-3">{{ $comment->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3">{{ $comment->updated_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('comments.show', $comment->id) }}"
                           class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">Show</a>
                        <a href="{{ route('comments.edit', $comment->id) }}"
                           class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                              class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
