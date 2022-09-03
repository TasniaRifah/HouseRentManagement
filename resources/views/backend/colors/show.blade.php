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
                                Color Details
                                <a href="{{route('colors.create')}}" class="btn btn-sm btn-primary">Add New</a>
                            </div>
                            <div class="card-body">
                                @if(session('massage'))
                            <div class="alert alert-success" role="alert">
                                {{session('massage')}}

                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>

                <th>Color Name</th>
                                            <th>{{$color->colorsname}}</th>



                                        </tr>
                                        <tr>
                                        <th>Identify Code</th>
                                        <th>{{$color->identify_code}}</th>

                                    </tr>
                                    <tr>

                                        <th>Is Active</th>
                                        <th>{{$color->is_active}}</th>

                                    </tr>
                                    <tr>

                                        <th>created_at</th>
                                        <th>{{$color->created_at}}</th>
                                    </tr>
                                    <tr>

                                        <th>updated_at</th>
                                        <th>{{$color->updated_at}}</th>
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
        <script src="{{asset('ui/backend/js/datatables-simple-demo.js')}}"></script>
        @endpush
</x-backend.layout.master>
