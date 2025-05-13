<x-layouts.app :title="__('Dashboard')">
<flux:heading>Product Categories</flux:heading>
<flux:text class="mt-2">Informasi tentang data produk categories.</flux:text>

<flux:button href="{{ route('categories.create') }}" class="mb-4" class="mt-4 mb-4">
    Add New Product Category
</flux:button>
<table class="min-w-full divide-y divide-gray-200 table-auto border border-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($categories as $key => $category)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <img src="{{ Storage::url($category->image)}}"
                alt="{{ $category->name }}"
                class="h-10 w-10 rounded-full"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->slug }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->description }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <flux:button 
                href="{{ route('categories.edit', $category->id) }}"
                icon="pencil"
                variant="primary"
                size="sm">
                Edit
                </flux:button>

                <flux:button 
                icon="pencil"
                variant="primary"
                size="sm"
                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                Delete
                </flux:button>

                <form id="delete-form-{{ $category->id }}" 
                    action="{{ route('categories.destroy', $category->id) }}" 
                    method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-layouts.app>