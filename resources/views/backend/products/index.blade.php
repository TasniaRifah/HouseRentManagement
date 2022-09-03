<x-backend.layout.master>
    <x-slot:title>
        Products
        </x-slot:>

        <div class="card mb-4">
        <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products List
            <x-backend.utilities.link-create href="{{route('products.create')}}" text="Add Product"/>
            <x-backend.utilities.link-create href="{{route('products.trash')}}" text="Trash"/>
        </div>
        <div class="card-body">
<!-- //message  -->
    <x-backend.alerts.message type="success" :message="session('message')"/>

        <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-0.5">SL#</th>
                                <th class="col-md-1">Title</th>
                                <th class="col-md-1">Category</th>
                                <th class="col-md-1">Rent</th>
                                <th class="col-md-0.5">Discount</th>
                                <th class="col-md-1">Image</th>
                                <th class="col-md-0.5">Is_Active</th>
                                <th class="col-md-2.5">Description</th> 
                                <th class="col-md-2.5">Address</th> 
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            @foreach ($products as $product)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td> 
                                        <ul>
                                        @foreach ($product->categories as $category)
                                            <li>{{ $category->categories_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                    <td>{{ $product->rent }}</td>
                                    <td>{{ $product->discount }}</td>

                                    <td><img src="{{ asset('storage/products/'.$product->image) }}" alt="{{$product->title}} Image" height="50"></td>
                                    <td>{{ $product->is_active? 'Active' : 'In Active'}}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->address }}</td>
                                    <td style="text-align:center; padding-left:0; padding-right:0;">
                                        <x-backend.utilities.link-show href="{{ route('products.show', ['product'=>$product->id]) }}" text="Show" />
                                        <x-backend.utilities.link-edit href="{{ route('products.edit', ['product'=>$product->id]) }}" text="Edit" />
                                        <x-backend.forms.delete action="{{ route('products.destroy', ['product' => $product->id]) }}"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $products->links() }}
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
