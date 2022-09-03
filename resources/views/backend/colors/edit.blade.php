<x-backend.layout.master>
    <x-slot:title>
        Colors
        </x-slot:>
        <x-slot:pagetitle>
            Colors
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Color Edit
                    <a href="{{route('colors.index')}}" class="btn btn-sm btn-primary">List</a>
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
                   
                    <form method="POST" action="{{route('colors.update',['color'=>$color->id])}}">
                        @csrf
                        @method ('patch')
                        <div class="mb-3">
                            <label for="InputColorName" class="form-label">Color Name</label>
                            <input name="colorsname" type="text" value="{{old('colorsname',$color->colorsname)}}" class="form-control @error('colorsname')is-invalid @enderror" id="InputColorName">
                          
                            @error('colorsname')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label for="InputIdentify" class="form-label">Identify Code</label>
                            <input name="color_code" type="color" value="{{old('color_code',$color->color_code)}}"  id="InputIdentify">
                       
                            @error('identify_code')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                id="isactiveinput" {{ $color->is_active ? 'checked' : ''}}>
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