<x-backend.layout.master>
    <x-slot:title>
        Products
        </x-slot:>
        <x-slot:pagetitle>
            Products
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Product List
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Image</th>
                                <th>is_active</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($category->products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $category->categories_name}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->discount}}</td>
                                    <td></td>
                                    <td>{{ $product->is_active}}</td>
                                    <td>{{ $product->description}}</td>
                                  
                                  
                                    <td>
                                        <x-backend.utilities.link-show
                                            href="{{ route('products.show', ['product' => $product->id]) }}"
                                            icon="fas fa-eye" />
                                        <x-backend.utilities.link-edit
                                            href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            icon="fas fa-edit" />

                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                            method="post" style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <x-backend.forms.button text='Delete' color='danger' icon='fas fa-trash'
                                                onclick="return confirm('Are you sure want to delete?')" />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @push('css')
                <style>
                    /* body{
                        background-color: blue;
                    } */
                </style>
            @endpush
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                <script src="{{ asset('ui/backend/js/datatables-simple-demo.js') }}"></script>
            @endpush
</x-backend.layout.master>
