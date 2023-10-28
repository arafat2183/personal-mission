<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User page</title>
    @include('bootstrap_cdn.css')

</head>
<body>
<div class="container">
    <nav class="navbar bg-primary navbar-fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('personalMissionUserView')}}">Personal Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user_login')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user_logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <section class="vh-100" style="background-color: #E3E4FA;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="container">
                                        <p>
                                            <div class="container-fluid">
                                                <form method="POST" action="{{route('personalMissionCreate')}}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Your Mission</label>
                                                        <textarea class="form-control" name="personal_mission" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group row pt-2">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
@include('bootstrap_cdn.js')
</html>
