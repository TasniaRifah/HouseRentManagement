<x-backend.layout.master>
    <x-slot:title>
        Roles
        </x-slot:>

            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table "></i>
                    Role List
                    <x-backend.utilities.link-create href="{{route('roles.create')}}" text="Add Role"/>
                    <x-backend.utilities.link-trash href="#"  icon="fas fa-solid fa-trash-can"/>
                    <x-backend.utilities.link-export href="{{route('categories.download_pdf')}}" text="PDF"/>
                    <x-backend.utilities.link-export href="{{route('categories.download_pdf')}}" text="Excel"/>
                    <!-- <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary">Add New</a> -->
                    <!-- <a class="btn btn-sm btn-info" href="{{route('categories.trash') }}">Trash</a> -->
                    <!-- <a class="position-absolute btn btn-sm btn-info" href="{{route('categories.download_pdf') }}">Pdf</a> -->
                    <!-- <a class="position-absolute btn btn-sm btn-info" href="{{route('categories.download_excel') }}">Excel</a> -->
                </div>
                <div class="card-body">
                  <x-backend.alerts.message type="success" :message="session('message')" class="text-dark"/>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-.5">SL#</th>
                                <th class="col-md-9">Role Name</th>
                                <th class="col-md-2.5">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            {{-- {{dd($categories)}} --}}

                            @foreach($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$role->name}}</td>
                                
                              
                                <td style="text-align:center">
                                    <x-backend.utilities.link-show href="{{ route('roles.show', ['role'=>$role->id]) }}" text="Show" />
                                    <x-backend.utilities.link-edit href="{{ route('roles.edit', ['role'=>$role->id]) }}" text="Edit" />
                                    <x-backend.forms.delete action="{{ route('roles.destroy', ['role' => $role->id]) }}"  />  
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