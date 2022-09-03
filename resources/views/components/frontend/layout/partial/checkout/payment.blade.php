<form method="get" action="{{ route('customer.bookingList', auth()->user()->name ?? '') }}">
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6" >
                        <div class="box payment-method">
                          <h4>Bkash</h4>
                          <!-- <p>We like it all.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>VISA / Mastercard</h4>
                          <!-- <p>VISA and Mastercard only.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment2">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->

                  <!-- /.content-->
                <!-- /.box-->
              </div>

                  <div class="box-footer d-flex justify-content-between" style="margin-top:0px"><a href="basket.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Address</a>
                    <button type="submit" class="btn btn-primary">Place an Order<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>