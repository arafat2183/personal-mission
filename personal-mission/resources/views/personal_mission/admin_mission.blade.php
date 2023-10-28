<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    @include('bootstrap_cdn.css')
</head>
</head>
<body>
<div class="container">
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user_logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <section class="vh-100" style="background-color: #E3E4FA;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                     style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                         alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>User Information</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>First Name</h6>
                                                <p class="text-muted">{{$all_data[0]['first_name']}}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Last Name</h6>
                                                <p class="text-muted">{{$all_data[0]['last_name']}}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">{{$all_data[0]['email']}}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Mobile</h6>
                                                <p class="text-muted">{{$all_data[0]['mobile']}}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Country</h6>
                                                <p class="text-muted">{{$all_data[0]['country']}}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Date of Birth</h6>
                                                <p class="text-muted">{{$all_data[0]['dob']}}</p>
                                            </div>
                                        </div>
                                        <h6>Projects</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Recent</h6>
                                                <p class="text-muted">Lorem ipsum</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Most Viewed</h6>
                                                <p class="text-muted">Dolor sit amet</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="container">
                                                    <div class="buttons">
                                                        <a href="{{route('edit_user',
                                                                                    [
                                                                                        'id'=>$all_data[0]->id,
                                                                                        'first_name'=>$all_data[0]->first_name,
                                                                                        'last_name'=>$all_data[0]->last_name,
                                                                                        'email'=>$all_data[0]->email,
                                                                                        'mobile'=>$all_data[0]->mobile,
                                                                                        'country'=>$all_data[0]->country,
                                                                                        'dob'=>$all_data[0]->dob,
                                                                                        'user_type'=>$all_data[0]->user_type
                                                                                    ])}}">
                                                            <button type="button" class="btn btn-success">Edit</button>
                                                        </a>
                                                        <a
                                                            href="#"
                                                            onclick="event.preventDefault();document.getElementById('delete-to').submit();"
                                                        >
                                                            <button type="button" class="btn btn-danger">Delete</button>
                                                        </a>
                                                        <form id="delete-to" action="{{route('delete_user', $all_data[0]->id)}}" method="POST" class="d-none">
                                                            @method('delete')
                                                            @csrf
                                                        </form>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
