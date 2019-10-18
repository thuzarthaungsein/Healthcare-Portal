<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>

</head>

<body>
    <div class="wrapper h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card user_registercard">
                <div class="links">
                    <a href="/" class="mr-auto text-white">{{__('ホーム')}}</a>
                    <a href="/login" class="ml-auto text">{{__('ログイン')}}</a>
                </div>

                <div class="d-flex justify-content-center registerform_container">
                    <div class="brand_logo_container">
                        <img src="/images/sample_1.png" id="thumbnil" class="brand_logo" alt="Logo">
                    </div>
                </div>

                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{ url('register/store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3 inputfile">
                                    <label class="col-4 col-lg-3 control-label">ロゴを添付</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <span class="btn all-btn" onClick="choosefile()">Choose</span> <span id="imgname" style = "padding: 8px 0 0 30px;color: #fff;"></span>
                                    <input type="file" accept="image/*" onchange="showMyImage(this)" name="img" id="file" ref="file" class="form-control inputfile">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">事業者名</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="" required autofocus placeholder="事業者名">

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
                                    <input type="password" class="form-control" name="password" value="" id="pwd" required autofocus placeholder="パスワード">

                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">パスワードを認証</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="comfirm_password" id="confirm_pwd" onchange="isPasswordSame()" value="" required autofocus placeholder="パスワードを認証">
                                    <br>
                                    
                                </div>
                                <div class="error" style="padding-left: 162px;margin-bottom: 18px;display: none;">Password not match.</div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">タイプを選択</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>

                                    </div>
                                    <select id="type" class="form-control custom-select" name="types" required>
                                        <option value="">タイプを選択</option>
                                        <option value="2">病院</option>
                                        <option value="3">介護</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3 hide form-check form-check-inline" id="showHideActionNursing">
                                    <label class="col-4 col-lg-3 control-label">選択看護</label>
                                    <div class="input-group-append " id="nursing">

                                    </div>
                                    <div class="nurse_type_error error" style="margin-bottom: 6px;margin-left: 210px;display: none;">Required</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">都市を選択</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>

                                    </div>
                                    <select name="cities" id="cities" class="form-control custom-select" required>
                                        <option value="">都市を選択</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3 hide" id="showHideActionTownship">
                                    <label class="col-4 col-lg-3 control-label">郷を選ぶ</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>

                                    </div>
                                    <select name="township" id="township" class="form-control custom-select" required>

                                    </select>
                                </div>


                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">電話番号</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="phone" value="" required autofocus placeholder="電話番号">
 
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">アドレス</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="address" value="" required autofocus placeholder="アドレス">
                                </div> -->
                                <div class="form-group ">
                                    <div class="form-group row float-right">
                                        <div class="col-12">
                                            <button class="btn btn-danger register_btn">キャンセル</button>
                                            <button type="submit" class="btn register_btn" style="background: #4db197;">作成</button>
                                            <!-- <a class="btn btn-danger register_btn">キャンセル</a>
                                                 <a class="btn register_btn" >作成</a> -->
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function choosefile() {
                $('.inputfile').trigger('click');
            }

            function showMyImage(fileInput) {
                var files = fileInput.files;
                var file_name = fileInput.files[0].name;
                $('#imgname').html(file_name);
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var imageType = /image.*/;
                    if (!file.type.match(imageType)) {
                        continue;
                    }
                    var img = document.getElementById("thumbnil");
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
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $('.showHideAction').removeClass('hide').addClass('show');

                    });
                }, 5000);

                $('#pwd').change(function() {
                    isPasswordSame();
                });
                $('#confirm_pwd').keyup(function() {
                    isPasswordSame();
                });
            });

            function isPasswordSame() {
                var pwd = $('#pwd').val();
                var confirm_pwd = $('#confirm_pwd').val();
                if(pwd != confirm_pwd) {
                    $('.error').css("display","block");
                }
                else {
                    $('.error').css("display","none");
                }    
            }

            $('#type').on('change', function() {
                const type = $("#type option:selected").val();
                if (type == 2) {
                    $.getJSON("ajax-type?type=" + type, function(data) {
                        $('#showHideActionNursing').removeClass('hide').addClass('show');
                        $('#nursing').empty();
                        $.each(data.data, function(id, name) {
                            $('#nursing').append(
                                '<div class="form-check sample">' +
                                '<input class="form-check-input custom-radio nursing_type" onchange="chooseNursingType()" type="radio" name="nursing" value="' + name.id + '" id="' + name.id + '">' +
                                '<label class="form-check-label custom-radio" for="' + name.id + '">' + name.name + '</label>' +
                                '</div>');
                        });
                    });
                    chooseNursingType();
                } else {
                    $('#showHideActionNursing').removeClass('show').addClass('hide');
                    $('#nursing').empty();
                }
            });

            $('#cities').on('change', function(e) {
                let cities = e.target.value;
                $.getJSON("ajax-cities?cities=" + cities, function(data) {
                    $('#showHideActionTownship').removeClass('hide').addClass('show');
                    $('#township').html('<option selected="selected" value="">郷を選ぶ</option>');
                    $.each(data.data, function(id, name) {
                        $('#township').append('<option value="' + name.id + '">' + name.township_name + '</option>');
                    });

                });
            });

            function chooseNursingType() {
                var nur_type = $('.nursing_type').is(':checked');
                if(nur_type) {
                    $('.nurse_type_error').css("display", "none");
                }
                else {
                    $('.nurse_type_error').css("display", "block");
                }
            }
        </script>

</body>

</html>