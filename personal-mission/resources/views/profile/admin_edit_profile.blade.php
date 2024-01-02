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
    <div class="item">
        <div class="container mt-5">
            <div class="card mt-5 mb-3">
                <div class="card-body">
                    <h3 class="text-uppercase text-center mb-5">Edit Your Info</h3>
                    <form method="POST" action="#">
                        @method('put')
                        @csrf
                        <div class="item p-2">
                            <p>Personal Information:</p>
                            <div class="name-item">
                                <input type="text" value="{{request()->full_name}}" name="full_name"
                                       placeholder="Full name"/>
                                <input type="hidden" name="id" value="{{request()->id}}">
                            </div>
                            <div class="name-item mt-2">
                                <input type="text" value="{{request()->father_name}}" name="father_name"
                                       placeholder="Father's Name"/>
                                <input type="hidden" name="id" value="{{request()->id}}">
                            </div>
                            <div class="name-item mt-2">
                                <input type="text" value="{{request()->mother_name}}" name="mother_name"
                                       placeholder="Mother's Name"/>
                                <input type="hidden" name="id" value="{{request()->id}}">
                            </div>
                            <div class="item mt-3">
                                <p>Date of birth:</p>
                                <div class="item">
                                    <input type="date" value="{{request()->date_of_birth}}" name="date_of_birth"
                                           required/>
                                    <input type="hidden" name="id" value="{{request()->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <p>About Me :</p>
                            <textarea type="text" value="{{request()->about_me}}" name="about_me" rows="5"></textarea>
                        </div>
                        <div class="item">
                            <p>Address:</p>
                            <input type="text" value="{{request()->present_address}}" name="present_address"
                                   placeholder="Present address"/>
                            <div class="city-item">
                                <input type="text" value="{{request()->city}}" name="city" placeholder="City"/>
                                <input type="text" value="{{request()->region}}" name="region" placeholder="Region"/>
                                <input type="number" value="{{request()->zip_code}}" name="zip_code"
                                       placeholder="Postal / Zip code"/>
                                <input type="text" value="{{request()->country}}" name="country" placeholder="Country"/>
                            </div>
                        </div>
                        <div class="item mt-3">
                            <p>Contact:</p>
                            <input type="email" value="{{request()->email}}" name="email"
                                   placeholder="type your email"/>
                            <input type="text" value="{{request()->social_link}}" name="social_link"
                                   placeholder="social link"/>
                            <div class="city-item">
                                <input type="number" value="{{request()->mobile_number}}" name="mobile_number"
                                       placeholder="Mobile number where you can be reached"/>
                                <input type="text" value="{{request()->emergency_contact}}" name="emergency_contact"
                                       placeholder="Emergency Contact"/>
                            </div>
                        </div>


                        <div class="item">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Education</p>
                                        <div class="city-item">
                                            <input type="text" value="{{request()->level_of_education}}"
                                                   name="level_of_education"
                                                   placeholder="Level of Education"/>
                                            <input type="text" value="{{request()->major_group}}" name="major_group"
                                                   placeholder="Concentration/ Major/Group"/>
                                            <input type="text" value="{{request()->result_division_class}}"
                                                   name="result_division_class"
                                                   placeholder="Result Division/Class"/>
                                            <input type="number" value="{{request()->marks}}" name="marks"
                                                   placeholder="Marks(%)"/>
                                            <input type="number" value="{{request()->years_of_passing}}"
                                                   name="years_of_passing"
                                                   placeholder="Year of Passing "/>
                                        </div>
                                        <input type="text" value="{{request()->institute_name}}" name="institute_name"
                                               placeholder="Institute Name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Experience</p>
                                        <input type="text" name="company_name" placeholder="Company Name"/>
                                        <div class="city-item">
                                            <input type="text" value="{{request()->company_business}}"
                                                   name="company_business" placeholder="Company Business"/>
                                            <input type="text" value="{{request()->designation}}" name="designation"
                                                   placeholder="Designation"/>
                                            <input type="text" value="{{request()->department}}" name="department"
                                                   placeholder="Department"/>
                                            <input type="text" value="{{request()->responsibility}}"
                                                   name="responsibility" placeholder="Responsibilities"/>
                                            <input type="text" value="{{request()->company_location}}"
                                                   name="company_location" placeholder="Company Location"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="container mt-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>Employment Period:</p>
                                                <div class="item">
                                                    <input type="date" value="{{request()->employment_period}}"
                                                           name="employment_period" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p>Highlights</p>
                                            <div class="item">
                                                <textarea value="{{request()->highlights}}" name="highlights"
                                                          placeholder="start with 1."
                                                          rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-block mb-2 mt-3">
                                            <button type="submit" name="add" class="text-bg-info p-3">UPDATE INFO
                                            </button>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>
