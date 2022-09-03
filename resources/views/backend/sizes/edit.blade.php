<x-backend.layout.master>
    <x-slot:title>
        Sizes
        </x-slot:>
        <x-slot:pagetitle>
            Sizes
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Size Edit
                    <a href="{{route('sizes.index')}}" class="btn btn-sm btn-primary">List</a>
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
                   
                    <form method="POST" action="{{route('sizes.update',['size'=>$size->id])}}">
                        @csrf
                        @method ('patch')
                        <div class="mb-3">
                            <label for="Inputtitle" class="form-label">Title</label>
                            <input name="title" type="text" value="{{old('title',$size->title)}}" class="form-control @error('title')is-invalid @enderror" id="Inputtitle">
                          
                            @error('title')
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