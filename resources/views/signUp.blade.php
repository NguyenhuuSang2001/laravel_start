<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .invalid {
            border-color: red;
        }

        .valid {
            border-color: green;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="{{ route('signUp.store') }}" class="mx-1 mx-md-4" method="POST">

                                        {{-- <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div> --}}

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    name='username' required value="{{ Session::get('msg') }}" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" class="form-control"
                                                    name='password' required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="confirmPassword">Confirm your
                                                    password </label>
                                                <input type="password" id="confirmPassword" class="form-control"
                                                    name="confirmPassword" required />
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-2">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="check_" checked required />
                                            <label class="form-check-label" for="check_">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>

                                        </div>
                                        <div class="form-check d-flex justify-content-center mb-5">

                                            <p class="small fw-bold pt-1 mb-0">Have an account? <a
                                                    href="{{ route('home') }}" class="link-danger">Sign In</a>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button id="btn-sub" type="submit"
                                                class="btn btn-primary btn-lg col-8">Register</button>

                                        </div>
                                        @csrf

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                                @if (Session::has('msg'))
                                    {{-- <script>
                                    alert("Email đã được đăng ký tài khoản trên hệ thống. Vui lòng đăng ký với email khác!");
                                </script> --}}
                                    <div class=" alert alert-danger text-center position-absolute top-0" role="alert">
                                        Email '{{ Session::get('msg') }}' đã được đăng ký tài khoản trên hệ thống. Vui
                                        lòng đăng
                                        ký với email khác!
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('./js/signUp.js') }}"></script>



</body>

</html>
