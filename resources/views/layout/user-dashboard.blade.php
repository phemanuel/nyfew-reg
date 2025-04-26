<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>NYFEW :: Dashboard</title>
<link rel="icon" href="{{asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/morrisjs/morris.min.css')}}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('dashboard/assets/css/style.min.css')}}">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('dashboard/assets/images/favicon.png')}}" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>



@include('partials.navbar-left')

@include('partials.navbar-right-extend')

<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> #projectMakeMe</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <i class="zmdi zmdi-account-add"></i>
                            <h6>Stage</h6>
                            <h2>
                                1
                                @if(auth()->user()->current_stage == 1)
                                    <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                                @endif
                            </h2>
                            <small>Online Registration</small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <i class="zmdi zmdi-videocam"></i>
                            <h6>Stage</h6>
                            <h2>
                                2
                                @if(auth()->user()->current_stage == 2)
                                    <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                                @endif
                            </h2>
                            <small>Craft Video</small>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <i class="zmdi zmdi-case"></i>
                            <h6>Stage</h6>
                            <h2>
                                3
                                @if(auth()->user()->current_stage == 3)
                                    <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                                @endif
                            </h2>
                            <small>Business Pitch</small>
                            <div class="progress">
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <i class="zmdi zmdi-mic"></i>
                            <h6>Stage</h6>
                            <h2>
                                4
                                @if(auth()->user()->current_stage == 4)
                                    <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                                @endif
                            </h2>
                            <small>Final Audition</small>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            
            <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
    <thead>
        <tr>
            <th style="width:50px;">Stage</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Content</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($application as $d)
        <tr>
            <td>{{ $d->stage }}</td>
            <td>{{ $d->comment }}</td>
            <td><span class="badge badge-info">{{ $d->status }}</span></td>
            <td>{{ $d->content ?? 'No content available' }}</td>
            <td>25 Dec 2019</td> 
            @if($d->status == 'Not Approved')
                <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#stage1Modal" data-user-id="{{ auth()->user()->id }}">
                        Complete Stage 1
                    </button>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</section>

<div class="modal fade" id="stage1Modal" tabindex="-1" role="dialog" aria-labelledby="stage1ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stage1ModalLabel">Stage 1 Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="stage1Form" method="POST" action="{{ route('user.updateStage1') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" id="user_id">

    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <div class="container-fluid">
            <!-- Row 1: Surname, First Name, Other Name -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-4">
                    <label for="other_name" class="form-label">Other Name</label>
                    <input type="text" class="form-control" id="other_name" name="other_name" required>
                </div>
            </div>

            <!-- Row 2: Address -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>

            <!-- Row 3: Mobile No, Alternative Mobile No -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mobile_no" class="form-label">Mobile No</label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
                </div>
                <div class="col-md-6">
                    <label for="mobile_no1" class="form-label">WhatsApp No</label>
                    <input type="text" class="form-control" id="mobile_no1" name="mobile_no1" required>
                </div>
            </div>

            <!-- Row 4: Gender, Date of Birth -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
            </div>
            

            <!-- Row 5: Interest, Occupation -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="interest" class="form-label">Interest</label>
                    <input type="text" class="form-control" id="interest" name="interest">
                </div>
                <div class="col-md-6">
                    <label for="occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="occupation">
                </div>
            </div>

            <!-- Row 6: Instagram, Facebook, Snapchat, Twitter -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram">
                </div>
                <div class="col-md-6">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook">
                </div>                
            </div>

            <div class="row mb-3">               
                <div class="col-md-6">
                    <label for="snapchat" class="form-label">Snapchat</label>
                    <input type="text" class="form-control" id="snapchat" name="snapchat">
                </div>
                <div class="col-md-6">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter">
                </div>
            </div>

            <!-- Row 7: Question 1, Question 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="qst1" class="form-label">Question 1</label>
                    <input type="text" class="form-control" id="qst1" name="qst1">
                </div>
                <div class="col-md-6">
                    <label for="qst2" class="form-label">Question 2</label>
                    <input type="text" class="form-control" id="qst2" name="qst2">
                </div>
            </div>

            <!-- Row 8: If Yes to Question 2, Question 3 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="if_yes_qst2" class="form-label">If Yes to Question 2</label>
                    <input type="text" class="form-control" id="if_yes_qst2" name="if_yes_qst2">
                </div>
                <div class="col-md-6">
                    <label for="qst3" class="form-label">Question 3</label>
                    <input type="text" class="form-control" id="qst3" name="qst3">
                </div>
            </div>

            <!-- Row 9: Profile Image -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>


        </div>
    </div>
</div>



<!-- Jquery Core Js --> 
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('dashboard/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{asset('dashboard/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/index.js')}}"></script>
<!-- <script src="{{asset('dashboard/assets/js/pages/forms/basic-form-elements.js')}}"></script> -->
</body>


</html>
<script>
    $('#stage1Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var userId = button.data('user-id'); // Extract info from data-* attributes

    var modal = $(this);
    modal.find('.modal-body #user_id').val(userId);

    // Fetch user data and populate the form fields
    $.ajax({
        url: '/user/application/stage1/' + userId + '/edit',
        method: 'GET',
        success: function(data) {
            modal.find('.modal-body #first_name').val(data.first_name);
            // Populate other fields as needed
        }
    });
});

</script>