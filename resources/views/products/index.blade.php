
<x-layouts.app :title="__('Products')">
<flux:heading>Products</flux:heading>
<flux:text class="mt-2">Informasi tentang data produk.</flux:text>

<flux:button href="{{ route('products.create') }}" class="mt-4 mb-4">
    Add New Product
</flux:button>
<table class="min-w-full divide-y divide-gray-200 table-auto border border-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($products as $key => $product)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $product->slug }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $product->price }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $product->stock }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 space-x-1">
                <flux:button 
                href="{{ route('products.edit', $product->id) }}"
                icon="pencil"
                variant="primary"
                size="xs"
                class="px-2 py-1 inline-flex">
                Edit
                </flux:button>

                <flux:button
                icon="trash"
                variant="danger"
                size="xs"
                class="px-2 py-1 inline-flex"
                onclick="confirmDelete({{ $product->id }}, '{{ $product->name }}')">
                Delete
                </flux:button>
                <form
                    id="delete-form-{{ $product->id }}"
                    action="{{ route('products.destroy', $product->id) }}"
                    method="POST"
                    class="hidden">
                    @csrf
                    @method('DELETE')
                </form>

                <script>
                function confirmDelete(id, name) {
                    if (confirm('Apakah Anda yakin akan menghapus produk "' + name + '"?')) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                }
                </script>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-layouts.app>