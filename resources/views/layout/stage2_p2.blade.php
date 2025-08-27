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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
    .container {
      display: flex;
      width: 1000px;
      border: 0px solid #ddd;
    }

    /* Tabs (on the left side) */
    .tab-buttons {
      display: flex;
      flex-direction: column;
      width: 150px;
      background: #f4f4f4;
      border-right: 1px solid #ddd;
    }

    .tab-buttons button {
      padding: 15px;
      border: none;
      background: none;
      text-align: left;
      cursor: pointer;
      font-size: 16px;
      border-bottom: 1px solid #ddd;
    }

    .tab-buttons button.active {
      background: #ddd;
      font-weight: bold;
    }

    /* Tab content */
    .tab-content {
      flex: 1;
      padding: 20px;
      display: none;
    }

    .tab-content.active {
      display: block;
    }
  </style>
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
               <div class="container">
  <!-- Left side buttons -->
<div class="tab-buttons" style="display: flex; flex-direction: column; gap: 10px;">

  <button class="tab-btn active" data-tab="tab1" 
    style="padding: 12px 20px; 
           border: none; 
           border-radius: 8px; 
           background: linear-gradient(135deg, #facc15, #f59e0b); 
           color: #fff; 
           font-weight: bold; 
           cursor: pointer; 
           box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
           transition: all 0.3s ease;">
    Phase 2
  </button> 

</div>

  <!-- Right side content -->


  <!-- Phase 2 -->
  <div class="tab-content active" id="tab1">
    <h3>UNVEILING THE CRAFT</h3>
    <p>   
    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <div class="container-fluid">
            <!-- Important Note -->
            <div class="card-body">           

            <p style="color: black;">
                Dear <strong>{{ auth()->user()?->first_name . ' ' . auth()->user()?->surname ?? 'Participant' }}</strong>,
            </p>

            <p style="color: black;">
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
                <li>Tag us on all our socials using the following handles:
                    <ul>
                        <li><i class="fab fa-facebook"></i> Facebook: 
                            <a href="https://facebook.com/nyfewofficial" target="_blank">@nyfewofficial</a>
                        </li>
                        <li><i class="fab fa-twitter"></i> Twitter: 
                            <a href="https://twitter.com/nyfewofficial" target="_blank">@nyfewofficial</a>
                        </li>
                        <li><i class="fab fa-instagram"></i> Instagram: 
                            <a href="https://instagram.com/nyfewofficial" target="_blank">@nyfewofficial</a>
                        </li>
                        <li><i class="fab fa-snapchat"></i> Snapchat: 
                            <a href="https://snapchat.com/nyfewofficial" target="_blank">@nyfewofficial</a>
                        </li>
                        <li><i class="fab fa-tiktok"></i> TikTok: 
                            <a href="https://tiktok.com/nyfewofficial" target="_blank">@nyfewofficial</a>
                        </li>
                    </ul>

                </li>
            </ul>

            <p class="mt-4" style="color: black;">
                This step is crucial for your application. Be bold, be authentic, and let your talent shine through!
            </p>

            <p style="color: black;">If you have any questions, feel free to reach out to our support team. | <a href="mailto:projectmakeme@nyfew.com.ng" class="text-decoration-none text-primary">
                                projectmakeme@nyfew.com.ng
                            </a></p>
        </div>

            
            <!-- Form           -->
<div id ="UploadVideoForm"class="card shadow-lg border-0 rounded-3 p-4 mb-4">
    <div class="modal-header">
        <h5 class="modal-title fw-bold" id="option1ModalLabel">
          <i class="fa-solid fa-upload text-primary me-2"></i> Submit Your Links and Video
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="submitVideoForm" action="{{ route('user.updateStage2-p2', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="modal-body">
          
          <!-- Video Links -->           

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="fbLink" class="form-label">Facebook Post Link</label>
              <input type="text" class="form-control" id="fbLink" name="fbLink">
              @error('fbLink') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
              <label for="twLink" class="form-label">Twitter Post Link</label>
              <input type="text" class="form-control" id="twLink" name="twLink">
              @error('twLink') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="inLink" class="form-label">Instagram Post Link</label>
              <input type="text" class="form-control" id="inLink" name="inLink">
              @error('inLink') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
              <label for="ttLink" class="form-label">TikTok Post Link</label>
              <input type="text" class="form-control" id="ttLink" name="ttLink">
              @error('ttLink') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
          </div>

          <!-- Video File -->
          <div class="mb-3">
            <label for="videoFile" class="form-label">Upload Your Video</label>
            <input type="file" class="form-control" id="videoFile" name="videoFile" accept="video/*" required>
            <small class="text-muted">Max file size: 20MB</small>
            <div id="fileError" class="text-danger mt-1" style="display:none;"></div>
        </div>       

        </div>
        <div class="modal-footer">
         <!-- Back to Top button (scrolls to uploadVideoForm) -->
            <!-- <button type="button" class="btn btn-secondary" onclick="document.getElementById('UploadVideoForm').scrollIntoView({behavior: 'smooth'})">
                <i class="fa-solid fa-arrow-up me-1"></i> Back to Top
            </button> -->
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane me-1"></i> Submit
          </button>
        </div>
       
      </form>
</div>
    <!-- Form end -->

        </div>
    </div>

    <br>

    <div class="modal-footer">
    <button type="button" class="btn btn-danger waves-effect" onclick="window.location.href='{{ route('user-dashboard') }}'">Close</button>&nbsp;
        <!-- <button type="submit" class="btn btn-primary">Save Changes</button> -->
    </div>
</p>
<!-- Phase 2 end -->
  </div>
</div>
                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('form1/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('form1/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>

<script>
  const buttons = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      // Remove active state
      buttons.forEach(btn => btn.classList.remove('active'));
      contents.forEach(content => content.classList.remove('active'));

      // Add active state to clicked tab
      button.classList.add('active');
      document.getElementById(button.dataset.tab).classList.add('active');
    });
  });
</script>

<script>
document.getElementById("submitVideoForm").addEventListener("submit", function(event) {
    const fileInput = document.getElementById("videoFile");
    const file = fileInput.files.length > 0 ? fileInput.files[0] : null;
    const maxSize = 20 * 1024 * 1024; 

    const errorDiv = document.getElementById("fileError");
    errorDiv.style.display = "none";
    errorDiv.innerText = "";

    console.log(fileInput.files);
    if (!file) {
        errorDiv.innerText = "Please upload a video before submitting.";
        errorDiv.style.display = "block";
        event.preventDefault();
        return;
    }

    if (file.size > maxSize) {
        errorDiv.innerText = "Your video exceeds the 20MB limit. Please upload a smaller file.";
        errorDiv.style.display = "block";
        event.preventDefault();
    }
});
</script>

<script>
document.getElementById("checkFile").addEventListener("click", () => {
  const videoInput = document.getElementById("videoFile");
  console.log(videoInput.files);
  if (videoInput.files.length > 0) {
    alert("File chosen: " + videoInput.files[0].name + 
          " (" + Math.round(videoInput.files[0].size / 1024 / 1024) + " MB)");
  } else {
    alert("No file chosen!");
  }
});
</script>

<script>
  document.getElementById("scrollToFormBtn").addEventListener("click", function() {
    document.getElementById("UploadVideoForm").scrollIntoView({ behavior: "smooth" });
  });
</script>
