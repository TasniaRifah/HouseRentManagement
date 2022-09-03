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
                    Category Edit
                    <a href="{{route('categories.index')}}" class="btn btn-sm btn-primary">List</a>
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
                   
                    <form method="POST" action="{{route('categories.update',['category'=>$category->id])}}">
                        @csrf
                        @method ('patch')
                        <div class="mb-3">
                            <label for="InputColorName" class="form-label">Category Name</label>
                            <input name="categories_name" type="text" value="{{old('categories_name',$category->categories_name)}}" class="form-control @error('categories_name')is-invalid @enderror" id="InputColorName">
                          
                            @error('categories_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        
   
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                id="isactiveinput" {{ $category->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="isactiveinput">Is Active</label>
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