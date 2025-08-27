<!doctype html>
<html lang="en">
  <head>
  	<title>NYFEW :: Wait-list</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <link href="{{asset('login/images/favicon.png')}}" rel="icon">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> -->
    <style>
        .ftco-section {
    padding-top: 5px !important;
    padding-bottom: 5px !important;
}
    </style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{ asset('login/images/NYFEW_PARTICIPANT_WAITLIST.png') }}');">
                    </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h5 class="mb-4"><strong>Wait-List</strong> </h5>
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
							<form action="{{ route('wait-list.action') }}" class="signin-form" method="POST">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" name = "email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
			      		</div>
                          @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                          <div class="form-group mb-3">
			      			<label class="label" for="name">Phone No</label>
			      			<input type="number" name="phone_no" class="form-control" placeholder="Phone No" value="{{ old('email') }}" required>
			      		</div>
                          @error('phone_no')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
		            <div class="form-group mb-3 position-relative">
                        <label class="label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
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
                        <label class="label" for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
                        <span class="position-absolute" onclick="togglePassword('password_confirmation', this)" style="top: 38px; right: 15px; cursor: pointer;">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Join</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			       <!--     	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me-->
									 <!-- <input type="checkbox" checked>-->
									 <!-- <span class="checkmark"></span>-->
										<!--</label>-->
									</div>
									<!--<div class="w-50 text-md-right">-->
									<!--	<a href="{{ route('password.request') }}">Forgot Password</a>-->
									<!--</div>-->
		            </div>
		          </form>
                  <!--<p class="text-center">Already have an account? <a  href="{{route('signin')}}">Sign In</a></p>-->
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
    function togglePassword(fieldId, el) {
        const input = document.getElementById(fieldId);
        const icon = el.querySelector('i');

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

