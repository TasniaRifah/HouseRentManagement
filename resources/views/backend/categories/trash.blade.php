<x-backend.layout.master>
    <x-slot:title>
        Categories
    </x-slot:title>

    <x-slot:pagetitle>
        Categories
    </x-slot:pagetitle>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Category Trash List
            <a class="btn btn-sm btn-primary" href="{{route('categories.index') }}">List</a>
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
                        <th>Category Name</th>
                        <th>Is Active ?</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->categories_name }}</td>
                        <td>{{ $category->is_active ? 'Active' : 'In Active' }}</td>
                        <td>
                                        
                            <form method="post" action="{{ route('categories.restore', ['id' => $category->id]) }}" style="display:inline">
                                @method('patch')
                                @csrf
                               
                                <x-backend.forms.button color="warning" onclick="return confirm('Are you sure want to restore?')" text="Restore" icon=""/>
                            </form>


                            <form method="post" action="{{ route('categories.delete', ['id' => $category->id]) }}" style="display:inline">
                                @csrf
                                @method('delete')
                                <x-backend.forms.button color="danger" onclick="return confirm('Are you sure want to delete permanently?')" text="Delete" icon="fas fa-trash" />
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $categories->links() }}

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