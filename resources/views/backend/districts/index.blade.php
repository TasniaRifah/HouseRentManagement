<x-backend.layout.master>
    <x-slot:title>
        Districts
        </x-slot:>
        <x-slot:pagetitle>
            Districts
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    District List
                    <a href="{{route('districts.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="card-body">
                  <x-backend.alerts.message type="success" :message="session('message')" class="text-dark"/>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach($districts as $district)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$district->title}}</td>
                         
                                



                                <td>
                                    <x-backend.utilities.link-show href="{{route('districts.show',['district'=>$district->id])}}" icon="fas fa-eye"/>
                                    <x-backend.utilities.link-edit href="{{route('districts.edit',['district'=>$district->id])}}" icon="fas fa-edit"/>
                                   
                                    <form action="{{route('districts.destroy',['district'=>$district->id])}}" method="post" style="display:inline">
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