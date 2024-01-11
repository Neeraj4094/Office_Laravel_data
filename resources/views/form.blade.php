

<!doctype html>
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
    <h2 class="fixed p-1 w-full text-center z-30 bg-green-200">
        @if(request()->session()->has('msg'))
            {{request()->session()->get('msg')}}
        @endif
    </h2>
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
                
                <!-- <p class="text-center">Your Social Campaigns</p> -->
                <form method="post" action="{{url('/')}}/user_data" class="pt-4">
                    @csrf
                    <div class="grid w-full">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name" value="{{old('name')}}">
                        </div>
                        <small class="text-red-500">
                            @error('name')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                        <div class="grid w-full"> 
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                        </div>
                        <small class="text-red-500">
                            @error('email')
                                {{$message}}
                            @enderror
                        </small>
                        </div>
                    <div class="grid w-full">   
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                            <small class="text-red-500">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                        </div>
                    <div class="flex gap-4">
                        <div class="grid w-full">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Enter phone number" id="phone_number" aria-describedby="emailHelp" value="{{old('phone_number')}}">
                            </div>
                            <small class="text-red-500">
                                @error('phone_number')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                        <div class="grid w-full">
                            <span class="font-bold">Gender</span>
                            <div class="flex gap-4">
                                <div class="flex gap-1 items-center">
                                    <input type="radio" name="gender" ({{'gender'}} == "M") ? {{"checked"}} : '' id="male" value="M">
                                    <label for="male" >Male</label>
                                </div>
                                <div class="flex gap-1 items-center">
                                    <input type="radio" name="gender" ({{'gender'}} == "F") ? {{"checked"}} : '' id="female" value="F">
                                    <label for="female" >Female</label>
                                </div>
                                <div class="flex gap-1 items-center">
                                    <input type="radio" name="gender" ({{'gender'}} == "O") ? {{"checked"}} : '' id="other" value="O">
                                    <label for="other" >Other</label>
                                </div>
                            </div>
                            <small class="text-red-500">
                                @error('gender')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-dark" for="flexCheckChecked">
                            Remeber this Device
                        </label>
                        </div>
                        <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                    </div>
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                        <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
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