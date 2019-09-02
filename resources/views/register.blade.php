

<!DOCTYPE html>
<html>    
<head>
	<title>Register Page</title>
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
			<div class="user_card user_registercard">
				<div class="links">
					<a href="/" class="mr-auto text-white">{{__('ホーム')}}</a>
					<a href="register" class="ml-auto text">{{__('登録')}}</a>
				</div>
				
				<div class="d-flex justify-content-center registerform_container">
					<div class="brand_logo_container">
                        <img src="/images/trust_growth.png" id="thumbnil" class="brand_logo" alt="Logo">                        
					</div>
                </div>
                
				<div class="">
				<div class="row">
					<div class="col-12">
                    <form method="post" action="{{ url('register/store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">ロゴを添付</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                        </div>
                        <input type="file" accept="image/*"  onchange="showMyImage(this)" name="img" id="file" ref="file" class="form-control form-file">        
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">事業者名</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control"  name="name" value="" required autofocus placeholder="事業者名">
                           
                    </div>  
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">電子メールアドレス </label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" name="email" value="" required autofocus placeholder="電子メールアドレス">
                            
                    </div>  
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">パスワード </label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" value="" required autofocus placeholder="パスワード">
                            
                    </div>  
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">Confirm Password</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="comfirm_password" value="" required autofocus placeholder="パスワード">
                            
                    </div>  
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">Choose Type</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>

						</div>
						<select name="type" id="type" class="form-control custom-select">
                        <option value="">Choose Your Type</option>
                        <option value="1">Hospital</option>
                        <option value="2">Nursing</option>
                        </select>
                            
                    </div>  
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">電話番号</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
						</div>
						<input type="number" class="form-control" name="phone" value="" required autofocus placeholder="電話番号">
                            
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-4 col-lg-3 control-label">アドレス</label>  
						<div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
						</div>
						<input type="text" class="form-control" name="address" value="" required autofocus placeholder="アドレス">
                            
                    </div>
                    <div class="form-group ">
                        <div class="form-group row float-right">
                            <div class="col-12">     
                                <button class="btn btn-danger register_btn">キャンセル</button>       
                                <button type="submit" class="btn btn-info register_btn">作成</button>               
                                <!-- <a class="btn btn-danger register_btn">キャンセル</a>
                                <a class="btn register_btn"  style="background: #4db197;">作成</a> -->
                            </div>
                        </div>
                    </div>  
                    </form>
                        @include('alert.alert-message')
                    </div>
                </div>			
			</div>
		</div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	

    <script>
    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    });

    $('#type').on('change',function(){
       const v = $( "#type option:selected" ).val();
       console.log(v);
    });
    </script>
    
</body>
</html>