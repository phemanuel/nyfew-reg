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
                    <div class="img" style="background-image: url('{{ asset('login/images/NYFEW_2025_REG_NEW.png') }}');">
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
                       	<form action="{{ route('password.update') }}" class="signin-form" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">New Password</label>
			      			<input type="password" name="password" id="password" class="form-control" required>
			      			<span class="position-absolute" onclick="togglePassword('password', this)" style="top: 38px; right: 15px; cursor: pointer;">
                                    <i class="fa fa-eye"></i>
                                </span>
			      		</div>
                          @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                          <div class="form-group mb-3 position-relative">
                                <label class="label" for="password">Confirm New Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                <span class="position-absolute" onclick="togglePassword('password_confirmation', this)" style="top: 38px; right: 15px; cursor: pointer;">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                          
		            <div class="form-group">
		            	<input type="hidden" name="email" value="{{ $email }}">
					<input type="submit" name="Login" class="register" value="{{ __('Reset Password') }}">				
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<!--<p><span class="style3">Back to<a href="{{route('signin')}}" class="style2">Login</a></span></p>-->
									</div>
									
		            </div>
		          </form>
        @else
    <p>You are already logged in. You cannot reset your password while logged in.</p>
@endif
		          <p class="text-center">Already have an account? <a  href="{{route('signin')}}">Sign In</a> or <a href="{{route('signin')}}" class="style2">Login</a></p>
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
<script>
function togglePassword(inputId, toggleIcon) {
    const input = document.getElementById(inputId);
    const icon = toggleIcon.querySelector('i');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
	</body>
</html>

