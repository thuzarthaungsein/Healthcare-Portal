

<!DOCTYPE html>
<html>
    
<head>
	<title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" ></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" ></script>
    

</head>

<body>

	<div class="wrapper h-100">
		<div class="d-flex justify-content-center h-100">       
			<div class="user_card">
                   
				<div class="links">
					<a href="/" class="mr-auto text-white">{{__('ホーム')}}</a>
					<a href="{{ url('registerForm') }}" class="ml-auto text">{{__('登録')}}</a>
				</div>
				
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="/images/sample_1.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container" style="margin-top:150px !important">

					<div class="row width">
						<div class="col-12 ">
								<form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf
										<div class="input-group mb-3">
											<div class="input-group-append"
											>
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="ユーザー名" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
										</div>
									
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center  mt-3 login_container">
					<button type="submit" name="button" id="getUser" class="btn login_btn">{{ __('再設定 パスワード') }}</button>
				</div>
                </form>
               
                <div class="mt-4">
					<div class="d-flex justify-content-center text-center links d-margin">
						<span><a href="/">戻る</a><br>
                                    @if (session('status'))
                                     <a>
                                     {{ session('status') }}    
                                     </a>
                                    @endif      
                            </span>

					</div>
				</div>
              
			</div>
		</div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>











