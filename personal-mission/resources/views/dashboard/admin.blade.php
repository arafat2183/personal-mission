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
<body>
    <div class="container">
        <nav class="navbar bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('user_login')}}">Admin Profile</a>
                @if(isset($all_data[1]) == false)
                    @php($all_data[1] = new stdClass())
                    @php($all_data[1]->created_at = now())
                @endif
                @if($all_data[1]->created_at->format('Y') == now()->format('Y') && $all_data[1]->created_at->format('m') == now()->format('m') && isset($all_data[1]->personal_mission) && $all_data[1]->personal_mission != null)
                    @if(now()->format('d') > 20 && $all_data[1]->mission_complete == 0)
                        <div class="text-center">
                            <button type="button" class="btn btn-success">
                                <a href="{{route('personalMissionAdminMissionEditDashboard')}}" class="navbar-brand inline_block font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Complete Your Achievement Rate out of 100</a>
                            </button>
                        </div>
                    @else
                        <div class="text-center">
                            <button type="button" hidden class="btn btn-success">
                                <a href="{{route('personalMissionUser')}}" class="navbar-brand inline_block font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Write This Month's Personal Mission</a>
                            </button>
                        </div>
                    @endif
                @else
                    @if(now()->format('d') > 20)
                        <div class="text-center">
                            <button type="button" hidden class="btn btn-success">
                                <a href="{{route('personalMissionUser')}}" class="navbar-brand inline_block font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Write This Month's Personal Mission</a>
                            </button>
                        </div>
                    @else
                        <div class="text-center">
                            <button type="button" class="btn btn-success">
                                <a href="{{route('personalMissionUser')}}" class="navbar-brand inline_block font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Write This Month's Personal Mission</a>
                            </button>
                        </div>
                    @endif
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('user_login')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('personalMissionAdminView')}}">Personal Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('personalMissionReportView')}}">Personal Mission Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminProfileView')}}">User Profile</a>
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
        <div class="container-fluid pt-3">
            <section class="vh-100" style="background-color: #E3E4FA;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">{!! \Session::get('success') !!} </div>
                            @endif
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
