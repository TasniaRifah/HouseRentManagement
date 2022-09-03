<x-backend.layout.master>
    <x-slot:title>
        courses
        </x-slot:>
        <x-slot:pagetitle>
            courses
            </x-slot:>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    course Create
                    <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">List</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif

                    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-backend.forms.input name="title" type="text" :value="old('title')" />

                        @error('title')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <x-backend.forms.input name="batch_no" :value="old('batch_no')" />

                        @error('batch_no')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <x-backend.forms.input type="date" name="class_start_date" :value="old('class_start_date')" />

                        @error('class_start_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror

                        <x-backend.forms.input type="date" name="class_end_date" :value="old('class_end_date')" />

                        @error('class_end_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <x-backend.forms.input type="text" name="instructor_name" :value="old('instructor_name')" />

                        @error('instructor_name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <x-backend.forms.input name="baner" type="file" />


                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                id="isactiveinput">
                            <label class="form-check-label" for="isactiveinput">Is Active</label>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-slect-label" >Course Tyoe</label>
                            <select name="course_type" >
                                <option value="virtual">Virtual</option>
                                <option value="physical">Physical</option>
                              </select>
                        </div>
                        

                  
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
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
