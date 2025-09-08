<x-app-layout>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container mx-auto p-8">
  <!-- Heading Section -->
  <div class="mb-8 flex justify-between items-center">
    <h2 class="text-4xl font-semibold text-gray-800">Create New Post</h2>

    <!-- Action Buttons (if needed) -->
    <div class="flex space-x-4">
      <a href="{{ route('posts.index') }}" class="px-6 py-3 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition duration-300">
        Back to Posts
      </a>
    </div>
  </div>

  <!-- Form Section -->
  <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Please fix the following errors:</span>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Category -->
        <div class="mb-4">
            <label for="categoryId" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="categoryId" id="categoryId" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option disabled selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categoryId') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
            @error('categoryId')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required maxlength="75"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Meta Title -->
        <div class="mb-4">
            <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
            <input type="text" name="metaTitle" id="metaTitle" value="{{ old('metaTitle') }}" required maxlength="100"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('metaTitle')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required maxlength="100"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <p class="text-gray-500 text-xs mt-1">URL-friendly identifier (must be unique)</p>
            @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Summary -->
        <div class="mb-4">
            <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
            <textarea name="summary" id="summary" rows="3" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('summary') }}</textarea>
            @error('summary')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="5" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Published Checkbox -->
        <div class="flex items-center mb-4">
            <input type="checkbox" name="published" id="published"
                class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ old('published') ? 'checked' : '' }}>
            <label for="published" class="ml-2 block text-sm text-gray-700">Publish</label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Post
            </button>
        </div>
    </form>
  </div>
</div>

</x-app-layout>
