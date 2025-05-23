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
			      			<h5 class="mb-4"><strong>Reset Password</strong> </h5>
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
                        @if(auth()->guest())
							<form action="{{ route('password.email') }}" class="signin-form" method="POST">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
			      		</div>
                          @error('email')
									<span class="invalid-feedback">{{ $message }}</span>
									@enderror
		            
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Send Password Reset Link</button>
		            </div>
                    
                    <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<!-- <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label> -->
									</div>
									<div class="w-50 text-md-right">
										<!-- <a href="{{ route('password.request') }}">Forgot Password</a> -->
									</div>
		            </div>
		          </form>
                  @else
    <p>You are already logged in. You cannot reset your password while logged in.</p>
@endif
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

