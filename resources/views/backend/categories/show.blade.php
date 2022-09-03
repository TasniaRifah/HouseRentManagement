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
                    Category Details
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">List</a>
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
                                <th>Category Name</th>
                                <th>{{ $category->categories_name }}</th>
                            </tr>
                          
                            
                            <tr>
                                <th>Is active</th>
                                <th>{{ $category->is_active }}</th>
                            </tr>

                            <tr>

                                <th>created_at</th>
                                <th>{{ $category->created_at }}</th>
                            </tr>
                            <tr>

                                <th>updated_at</th>
                                <th>{{ $category->updated_at }}</th>
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
