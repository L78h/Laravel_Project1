<x-app-layout>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container mx-auto p-8">
  <!-- Heading Section -->
  <div class="mb-8 flex justify-between items-center">
    <h2 class="text-4xl font-semibold text-gray-800">Posts Dashboard</h2>

    <!-- Action Buttons -->
    <div class="flex space-x-4">
      <a href="{{ route('posts.create') }}" class="px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
        New Post
      </a>
    </div>
  </div>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


  <!-- Table Section -->
  <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full text-sm text-gray-700">
      <thead class="bg-gray-100 text-xs text-gray-600 uppercase tracking-wider">
        <tr>
          <th class="px-6 py-3 text-left">#</th>
          <th class="px-6 py-3 text-left">Title</th>
          <th class="px-6 py-3 text-left">Author</th>
          <th class="px-6 py-3 text-left">Category</th>
          <th class="px-6 py-3 text-left">Published</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach ($posts as $post)
        <tr class="hover:bg-gray-50 transition duration-300">
          <td class="px-6 py-4">{{ $post->id }}</td>
          <td class="px-6 py-4 font-medium text-gray-900 truncate" title="{{ $post->title }}">
            {{ Str::limit($post->title, 40) }}
          </td>
          <td class="px-6 py-4">{{ optional($post->user)->name ?? 'Unknown' }}</td>
          <td class="px-6 py-4">{{ optional($post->category)->title ?? 'None' }}</td>
          <td class="px-6 py-4">
            <span class="{{ $post->published ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} px-3 py-1 rounded-full text-xs font-semibold">
              {{ $post->published ? 'Yes' : 'No' }}
            </span>
          </td>
          <td class="px-6 py-4 text-center">
            <div class="flex justify-center gap-4">
              <!-- Show Button -->
              <a href="{{ route('posts.show', $post->id) }}" 
                 class="px-4 py-2 bg-gray-600 text-white text-xs rounded-md hover:bg-gray-700 transition duration-300">
                Show
              </a>
              <!-- Edit Button -->
              <a href="{{ route('posts.edit', $post->id) }}"
                 class="px-4 py-2 bg-yellow-500 text-black text-xs rounded-md hover:bg-yellow-600 transition duration-300">
                Edit
              </a>
              <!-- Delete Button -->
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?')" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white text-xs rounded-md hover:bg-red-700 transition duration-300">
                  Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

</x-app-layout>
