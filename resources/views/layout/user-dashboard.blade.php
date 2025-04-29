<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="NYFEW">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>NYFEW :: Dashboard</title>
<link rel="icon" href="{{asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
 <!-- Bootstrap Select Css -->
<link href="{{asset('dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />




<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('dashboard/assets/css/style.min.css')}}">
</head>

<body class="theme-blush">
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
            @if(auth()->user()->user_type == 1)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <i class="zmdi zmdi-account-add"></i>
                        <h6>Stage</h6>
                        <h2>
                            1                            
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Online Registration</strong>                            
                            &rarr; View                               
                        </small>
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
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Craft Video</strong>                            
                            &rarr; View                               
                        </small>
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
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Business Pitch</strong>                            
                            &rarr; View                               
                        </small>
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
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Final Audition</strong>                            
                            &rarr; View                               
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif(auth()->user()->user_type == 2)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <i class="zmdi zmdi-account-add"></i>
                        <h6>Stage</h6>
                        <h2>
                            1
                            @if(isset($stageStatuses[1]) && $stageStatuses[1]->status == 'Approved')
                                <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                            @else
                                <i class="zmdi zmdi-close-circle" style="color: red; font-size: 20px;"></i>
                            @endif
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Online Registration</strong>  
                            @if(auth()->user()->current_stage >= 1)
                            &rarr;  <a href="{{ route('stage1', ['id' => auth()->user()->id]) }}" class="text-primary" style="font-weight: 500;">
                                    Check Status
                                </a>
                            @endif
                        </small>
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
                            @if(isset($stageStatuses[2]) && $stageStatuses[2]->status == 'Approved')
                                <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                            @else
                                <i class="zmdi zmdi-close-circle" style="color: red; font-size: 20px;"></i>
                            @endif
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Craft Video</strong>  
                            @if(auth()->user()->current_stage >= 2)
                            &rarr;  <a href="{{ route('stage2', ['id' => auth()->user()->id]) }}" class="text-primary" style="font-weight: 500;">
                                    Check Status
                                </a>
                            @endif
                        </small>
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
                            @if(isset($stageStatuses[3]) && $stageStatuses[3]->status == 'Approved')
                                <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                            @else
                                <i class="zmdi zmdi-close-circle" style="color: red; font-size: 20px;"></i>
                            @endif
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Business Pitch</strong> 
                            @if(auth()->user()->current_stage >= 3)
                            &rarr; <a href="{{ route('stage3', ['id' => auth()->user()->id]) }}" class="text-primary" style="font-weight: 500;">
                                    Check Status
                                </a>
                            @endif
                        </small>
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
                            @if(isset($stageStatuses[4]) && $stageStatuses[4]->status == 'Approved')
                                <i class="zmdi zmdi-check-circle" style="color: gold; font-size: 20px;"></i>
                            @else
                                <i class="zmdi zmdi-close-circle" style="color: red; font-size: 20px;"></i>
                            @endif
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px;">
                            <strong>Final Audition</strong> 
                            @if(auth()->user()->current_stage >= 4)
                            &rarr;  <a href="{{ route('stage4', ['id' => auth()->user()->id]) }}" class="text-primary" style="font-weight: 500;">
                                    Check Status
                                </a>
                            @endif
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


                @if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
          @elseif(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
						@endif
            <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th style="width:50px;">Stage</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Date Registered</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stage1 as $d)
                                <tr>
                                    @if($d->status == 'Not Approved')
                                        <td>
                                        <a href="{{ route('user.edit', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-warning">
                                            Complete Stage 1
                                        </a>
                                        </td>
                                    @elseif($d->status == 'Approved')
                                        <td>
                                        <a href="{{ route('user.edit', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-warning">
                                            View
                                        </a>
                                        </td>
                                    @endif
                                    <td>{{ $d->stage }}</td>
                                    <td>{{ $d->comment }}</td>
                                    <td><span class="badge badge-info">{{ $d->status }}</span></td>
                                    <td>{{ $d->content ?? 'No content available' }}</td>
                                    <td>31 May 2025</td> 
                                    
                                    
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


<!-- Jquery Core Js --> 
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('dashboard/assets/bundles/jvectormap.bundle.js')}}"></script> 
<script src="{{asset('dashboard/assets/bundles/sparkline.bundle.js')}}"></script> 
<script src="{{asset('dashboard/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{asset('dashboard/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/index.js')}}"></script>
</body>

</html>
