<x-layouts.app :title="__('Create new Product')">
    <flux:heading>Create new Product</flux:heading>
    <flux:subheading>Form untuk menambah produk baru</flux:subheading>
    <flux:separator variant="subtle"/>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <flux:input name="name" label="Name" placeholder="Product Name" required/>
        <flux:input name="slug" label="Slug" placeholder="Product Slug" required/>
        <flux:textarea name="description" label="Description" placeholder="Product Description" required/>
        <flux:input name="price" type="number" label="Price" placeholder="Product Price" required/>
        <flux:input name="stock" type="number" label="Stock" placeholder="Product Stock" required/>
        <flux:button type="submit" icon="plus" variant="primary" class="mt-4 mb-4">Simpan</flux:button>
    </form>

</x-layouts.app>