<x-backend.layout.master>
    <x-slot:title>
        Edit Slider
    </x-slot:title>

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Edit Slider
                    <x-backend.utilities.link-index href="{{route('sliders.index')}}" text="Sliders List "/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif
                                <form action="{{ route('sliders.update', ['slider' => $slider->id]) }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                  @method('patch')
                                    <x-backend.forms.input name="title" type="text" :value="old('title', $slider->title)" />
                                    
                                        <x-backend.forms.input name="sub_title" type="text" :value="old('sub_title',$slider->sub_title)" />
                                        @error('sub_title')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror

                                        <x-backend.forms.input name="content_position" type="text" :value="old('content_position', $slider->content_position)" />
                                    
                                    <x-backend.forms.input name="btn_text" type="text" :value="old('btn_text',$slider->btn_text)" />
                                     
                                    <x-backend.forms.input name="btn_link" type="text" :value="old('btn_link',$slider->btn_link)" />
                                     

                                    <img src="{{ asset('storage/sliders/'.$slider->image_url) }}" alt="{{$slider->title}} Image" height="200">
                                    <x-backend.forms.input name="image" type="file" />

                                    {{-- <label>Status</label>
                                    <div class="mb-3 form-check">
                                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput" {{ $product->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isActiveInput">
                                            Active
                                        </label> --}}
                                    </div>
                                    <x-backend.forms.submit text="Update"/>
                                   
                                </form>
                </div>
    </div>

</x-backend.layout.master>
