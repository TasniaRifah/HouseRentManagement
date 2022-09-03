<x-backend.layout.master>
    <x-slot:title>
        Sizes
        </x-slot:>
        <x-slot:pagetitle>
            Sizes
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Size List
                    <a href="{{route('sizes.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="card-body">
                  <x-backend.alerts.message type="success" :message="session('message')" class="text-dark"/>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach($sizes as $size)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$size->title}}</td>
                         
                                



                                <td>
                                    <x-backend.utilities.link-show href="{{route('sizes.show',['size'=>$size->id])}}" icon="fas fa-eye"/>
                                    <x-backend.utilities.link-edit href="{{route('sizes.edit',['size'=>$size->id])}}" icon="fas fa-edit"/>
                                   
                                    <form action="{{route('sizes.destroy',['size'=>$size->id])}}" method="post" style="display:inline">
                                    @csrf 
                                    @method('delete')  
                                    <x-backend.forms.button  buttondelete='Delete' color='danger' icon='fas fa-trash' onclick="return confirm('Are you sure want to delete?')"/>
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
            <script src="{{asset('ui/backend/js/datatables-simple-demo.js')}}"></script>
            @endpush
</x-backend.layout.master>