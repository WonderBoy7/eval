<!doctype html>
<html lang="en">
  <head>
  	<title>
      Welcome
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"> -->

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="{{ url('assets/css/style1.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to BTP</h2>
                                {{-- <a href="{{route('auth.login')}}"> Log As Admin</a> --}}
								</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			     			<form action="{{ route('client.login')}}" method="POST" class="signin-form">
			      	@csrf
                    @method('POST')
                                <div class="form-group mb-3">
			      			<label class="label" for="name">Enter your number</label>
			      			<input type="text" name="tel" class="form-control" placeholder="number" required class="@error('tel') error @enderror">
                              @error('tel')
                              <span class="error">{{ $message }}</span>
                          @enderror
			      		</div>
		            <div class="form-group">
		            	<input type="submit" class="form-control btn btn-primary submit px-3">
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/main.js"></script> -->

	</body>
</html>

