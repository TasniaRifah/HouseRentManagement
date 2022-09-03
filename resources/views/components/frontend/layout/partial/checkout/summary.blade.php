<div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header" style="margin-bottom:18px">
                  <h3 class="mb-0" style="text-align:center">Summary</h3>
                </div>
                <small class="text-muted" style="margin-bottom:11px">Additional costs are calculated here.</small>
                <div class="table-responsive">
                  <table class="table" style="margin-top:21px">
                    <tbody>
                      <tr>
                        <td>Discount Rent</td>
                        <th>{{'৳ '.($product->rent)-((($product->discount)/100)*($product->rent)) }}</th>
                      </tr>
                      <tr>
                        <td>Handling Charge</td>
                        <th>৳ 200</th>
                      </tr>
                      <tr>
                        <td>Tax/VAT</td>
                        <th>৳ 0</th>
                      </tr>
                      <tr class="total">
                        <td >Total</td>
                        <th>{{'৳'.($product->rent)-((($product->discount)/100)*($product->rent)) + 200}}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>