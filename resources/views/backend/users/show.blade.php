<x-backend.layout.master>
    {{-- <x-slot:title>
        User Details
    </x-slot:title> --}}

    <nav aria-label="breadcrumb" class="main-breadcrumb">
    <a href="/backend">Home</a> >                
<?php $link = "" ?>
@for($i = 1; $i <= count(Request::segments()); $i++)
    @if($i < count(Request::segments()) & $i > 0)
    <?php $link .= "/" . Request::segment($i); ?>
    <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> >
    @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
    @endif
@endfor
</nav>



    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            User Details
            <x-backend.utilities.link-index href="{{route('users.index')}}" text="Users List"/>

        </div>
        <div class="card-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                                @if($user->image==null)
                                <img src=" https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="250">
                                @else 
                                <img src="{{ asset('storage/users/'.$user->image) }}" alt="Admin" class="rounded-circle" width="250">
                                @endif
                            <div class="mt-3">
                            <h4>{{strtoupper($user->name)}}</h4>
                            <p class="text-secondary mb-1" style="color: blue;">{{ Auth::user()->role->name }}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Name :</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td>{{$user->email}}</td>
                        </tr>                
                        <tr>
                            <th>Role ID :</th>
                            <td>{{$user->role->name}}</td>
                        </tr>   
                        <tr>
                            <th>Mobile No :</th>
                            <td>{{$user->mobile}}</td>
                        </tr>                  <tr>
                            <th>Address :</th>
                            <td>{{$user->address}}</td>
                        </tr>               
                        <tr>
                            <th>Created At :</th>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated At :</th>
                            <td>{{$user->updated_at}}</td>
                        </tr>

                    </table>
                    <x-backend.utilities.link-edit href="{{ route('users.edit', ['user'=>$user->id]) }}" text="Edit" />
                </div>
            </div>
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