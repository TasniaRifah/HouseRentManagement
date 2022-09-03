{{-- @dd($slider); --}}

<x-backend.layout.master>
    <x-slot:title>
    Sliders
        </x-slot:>
        <x-slot:pagetitle>
            Sliders
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Slider Details
                    <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-primary">list</a>
                </div>
                <div class="card-body">
                    @if (session('massage'))
                        <div class="alert alert-success" role="alert">
                            {{ session('massage') }}

                        </div>
                    @endif
                    <table id="datatablesSimple">
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>{{ $slider->title }}</th>

                            </tr>
                            <tr>

                                <th>Sub Title</th>
                                <th>{{ $slider->sub_title }}</th>

                            </tr>
                            <tr>

                                <th>slide position</th>
                                <th>{{ $slider->content_position }}</th>

                            </tr>
                            <tr>

                                <th>Image</th>
                                <th><img src="{{ asset('storage/sliders/'.$slider->image_url) }}" alt="{{$slider->title}} Image" height="200"></th>

                            </tr>
                            <tr>

                                <th>Btn text</th>
                                <th>{{ $slider->btn_text }}</th>

                            </tr>

                            <tr>

                                <th>created_at</th>
                                <th>{{ $slider->created_at }}</th>
                            </tr>
                            <tr>

                                <th>updated_at</th>
                                <th>{{ $slider->updated_at }}</th>
                            </tr>
                        </thead>


                    </table>
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
