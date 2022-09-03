<x-backend.layout.master>
    <x-slot:title>
        Tags
        </x-slot:>
        <x-slot:pagetitle>
            Tags
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tag List
                    <a href="{{route('tags.create')}}" class="btn btn-sm btn-primary">Add New</a>
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

                            @foreach($tags as $tag)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$tag->title}}</td>
                         
                                



                                <td>
                                    <x-backend.utilities.link-show href="{{route('tags.show',['tag'=>$tag->id])}}" icon="fas fa-eye"/>
                                    <x-backend.utilities.link-edit href="{{route('tags.edit',['tag'=>$tag->id])}}" icon="fas fa-edit"/>
                                   
                                    <form action="{{route('tags.destroy',['tag'=>$tag->id])}}" method="post" style="display:inline">
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