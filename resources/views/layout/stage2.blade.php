<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NYFEW :: Stage 1 Update</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="icon" href="{{asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('form1/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="main">

        <section class="signup">
               <div class="container" style="margin-top: 5px; margin-bottom: 5px; max-width:400;">
                <div class="signup-content">
                   <!-- Header with Deep Gold Background and Icon -->
<div class="form-header" style="background-color: #b58900; padding: 20px; text-align: center; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- Icon -->
    <i class="fa fa-edit" style="font-size: 24px; margin-right: 15px; color: white;"></i> 
    <!-- Title -->
    <h4 style="margin: 0; font-weight: bold; color: white; font-family: 'Arial', sans-serif;">Craft Video Upload</h4> 
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
        <hr>
                <form id="updateForm"  method="POST" action="{{ route('user.updateStage2', ['id' => auth()->user()->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')    
    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <div class="container-fluid">
            <!-- Important Note -->
            <div class="card-body">           

            <p>Dear <strong>{{ auth()->user()->first_name ?? 'Participant' }}</strong>,</p>

            <p>
                As part of your application process, you're required to upload a <strong>Craft Video</strong> that demonstrates your talent and area of expertise.
                Please follow the guidelines below carefully:
            </p>

            <hr>

            <h5 class="text-primary">🛠️ For Creatives (Fashion Designing, Photography, Shoe Making, Hair Styling and Makeup Artistry.):</h5>
            <ul>
                <li>Record a <strong>video showing how you make a product</strong> from <em>start to finish</em>.</li>
                <li>Show your <strong>skills, creativity, and entire process</strong>.</li>
                <li>This is your opportunity to showcase your craft and stand out!</li>
            </ul>

            <h5 class="text-primary mt-4">💃 For Models Only:</h5>
            <ul>
                <li>Upload a <strong>catwalk video</strong> that highlights your poise, confidence, and presentation skills.</li>
            </ul>

            <hr>

            <h5 class="text-success">📲 Social Media Requirement:</h5>
            <ul>
                <li>Post your video on <strong>all your social media platforms</strong>.</li>
                <li>Tag us using the following handles:
                    <ul>
                        <li>📘 Facebook: <a href="https://facebook.com/nyfewofficial" target="_blank">@nyfewofficial</a></li>
                        <li>🐦 Twitter: <a href="https://twitter.com/nyfewofficial" target="_blank">@nyfewofficial</a></li>
                        <li>📸 Instagram: <a href="https://instagram.com/nyfewofficial" target="_blank">@nyfewofficial</a></li>
                    </ul>
                </li>
            </ul>

            <p class="mt-4">
                This step is crucial for your application. Be bold, be authentic, and let your talent shine through!
            </p>

            <p class="text-muted">If you have any questions, feel free to reach out to our support team.</p>
        </div>

            <!-- Email -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email Address</label>
                    <strong>
                        <p>
                            <a href="mailto:projectmakeme@nyfew.com.ng" class="text-decoration-none text-primary">
                                projectmakeme@nyfew.com.ng
                            </a>
                        </p>
                    </strong> 
                </div>
            </div>

            <!-- Video File -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="videoFile" class="form-label">Craft Video (Maximum of 50mb)</label>
                    <input type="file" class="form-control" id="videoFile" name="videoFile" >
                    @error('videoFile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>&nbsp;
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>

                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('form1/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('form1/js/main.js')}}"></script>
</body>
</html>

