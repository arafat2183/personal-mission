<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write your Info</title>
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
    </div>
    <div class="container mt-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-basic-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Basic</button>
                <button class="nav-link" id="nav-education-tab" data-bs-toggle="tab" data-bs-target="#nav-education" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Education</button>
                <button class="nav-link" id="nav-skills-tab" data-bs-toggle="tab" data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Skills</button>
                <button class="nav-link" id="nav-certifications-tab" data-bs-toggle="tab" data-bs-target="#nav-certifications" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Certifications</button>
                <button class="nav-link" id="nav-experience-tab" data-bs-toggle="tab" data-bs-target="#nav-experience" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Experience</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact Information</button>
                <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Address</button>
                <button class="nav-link" id="nav-language-tab" data-bs-toggle="tab" data-bs-target="#nav-language" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Language</button>
                <button class="nav-link" id="nav-references-tab" data-bs-toggle="tab" data-bs-target="#nav-references" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">References</button>
                <button class="nav-link" id="nav-extracurricular-tab" data-bs-toggle="tab" data-bs-target="#nav-extracurricular" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Extracurricular involvement</button>
                <button class="nav-link" id="nav-hobbies-tab" data-bs-toggle="tab" data-bs-target="#nav-hobbies" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Hobbies</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab" tabindex="0">
                <div class="container-fluid mt-3">
                    <section class="vh-100" style="background-color: #E3E4FA;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-lg-6 mb-4 mb-lg-0">
                                    <div class="card mb-3" style="border-radius: .5rem;">
                                        <form method="POST" action="{{route('basicInformationUpdate', request()->id)}}">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                                        <div class="container d-flex justify-content-center">
                                                            <div class="buttons">
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab" tabindex="0">
                <div id="container">
                    <button id="newsectionbtn">+New Section</button>
                    <section id="mainsection">
                        <table>
                            <thead>
                            <tr>
                                <th>Field 1</th>
                                <th>Field 2</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" name="f1" /></td>
                                <td><input type="text" name="f2" /></td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab" tabindex="0">test Skills</div>
            <div class="tab-pane fade" id="nav-certifications" role="tabpanel" aria-labelledby="nav-certifications-tab" tabindex="0">test Certifications</div>
            <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab" tabindex="0">test Experience</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">test Contact Information</div>
            <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab" tabindex="0">test Address</div>
            <div class="tab-pane fade" id="nav-language" role="tabpanel" aria-labelledby="nav-language-tab" tabindex="0">test Language</div>
            <div class="tab-pane fade" id="nav-references" role="tabpanel" aria-labelledby="nav-references-tab" tabindex="0">test References</div>
            <div class="tab-pane fade" id="nav-extracurricular" role="tabpanel" aria-labelledby="nav-extracurricular-tab" tabindex="0">test Extracurricular involvement</div>
            <div class="tab-pane fade" id="nav-hobbies" role="tabpanel" aria-labelledby="nav-hobbies-tab" tabindex="0">test Hobbies</div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('basic_info/basic_info.js') }}"></script>

</body>
</html>
