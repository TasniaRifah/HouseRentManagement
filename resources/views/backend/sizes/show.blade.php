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
                    Size Details
                    <a href="{{ route('sizes.create') }}" class="btn btn-sm btn-primary">Add New</a>
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
                                <th>{{ $size->title }}</th>



                            </tr>


                            <tr>

                                <th>created_at</th>
                                <th>{{ $size->created_at }}</th>
                            </tr>
                            <tr>

                                <th>updated_at</th>
                                <th>{{ $size->updated_at }}</th>
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
