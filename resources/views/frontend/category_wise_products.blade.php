<x-frontend.layout.master>
    <div id="all">
        {{-- @dd($sliders); --}}
        <div id="content">
           
            <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
          
            <!-- /#advantages-->
            <!-- *** ADVANTAGES END ***-->
            <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                        <h2 class="mb-0">{{$category->categories_name}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
             
            
                    
                        <div class="container">
                    
                            <div class="product-slider owl-carousel owl-theme">
                              @foreach ($products as $product)
                                <div class="item">
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail"><img
                                                            src="{{ asset('storage/products/'.$product->image) }}" alt="{{$product->title}} Image" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail"><img
                                                            src="{{ asset('ui/frontend/img/product_2.jpg') }}"
                                                            alt="" class="img-fluid"></a></div>
                                            </div><a href="detail.html" class="invisible"><img
                                                    src="{{ asset('ui/frontend/img/product2.jpg') }}" alt=""
                                                    class="img-fluid"></a>
                                        </div>
                                        <div class="text">
                                            <h3>{{$product->address}}</h3>
                                            <p class="price">
                                                <del></del>{{$product->rent}}
                                            </p>
                                            <p class="price">

                                                <a href="{{route('frontend.product.detail',['product'=>$product->id])}}" class="btn btn-sm btn-primary">View Details</a>
                                            </p>


                                        </div>
                                        <!-- /.text-->
                                        <div class="ribbon sale">
                                            <div class="theribbon">SALE</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        <!-- /.ribbon-->
                                        <div class="ribbon new">
                                            <div class="theribbon">NEW</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        <!-- /.ribbon-->
                                        <div class="ribbon gift">
                                            <div class="theribbon">GIFT</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        <!-- /.ribbon-->
                                    </div>
                                    <!-- /.product-->
                                </div>

                                @endforeach
                                <!-- /.product-slider-->
                            </div>
                   
                            <!-- /.container-->
                        </div>
             
   
     
               
          
                    </div>
                </div>
                <!-- /.container-->
                <!-- *** BLOG HOMEPAGE END ***-->
            </div>
        </div>


</x-frontend.layout.master>

