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
                    <a href="/" class="mr-auto text-white" style="color: #a93f0c!important;font-weight:bold;">{{__('ホーム')}}</a>
                    <a href="/login" class="ml-auto text" style="color: #a93f0c!important;font-weight:bold;">{{__('ログイン')}}</a>
                </div>

                <div class="d-flex justify-content-center registerform_container">
                    <div class="brand_logo_container">
                        <img src="/images/sample_1.png" id="thumbnil" class="brand_logo" alt="Logo">
                    </div>
                </div>

                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <form id="testsubmit" method="post" action="{{ url('register/store') }}" enctype="multipart/form-data" onsubmit="return validateForm()" >
                                @csrf
                                <div class="input-group mb-3 inputfile">
                                    <label class="col-4 col-lg-3 control-label">ロゴを添付</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <span class="btn all-btn choose-btn" style="color: #a93f0c!important;box-shadow:none!important;" onClick="choosefile()">Choose</span> <span id="imgname" style = "padding: 8px 0 0 30px;color: #fff;"></span>
                                    <input type="file" accept="image/*" onchange="showMyImage(this)" name="img" id="file" ref="file" class="form-control inputfile">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">事業者名</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="" required placeholder="事業者名を入力してください。">

                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">メールアドレス </label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" value="" required placeholder="メールアドレスを入力してください。">

                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">パスワード </label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" onkeyup="password_validate()" value="" id="pwd" required placeholder="パスワードを入力してください。">

                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">パスワード確認</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="comfirm_password" id="confirm_pwd" onkeyup="password_validate()" value="" required placeholder="パスワードをもう一度確認してください。">
                                    <br>
                                    
                                </div>
                                <div class="error" id="passworderror" style="padding-left: 162px;margin-bottom: 18px;display: none;">Password not match.</div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">事業者タイプ</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>

                                    </div>
                                    <select id="type" class="form-control custom-select" name="types" required>
                                        <option value="">事業者タイプを選択してください。</option>
                                        <option value="2">病院</option>
                                        <option value="3">介護</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3 hide form-check form-check-inline" id="showHideActionNursing">
                                    <label class="col-4 col-lg-3 control-label">看護種類</label>
                                    <div class="input-group-append " id="nursing">

                                    </div>
                                    <div class="error" id="radioerror" style="margin-bottom: 6px;margin-left: 210px;">必須</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4 col-lg-3 control-label">都道府県</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>

                                    </div>
                                    <select name="cities" id="cities" class="form-control custom-select" required>
                                        <option value="">都道府県を選択してください。</option>
                                        <!-- <option value="">選択してください。</option> -->
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3 hide" id="showHideActionTownship">
                                    <label class="col-4 col-lg-3 control-label">市区町村</label>
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
                                    <input type="number" class="form-control" name="phone" value="" required placeholder="電話番号を入力してください。">
 
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
                                            <!-- <button class="btn btn-danger register_btn">キャンセル</button> -->
                                            <button type="submit" class="btn register_btn login_btn" id="sub_btn">作成する</button>
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

            });

            function validateForm() {
                if(window.pwd_same == false ||  window.nur_type == false) {
                    return false;
                }
            }

            $('#type').on('change', function() {
                const type = $("#type option:selected").val();
                if (type == 3) {
                    $.getJSON("ajax-type?type=" + type, function(data) {
                        $('#showHideActionNursing').removeClass('hide').addClass('show');
                        $('#nursing').empty();
                        $.each(data.data, function(id, name) {
                            $('#nursing').append(
                                '<div class="form-check sample">' +
                                '<input class="form-check-input custom-radio nursing_type" required onchange="chooseNursingType()" type="radio" name="nursing" value="' + name.id + '" id="' + name.id + '">' +
                                '<label class="form-check-label custom-radio" for="' + name.id + '">' + name.name + '</label>' +
                                '</div>');
                        });
                    });
                    chooseNursingType();
                } else {
                    $('#showHideActionNursing').removeClass('show').addClass('hide');
                    $('#nursing').empty();
                }
                chooseNursingType();
            });

            $('#cities').on('change', function(e) {
                let cities = e.target.value;
                $.getJSON("ajax-cities?cities=" + cities, function(data) {
                    $('#showHideActionTownship').removeClass('hide').addClass('show');
                    $('#township').html('<option selected="selected" value="">市区町村選択してください。</option>');
                    $.each(data.data, function(id, name) {
                        $('#township').append('<option value="' + name.id + '">' + name.township_name + '</option>');
                    });

                });
            });

            function chooseNursingType() {
                if($("#type option:selected").val() == 3) {
                    window.nur_type = $('.nursing_type').is(':checked');
                    if($('.nursing_type').is(':checked')) {
                        $('#radioerror').css("display", "none");
                    }
                    else {
                        $('#radioerror').css("display", "block");
                        window.nur_type = false;
                    }
                }
                else{
                    window.nur_type = true;
                }
            }

            function password_validate() {
                var pwd = $('#pwd').val();
                var confirm_pwd = $('#confirm_pwd').val();
                window.pwd_same = false;
                var nursing_type_exist = false;
                if(pwd != confirm_pwd) {
                    $('#passworderror').css("display","block");
                }
                else {
                    $('#passworderror').css("display","none");
                    window.pwd_same = true;
                }
            }
        </script>

</body>

</html>