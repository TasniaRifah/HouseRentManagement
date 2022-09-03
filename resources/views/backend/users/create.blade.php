<x-backend.layout.master>
    <x-slot:title>
        Create users
    </x-slot:title>
    <x-slot:pagetitle>
        Create users
    </x-slot:pagetitle>

    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                user Create
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">List</a>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <x-backend.alerts.errors />
                            @endif
                                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                    <x-backend.forms.input name="name" type="text" :value="old('name')" />

                                    @error('title')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                   
                                        <label for="">Role</label>
                                        <select name="role" class="form-control">
                                           
                                        @foreach($roles as  $role) 
                                        
                                            <option value="<?= $role['id'] ?>"><?= $role['name'] ?>
                                            </option>
                                        @endforeach
                                        </select>

                                        @error('role')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    <br>

                                    <x-backend.forms.input name="email" type="email" :value="old('email')" />
                                    @error('email')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                  

                                    
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-backend.layout.master>
