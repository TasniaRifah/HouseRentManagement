<x-backend.layout.master>
    <x-slot:title>
        Create products
    </x-slot:title>

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Product Create 
                    <x-backend.utilities.link-index href="{{route('products.index')}}" text="Products List "/>
                    <!-- <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">List</a> -->
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif

                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                    <x-backend.forms.input name="title" type="text" :value="old('title')" />


                                   
                                        <label for="">Category Name</label>
                                        @foreach ($categories as $key=>$value)
                                        <div class="mb-3 form-check">
                                            <input name="category_ids[]" class="form-check-input" type="checkbox" value="{{ $key }}" id="{{ $key  }}">
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                        @endforeach
                           

                                    <br>
                               
                                    <x-backend.forms.input name="rent" type="number" :value="old('rent')" />

                                    <x-backend.forms.input name="image" type="file" />
                                    <x-backend.forms.input name="discount" type="number" :value="old('discount')" />

                                    <x-backend.forms.textarea name="address" :value="old('address')" />

                                    <x-backend.forms.textarea name="description" :value="old('description')"/>
                                           
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" value="1" name="is_active" class="form-check-input"
                                            id="isactiveinput">
                                        <label class="form-check-label" for="isactiveinput">Is Active</label>
                                    </div>
                                    <x-backend.forms.submit />
                                   
                                </form>
                </div>
    </div>

</x-backend.layout.master>
