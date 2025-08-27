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
    <h4 style="margin: 0; font-weight: bold; color: white; font-family: 'Arial', sans-serif;">Story Telling Video Upload</h4> 
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
    Phase 1
  </button>  

</div>

  <!-- Right side content -->
   <!-- Phase 1 -->
  <div class="tab-content active" id="tab1">
    <h3>UNVEILING THE CREATIVES</h3>
    <p>        
    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <div class="container-fluid">
            <!-- Important Note -->
            <div class="card-body">           

            <p style="color: black;">
                Dear <strong>{{ auth()->user()?->first_name . ' ' . auth()->user()?->surname ?? 'Participant' }}</strong>,
            </p>

            <p style="color: black;">
              
                <div class="alert alert-info shadow-sm border-0 rounded-3 p-4 mb-4">
  <h5 class="fw-bold text-primary mb-2">
    <i class="fa-solid fa-info-circle me-2"></i> Instructions
  </h5>
  <p>
    Contestants must create a 60-second video that combines personal storytelling with a display of creativity or inspiration. 
                This ensures the audience sees not just what they can do, but who they are and why their story matters.
  </p>
  <p class="mb-2">
    <strong>Use the theme below , and let your video reflect its message.</strong>
  </p>
  <p class="mb-2">
    Once your video is ready, upload it on at least <strong>three social media platforms</strong> — 
    Facebook, X (Twitter), Instagram, and TikTok — and tag us <strong>@nyfewofficial</strong>.
  </p>
  <p class="mb-2">
    After posting, click on <span class="fw-bold text-primary">Submit Video</span> to upload a copy of your video along with the links to your posts.
  </p>
  <p class="mb-0 text-danger">
    <i class="fa-solid fa-triangle-exclamation me-1"></i> 
    Failure to follow these instructions may result in disqualification.
  </p>
   <p style="color: black;">If you have any questions, feel free to reach out to our support team. | <a href="mailto:projectmakeme@nyfew.com.ng" class="text-decoration-none text-primary">
                                support@nyfew.com.ng
                            </a></p>
   
<br>
  <!-- Button to trigger modal -->
    <button class="btn btn-sm btn-outline-primary" id="scrollToFormBtn">
  <i class="fa-solid fa-upload me-1"></i> Submit Video
</button>
</div>
 

            </p>

            <hr>
       <!-- Option 1 -->
<div class="card shadow-lg border-0 rounded-3 p-4 mb-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-bolt text-warning me-2 fs-4"></i>
      <h5 class="text-primary fw-bold mb-0">Theme: Day One Energy</h5>
    </div>
   
  </div>

  <p class="text-muted mb-3">
    <i class="fa-solid fa-bullseye text-danger me-2"></i>
    <strong>Focus:</strong> Share your backstory. Where you
started. What shaped you.
  </p>

  <ul class="list-unstyled ps-3">
    <li class="mb-2">
      <i class="fa-solid fa-map-marker-alt text-success me-2"></i>
      Talk about where you are from and the environment that shaped you.
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-child text-info me-2"></i>
      Highlight a defining childhood memory, family influence, or turning point.
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-lightbulb text-warning me-2"></i>
      Share the moment that made you realize your passion or dream.
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-heart text-danger me-2"></i>
      Keep it raw and authentic.
    </li>
  </ul>

  <div class="mt-3">
    <i class="fa-solid fa-hashtag text-primary me-2"></i>
    <strong>Hashtags:</strong>
    <span class="badge bg-light text-dark me-1">#ProjectMakeMe</span>
    <span class="badge bg-light text-dark me-1"> #Unveilingthecreatives</span>
    <span class="badge bg-light text-dark me-1">#NYFEW</span>
  </div>
</div>
<!-- Option 1 end -->
            <hr>

            <!-- Option 2 -->
