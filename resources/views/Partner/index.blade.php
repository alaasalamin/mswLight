<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MSW Partner Portal</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="/home">
                    MoonRepair

                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <?php

                $parnterName = explode(" ", $partner);
                $name = $parnterName[0];

            ?>
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Guten Tag, <span class="text-black fw-bold">{{$name}}</span></h1>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
                        <input type="text" class="form-control">
                    </div>
                </li>
                <li class="nav-item">
                    <form class="search-form" action="/search" method="post">
                        @csrf
                        <i class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Here" name="keyword" title="Search here">
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bell"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                        <a class="dropdown-item py-3">
                            <p class="mb-0 font-weight-medium float-left">Es gibt keine Benachrichtigungen</p>
                        </a>
                        <div class="dropdown-divider"></div>





                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">{{$companyName}}</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a class="nav-link" data-bs-toggle="collapse" href="#devices" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-cellphone-android menu-icon"></i>
                        <span class="menu-title">Geräte</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="devices">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item"> <a class="nav-link" href="/newDevice">Neues Gerät einschicken</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/myDevices">meine Geräte</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/RMA">RMA Geräte</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link" data-bs-toggle="collapse" href="#account" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Konto</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav flex-column sub-menu">
                            <li class=""><a href="/profile" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-information text-primary me-2"></i>Profile bearbeiten</a></li>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>abmelden</button>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Geräte</p>
                                                    <h3 class="rate-percentage">{{$devicesCount}}</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">Aktive Geräte</p>
                                                    <h3 class="rate-percentage">{{$activeDevices}}</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">Geschlossene Geräte</p>
                                                    <h3 class="rate-percentage">{{$closedDevices}}</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 d-flex flex-column">

                                            <div class="row flex-grow">
                                                <div class="col-12 grid-margin stretch-card">
                                                    <div class="card card-rounded">
                                                        <div class="card-body">
                                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                                <div>
                                                                    <h4 class="card-title card-title-dash">meine Geräte</h4>
                                                                    <p class="card-subtitle card-subtitle-dash">Sie haben {{$devicesCount}} Gerät/e
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <a href="/myDevices" class="btn btn-primary btn-lg text-white mb-0 me-0" >Alle Geräte</a>
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive  mt-1">
                                                                <table class="table select-table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Model</th>
                                                                        <th>Fehler</th>
                                                                        <th>Datum</th>
                                                                        <th>Preis</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    </thead>
                                                                    @if($devices->isNotEmpty())

                                                                        <thead>
                                                                        @foreach($devices as $device)
                                                                            <tr>
                                                                                <th>{{$device->model}}</th>
                                                                                <th>{{$device->error}}</th>
                                                                                <th>{{$device->created_at}}</th>
                                                                                <th>{{$device->price}}€</th>
                                                                                <?php
                                                                                    $status = $device->status;
                                                                                    if($status == "sent"){
                                                                                        echo "<th>Unterwegs</th>";
                                                                                    }elseif($status == "finished"){
                                                                                        echo "<th>Fertig</th>";
                                                                                    }else{
                                                                                        echo "<th>Ausstehend</th>";
                                                                                    }
                                                                                ?>
                                                                            </tr>
                                                                        @endforeach
                                                                        </thead>

                                                                    @else
                                                                        <div>
                                                                            <h2>Es gibt keine Geräte</h2>
                                                                        </div>
                                                                    @endif




                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row flex-grow">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                        </div>
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    </div>
    <div style="width: 500px; height: 400px; display: flex; align-items: center; justify-content: center; position: absolute; background: #fff; left: 35%; top: 25%; visibility: hidden" class="card" id="editTaskBox" >
        <a onclick="editBoxHide()" class="text-primary" style="position: absolute; right: 20px; top:10px;">Close</a>
        <form action="/adminPanel/editTask" method="post">
            @csrf
            <h1 class="text-center my-2">To-DO</h1>
            <input id="editBox" class="form-control" style="width: 400px;" placeholder="Task" name="message"/>
            <input id="editID" name="id" type="hidden"/>
            <button class="btn btn-primary my-2">Update</button>
        </form>
    </div>
    <div style="width: 500px; height: 400px; display: flex; align-items: center; justify-content: center; position: absolute; background: #fff; left: 35%; top: 25%; visibility: hidden;" class="card" id="newTaskBox" >

        <a onclick="boxHide()" class="text-primary" style="position: absolute; right: 20px; top:10px;">Close</a>
        <form action="/adminPanel/newTask" method="post">
            @csrf
            <h1 class="text-center my-2">To-DO</h1>
            <input class="form-control" style="width: 400px;" placeholder="Task" name="message" />

            <button class="btn btn-primary my-2">Submit</button>
        </form>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendors/progressbar.js/progressbar.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<script>
    function newTask(){
        document.getElementById("newTaskBox").style.visibility = "visible";
    }

    function boxHide(){

        document.getElementById("newTaskBox").style.visibility = "hidden";
    }

    function editBoxHide(){

        document.getElementById("editTaskBox").style.visibility = "hidden";
    }

    function editTodo(id, message){
        document.getElementById("editTaskBox").style.visibility = "visible";
        document.getElementById("editBox").value = message;
        document.getElementById("editID").value = id;
    }
</script>
<!-- End custom js for this page-->
</body>

</html>

