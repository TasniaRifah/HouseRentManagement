<x-backend.layout.master>
    <x-slot:title>
        Create sliders
    </x-slot:title>
    <x-slot:pagetitle>
        Create sliders
    </x-slot:pagetitle>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Category Create
            {{-- <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">List</a> --}}
            <x-backend.utilities.link-index href="{{route('sliders.index')}}" text="List"/>

        </div>
        <div class="card-body">
                                @if ($errors->any())
                                <x-backend.alerts.errors />
                            @endif
                                <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf

                                    <x-backend.forms.input name="title" type="text" :value="old('title')" />
                                    @error('title')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                    <x-backend.forms.input name="sub_title" type="text" :value="old('sub_title')" />
                                    @error('sub_title')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                   
                                    <x-backend.forms.input name="content_position" type="text" :value="old('content_position')" />
                                    @error('content_position')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                    <x-backend.forms.input name="btn_text" type="text" :value="old('btn_text')" />
                                    @error('btn_text')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                    <x-backend.forms.input name="btn_link" type="text" :value="old('btn_link')" />
                                    @error('btn_link')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                    <x-backend.forms.input name="image" type="file" />
                                    
                                    {{-- <div class="mb-3 form-check">
                                        <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                            id="isactiveinput">
                                        <label class="form-check-label" for="isactiveinput">Is Active</label>
                                    </div> --}}
                                    {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
                                    <x-backend.forms.submit />
                                   
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-backend.layout.master>
