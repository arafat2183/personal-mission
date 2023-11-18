<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
    @include('bootstrap_cdn.css')
</head>
</head>
<body>
<div class="container">
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('user_login')}}">Admin Profile</a>
            @if(isset($all_data[1]['personal_mission']) && $all_data[1]['personal_mission'] != null)
                <div class="text-center">
                    <button type="button" hidden="" class="btn btn-success">
                        <a href="{{route('personalMissionUser')}}" class="navbar-brand inline_block font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Write This Month's Personal Mission</a>
                    </button>
                </div>
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
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="pl-2">
                                @php($xValues = [])
                                @php($yValues = [])
                                @foreach($usersWithMissions as $usersDataWithMissions)
                                    @php(array_push($xValues, $usersDataWithMissions->first_name))
                                    @php(array_push($yValues, $usersDataWithMissions->mission_complete))
                                @endforeach
                                <canvas id="myChart" style="width:100%;max-width:1000px;margin-left: 10px"></canvas>

                                <script>
                                    var xValues = JSON.parse('<?= json_encode($xValues); ?>');
                                    var yValues = JSON.parse('<?= json_encode($yValues); ?>');
                                    var barColors = [
                                        "rgba(255, 26, 104, 1)",
                                        "rgba(54, 162, 235, 1)",
                                        "rgba(255, 206, 86, 1)",
                                        "rgba(75, 192, 192, 1)",
                                        "rgba(153, 102, 255, 1)",
                                    ];

                                    new Chart("myChart", {
                                        type: "pie",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                backgroundColor: barColors,
                                                data: yValues
                                            }]
                                        },
                                        options: {
                                            legend: {display: true},
                                            title: {
                                                display: true,
                                                text: "This Month's Monthly Mission Report"
                                            },
                                            layout: {
                                                padding: 26
                                            },
                                            plugins: {
                                              labels: {
                                                  render: 'label',
                                                  fontStyle: 'bolder',
                                                  position: 'outside',
                                              }
                                            },
                                        },
                                        plugins: [ChartDataLabels]
                                    });
                                </script>
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
