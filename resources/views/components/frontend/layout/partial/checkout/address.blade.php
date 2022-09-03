<form  method="POST"  action="{{ route('bookings.store') }}">
    @csrf
    @method('patch')
    <div class="content py-3">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="firstname">Firstname</label> -->
                    <x-backend.forms.input name="name" type="text" :value="old('name', $user->name)" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <x-backend.forms.input name="email" type="email" :value="old('email', $user->email)" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-backend.forms.input name="mobile" type="number" :value="old('name', $user->mobile)" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <x-backend.forms.input name="NID" type="number" :value="old('NID', $user->NID)" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-backend.forms.input name="address" type="text" :value="old('name', $user->address)" />
            </div>
        </div>
    </div>
    <div class="box-footer d-flex justify-content-between">
        <a href="{{route('frontend.product.detail',['product'=>$product->id])}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
    {{-- <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i></button> --}}
        <a href="" class="btn btn-primary">Place to Booking <i class="fa fa-chevron-right"></i></a>
        <a href="{{ route('checkout.payment',['product'=>$product->id]) }}" class="btn btn-primary"> Continue to Payment Method<i class="fa fa-chevron-right"></i></a>
    </div>
</form>

{{-- <form method="get" action="{{ route('checkout.payment',['product'=>$product->id]) }}">
                  @csrf
                  <a href="" class="btn btn-primary"> Continue to Payment Method<i class="fa fa-chevron-right"></i></a>
                 
              </form> --}}
