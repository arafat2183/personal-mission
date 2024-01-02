<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cover Latter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<section class="vh-100 bg-image">

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
        <div class="btn-group mt-5">
            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                More Options
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Print</a></li>
                <li><a class="dropdown-item" href="#">PDF</a></li>
                <li><a class="dropdown-item" href="#">CSV</a></li>
            </ul>
        </div>
    </div>



    <div class="container-fluid mt-3 mb-4">
        <div class="container mt-5 py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4 gradient-custom text-center text-white"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="1.jpg" class="rounded-3"
                                     style="width: 150px;" alt="Avatar"/>
                            </div>
                            <div class="card mt-3 p-4">
                                <p>Date:<br>
                                    To:<br/>

                                    The Authority<br>
                                    Joypurhat, Sadar<br>
                                    arafat@codesparks.com<br>

                                    Dear Mr. Jacobson,<br>

                                    As a long-term admirer of the work done by the team at Mayflower Technologies,<br>
                                    I’m
                                    delighted to submit my application for the entry-level. IT technician position
                                    posted on
                                    Indeed.com. As a recent graduate from the University of Rochester with a B.S. in
                                    Computer Science, I’m confident that my knowledge of Linux systems, experience in
                                    backend coding, and precise attention to detail would make me an asset to the team
                                    at
                                    Mayflower.<br>


                                    Sincerely,<br>

                                    [Your Name]</p>
                            </div>
                            <section class="vh-200" style="background-color: rgb(253,253,254);">
                                <div class="container mb-4 mt-5">
                                    <div class="card mt-5 mb-3">
                                        <div class="card-body mb-4">
                                            <h3 class="text-uppercase text-center mb-5">CV Info Desk</h3>
                                            <hr class="mt-0 mb-4">
                                            <div class="row p-5 pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Full_name</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Father_name</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Mother_name</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Date of Birth</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>About Me</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Present Address</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>City</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Region</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Zip Code</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Social Link</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Mobile Number</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Emergency Contact</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Level of Education</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Major Group</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Result Division Class</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Marks</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Years of Passing</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Institute Name</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Company Name</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Company Business</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Designation</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Department</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Responsibility</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Company Location</h6>
                                                    <p class="text-muted"></p>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="buttons">
                                                    <a href="{{route('editAdminProfile')}}">
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </a>
                                                    <a
                                                        href="#"
                                                        onclick="event.preventDefault();document.getElementById('delete-to').submit();"
                                                    >
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>
</html>
