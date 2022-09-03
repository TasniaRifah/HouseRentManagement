<x-backend.layout.master>
    <x-slot:title>
    Products
        </x-slot:>
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Product Details
                    <!-- <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Add New</a> -->
                    <!-- <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">list</a> -->
                    <x-backend.utilities.link-index href="{{route('products.index')}}" text="Products List "/>
                </div>
                <div class="card-body">
                    @if (session('massage'))
                        <div class="alert alert-success" role="alert">
                            {{ session('massage') }}

                        </div>
                    @endif
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <td>{{ $product->title }}</td>

                            </tr>

                            <tr>

                                <th>Category</th>
                                <td>
                                    <ul>
                                        @foreach ($product->categories as $category)
                                            <li>{{ $category->categories_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                            </tr>
                            <tr>

                                <th>Rent</th>
                                <td>{{ $product->rent }}</td>

                            </tr>
                            <tr>

                                <th>Image</th>
                                <td><img src="{{ asset('storage/products/'.$product->image) }}" alt="{{$product->title}} Image" height="200"></td>

                            </tr>
                            <tr>

                                <th>Discount</th>
                                <td>{{ $product->discount }}</td>

                            </tr>
                            <tr>

                                <th>Address</th>
                                <td>{{ $product->address }}</td>

                            </tr>
                            <tr>

                                <th>Description</th>
                                <td>{{ $product->description}}</td>

                            </tr>

                            <tr>

                                <th>created_at</th>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                            <tr>

                                <th>updated_at</th>
                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        </thead>


                    </table>
                    <x-backend.utilities.link-edit href="{{route('products.edit',['product'=>$product->id])}}" />

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
