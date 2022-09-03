<x-backend.layout.master>
    <x-slot:title>
        Colors
        </x-slot:>
        <x-slot:pagetitle>
            Colors
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Color List
                    <a href="{{route('colors.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="card-body">
                  <x-backend.alerts.message type="success" :message="session('message')" class="text-dark"/>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Color</th>
                                <th>Is Active</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach($colors as $color)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$color->colorsname}}</td>
                                <td>{{$color->color_code}} </td>
                                <td>
                                    <div style="width: 100%; height: 30px; background-color: {{$color->color_code}}"></div>    
                                </td>

                                <td>
                                    <?php
                                        if ($color->is_active == '1') {
                                            echo 'Active';
                                        } else {
                                            echo 'In Active';
                                        }

                                    ?>


                                </td>
                                <td>
                                    <x-backend.utilities.link-show href="{{route('colors.show',['color'=>$color->id])}}" icon="fas fa-eye"/>
                                    <x-backend.utilities.link-edit href="{{route('colors.edit',['color'=>$color->id])}}" icon="fas fa-edit"/>
                                   
                                    <form action="{{route('colors.destroy',['color'=>$color->id])}}" method="post" style="display:inline">
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