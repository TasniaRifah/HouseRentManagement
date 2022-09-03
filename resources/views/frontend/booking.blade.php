

<x-frontend.layout.master>

      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">

          <x-frontend.layout.partial.checkout.breadcrumb  />

            <div id="basket" class="col-lg-9">
              <div class="box">
              <x-frontend.layout.partial.checkout.booking  :product="$product"/>

              </div>
              <!-- /.box-->

            </div>
            <!-- /.col-lg-9-->
            <x-frontend.layout.partial.checkout.summary  :product="$product"/>

            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>

</x-frontend.layout.master>