<!-- <div class="card shadow-lg border-0 rounded-3 p-4 mb-4">
  <div class="d-flex align-items-center mb-3">
    <i class="fa-solid fa-road text-dark me-2 fs-4"></i>
    <h5 class="text-primary fw-bold mb-0">Option 2: “Street No Break Me”</h5>
  </div>

  <p class="text-muted mb-3">
    <i class="fa-solid fa-bullseye text-danger me-2"></i>
    <strong>Focus:</strong> Demonstrating resilience and how you turned challenges into opportunities.
  </p>

  <ul class="list-unstyled ps-3">
    <li class="mb-2">
      <i class="fa-solid fa-mountain text-secondary me-2"></i>
      Identify one major challenge you faced (e.g., financial struggles, rejection, self-doubt, personal loss).
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-hand-holding-heart text-success me-2"></i>
      Share how you overcame it and what it taught you.
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-sun text-warning me-2"></i>
      End with a positive note: the strength, lesson, or mindset you gained.
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-users text-primary me-2"></i>
      Make the audience feel motivated by your survival and growth.
    </li>
  </ul>

  <div class="mt-3">
    <i class="fa-solid fa-hashtag text-primary me-2"></i>
    <strong>Hashtags:</strong>
    <span class="badge bg-light text-dark me-1">#Streetnobreakme</span>
    <span class="badge bg-light text-dark me-1">#ResilientDreamer</span>
    <span class="badge bg-light text-dark me-1">#NYFEWProjectMakeMe</span>
    <span class="badge bg-light text-dark">#InspiringStories</span>
  </div>
</div> -->

            <!-- Option 2 end -->
            <!-- <hr> -->
<!-- Option 3 -->
<!-- <div class="card shadow-lg border-0 rounded-3 p-4 mb-4">
  <div class="d-flex align-items-center mb-3">
    <i class="fa-solid fa-hourglass-half text-info me-2 fs-4"></i>
    <h5 class="text-primary fw-bold mb-0">Option 3: “Future Me Loading”</h5>
  </div>

  <p class="text-muted mb-3">
    <i class="fa-solid fa-bullseye text-danger me-2"></i>
    <strong>Focus:</strong> Paint a picture of your future and why it matters.
  </p>

  <ul class="list-unstyled ps-3">
    <li class="mb-2">
      <i class="fa-solid fa-rocket text-warning me-2"></i>
      Describe the dream you are chasing (career, impact, personal growth).
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-people-group text-success me-2"></i>
      Explain why this dream is important, not just to you, but to others (community, family, society).
    </li>
    <li class="mb-2">
      <i class="fa-solid fa-book-open text-primary me-2"></i>
      Use storytelling + passion: speak as though you already believe it will happen.
    </li>
  </ul>

  <div class="mt-3">
    <i class="fa-solid fa-hashtag text-primary me-2"></i>
    <strong>Hashtags:</strong>
    <span class="badge bg-light text-dark me-1">#Futuremeloading</span>
    <span class="badge bg-light text-dark me-1">#NYFEWProjectMakeMe</span>
    <span class="badge bg-light text-dark">#InspiringStories</span>
  </div>
</div> -->
<!-- Option 3 end -->       
<!-- <hr> -->
<!-- Form           -->
<div id ="UploadVideoForm"class="card shadow-lg border-0 rounded-3 p-4 mb-4">
    <div class="modal-header">
        <h5 class="modal-title fw-bold" id="option1ModalLabel">
          <i class="fa-solid fa-upload text-primary me-2"></i> Submit Your Links and Video
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="submitVideoForm" action="{{ route('user.updateStage2', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="modal-body">
          
          <!-- Video Links -->
           <div class="row mb-3">
            <div class="col-md-6">
              <label for="fbLink" class="form-label">Theme</label> 
              <select name="videoOption" id="videoOption" class="form-control" required>
                <option value="Day One Energy">Day One Energy</option>
                <!-- <option value="Street No Break Me">Street No Break Me</option>
                <option value="Future Me Loading">Future Me Loading</option> -->
              </select>
              @error('fbLink') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
          </div>

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
    </div>

    <br>

    <div class="modal-footer">
    <button type="button" class="btn btn-danger waves-effect" onclick="window.location.href='{{ route('user-dashboard') }}'">Close</button>&nbsp;
        <!-- <button type="submit" class="btn btn-primary">Save Changes</button> -->
    </div>

</p>
  </div>
  <!-- Phase 1 end -->

  
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
