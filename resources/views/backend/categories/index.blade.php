<x-backend.layout.master>
    <x-slot:title>
        Categories
        </x-slot:>
        <div class="card mb-4">
        <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Categories List
            <x-backend.utilities.link-create href="{{route('categories.create')}}" text="Add Category"/>
            <x-backend.utilities.link-create href="{{route('categories.trash')}}" text="Trash"/>
          
        </div>
        <div class="card-body">
<!-- //message  -->
    <x-backend.alerts.message type="success" :message="session('message')"/>

        <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-.5">SL#</th>
                                <th class="col-md-5">Category Name</th>
                            
                                <th class="col-md-.5">Is_active</th>
                              

                                <th class="col-md-.5">Action</th>
                                <th class="col-md-.5">Category Product</th>

                            </tr>
                        </thead>

                        <tbody>
                            {{-- {{dd($categories)}} --}}

                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$category->categories_name}}</td>
                             
                                <td>{{ $category->is_active ? 'Active' : 'In Active' }}</td>
                              
                              
                                <td style="text-align:center">
                                    <x-backend.utilities.link-show href="{{route('categories.show',['category'=>$category->id])}}" />
                                    <x-backend.utilities.link-edit href="{{route('categories.edit',['category'=>$category->id])}}" />  
                                    <x-backend.forms.delete  text='Delete' action="{{route('categories.destroy',['category'=>$category->id])}}"  />
                                </td>

                                <td style="text-align:center; ">
                                    <x-backend.utilities.link-show href="{{route('products.list',['category'=>$category->id])}}" text="Category Product List" />
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
            <script src="{{asset('ui/backend/js/datatables-simple-demo.js')}}"></script>
            @endpush
</x-backend.layout.master>