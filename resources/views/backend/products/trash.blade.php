<x-backend.layout.master>
    <x-slot:title>
        Products
    </x-slot:title>

    <x-slot:pagetitle>
        Products
    </x-slot:pagetitle>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Product Trash List
            <a class="btn btn-sm btn-primary" href="{{route('products.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <x-backend.alerts.errors />
            @endif
            
            <x-backend.alerts.message type="success" :message="session('message')" />

            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-.5">SL#</th>
                        <th class="col-md-1">Title</th>
                        <th class="col-md-1">Category</th>
                        <th class="col-md-1">Rent</th>
                        <th class="col-md-.5">Discount</th>
                        <th class="col-md-1">Image</th>
                        <th class="col-md-.5">Is_Active</th>
                        <th class="col-md-2.5">Description</th> 
                        <th class="col-md-2.5">Address</th> 
                        <th class="col-md-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
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
                        <td>
                                        
                            <form method="post" action="{{ route('products.restore', ['id' => $product->id]) }}" style="display:inline">
                                @method('patch')
                                @csrf
                               
                                <x-backend.forms.button color="warning" onclick="return confirm('Are you sure want to restore?')" text="Restore" icon=""/>
                            </form>


                            <form method="post" action="{{ route('products.delete', ['id' => $product->id]) }}" style="display:inline">
                                @csrf
                                @method('delete')
                                <x-backend.forms.button color="danger" onclick="return confirm('Are you sure want to delete permanently?')" text="Delete" icon="fas fa-trash" />
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}

        </div>
    </div>

    {{-- page specific css --}}
    @push('css')

    @endpush

    {{-- page specific js --}}
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('ui/backend') }}/js/datatables-simple-demo.js"></script>
    @endpush

</x-backend.layout.master>