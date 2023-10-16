<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('bootstrap_cdn.css')
    <title>login from</title>

</head>
<body>
<div class="btn-group float-end p-3" role="group" aria-label="Basic mixed styles example">
    <button type="button" class="btn btn-danger pr-2"><a href="{{route('home')}}">Home</a></button>
</div>
<section class="vh-100">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-sm-6 text-black">
                @if (\Session::has('success'))
                    <div class="alert alert-success">{!! \Session::get('success') !!} </div>
                @endif
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <form style="width: 23rem;">

                        <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 5px;">Log in</h2>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example18">Email address</label>
                            <input type="email" id="form2Example18" class="form-control form-control-lg" placeholder=" @gmail.com " />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example28">Password</label>
                            <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="type your password.." />
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="button">Login</button>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                        <p>Don't have an account? <a href="{{route('registration_dashboard')}}" class="link-info">Register here</a></p>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                     alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>
</body>
@include('bootstrap_cdn.js')
</html>
