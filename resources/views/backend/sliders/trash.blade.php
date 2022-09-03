{{-- @dd($sliders); --}}
<x-backend.layout.master>
    <x-slot:title>
        Sliders
    </x-slot:title>

    <x-slot:pageTitle>
        Sliders
    </x-slot:pageTitle>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Slider Trash List
            <a class="btn btn-sm btn-primary" href="{{route('sliders.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <x-backend.alerts.errors />
            @endif
            
            <x-backend.alerts.message type="success" :message="session('message')" />

            <table class="table">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Title</th>
                        <th>sub Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->sub_title  }}</td>
                        <td><img src="{{ asset('storage/sliders/' . $slider->image_url) }}" alt="{{$slider->title}} Image" height="50"></td>
                        <td>
                                        
                            <form method="post" action="{{ route('sliders.restore', ['id' => $slider->id]) }}" style="display:inline">
                                @csrf
                                @method('patch')
                                <x-backend.forms.button color="warning" icon="" onclick="return confirm('Are you sure want to restore?')" text="Restore" />
                            </form>


                            <form method="post" action="{{ route('sliders.delete', ['id' => $slider->id]) }}" style="display:inline">
                                @csrf
                                @method('delete')
                                <x-backend.forms.button color="danger" icon="" onclick="return confirm('Are you sure want to delete permanently?')" text="Delete" />
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $sliders->links() }}

        </div>
    </div>

    {{-- page specific css --}}
    @push('css')

    @endpush

    {{-- page specific js --}}
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('ui/backend') }}/js/datatables-simple-demo.js"></script>
    @endpush

</x-backend.layout.master>