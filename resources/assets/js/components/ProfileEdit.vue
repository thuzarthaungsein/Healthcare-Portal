<template>
    <!-- <div class="card profile m-t-22 " style="border:none;">
        <form class="col-md-12 form-class">
            <div class="col-md-12 pad-free"> -->

    <!-- <div class="form-group">
                    <div class="col-12  pad-free">
                        <div class="row">
                            <div class="col-4">
                                <input type="file" name="" class="customer-logo m-b-10"  id="customer-logo" @change="preview_image(this)">
                                <img :src="logo" id="thumbnil" class="profile_logo" alt="Logo" width="90px" height="50px">
                            </div>
                            <div class="col-8">
                                <span class="btn all-btn main-bg-color"  @click="profileChange()">
                                     変化
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->

    <!-- <br><br> -->
    <!-- <div class="form-group">
                    <div class="col-12  pad-free">
                        <div class="row">
                            <div class="col-4">
                                <label class="old-pass">Old-Password:</label>
                                <input type="password" name="old_password" class="form-control old-password">
                                <div class="error" id="oldpassword" style="display: none;">Old Password is required.</div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="new-pass">New-Password:</label>
                                <input type="password" name="new_password" class="form-control new-password">
                                <div class="error" id="newpassword" style="display: none;">New Password is required.</div>
                                <div class="error" id="newpasswordlength" style="display: none;">Password must be at least 6 digit.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="confirm-pass">Confirm-Password:</label>
                                <input type="password" name="comfirm_password" class="form-control confirm-password">
                                <div class="error" id="confirmpassword" style="display: none;">Confirm Password is required.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                <span class="btn all-btn main-bg-color"  @click="passwordChange()">
                                     変化
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- <br><br> -->

    <!-- <div class="form-group">
                    <div class="col-12  pad-free">
                        <div class="row">
                            <div class="col-4">
                                <label class="email-address">Email-Address:</label>
                                <input type="text" class="form-control email" v-model="user_info.email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                <span class="btn all-btn main-bg-color"  @click="emailChange()">
                                     変化
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- </div>
        </form> -->
    <!--test-->
    <div class="row">
        <div class="col-md-12">
            <div class="card  text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">プロファイル編集</h4>
                            <br>
                        </div>
                        <form class="col-md-8">
                            <!--card-->
                            <div class="card card-default m-b-20 col-md-11">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 m-t-8">
                                            <div class="header2">
                                                <h5 class=" clearfix">顧客ロゴ</h5>
                                            </div>
                                            <div class="form-group mg">
                                                <div>
                                                    <img :src="logo" id="thumbnil" class="profile_logo m-b-8" alt="Logo" width="200px" >
                                                    <br>
                                                    <input type="file" name="" class="customer-logo m-b-10" id="customer-logo" @change="preview_image(this)">

                                                </div>
                                                <div class="">
                                                    <span class="btn main-bg-color white all-btn"  @click="profileChange()">
                                     変化
                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--card-->

                            <!--card-->
                            <div class="card card-default m-b-20 col-md-11">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 m-t-8">
                                            <div class="header2">
                                                <h5 class=" clearfix">パスワード設定</h5>
                                            </div>
                                            <div class="form-group">

                                                <label class="old-pass">古いパスワード:</label>
                                                <input type="password" name="old_password" class="form-control old-password">
                                                <div class="error" id="oldpassword" style="display: none;">古いパスワードが必要です。</div>
                                                <br>
                                                <label class="old-pass">新しいパスワード</label>
                                                <input type="password" name="new_password" class="form-control new-password">
                                                <div class="error" id="newpassword" style="display: none;">新しいパスワードが必要です。</div>
                                                <div class="error" id="newpasswordlength" style="display: none;">パスワードは少なくとも6桁でなければなりません。</div>
                                                <br>
                                                <label class="old-pass">パスワード認証:</label>
                                                <input type="password" name="comfirm_password" class="form-control confirm-password">
                                                <div class="error" id="confirmpassword" style="display: none;">パスワードの確認が必要です。</div>
                                                <br>
                                                <div class="">
                                                    <span class="btn main-bg-color white all-btn"  @click="passwordChange()">
                                     変化
                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--card-->
                            <!--card-->
                            <div class="card card-default m-b-20 col-md-11">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 m-t-8">
                                            <div class="header2">
                                                <h5 class=" clearfix">メール設定</h5>
                                            </div>
                                            <div class="form-group">
                                                <label class="email-address">メールアドレス:</label>
                                                <input type="text" class="form-control email" v-model="user_info.email">
                                            </div>
                                            <div class="form-group">
                                                <span class="btn main-bg-color white all-btn"  @click="emailChange()">
                                                変化
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default m-b-20 col-md-11">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 m-t-8">
                                            <div class="header2">
                                                <h5 class=" clearfix" >アカウントを{{accout_status}}</h5>
                                                
                                            </div>                                            
                                            <div class="form-group">
                                                <span class="btn main-bg-color white all-btn"  @click="AccountStatusChange(customer_info.recordstatus)">
                                                    {{accout_status}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--card-->
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!--test-->
    </div>

</template>

<script>
    export default {
        data() {
                return {
                    customer_info: [],
                    user_info: [],
                    type: 'nursing',
                    logo: '',
                    cusid: '0',
                    upload_img: null,
                    image: '',
                    accout_status:''
                }
            },
            created() {

                this.axios
                    .get('/api/customerinfo/' + this.cusid)
                    .then(response => {
                        this.customer_info = response.data;
                        console.log(this.customer_info);
                        if(this.customer_info.recordstatus == '1') {
                            this.accout_status = '無効にします';
                        } else {
                            this.accout_status = '有効にする';
                        }
                        if (this.customer_info.type_id == '2') {
                            this.logo = 'upload/hospital_profile/' + response.data.logo;
                        } else {
                            this.logo = 'upload/nursing_profile/' + response.data.logo;
                        }
                    });
                this.axios
                    .get('/api/user/userinfo/')
                    .then(response => {
                        this.user_info = response.data;
                    });
            },
            methods: {
                preview_image(fileInput) {
                        this.logo = URL.createObjectURL(event.target.files[0]);
                    },
                    profileChange() {
                        var file = document.getElementsByClassName('customer-logo')[0].files[0];
                        if (file) {
                            var file_name = file.name;
                            let fd = new FormData();
                            fd.append('file', file)
                            fd.append('photo', file_name)
                            this.axios.post('/api/user/movephoto', fd)
                                .then(response => {}).catch(error => {
                                    console.log(error);
                                    if (error.response.status == 422) {
                                        this.errors = error.response.data.errors
                                    }
                                })
                            let arr = new FormData();
                            arr.append('logo', file_name)
                            this.$swal({
                                title: "確認",
                                text: "お客様のロゴを変更しましたか？",
                                type: "info",
                                width: 350,
                                height: 200,
                                showCancelButton: true,
                                confirmButtonColor: "#6cb2eb",
                                cancelButtonColor: "#b1abab",
                                cancelButtonTextColor: "#000",
                                confirmButtonText: "作成",
                                cancelButtonText: "キャンセル",
                                confirmButtonClass: "all-btn",
                                cancelButtonClass: "all-btn"
                            }).then(response => {
                                this.axios
                                    .post(`/api/customer/update/${this.cusid}`, arr)
                                    .then((response) => {
                                        this.$swal({
                                                position: 'top-end',
                                                type: 'success',
                                                title: '更新されました。',
                                                confirmButtonText: "はい",
                                                confirmButtonColor: "#6cb2eb",
                                                width: 250,
                                                height: 200,
                                            })
                                            // alert('Logo is Successfully Updated!');
                                    }).catch(error => {

                                        if (error.response.status == 422) {
                                            this.errors = error.response.data.errors
                                        }
                                    });
                            });

                        }

                    },
                    passwordChange() {
                        var old_pass = $('.old-password').val();
                        var new_pass = $('.new-password').val();
                        var confirm_pass = $('.confirm-password').val();
                        if (old_pass == '') {
                            $('#oldpassword').css('display', 'block');
                            return;
                        }
                        if (new_pass == '') {
                            $('#newpassword').css('display', 'block');
                            return;
                        }
                        if (new_pass.length < 6) {
                            $('#newpasswordlength').css('display', 'block');
                            return;
                        }
                        if (confirm_pass == '') {
                            $('#confirmpassword').css('display', 'block');
                            return;
                        }

                        if ("'" + new_pass + "'" === "'" + confirm_pass + "'") {
                            let arr = new FormData();
                            arr.append('old_pass', old_pass)
                            arr.append('new_pass', new_pass)

                            this.axios
                                .post(`/api/user/password-change`, arr)
                                .then((response) => {
                                    if (response.data == 'oldpasswordwrong') {
                                        alert('Please Enter Correct Old Password!');
                                        return;
                                    }
                                    // alert('Password is Successfully Changed!');
                                }).catch(error => {

                                    if (error.response.status == 422) {
                                        this.errors = error.response.data.errors
                                    }
                                });
                        } else {
                            this.$swal({
                                    title: "確認",
                                    text: "新しいパスワードと確認パスワードは同じでなければなりません。",
                                    type: "warning",
                                    width: 350,
                                    height: 200,
                                    showCancelButton: true,
                                    confirmButtonColor: "#6cb2eb",
                                    cancelButtonColor: "#b1abab",
                                    cancelButtonTextColor: "#000",
                                    confirmButtonText: "作成",
                                    cancelButtonText: "キャンセル",
                                    confirmButtonClass: "all-btn",
                                    cancelButtonClass: "all-btn"
                                })
                                // alert('New-Password And Confirm-Password must be same!')
                        }
                    },
                    emailChange(id) {
                        var email = $('.email').val();

                        let arr = new FormData();
                        arr.append('email', email)

                        this.$swal({
                            title: "確認",
                            text: "メールアドレスを変更しますか。",
                            type: "info",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "はい",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => {
                            this.axios
                                .post(`/api/user/email-change`, arr)
                                .then(response => {
                                    this.name = ''
                                    this.$swal({
                                            position: 'top-end',
                                            type: 'success',
                                            title: 'メールが変更されました',
                                            confirmButtonText: "はい",
                                            confirmButtonColor: "#6cb2eb",
                                            width: 250,
                                            height: 200,
                                        })
                                        // alert('Email is Successfully Changed!');
                                }).catch(error => {

                                    if (error.response.status == 422) {
                                        this.errors = error.response.data.errors
                                    }
                                });
                        })
                    },
                    AccountStatusChange(status) {
                        if(status == '1') {
                            var confirm_text = '無効にしますか？';
                        } else {
                            var confirm_text = 'アクティベートしますか ?';
                        }
                        let fd = new FormData();
                            fd.append('status', status)
                        this.$swal({
                                title: "確認",
                                text: confirm_text,
                                type: "info",
                                width: 350,
                                height: 200,
                                showCancelButton: true,
                                confirmButtonColor: "#6cb2eb",
                                cancelButtonColor: "#b1abab",
                                cancelButtonTextColor: "#000",
                                confirmButtonText: "作成",
                                cancelButtonText: "キャンセル",
                                confirmButtonClass: "all-btn",
                                cancelButtonClass: "all-btn"
                            }).then(response => {
                                this.axios
                                    .post('api/customer/account_update', fd)
                                    .then((response) => {
                                        this.$swal({
                                                position: 'top-end',
                                                type: 'success',
                                                title: '更新されました。',
                                                confirmButtonText: "はい",
                                                confirmButtonColor: "#6cb2eb",
                                                width: 250,
                                                height: 200,
                                            })
                                        console.log(response.data);
                                        if(response.data.recordstatus == '1') {
                                            this.accout_status = '無効化';
                                        } else {
                                            this.accout_status = '有効化';
                                        }
                                            
                                    }).catch(error => {

                                        if (error.response.status == 422) {
                                            this.errors = error.response.data.errors
                                        }
                                    });
                            });
                    },
            }
    }
</script>