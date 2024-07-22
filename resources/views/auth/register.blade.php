<!doctype html>
<html lang="en">
  <head>
  	<title>Login 07</title>
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
					<h2 class="heading-section">Inscription !!</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Remplir les champs</h2>
								</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			    		<form action="{{ route('auth.register')}}" method="POST" class="signin-form">
			      	@csrf
                    @method('POST')
                    <div class="form-group mb-3">
                        <label class="label" for="name">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                        <div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" class="form-control" placeholder="Password" required>
                     </div>
		            <div class="form-group">
		            	<input type="submit" class="form-control btn btn-primary submit px-3">
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

