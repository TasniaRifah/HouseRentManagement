<x-backend.layout.master>
    <x-slot:title>
        User Details
    </x-slot:title>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            My Profile
            <x-backend.utilities.link-index href="{{route('profile.edit', auth()->user()->id)}}" text="Edit Profile"/>

        </div>
        <div class="card-body">
    <x-backend.alerts.message type="success" :message="session('message')"/>
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
                                <div class="card mb-3">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$user->name}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$user->email}}
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$user->mobile}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$user->address}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
    
                
                    <!-- Breadcrumb -->
                    <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav> -->
                    <!-- /Breadcrumb -->
                





    {{-- page specific css --}}
    @push('css')

    @endpush

    {{-- page specific js --}}
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('ui/backend') }}/js/datatables-simple-demo.js"></script>
    @endpush

</x-backend.layout.master>