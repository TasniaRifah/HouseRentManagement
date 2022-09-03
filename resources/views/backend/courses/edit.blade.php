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
                    course Edit
                    <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">List</a>
                </div>
                <div class="card-body">
                          @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                   
                    <form method="POST" action="{{route('courses.update',['course'=>$course->id])}}">
                        @csrf
                        @method ('patch')
                      

                        <div class="mb-3">
                            <label  class="form-label">course Name</label>
                            <input name="title" type="text" value="{{old('title',$course->title)}}" class="form-control @error('title')is-invalid @enderror" >
                          
                            @error('title')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Batch No</label>
                            <input name="batch_no" type="text" value="{{old('batch_no',$course->batch_no)}}" class="form-control @error('batch_no')is-invalid @enderror" >
                          
                            @error('batch_no')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">class start date</label>
                            <input name="class_start_date" type="text" value="{{old('class_start_date',$course->class_start_date)}}" class="form-control @error('class_start_date')is-invalid @enderror" >
                          
                            @error('class_start_date')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        
                        <div class="mb-3">
                            <label  class="form-label">class_end_date</label>
                            <input name="class_end_date" type="text" value="{{old('class_end_date',$course->class_end_date)}}" class="form-control @error('class_end_date')is-invalid @enderror" >
                          
                            @error('class_end_date')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Instructor Name</label>
                            <input name="instructor_name" type="text" value="{{old('instructor_name',$course->instructor_name)}}" class="form-control @error('instructor_name')is-invalid @enderror" >
                          
                            @error('instructor_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                         
                        </div>
                        <img src="{{ asset('storage/courses/'.$course->baner) }}" alt="{{$course->baner}} Image" height="200">
                        <x-backend.forms.input name="baner" type="file"/>
                      
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                id="isactiveinput" {{ $course->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="isactiveinput">Is Active</label>
                        </div>

                        <div class="mb-3 form-check">
                            <label class="form-slect-label" >Course Tyoe</label>
                            <select name="course_type" >
                                <option value="virtual">Virtual</option>
                                <option value="physical">Physical</option>
                              </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
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
            <script src="{{asset('ui/backend/js/datatables-simple-demo.js')}}"></script>
            @endpush
</x-backend.layout.master>