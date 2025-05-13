<x-layouts.app :title="__('Edit Product')">
    <flux:heading>Edit Product</flux:heading>
    <flux:subheading>Form untuk mengubah data produk</flux:subheading>
    <flux:separator variant="subtle"/>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <flux:input name="name" label="Name" placeholder="Product Name" value="{{ $product->name }}" required/>
        <flux:input name="slug" label="Slug" placeholder="Product Slug" value="{{ $product->slug }}" required/>
        <flux:textarea name="description" label="Description" placeholder="Product Description" required>
        {{ $product->description }}
        </flux:textarea>
        <flux:input name="price" type="number" label="Price" placeholder="Product Price" value="{{ $product->price }}" required/>
        <flux:input name="stock" type="number" label="Stock" placeholder="Product Stock" value="{{ $product->stock }}" required/>
        <flux:button type="submit" icon="pencil" variant="primary" class="mt-4 mb-4">Update</flux:button>
    </form>

</x-layouts.app>