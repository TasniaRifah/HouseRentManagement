

<x-frontend.layout.master>
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My orders</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
<x-backend.layout.partial.customer.sidebar />
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div class="col-lg-9">
              <div class="box">
                <div class="row">
                  <div class="col-md">
                    <h1>My account</h1>
                    <p class="lead">Change your personal details or your password here.</p>
                  </div>
                  <div class="col-md-3">
                    @if($user->image==null)
                    <img src=" https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-5 border border-dark" width="101">
                    @else 
                    <img src="{{ asset('storage/users/'.$user->image) }}" alt="Admin" class="rounded border border-dark" width="101">
                    @endif
                  </div>
                </div>


                <!-- <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> -->

                <h3 style="margin-top: 13px">Personal details</h3>
              <form method="POST" action="{{ route('profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="firstname">Firstname</label> -->
                        <x-backend.forms.input name="name" type="text" :value="old('name', $user->name)"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <x-backend.forms.input name="email" type="email" :value="old('email', $user->email)"/>
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <x-backend.forms.input name="mobile" type="tel" :value="old('name', $user->mobile)"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <x-backend.forms.input name="image" type="file" />
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <!-- <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="city">Company</label>
                        <input id="city" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input id="zip" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="state">State</label>
                        <select id="state" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="form-control"></select>
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <x-backend.forms.input name="address" type="text" :value="old('address', $user->address)"/>
                      </div>
                    </div>
                    <!-- <div class="col-md-0">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control">
                      </div>
                    </div> -->
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                  </div>
                </form>
                <h3>Change password</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Old password</label>
                        <input id="password_old" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">New password</label>
                        <input id="password_1" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Retype new password</label>
                        <input id="password_2" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->

    @push('css')
    <style>

    </style>
    @endpush

    @push('js')
    <script>

    let itemInput=document.querySelector('input[type=tel]') ;

    itemInput.addEventListener('keypress',mobile);
    function mobile()
      {
          let p=this.value;
          if((p.length+1)%4==0 && p.length<9)  this.value=p+" ";
      }
</script>
    @endpush


</x-frontend.layout.master>
