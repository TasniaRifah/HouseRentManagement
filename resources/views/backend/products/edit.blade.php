<x-backend.layout.master>
    <x-slot:title>
        Edit Product
    </x-slot:title>

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Edit Product
                    <x-backend.utilities.link-index href="{{route('products.index')}}" text="Products List "/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif
                                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                  @method('patch')
                                    <x-backend.forms.input name="title" type="text" :value="old('title', $product->title)" />
                                    
                                        <label for="">Category Name</label>
                                      
                                        @foreach ($categories as $key=>$value)
                                        <div class="mb-3 form-check">
                                            <input name="category_ids[]" class="form-check-input" type="checkbox" value="{{ $key }}" id="{{ $key  }}" {{ in_array($key, $selectedCategories) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                        @endforeach

                                        @error('category')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    
                               
                                    <x-backend.forms.input name="rent" type="number" :value="old('rent', $product->rent)" />

                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{$product->title}} Image" height="200">
                                    <x-backend.forms.input name="image" type="file" />
                                    <x-backend.forms.input name="discount" type="number" :value="old('discount', $product->discount)" />

                                    <x-backend.forms.textarea name="address" :value="old('address', $product->address)"/>

                                    <x-backend.forms.textarea name="description" :value="old('description', $product->description)"/>

                                    <label>Status</label>
                                    <div class="mb-3 form-check">
                                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput" {{ $product->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isActiveInput">
                                            Active
                                        </label>
                                    </div>
                                    <x-backend.forms.submit text="Update"/>
                                   
                                </form>
                </div>
    </div>

</x-backend.layout.master>
