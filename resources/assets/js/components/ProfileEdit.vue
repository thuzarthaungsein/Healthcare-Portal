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
                                <input type="text" class="form-control old-pass">
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="new-pass">New-Password:</label>
                                <input type="text" class="form-control new-pass">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="confirm-pass">Confirm-Password:</label>
                                <input type="text" class="form-control confirm-pass">
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
                                <label class="confirm-pass">Email-Address:</label>
                                <input type="text" class="form-control email" v-model="customer_info.email">
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
            logo:'',
            cusid:''
        }
    },
    created(){
        this.type = localStorage.getItem('cusType');
        this.cusid = Number(localStorage.getItem('cusId'));

        this.axios
            .get('/api/customerinfo/'+this.cusid)
            .then(response=>{
                    this.customer_info = response.data;
                    this.logo = '/upload/customers/'+this.customer_info.logo;
                    console.log(this.customer_info);return;
        });
    },
    methods: {
        preview_image(fileInput) {
            this.logo = URL.createObjectURL(event.target.files[0]);
        },
        profileChange() {
            alert('hi');
            var file = document.getElementsByClassName('customer-logo')[0].files[0];
            if(file) {
                var file_name = file.name;
                let fd = new FormData();
                    fd.append('file' ,file )
                    fd.append('photo' ,file_name )
                    fd.append('type', this.type)
                    this.axios.post('/api/customer/movephoto', fd)
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

                    }).catch(error=>{

                    if(error.response.status == 422){
                    this.gallery_list = 'error';
                    this.errors = error.response.data.errors

                    }
                        }) ;
            }
             
        }
    }
}
</script>