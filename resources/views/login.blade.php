<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="  {{ asset('/assets/css/styles.min.css')}}" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @if(request()->session()->has('user_not_exist'))
      <h2 class="fixed py-2 font-bold w-full text-center z-30 bg-red-300">
        {{request()->session()->get('user_not_exist')}}
      </h2>
    @endif
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                
                <form action="{{url('/')}}/login" method="post">
                  <div class="mb-3">
                    <label for="login_email" class="form-label">Username</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" aria-describedby="emailHelp" >
                    <small class="text-red-500">
                      @error('email')
                          {{$message}}
                      @enderror
                    </small>
                  </div>
                  <div class="mb-4">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}" >
                    <small class="text-red-500">
                        @error('password')
                            {{$message}}
                        @enderror
                    </small>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="{{url('/user_form')}}">Forgot Password ?</a>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="{{url('/user_form')}}">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>