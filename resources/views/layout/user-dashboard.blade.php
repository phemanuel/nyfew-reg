<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="NYFEW">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>NYFEW :: Dashboard</title>
<!-- Bootstrap Select Css -->
<link href="{{asset('dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link rel="icon" href="{{asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('dashboard/assets/css/style.min.css')}}">

<!-- Bootstrap CSS -->
<style>
    .btn-deep-gold {
    background-color: #C7A100;
    color: white;
    border: none;
}

.btn-deep-gold:hover {
    background-color: #B68A00; /* Slightly darker for hover effect */
    color: white;
}
</style>


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
            @if(auth()->user()->user_type == 1)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <i class="zmdi zmdi-account-add"></i>
                        <h6>Stage</h6>
                        <h2>
                            1                            
                        </h2>
                        <small class="d-block text-muted mb-2" style="font-size: 12px; color: #6c757d;">
                            <strong style="font-size: 14px; color: #333;">Online Registration</strong>                            
                            &rarr; <span style="font-weight: bold; color: #007bff;">{{$stage1Count}}</span>                             
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="{{$stage1Count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stage1Count * 10 }}%;"></div>
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
                        <small class="d-block text-muted mb-2" style="font-size: 12px; color: #6c757d;">
                            <strong style="font-size: 14px; color: #333;">Craft Video</strong>                            
                            &rarr; <span style="font-weight: bold; color: #007bff;">{{$stage2Count}}</span>                             
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="{{$stage2Count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stage2Count * 10 }}%;"></div>
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
                        <small class="d-block text-muted mb-2" style="font-size: 12px; color: #6c757d;">
                            <strong style="font-size: 14px; color: #333;">Business Pitch</strong>                            
                            &rarr; <span style="font-weight: bold; color: #007bff;">{{$stage3Count}}</span>                             
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="{{$stage3Count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stage3Count * 10 }}%;"></div>
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
                        <small class="d-block text-muted mb-2" style="font-size: 12px; color: #6c757d;">
                            <strong style="font-size: 14px; color: #333;">Final Audition</strong>                            
                            &rarr; <span style="font-weight: bold; color: #007bff;">{{$stage4Count}}</span>                             
                        </small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{$stage4Count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stage4Count * 10 }}%;"></div>
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
                
            <div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card project_list">
                <div class="table-responsive">

                    @if(auth()->user()->user_type == 1)
                        <div class="d-flex align-items-end mb-3 gap-2">
                            <div class="form-group">
                                <label for="stageSelect">Select Application Stage:</label>
                                <select id="stageSelect" class="form-control">
                                    <option value="1" selected>Stage 1</option>
                                    <option value="2">Stage 2</option>
                                    <option value="3">Stage 3</option>
                                    <option value="4">Stage 4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button onclick="exportAllStageData()" class="btn btn-success d-block"><i class="fa fa-download me-1"></i> Export All</button>
                            </div>
                        </div>

                        <div id="stageTable">
                            @include('partials.stage-table', ['applications' => $stage1])
                        </div>
                    @endif

                    @if(auth()->user()->user_type == 2)
                    <table class="table table-hover c_table theme-color">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th style="width:50px;">Stage</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Content</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($application as $d)
                                <tr>
                                    <td>
                                        @if($d->stage == 1)
                                            <!-- Stage 1 - Only models should update or view -->
                                            @if($d->status == 'Not Approved')
                                                <a href="{{ route('stage1', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold">Update</a>
                                            @elseif($d->status == 'Approved')
                                                <a href="{{ route('stage1', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold" data-bs-toggle="modal" data-bs-target="#viewVideoModal">View</a>
                                            @endif
                                        @elseif($d->stage == 2)
                                            <!-- Stage 2 - Video upload actions -->
                                            @if($d->status == 'Not Approved')
                                                <a href="{{ route('stage2', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold">Update</a>
                                            @elseif($d->status == 'Pending Review')
                                                <span class="btn btn-sm btn-danger disabled">Under Review</span>
                                            @elseif($d->status == 'Reviewed')
                                                <a href="{{ route('stage2', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold">Re-Upload</a>
                                            @elseif($d->status == 'Approved')
                                                <button type="button" class="btn btn-sm btn-deep-gold stage-action-btn" data-toggle="modal" data-target="#viewVideoModal">View</button>
                                            @endif
                                        @elseif($d->stage == 3)
                                            <!-- Stage 3 - Business Pitch actions -->
                                            @if($d->status == 'Not Approved')
                                                <a href="{{ route('stage3', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold">Update</a>
                                            @elseif($d->status == 'Pending Review')
                                                <span class="btn btn-sm btn-danger disabled">Under Review</span>
                                            @elseif($d->status == 'Reviewed')
                                                <a href="{{ route('stage3', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-deep-gold">Re-Upload</a>
                                            @elseif($d->status == 'Approved')
                                            <button type="button" class="btn btn-sm btn-deep-gold stage-action-btn" data-toggle="modal" data-target="#viewVideoModal">View</button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $d->stage }}</td>
                                    <td>{{ $d->comment }}</td>
                                    <td><span class="badge badge-info">{{ $d->status }}</span></td>
                                    <td>{{ $d->content ?? 'No content available' }}</td>

                                    @if($d->stage == 1)
                                        <td>{{ \Carbon\Carbon::parse($d->due_date ?? '2025-05-31')->format('d M Y') }}</td>
                                    @elseif($d->stage == 2)
                                        <td>{{ \Carbon\Carbon::parse($d->due_date ?? '2025-07-13')->format('d M Y') }}</td>
                                    @elseif($d->stage == 3)
                                        <td>{{ \Carbon\Carbon::parse($d->due_date ?? '2025-08-16')->format('d M Y') }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endif

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


@if(auth()->user()->user_type == 2)
<!-- Modal to View the Video -->
<div class="modal fade" id="viewVideoModal" tabindex="-1" aria-labelledby="viewVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width"">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="userModalLabel{{ $d->id }}">Craft Video</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
            <div class="modal-body">
                <video width="100%" controls>
                    <source src="{{ url('video/' . $d->content) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>
@else

@endif


<!-- Jquery Core Js --> 
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 

<!-- jQuery first -->
<script src="{{ asset('dashboard/assets/bundles/libscripts.bundle.js') }}"></script>


<!-- Vendor scripts (like dropdowns, slimscroll, etc) -->
<script src="{{ asset('dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script>

<!-- Any plugin bundles -->
<script src="{{ asset('dashboard/assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/sparkline.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/c3.bundle.js') }}"></script>

<!-- Main scripts -->
<script src="{{ asset('dashboard/assets/bundles/mainscripts.bundle.js') }}"></script>

<!-- Page-specific scripts -->
<script src="{{ asset('dashboard/assets/js/pages/index.js') }}"></script>

</body>

</html>

{{-- Modals for each user --}}
        @foreach($stage1 as $d)
            @if($d->stage == 1)
                <!-- Modal for Stage 1 -->
                <div class="modal fade" id="userModal{{ $d->stage }}_{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $d->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="userModalLabel{{ $d->id }}">User Details</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                @php
                    $userImage = $d->user->image ?? 'blank.png';
                    $imagePath = $userImage && file_exists(public_path('uploads/' . $userImage))
                        ? asset('public/uploads/' . $userImage)
                        : asset('public/uploads/blank.png');
                @endphp
                            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                <div class="text-center mb-4">
                                    <img src="{{ $imagePath }}"
                                             class="rounded-circle shadow"
                                             style="width: 120px; height: 120px; object-fit: cover;"
                                             alt="Profile Image">
                                    
                                    <h5 class="mt-3">{{ $d->user->surname ?? 'N/A' }} {{ $d->user->first_name ?? '' }} {{ $d->user->other_name ?? '' }}</h5>
                                </div>

                                <table class="table table-bordered table-striped">
                                    <tr><th>Current Stage:</th><td>{{ $d->user->current_stage ?? '1' }}</td></tr>
                                    <tr><th>Email:</th><td>{{ $d->user->email ?? 'N/A' }}</td></tr>
                                    <tr><th>Mobile No:</th><td>{{ $d->user->mobile_no ?? 'N/A' }}</td></tr>
                                    <tr><th>WhatsApp No:</th><td>{{ $d->user->mobile_no1 ?? 'N/A' }}</td></tr>
                                    <tr><th>Gender:</th><td>{{ $d->user->gender ?? 'N/A' }}</td></tr>
                                    <tr><th>Date of Birth:</th><td>{{ $d->user->dob ?? 'N/A' }}</td></tr>
                                    <tr><th>Address:</th><td>{{ $d->user->address ?? 'N/A' }}</td></tr>
                                    <tr><th>Occupation:</th><td>{{ $d->user->occupation ?? 'N/A' }}</td></tr>
                                    <tr><th>Instagram:</th><td>{{ $d->user->instagram ?? 'N/A' }}</td></tr>
                                    <tr><th>Facebook:</th><td>{{ $d->user->facebook ?? 'N/A' }}</td></tr>
                                    <tr><th>Snapchat:</th><td>{{ $d->user->snapchat ?? 'N/A' }}</td></tr>
                                    <tr><th>Twitter:</th><td>{{ $d->user->twitter ?? 'N/A' }}</td></tr>
                                    <tr><th>Field of Interest:</th><td>{{ $d->user->interest ?? 'N/A' }}</td></tr>
                                    <tr><th>Knowledge level:</th><td>{{ $d->user->qst1 ?? 'N/A' }}</td></tr>
                                    <tr><th>Do you have professional experience as a <strong>Fashion Illustrator</strong>?:</th><td>{{ $d->user->interest_fashion ?? 'N/A' }}</td></tr>
                                    <tr><th>Do you have knowledge of any other profession?</th><td>{{ $d->user->qst2 ?? 'N/A' }}</td></tr>
                                    <tr><th>If Yes, state the profession:</th><td>{{ $d->user->if_yes_qst2 ?? 'N/A' }}</td></tr>
                                   <tr>
                                        <th>Reg Date:</th>
                                        <td>
                                            {{ $d->user && $d->user->reg_date ? \Carbon\Carbon::parse($d->user->reg_date)->format('F j, Y') : 'N/A' }}
                                        </td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($d->stage == 2)
                <!-- Modal for Stage 2 (Video) -->
                <div class="modal fade" id="userModal{{ $d->stage }}_{{ $d->id }}" tabindex="-1" aria-labelledby="viewVideoModalLabel{{ $d->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <form id="reviewForm_{{ $d->id }}">
                            @csrf
                            <input type="hidden" name="user_stage_id" value="{{ $d->id }}">

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="viewVideoModalLabel{{ $d->id }}">Craft Video Review</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                <video width="100%" controls class="mb-3">
                                    <source src="{{ url('public/video/' . $d->content) }}" type="video/mp4">
                                </video>

                                <div class="form-group">
                                    <label for="comment_{{ $d->id }}">Comment</label>
                                    <textarea name="comment" id="comment_{{ $d->id }}" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status_{{ $d->id }}">Review Status</label>
                                    <select name="status" id="status_{{ $d->id }}" class="form-control" required>
                                        <option value="">Select status</option>
                                        <option value="Not Approved">Not Approved</option>
                                        <option value="Reviewed">Reviewed</option>
                                        <option value="Approved">Approved</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="submitReview({{ $d->id }})">Review</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach

<script>
    function fetchStageData(stage, page = 1) {
        $.ajax({
            url: "{{ url('fetch-stage-data') }}/" + stage + "?page=" + page,
            type: 'GET',
            beforeSend: function () {
                $('#stageTable').html('<div class="text-center my-3">Loading...</div>');
            },
            success: function (response) {
                $('#stageTable').html(response.html);
            },
            error: function () {
                $('#stageTable').html('<div class="text-danger">Error loading data.</div>');
            }
        });
    }

    // Load data when stage is changed
    $('#stageSelect').on('change', function () {
        const stage = $(this).val();
        fetchStageData(stage);
    });

    // Delegate click events for pagination links
    $(document).on('click', '#stageTable .pagination a', function (e) {
        e.preventDefault();
        const stage = $('#stageSelect').val();
        const page = $(this).attr('href').split('page=')[1];
        fetchStageData(stage, page);
    });
</script>

<script>
    function exportAllStageData() {
    const stage = document.getElementById('stageSelect').value;
    window.location.href = `/export-stage-data/${stage}`;
}
</script>




