

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
        {{-- @if(!@empty(@error))
            <h2 class="fixed py-2 font-bold w-full text-center z-30 bg-green-200">Please complete the form</h2>
        @endif --}}

        @if(request()->session()->has('msg'))
            <h2 class="fixed py-2 font-bold w-full text-center z-30 bg-green-200">
                {{request()->session()->get('msg')}}
            </h2>
        @endif

        @php
            $user_gender = (empty($user_data['gender']) ? old('gender') : $user_data['gender'])
        @endphp

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 w-[600px]">
            <div class="card mb-0">
                <h2 class="text-center font-bold text-2xl pt-7 fixed top-8">{{$heading}}</h2>
                <div class="card-body ">
                    <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                    </a>
                    
                    <!-- <p class="text-center">Your Social Campaigns</p> -->
                    <form method="post" action="{{$url}}" class="pt-2 ">
                    @csrf

                    <div class="grid w-full">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" id="name" value="{{empty($user_data['name']) ? old('name') : $user_data['name'] }}" >
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
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" value="{{empty($user_data['email']) ? old('email') : $user_data['email'] }}" >
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
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="{{old('password')}}" >
                            <small class="text-red-500">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                        </div>
                    <div class="flex gap-4 pb-4">
                        <div class="grid w-full ">
                            <div class="mb-3 w-60">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" maxlength="10" placeholder="Enter phone number" id="phone_number" aria-describedby="emailHelp" value="{{empty($user_data['phone_number']) ? old('phone_number') : $user_data['phone_number'] }}" >
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
                                    <input type="radio" name="gender" {{($user_gender == "M") ? 'checked' : '' }} id="male" value="M">
                                    <label for="male" >Male</label>
                                </div>
                                <div class="flex gap-1 items-center">
                                    <input type="radio" name="gender" {{($user_gender == "F") ? 'checked' : '' }} id="female" value="F">
                                    <label for="female" >Female</label>
                                </div>
                                <div class="flex gap-1 items-center">
                                    <input type="radio" name="gender" {{($user_gender == "O") ? 'checked' : '' }} id="other" value="O">
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
                    
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">Already have an account?</p>
                        <a class="text-primary fw-bold ms-2" href="{{url('/login')}}">Login</a>
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