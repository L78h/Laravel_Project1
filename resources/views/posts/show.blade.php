<x-app-layout>

@vite('resources/css/app.css')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-xl mt-6">
        <div class="mb-6 border-b pb-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
            <p>Created At: 
            @if($post->createdAt)
  {{ $post->createdAt }}
@else
  Not Available
@endif


</p>
        </div>

        <div class="space-y-4">
            <!-- Meta Title -->
            <div>
                <h2 class="text-gray-700 font-semibold">Meta Title</h2>
                <p class="text-gray-800">{{ $post->metaTitle }}</p>
            </div>

            <!-- Slug -->
            <div>
                <h2 class="text-gray-700 font-semibold">Slug</h2>
                <p class="text-gray-800">{{ $post->slug }}</p>
            </div>

            <!-- Summary -->
            <div>
                <h2 class="text-gray-700 font-semibold">Summary</h2>
                <p class="text-gray-800">{{ $post->summary }}</p>
            </div>

            <!-- Content -->
            <div>
                <h2 class="text-gray-700 font-semibold">Content</h2>
                <div class="prose prose-sm max-w-none text-gray-900">
                    {!! $post->content !!}
                </div>
            </div>

            <!-- Category -->
            <div>
                <h2 class="text-gray-700 font-semibold">Category</h2>
                <p class="text-gray-800">{{ optional($post->category)->title ?? 'None' }}</p>
            </div>

            <!-- Author -->
            <div>
                <h2 class="text-gray-700 font-semibold">Author</h2>
                <p class="text-gray-800">{{ $post->user?->name ?? 'Unknown Author' }}</p>
            </div>

            <!-- Parent Post ID -->
            @if ($post->parentId)
                <div>
                    <h2 class="text-gray-700 font-semibold">Parent Post ID</h2>
                    <p class="text-gray-800">{{ $post->parentId }}</p>
                </div>
            @endif

            <!-- Published Status -->
            <div>
                <h2 class="text-gray-700 font-semibold">Published</h2>
                <span class="px-3 py-1 rounded-full text-sm font-medium 
                    {{ $post->published ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                    {{ $post->published ? 'Yes' : 'No' }}
                </span>
            </div>
        </div>

        <!-- Actions (Edit and Delete buttons) -->
        <div class="mt-8">
            <div class="flex justify-between items-center">
                <!-- Back Button -->
                <a href="{{ route('posts.index') }}" class="w-full block text-center rounded-md bg-gray-600 py-3 text-white font-semibold hover:bg-gray-700 transition duration-200">
                    Back to Posts
                </a>
            </div>

            <!-- Buttons -->
            <div class="mt-4 flex justify-between items-center space-x-4">
                <!-- Edit Button -->
                <a href="{{ route('posts.edit', $post->id) }}" class="w-full block text-center rounded-md bg-yellow-400 py-3 text-white font-semibold hover:bg-yellow-500 transition duration-200">
                    Edit
                </a>

                <!-- Delete Button -->
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full block text-center rounded-md bg-red-500 py-3 text-white font-semibold hover:bg-red-600 transition duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
