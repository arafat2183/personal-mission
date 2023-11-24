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
                <a class="navbar-brand" href="{{route('user_login')}}">User Profile</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('user_login')}}">Home</a>
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
        <div class="container mt-5 mb-3">
            <div class="card p-5">
                <div class="card-header">
                    <h2>Edit Mission</h2>
                </div>
                @if(now()->format('d') > 20)
                    <form method="POST" action="{{route('personalMissionUserMissionEdit', $usersWithMissions[0]->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Your Mission Complete Rate</label>
                            <input type="number" name="mission_complete" class="form-control" value="{{$usersWithMissions[0]->mission_complete}}" placeholder="Enter Your Mission Complete Rate out from 100!">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Your Mission</label>
                            <textarea type="email" disabled name="personal_mission" class="form-control input-lg mt-3" placeholder="Enter mission">{{$usersWithMissions[0]->personal_mission}}</textarea>
                        </div>
                        <input type="hidden" name="edit_flag" value=0>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                @else
                    <form method="POST" action="{{route('personalMissionUserMissionEdit', $usersWithMissions[0]->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Your Mission Complete Rate</label>
                            <input type="number" disabled name="mission_complete" class="form-control" value="{{$usersWithMissions[0]->mission_complete}}" id="mission_complete_rate" placeholder="Enter Your Mission Complete Rate out from 100!">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Your Mission</label>
                            <textarea type="email" name="personal_mission" class="form-control input-lg mt-3" placeholder="Enter mission">{{$usersWithMissions[0]->personal_mission}}</textarea>
                        </div>
                        <input type="hidden" name="edit_flag" value=0>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
@include('bootstrap_cdn.js')
</html>
