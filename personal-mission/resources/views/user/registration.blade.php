<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration from</title>
    @include('bootstrap_cdn.css')

</head>
<body>
    <div class="btn-group float-end p-3" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-danger pr-2"><a href="{{route('home')}}">Home</a></button>
    </div>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 30px;">
                            <div class="card-body mb-5 p-5">
                                <h3 class="text-uppercase text-center mb-5">Create an account</h3>
                                    <form method="POST" action='{{route('create_user')}}'>
                                        @csrf
                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">Your First Name</label>
                                            <input type="text" value="{{request()->first_name}}" name="first_name" id="form3Example1cg" class="form-control form-control-lg" placeholder="type your first name.." />
                                        </div>
                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">Your Last Name</label>
                                            <input type="text" value="{{request()->last_name}}" name="last_name" id="form3Example1cg" class="form-control form-control-lg" placeholder="type your last name.." />
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example3cg">Your Email</label>
                                            <input type="email" value="{{request()->email}}" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="@gmail.com"/>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">Mobile</label>
                                            <input type="number" value="{{request()->mobile}}" name="mobile" id="form3Example1cg" class="form-control form-control-lg" placeholder="your phone number.."/>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">Country</label>
                                            <input type="text" value="{{request()->country}}" name="country" id="form3Example1cg" class="form-control form-control-lg" placeholder="your country"/>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">Date of Birth</label>
                                            <input type="date" value="{{request()->dob}}" name="dob" id="form3Example1cg" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">User Type</label>
                                            <select class="form-control" value="{{request()->user_type}}" name="user_type">
                                                <option value="">Select</option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                            <input type="password" value="{{request()->password}}" name="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Enter password.." />
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example4cdg">Confirm Password</label>
                                            <input type="password" value="{{request()->confirm_password}}" name="confirm_password" id="form3Example4cdg" class="form-control form-control-lg"  placeholder="Enter password.."  />
                                        </div>
                                        <div class="d-flex justify-content-center pt-2">
                                            <button type="submit" name="store"
                                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                        </div>
                                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login_dashboard')}}"
                                                                                                                class="fw-bold text-body"><u>Login here</u></a></p>
                                    </form>

                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">{!! \Session::get('success') !!} </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@include('bootstrap_cdn.js')
</html>
