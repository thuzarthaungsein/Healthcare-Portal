<template>
    <div class="card profile m-t-22 " style="border:none;">
        <form class="col-md-12 form-class">
            <div class="col-md-12 pad-free">

                <div class="form-group">
                    <div class="col-12  pad-free">
                        <div class="row">
                            <div class="col-4">
                                <input type="file" name="" class="customer-logo m-b-10"  id="customer-logo" @change="preview_image(this)">
                                <img :src="logo" id="thumbnil" class="profile_logo" alt="Logo" width="90px" height="50px">
                            </div>
                            <div class="col-8">
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="profileChange()">
                                    <i class="fas fa-plus-circle"></i> Change
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <div class="form-group">
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
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="passwordChange()">
                                    <i class="fas fa-plus-circle"></i> Change
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
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
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="emailChange()">
                                    <i class="fas fa-plus-circle"></i> Change
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            customer_info:[],
            user_info:[],
            type:'nursing',
            logo:'',
            cusid:'0'
        }
    },
    created(){

        this.axios
            .get('/api/customerinfo/'+this.cusid)
            .then(response=>{
                this.customer_info = response.data;
                console.log(this.customer_info);
                if(this.customer_info.type_id == '2') {
                    this.logo = 'upload/hospital_profile/'+response.data.logo;
                } 
                else {
                    this.logo = 'upload/nursing_profile/'+response.data.logo;
                }
        });
        this.axios
            .get('/api/user/userinfo/')
            .then(response=>{
                this.user_info = response.data;
        });
    },
    methods: {
        preview_image(fileInput) {
            this.logo = URL.createObjectURL(event.target.files[0]);
        },
        profileChange() {
            var file = document.getElementsByClassName('customer-logo')[0].files[0];
            if(file) {
                var file_name = file.name;
                let fd = new FormData();
                    fd.append('file' ,file )
                    fd.append('photo' ,file_name )
                    this.axios.post('/api/user/movephoto', fd)
                        .then(response => {
                            }).catch(error=>{
                                console.log(error);
                                if(error.response.status == 422){
                                    this.errors = error.response.data.errors
                                }
                        })
                let arr = new FormData();
                    arr.append('logo',file_name)
                this.axios
                    .post(`/api/customer/update/${this.cusid}`,arr)
                    .then((response) => {
                        alert('Logo is Successfully Updated!');
                    }).catch(error=>{

                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
                }) ;
            }
             
        },
        passwordChange() {
            var old_pass = $('.old-password').val();
            var new_pass = $('.new-password').val();
            var confirm_pass = $('.confirm-password').val();
            if(old_pass == '') { $('#oldpassword').css('display','block'); return; }
            if(new_pass == '') { $('#newpassword').css('display','block'); return; }
            if(confirm_pass == '') { $('#confirmpassword').css('display','block'); return; }

            if("'"+new_pass+"'" === "'"+confirm_pass+"'") {
                let arr = new FormData();
                    arr.append('old_pass',old_pass)
                    arr.append('new_pass',new_pass)

                this.axios
                    .post(`/api/user/password-change`,arr)
                    .then((response) => {
                        if(response.data == 'oldpasswordwrong') {
                            alert('Please Enter Correct Old Password!');return;
                        }
                        alert('Password is Successfully Changed!');
                    }).catch(error=>{

                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
                }) ;
            } else {
                alert('New-Password And Confirm-Password must be same!')
            }
        },
        emailChange(id) {
            var email = $('.email').val();

             let arr = new FormData();
                arr.append('email',email)

            this.$swal({
                title: "確認",
                text: "Do you want to change Email Address?",
                type: "warning",
                width: 350,
                height: 200,
                showCancelButton: true,
                confirmButtonColor: "green",
                cancelButtonColor: "#b1abab",
                cancelButtonTextColor: "#000",
                confirmButtonText: "はい",
                cancelButtonText: "キャンセル",
                confirmButtonClass: "all-btn",
                cancelButtonClass: "all-btn"
            }).then(response=>{
                this.axios
                .post(`/api/user/email-change`,arr)
                .then(response => {
                    alert('Email is Successfully Changed!');
                    }).catch(error=>{

                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
            });
        })
      },
    }
}
</script>