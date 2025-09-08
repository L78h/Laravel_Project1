<x-app-layout>

@vite('resources/css/app.css')

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-3xl space-y-8">
        <div class="bg-white shadow-xl rounded-lg p-10">
            <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8">Edit Post</h1>

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-300 bg-red-50 p-4 text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" required
                        value="{{ old('title', $post->title) }}"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Meta Title -->
                <div>
                    <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <input type="text" name="metaTitle" id="metaTitle"
                        value="{{ old('metaTitle', $post->metaTitle) }}"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug"
                        value="{{ old('slug', $post->slug) }}"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Summary -->
                <div>
                    <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                    <textarea name="summary" id="summary" rows="3"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ old('summary', $post->summary) }}</textarea>
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="6"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ old('content', $post->content) }}</textarea>
                </div>

                <!-- Category -->
                <div>
                    <label for="categoryId" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="categoryId" id="categoryId"
                        class="mt-1 block w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('categoryId', $post->categoryId) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hidden User ID -->
                <input type="hidden" name="user_id" value="{{ $post->user_id }}" />

                <!-- Published Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" name="published" id="published" value="1"
                        {{ old('published', $post->published) ? 'checked' : '' }}
                        class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                    <label for="published" class="ml-2 text-sm text-gray-700">Published</label>
                </div>

                <!-- Button Container -->
                <div class="mt-6 flex justify-between">
                    <!-- Back Button -->
                    <a href="{{ route('posts.index') }}"
                        class="w-1/3 text-center rounded-md bg-gray-600 py-3 text-white font-semibold hover:bg-gray-700 transition duration-200">
                        Back to Posts
                    </a>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-1/3 rounded-md bg-blue-600 py-3 text-white font-semibold hover:bg-blue-700 transition duration-200">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
