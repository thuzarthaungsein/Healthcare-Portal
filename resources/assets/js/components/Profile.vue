<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv2">
                
                <form class="col-md-12">
                        <div class="form-group">
                                <label>Name<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                                <label>Email<span class="error">*</span></label>
                                <input type="text" class="form-control"  placeholder="Email">
                        </div>                
                        <div class="form-group">
                                <label>Phone<span class="error">*</span></label>
                                <input type="text" class="form-control"  placeholder="Phone">
                        </div>
                        <div class="form-group">
                                <label>Address<span class="error">*</span></label>
                                <textarea name="address" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                                <label>Location Access<span class="error">*</span></label>
                                <textarea name="address" rows="10" class="form-control"></textarea>
                        </div>               
                        
                        <div class="form-group">
                                <label>Type<span class="error">*</span></label>
                                <label for="hospital">
                                        <input type="radio" v-model="type"  value="hospital" name="type" id="hospital"> Hospital
                                </label>
                                <label for="nursing">
                                        <input type="radio" v-model="type" value="nursing" name="type" id="nursing"> Nursing Home
                                </label>
                        </div>
                        

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                                <div class="form-group">
                                        <label>フォトアルバム<span class="error">*</span></label>
                                        <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" multiple>

                                        <div class="col-md-12">
                                                <div class="row" id="image_preview"></div>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Medical Department<span class="error">*</span></label>
                                        <textarea name="medicaldepartment" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>Specialist<span class="error">*</span></label>
                                        <textarea name="specialist" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                        <label>Details Information<span class="error">*</span></label>
                                        <textarea name="detailsinfo" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>Clinic Subject<span class="error">*</span></label>
                                        <textarea name="subject" class="form-control"></textarea>
                                </div>

                                <div class="btn all-btn main-bg-color m-b-20" @click="scheduletogglediv()">Consultation Hours</div>

                                <div class="schedule-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <th>&nbsp;</th>
                                                        <th>A.M</th>
                                                        <th>P.M</th>
                                                        <th>Other</th>
                                                </tr>
                                                <tr>
                                                        <td>Monday</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Tuesday</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Wed</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Thu</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Friday</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Sat</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                                <tr>
                                                        <td>Sunday</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                </tr>
                                        </table>
                                </div>
                                
                                <div class="form-group">
                                        <label>Closed Days</label>
                                        <textarea name="close-day" class="form-control"></textarea>
                                </div>
                                <div class="btn all-btn main-bg-color m-b-20" @click="factogglediv()">Facilities</div>

                                <div class="col-md-12 fac-toggle-div toggle-div">
                                        <div class="row">
                                                <div v-for="fac in fac_list" :key="fac.id" class="col-md-6 m-b-20">
                                                        <label>
                                                        <input type="checkbox">
                                                        {{fac.description}}
                                                        </label>
                                                </div>
                                        </div>
                                        
                                </div>
                                <div class="form-group">
                                        <label>Official Website</label>
                                        <input type="text" name="official-website" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>Congestion</label>
                                        <textarea name="congestion" class="form-control"></textarea>
                                </div>

                                <div class="btn all-btn main-bg-color m-b-20" @click="maptogglediv()">Map</div>

                                <div class="map-toggle-div toggle-div">
                                        Map Area Here
                                </div>
                        </div>
                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">

                                <div class="form-group">
                                        <label>Gallery</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">+</span>
                                        <div class="col-md-12">
                                                <div class="row" id="gallery"></div>
                                        </div>
                                        
                                </div>
                                <div class="form-group">
                                        <label>特長<span class="error">*</span></label>
                                        <textarea name="feature" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>費用</label>
                                </div>
                                <div class="form-group">
                                        <label>支払い方法<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="methodAdd()">+</span>

                                        <div class="col-md-12 pad-free" id="methods"></div>
                                </div>
                                <div class="form-group">
                                        <label>Medical Cooperate<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="cooperateAdd()">+</span>
                                        <span class="m-l-10 float-right collapse-icon collapse-icon-down" title="Collapse All" @click="cooperateAdd()"><i class="fas fa-sort-down"></i></span>
                                        <span class="m-l-10 float-right collapse-icon collapse-icon-up" title="Expand All" @click="cooperateAdd()"><i class="fas fa-sort-up"></i></span>

                                        <div class="col-md-12 pad-free toogle-div co-medical-toogle-div" id="cooperate-medical"></div>
                                </div>
                        </div>

                
                        <div class="row">
                                <button class="btn news-post-btn all-btn m-t-15">Create</button>
                                <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                        </div>
                </form>
        </div>
</div>
</template>

<script>
export default {
       data() {
                return {
                        type: 'hospital',
                        fac_list: [],
                }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/facilities')
                 .then(response=>{
                        //  console.log(response);
                     this.fac_list = response.data;
                 });
        },
        methods: {
             preview_image() 
                {
                        var total_file = document.getElementById("upload_file").files.length;
                        for(var i=0;i<total_file;i++)
                        {
                        $('#image_preview').append("<div class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src='"+URL.createObjectURL(event.target.files[i])+"' class='show-img'></div>");
                        }
                },               

            scheduletogglediv() {
                    $(".schedule-toggle-div").toggle('medium');
            },

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            factogglediv() {
                    $(".fac-toggle-div").toggle('medium');
            },

            galleryAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                    $("#gallery").append('<div class="col-md-3"><input type="file" name="" class=" m-b-15 '+classname+'" id="upload_img" onChange="showImg('+c+',event)"><div class="col-md-12 hello '+classname+'"></div></div><div class="col-md-9"><input type="text" name="title" placeholder="Title" class="form-control m-b-15"><textarea name="description" placeholder="Description" class="form-control m-b-15"></textarea></div>');
            },

            methodAdd() {
                   $("#methods").append('<div class="row method-box"><div class="col-md-3 m-b-15 m-t-10"><label>方法</label><textarea name="method[]" class="form-control"></textarea></div><div class="col-md-9"><table class="table table-bordered"> <tr><th>入居時にかかる費用</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>居室タイプ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>月額利用料</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>広さ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> </table></div><div class="col-md-3">詳細</div> <div class="col-md-9"><textarea class="form-control" name="breakdown[]"></textarea></div> </div> '); 
            },

            cooperateAdd() {
                   $("#cooperate-medical").append(' <div class="col-md-12 pad-free m-t-20"> <div class="form-group"><label>Institute Name :</label><input type="text" class="form-control" name="co-medical-header[]"></div> <table class="table table-striped table-bordered"> <tr> <th style="width:30%">Clinical subjects</th> <th style="width:70%"><textarea class="form-control" name="clinical-sub"></textarea></th> </tr> <tr> <th>Details of cooperation</th> <th><textarea class="form-control" name="details"></textarea></th> </tr> <tr> <th>Medical expenses</th> <th><textarea class="form-control" name="expense"></textarea></th> </tr> <tr> <th>Remarks</th> <th><textarea class="form-control" name="remark"></textarea></th> </tr> </table> </div> '); 
            }
        }
}

</script>