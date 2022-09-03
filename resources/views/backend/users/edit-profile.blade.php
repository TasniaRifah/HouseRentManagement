<x-backend.layout.master>
    <x-slot:title>
        User Details
    </x-slot:title>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            My Profile
            <x-backend.utilities.link-index href="{{route('user.profile', auth()->user()->id)}}" text="My Profile"/>

        </div>
        <div class="card-body">

        @if ($errors->any())
                <x-backend.alerts.errors />
            @endif

            <form method="POST" action="{{ route('profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')


        
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <x-backend.forms.simple-input name="name" type="text" :value="old('name', $user->name)"/>
                                        <!-- <input type="text" class="form-control" value="John Doe"> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <x-backend.forms.simple-input name="email" type="email" :value="old('email', $user->email)"/>
                                        <!-- <input type="text" class="form-control" value="john@example.com"> -->
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <x-backend.forms.simple-input name="mobile" type="text" :value="old('mobile', $user->mobile)"/>
                                        <!-- <input type="text" class="form-control" value="(239) 816-9029"> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <!-- <input type="text" class="form-control" value="(239) 816-9029"> -->
                                    <x-backend.forms.simple-input name="address" type="text" :value="old('address', $user->address)"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <x-backend.forms.simple-input name="image" type="file"/>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">

                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                    </form>
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