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
            @if(isset($allAdminData) && $allAdminData[0]['user_type'] == 1)
                <a class="navbar-brand" href="#">Admin Profile</a>
            @elseif(isset($allUserData) && $allUserData[0]['user_type'] == 2)
                <a class="navbar-brand" href="#">User Profile</a>
            @endif
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
    <div class="container-fluid mt-3">
        <section class="vh-100" style="background-color: #E3E4FA;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <form method="POST" action="{{route('update_user', request()->id)}}">
                                @method('put')
                                @csrf
                                <div class="form-group">
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
                                                        <input type="text" name="first_name" class="form-control" value="{{request()->first_name}}" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
                                                        <input type="hidden" name="id" value="{{request()->id}}">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Last Name</h6>
                                                        <input type="text" name="last_name" class="form-control" value="{{request()->last_name}}" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <input type="text" name="email" class="form-control" value="{{request()->email}}" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Mobile</h6>
                                                        <input type="text" name="mobile" class="form-control" value="{{request()->mobile}}" placeholder="Mobile" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Country</h6>
                                                        <input type="text" name="country" class="form-control" value="{{request()->country}}" placeholder="Country" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Date of Birth</h6>
                                                        <input type="text" name="dob" class="form-control" value="{{request()->dob}}" placeholder="Date of Birth" aria-label="Username" aria-describedby="basic-addon1">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="container d-flex justify-content-center">
                                                <div class="buttons">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row mb-3">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="container d-flex justify-content-center">
                                        <div class="buttons">
                                            <a
                                                href="#"
                                                onclick="event.preventDefault();document.getElementById('delete-to').submit();"
                                            >
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                            @if(isset($allAdminData) && $allAdminData[0]['user_type'] == 1)
                                                <form id="delete-to" action="{{route('delete_user', $allAdminData[0]->id)}}" method="POST" class="d-none">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            @elseif(isset($allUserData) && $allUserData[0]['user_type'] == 2)
                                                <form id="delete-to" action="{{route('delete_user', $allUserData[0]->id)}}" method="POST" class="d-none">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            @endif
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
        </section>
    </div>
</div>
</body>
@include('bootstrap_cdn.js')
</html>
