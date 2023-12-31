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
            <a class="navbar-brand" href="{{route('user_login')}}">Admin Profile</a>
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
                        <a class="nav-link" href="{{route('user_login')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user_logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5 mb-3">
        <div class="card p-5">
            <div class="card-header">
                <h2>Mission List</h2>
            </div>

            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Mission</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($usersWithMissions as $usersMission)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td><div class="ms-2 me-auto">{{$usersMission->first_name}} {{$usersMission->last_name}}</div></td>
                            <td>
                                <div class="ms-2 me-auto">
                                    @if($usersMission->user_type == 1)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </div>
                            </td>
                            <td><div class="ms-2 me-auto">{{$usersMission->personal_mission}}</div></td>
                            <td>
                                <div class="ms-2 me-auto">
                                    @if($usersMission->edit_flag == 0)
                                        @if($user->id == $usersMission->user_id)
                                            <a href="{{route('personalMissionAdminMissionEditDashboard', ['id'=>$usersMission->id, 'personal_mission'=>$usersMission->personal_mission])}}">
                                                <button type="submit" class="btn btn-secondary">Edit Mission</button>
                                            </a>
                                        @else
                                            <button type="submit" hidden class="btn btn-secondary">Make Request To Edit Your Mission</button>
                                        @endif
                                    @elseif($usersMission->edit_flag == 1)
                                        <div>
                                            <form method="POST" action="{{route('personalMissionAdminEditAcceptIgnoreRequest', $usersMission->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="id" value="{{$usersMission->id}}">
                                                <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                                <button type="submit" name="action" value="ignore" class="btn btn-danger">Ignore</button>
                                            </form>
                                        </div>
                                    @elseif($usersMission->edit_flag == 2)
                                        <a href="#">
                                            <button type="button" hidden class="btn btn-success">Edit Mission</button>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @if(count($usersWithMissions) === 0)
                    <div>
                        <section>No Data Found.</section>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
@include('bootstrap_cdn.js')
</html>
