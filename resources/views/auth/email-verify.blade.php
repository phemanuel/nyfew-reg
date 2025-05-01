<!doctype html>
<html lang="en">
  <head>
  	<title>NYFEW :: Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <link href="{{asset('login/images/favicon.png')}}" rel="icon">
    <style>
        .ftco-section {
    padding-top: 50px !important;
    padding-bottom: 10px !important;
}
    </style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{ asset('login/images/login_new.jpg') }}');">
                    </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h5 class="mb-4"><strong>Email Verification</strong> </h5>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="http://www.facebook.com/nyfewofficial" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="http://www.twitter.com/nyfewofficial" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
										<a href="http://www.instagram.com/nyfewofficial" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
									</p>
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
            else
						@endif
                        <form action="{{ route('resend-verification-email') }}">
          <!-- @csrf -->
            <div>
            <div>                
                <h3>Please verify your email</h3>
                <h4><u>{{ $email }}</u> </h4>
                <p>{{ $message }}</p>
              </div> 
              <div class="button input-box">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="submit" class="form-control btn btn-primary rounded submit px-3" value="Didn't see it? Resend">
              </div>              
            </div>
        </form>
		<!-- <p class="text-center">Don't have an account? <a  href="{{route('signup')}}">Sign Up</a></p> -->
		<p class="text-center">Already have an account? <a  href="{{route('signin')}}">Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('login/js/jquery.min.js')}}"></script>
  <script src="{{asset('login/js/popper.js')}}"></script>
  <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('login/js/main.js')}}"></script>

	</body>
</html>

