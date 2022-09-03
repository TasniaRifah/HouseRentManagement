<form method="post" action="{{ route('checkout.address', ['product'=>$product->id]) }}">
                  @csrf
                  @method('patch')
                  <h1>Booking Information</h1>
                  <!-- <p class="text-muted">You currently have 3 item(s) in your cart.</p> -->
                  <br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="3">House</th>
                          
                          <th>Regular Rent</th>
                          <th> Discount</th>
                          <!-- <th colspan="2">Total</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="#"><img src="{{ asset('storage/products/'.$product->image) }}" alt="{{$product->title}} Image"></a></td>
                          <td colspan="2"><a href="#">{{ $product->title }}</a></td>
                          <td>{{'৳ '. $product->rent }}</td>
                          <!-- <td>{{ $product->discount.' %' }}</td> -->
                          <td> {{ '৳ '.(($product->discount)/100)*($product->rent) }} <span class="text-muted">(-) &nbsp;&nbsp;</span></td>
                          <!-- <td>{{ ($product->rent)-((($product->discount)/100)*($product->rent)) }}</td> -->
                          <!-- <td><a href="#"><i class="fa fa-trash-o"></i></a></td> -->
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4">Discount Rent</th>
                          <th colspan="2">{{'৳ '.($product->rent)-((($product->discount)/100)*($product->rent)) }}</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="{{route('frontend.product.detail',['product'=>$product->id])}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go Back</a></div>
                    <div class="right">
                      <!-- <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button> -->
                      <button type="submit" class="btn btn-primary">Proceed to booking<i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </form>