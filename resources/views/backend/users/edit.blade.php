<x-backend.layout.master>
    <x-slot:title>
        users
        </x-slot:>
        <x-slot:pagetitle>
            users
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    user Edit
                    <x-backend.utilities.link-index  href="{{route('users.index')}}" text="Users List"/>
                </div>
                <div class="card-body">
                          @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                   
                    <form method="POST" action="{{route('users.update',['user'=>$user->id])}}">
                        @csrf
                        @method ('patch')
                        <div class="mb-3">
                            <label for="InputColorName" class="form-label">user Name</label>
                            <input name="name" type="text" value="{{old('name',$user->name)}}" class="form-control @error('categories_name')is-invalid @enderror" id="InputColorName">
                          
                            @error('name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label for="InputColorName" class="form-label">user Name</label>
                            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email')is-invalid @enderror" id="InputColorName">
                          
                            @error('email')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                       
                            <select name="role" class="form-control">
                               
                            @foreach($roles as  $role) 
                                <option value="{{$role['id']}}" {{ old('role') == $role->id ? 'selected' : ''  }} ><?= $role['name'] ?></option>
                            @endforeach
                            </select>
                           
                          
                            @error('email')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
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