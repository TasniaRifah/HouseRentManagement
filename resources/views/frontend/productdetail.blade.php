<x-frontend.layout.master :categories='$categories'>

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Ladies</a></li>
                                <li class="breadcrumb-item"><a href="#">Tops</a></li>
                                <li aria-current="page" class="breadcrumb-item active">White Blouse Armani</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
                        <div class="card sidebar-menu mb-4" style="height: 200" >
                            <div class="card-header">
                                <h3 class="h4 card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled" style="margin-bottom: 1000px">
                                    @foreach ($categories as $category)
                                  
                                    <li class="nav-item">
                                        <a href="{{ route('categories.products' , ['category' => $category->id]) }}" class="nav-link">{{ $category->categories_name }}</a>
                                    </li>
                                   
                                    @endforeach
                                    
                                  </ul>
                             
                            </div>
                        </div>


                     
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item"><img src="{{ asset('storage/products/' . $product->image) }}"
                                            alt="{{ $product->title }} Image" class="img-fluid">
                                    </div>
                                    <div class="item"> <img src="img/detailbig2.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="item"> <img src="img/detailbig3.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
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
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    
                                    <form name="addToCartForm">
                                        <h1 class="text-center">{{ $product->address }}</h1>
                                        <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product
                                                details, material &amp; care and sizing</a></p>
                                        <p class="price">{{ $product->rent }}</p>
                                        <p style="text-align:center">Qty: <input name="qty" value="1"></p>
                                        <p class="text-center buttons">
                                            <a href="{{ route('booking', ['product'=>$product->id]) }}" class="btn btn-primary">
                                                Booking Now</a>
                                            @if (in_array($product->id, $cartItems))
                                                <button type="button" class="btn btn-default btn-outline-primary">Added To Cart</button>
                                            @else
                                                <button id="addToCartBtn" type="submit" class="btn btn-outline-primary">Add
                                                    To Cart</button>
                                            @endif
                                        </p>
                                    </form>
                                    

                                </div>
                                <div data-slider-id="1" class="owl-thumbs">
                                    <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt=""
                                            class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt=""
                                            class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt=""
                                            class="img-fluid"></button>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h3>House details</h3>
                            <hr>
                            <h4>House Name</h4>
                            <p>{{ $product->title }}</p>
                            <h4>Category</h4>
                            <p>
                            <ul>
                                @foreach ($product->categories as $category)
                                    <li>{{ $category->categories_name }}</li>
                                @endforeach
                            </ul>
                            </p>
                            <h4>Description</h4>
                            <p>{{ $product->description }}</p>
                            <h4>Discount</h4>
                            <p>{{ $product->discount }}</p>
                            @auth
                                <hr>
                                <h4>Post a Comments:</h4>
                                <div class="col-12">
                                    <form method="post"
                                        action="{{ route('products.comments.store', ['product' => $product->id]) }}">
                                        @csrf
                                        <textarea class="form-control" name="body"></textarea>
                                        <br>
                                        <button class="btn btn-primary">Comment</button>
                                    </form>
                                </div>
                            @endauth
                            <div class="col-12">
                                <h3>Comments: </h3>
                                <ul>
                                    @foreach ($product->comments as $comment)
                                        <li>
                                            <strong>{{ $comment->commentedBy->name }}</strong> At
                                            {{ $comment->created_at->diffForHumans() }}
                                            <p>{{ $comment->body }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
           
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a
                                        href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a
                                        href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a
                                        href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                            </div>
                        </div>

                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    @push('js')
       
        <script>
            const form = document.forms['addToCartForm'];
    
            const apiUrl = '/products/{{$product->id}}/cart';
            form.addEventListener('submit', function(e) {
                e.preventDefault();
    
                const qtyInput = document.querySelector('input[name=qty]').value;
                const reqBody = JSON.stringify({
                    qty: qtyInput
                })
    
                fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: reqBody
                    })
                    .then(res => {
                        return res.json();
                    })
                    .then(result => {
                        if (result.status) {
                            const cartItemCountElement = document.querySelector('#cartItemCount');
                            console.log(cartItemCountElement);

                            cartItemCountElement.innerText = parseInt(cartItemCountElement.innerText) + 1;
                            document.querySelector('#addToCartBtn').setAttribute('disabled', 'disabled')
                            alert(result.message);
                        }
                    })
            });
        </script>
    @endpush
</x-frontend.layout.master>
