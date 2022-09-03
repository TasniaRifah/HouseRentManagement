<x-frontend.layout.master>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="basket" class="col-lg-9">
                        <div class="box">
                           
                            <h1>Shopping cart</h1>
                            <p class="text-muted"><span>You currently have {{ count($cartItems) }} items in your
                                    cart.</span></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>


                                            <th>SL3</th>
                                            <th>Image</th>
                                            <th>House Address</th>
                                            <th>Rent</th>
                                            <th>Quantity</th>
                                            <th>Discount(%)</th>
                                            <th>Total Rent</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/products/' . $item->product->image) }}"
                                                        height="100" alt="{{ $item->title }}" /></td>
                                                <td>{{ $item->product->address }}</td>
                                                <td>{{ $item->unit_price }}</td>
                                                <td><input class="qty-input" type="number" value="{{ $item->qty }}"
                                                        class="form-control"></td>
                                                {{-- <td>{{ $item->product->discount}}</td> --}}
                                                <td>
                                                    @if ($item->product->discount)
                                                        
                                                        {{ $item->product->discount}}
                                                        
                                                    @else
                                                        {{0}}
                                                        
                                                    @endif
                                                </td>
                                                <td>{{ $item->total_price }}</td>
                                                <td><button data-id="{{$item->id}}" class="remove-btn">Remove</button></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                           
                                </table>
                            </div>
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i
                                            class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                <div class="right">
                                    <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update
                                        cart</button>
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                          
                        </div>
                    
                        <div class="row same-height-row">




                        </div>
                    </div>
                    {{-- <div>
                        <p>Total Items : <span id="totalItem">0</span></p>
                        <p>Grand Total : <span id="grandTotal">0</span></p>
                    </div> --}}
                 
                    <div class="col-lg-3">
                        <div id="order-summary" class="box">
                            <div class="box-header">
                                <h3 class="mb-0">Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you
                                have entered.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Total Item</td>
                                            <th id="totalItem"></th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th id="grandTotal"></th>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                 
                </div>
            </div>
        </div>
    </div>
   

    @push('js')
        <script src="{{ asset('ui/frontend/js/cart.js') }}"></script>
    @endpush

</x-frontend.layout.master>
