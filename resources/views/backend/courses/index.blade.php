<x-backend.layout.master>
    <x-slot:title>
        Courses
        </x-slot:>
        <x-slot:pagetitle>
            Courses
            </x-slot:>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Course List
                    <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    <a class="btn btn-sm btn-info" href="{{ route('courses.trash') }}">Trash</a>
                    <a class="btn btn-sm btn-info" href="{{ route('courses.download_pdf') }}">Pdf</a>
                    <a class="btn btn-sm btn-info" href="{{ route('courses.download_excel') }}">Excel</a>
                </div>
                <div class="card-body">
                    <x-backend.alerts.message type="success" :message="session('message')" class="text-dark" />
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Batch_No</th>
                                <th>Class Start Date</th>
                                <th>Class End Date</th>
                                <th>Instructor Name</th>
                                <th>Baner</th>
                                <th>Is active</th>
                                <th>Course type</th>

                                <th>Action</th>


                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->batch_no }}</td>
                                    <td>{{ $course->class_start_date }}</td>
                                    <td>{{ $course->class_end_date }}</td>
                                    <td>{{ $course->instructor_name }}</td>
                                    <td>{{ $course->baner }}</td>
                                    <td>{{ $course->is_active }}</td>
                                    <td>{{ $course->course_type }}</td>



                                    <td >
                                        <x-backend.utilities.link-show
                                            href="{{ route('courses.show', ['course' => $course->id]) }}"
                                            icon="fas fa-eye" />
                                        <x-backend.utilities.link-edit
                                            href="{{ route('courses.edit', ['course' => $course->id]) }}"
                                            icon="fas fa-edit" />

                                        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}"
                                            method="post" style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <x-backend.forms.button text='Delete' color='danger' icon='fas fa-trash'
                                                onclick="return confirm('Are you sure want to delete?')" />
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
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
