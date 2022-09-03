<x-backend.layout.master>
<x-slot:title>
    Users List
</x-slot>


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Users List
            <!-- <x-backend.utilities.link-create href="{{route('users.create')}}" text="Add User"/> -->
            
            
            
    </div>
    <div class="card-body">
<!-- //message  -->
    <x-backend.alerts.message type="success" :message="session('message')"/>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th class="col-md-.5">SL#</th>
                    <th class="col-md-4">Name</th>
                    <th class="col-md-4">Mail</th>
                    <th class="col-md-1">Role</th>
                    <th class="col-md-2.5">Action</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td style="text-align:center">  
                            <x-backend.utilities.link-show href="{{ route('users.show', ['user'=>$user->id]) }}" text="Show" />
                            <x-backend.utilities.link-edit href="{{ route('users.edit', ['user'=>$user->id]) }}" text="Edit" />
                            <x-backend.forms.delete action="{{ route('users.destroy', ['user' => $user->id]) }}"/>
                        </td>                    
                </tr>
                @endforeach
            </tbody>


        </table>
        {{ $users->links() }}
        {{-- <a  class="btn btn-primary" href="{{ route('users.trash')}}">Trash List</a> --}}
    </div>
</div>

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('ui/backend') }}/css/styles.css" rel="stylesheet" />
    <style>
        a{
            text-decoration:none;
        }
    </style>
@endpush()

@push('js')
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>  -->
    <!-- <script src="{{ asset('ui/backend') }}/js/datatables-simple-demo.js"></script> -->
@endpush()

</x-backend.layout.master>
