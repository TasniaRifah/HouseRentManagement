<x-backend.layout.master>
    <x-slot:title>
        Roles
        </x-slot:>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Role Create 
                    <x-backend.utilities.link-index href="{{route('roles.index')}}" text="Roles List "/>
                    <!-- <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">List</a> -->
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif

                    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-backend.forms.input name="name" type="text" :value="old('name')"
                            id="InputCategoryName"  />
                            
                            @error('categories_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                      
                        
                            <x-backend.forms.submit  />
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
                <script src="{{ asset('ui/backend/js/datatables-simple-demo.js') }}"></script>
            @endpush
</x-backend.layout.master>
