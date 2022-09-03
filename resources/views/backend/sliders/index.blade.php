<x-backend.layout.master>
    <x-slot:title>
        Sliders
        </x-slot:title>
        <x-slot:pagetitle>
            Sliders
            </x-slot:pagetitle>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Slider List
                    <x-backend.utilities.link-create href="{{ route('sliders.create') }}" text="Add slider" />
                    <x-backend.utilities.link-create href="{{ route('sliders.trash') }}" text="Trash " />
                </div>
                <div class="card-body">
                    <!-- //message  -->
                    <x-backend.alerts.message id="sliderId" type="success" :message="session('message')" />

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>

                                <th class="col-md-.5">SL#</th>
                                <th class="col-md-3">Title</th>
                                <th class="col-md-1">Sub Title</th>
                                <th class="col-md-2">Button Text</th>
                                <th class="col-md-2">Image</th>
                                <th class="col-md-2">Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->sub_title }}</td>
                                    <td>{{ $slider->btn_text }}</td>
                                    <td class="align-center"><img
                                        src="{{ asset('storage/sliders/' . $slider->image_url) }}"
                                        alt="{{ $slider->title }}" width="60" height="60">
                                    </td>

                                    <td style="text-align:center; padding-left:0; padding-right:0;">
                                        <x-backend.utilities.link-show
                                            href="{{ route('sliders.show', ['slider' => $slider->id]) }}"
                                            text="Show" />
                                        <x-backend.utilities.link-edit
                                            href="{{ route('sliders.edit', ['slider' => $slider->id]) }}"
                                            text="Edit" />
                                        <x-backend.forms.delete
                                            action="{{ route('sliders.destroy', ['slider' => $slider->id]) }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
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
