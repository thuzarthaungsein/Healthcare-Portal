<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv2">
                <div class="form-group">
                        <label>Type<span class="error">*</span></label>
                        <label for="hospital">
                                <input type="radio" v-model="type"  value="hospital" v-on:change ="changeType()" name="type" id="hospital"> Hospital
                        </label>
                        <label for="nursing">
                                <input type="radio" v-model="type" value="nursing" v-on:change ="changeType()" name="type" id="nursing"> Nursing Home
                        </label>
                </div>
                
                <form class="col-md-12">                         

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                             <hospitalProfile></hospitalProfile>
                        </div>

                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">
                             <nursingProfile></nursingProfile>
                        </div>                
                        
                </form>
        </div>
</div>
</template>

<script>
import hospitalProfile from './HospitalProfile.vue'
import nursingProfile from './NursingProfile.vue'
export default {
        components: {
              hospitalProfile,
              nursingProfile,
        },
       data() {
                return {
                        type: 'nursing',
                        fac_list: [],
                        medical_acceptance:[],
                }
        },
        created(){
                this.axios
                .get('http://localhost:8000/api/facilities')
                .then(response=>{
                //  console.log(response);
                this.fac_list = response.data;
                });

                this.axios
                .get('http://localhost:8000/api/medical/medicalacceptance')
                .then(response => {
                    this.medical_acceptance = response.data;
                //      console.log(response.data);
                });
        },
        methods: {
        //      preview_image() 
        //         {
        //                 var total_file = document.getElementById("upload_file").files.length;
        //                 for(var i=0;i<total_file;i++)
        //                 {
        //                 $('#image_preview').append("<div class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src='"+URL.createObjectURL(event.target.files[i])+"' class='show-img'></div>");
        //                 }
        //         },               

            scheduletogglediv() {
                    $(".schedule-toggle-div").toggle('medium');
            },

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            factogglediv() {
                    $(".hos-fac-toggle-div").toggle('medium');
            },

            nurseFacToggleDiv() {
                    $(".nurse-fac-toggle-div").toggle('medium');
            },

            staffToggleDiv() {
                    $(".staff-toggle-div").toggle('medium');
            },

            galleryAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                    $("#gallery").append('<div class="col-md-3"><input type="file" name="" class=" m-b-15 '+classname+'" id="upload_img" onChange="showImg('+c+',event)"><div class="col-md-12 hello '+classname+'"></div></div><div class="col-md-9"><input type="text" name="title" placeholder="タイトル" class="form-control m-b-15"><textarea name="description" placeholder="コンテンツ" class="form-control m-b-15"></textarea></div>');
            },

            methodAdd() {
                   $("#methods").append('<div class="row method-box"><div class="col-md-3 m-b-15 m-t-10"><label>方法</label><textarea name="method[]" class="form-control"></textarea></div><div class="col-md-9"><table class="table table-bordered"> <tr><th>入居時にかかる費用</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>居室タイプ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>月額利用料</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>広さ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> </table></div><div class="col-md-3">詳細</div> <div class="col-md-9"><textarea class="form-control" name="breakdown[]"></textarea></div> </div> ');
            },

            cooperateAdd() {
                   $("#cooperate-medical").append(' <div class="col-md-12 pad-free m-t-20"> <div class="form-group"> <label>名前 :</label> <input type="text" class="form-control" name="co-medical-header[]"> </div> <table class="table table-bordered"> <tr> <th style="width:30%">診療科目</th> <th style="width:70%"> <textarea class="form-control" name="clinical-sub"></textarea> </th> </tr> <tr> <th>協力内容</th> <th><textarea class="form-control" name="details"></textarea></th> </tr> <tr> <th>診療費用</th> <th> <textarea class="form-control" name="expense"></textarea> </th> </tr> <tr> <th>備考</th> <th> <textarea class="form-control" name="remark"></textarea> </th> </tr> </table> </div> '); 
            },

            acceptanceList() {
                $(".accept-toggle-div").toggle('medium');
            },

            specialFeAdd() {
                $("#special-features").append('<div class="col-md-12 m-t-15 pad-free"><input type="text" class="form-control" name="specialfeature[]"></div>');
            },

            changeType() {
                $("#methods").html("");
                $("#cooperate-medical").html("");
                $("#special-features").html("");
                $("#gallery").html("");
            }
        }
}

</script>
