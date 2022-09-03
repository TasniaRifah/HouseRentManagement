<x-backend.layout.master>
    <x-slot:title>
        Categories
        </x-slot:>
        <x-slot:pagetitle>
            Categories
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Category Create
                    {{-- <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">List</a> --}}
                    <x-backend.utilities.link-index href="{{route('categories.index')}}" text="List"/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif

                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-backend.forms.input name="categories_name" type="text" :value="old('categories_name')"
                            id="InputCategoryName"  />
                            
                            {{-- @error('categories_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror --}}
                      
                       
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                id="isactiveinput">
                            <label class="form-check-label" for="isactiveinput">Is Active</label>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
                        <x-backend.forms.submit />
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
