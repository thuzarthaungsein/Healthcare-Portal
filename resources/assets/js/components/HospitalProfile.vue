<template>
<div class="card profile">
    <form class="col-md-12">                         
            <div class="col-md-12 pad-free">
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
                    
                    <!-- <div class="form-group">
                            <label>フォトアルバム<span class="error">*</span></label>
                            <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" multiple>

                            <div class="col-md-12">
                                    <div class="row" id="image_preview"></div>
                            </div>
                    </div> -->

                    <div class="form-group">
                            <label>フォトアルバム</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery"></div>
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

                    <!-- Consultation -->

                    <span class="btn all-btn main-bg-color m-b-20" @click="scheduletogglediv()">Consultation Hours</span>

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

                    <!-- End Consultation -->
                    
                    <div class="form-group">
                            <label>Closed Days</label>
                            <textarea name="close-day" class="form-control"></textarea>
                    </div>

                    <!-- Facilities -->
                    <span class="btn all-btn main-bg-color m-b-20" @click="factogglediv()">Facilities</span>

                    <div class="col-md-12 hos-fac-toggle-div toggle-div">
                            <div class="row">
                                    <div v-for="fac in fac_list" :key="fac.id" class="col-md-6 m-b-20">
                                            <label>
                                            <input type="checkbox">
                                            {{fac.description}}
                                            </label>
                                    </div>
                            </div>                                        
                    </div>
                    <!-- End Facilities -->

                    <div class="form-group">
                            <label>Official Website</label>
                            <input type="text" name="official-website" class="form-control">
                    </div>

                    <div class="form-group">
                            <label>Congestion</label>
                            <textarea name="congestion" class="form-control"></textarea>
                    </div>

                    <!-- Map -->
                    <span class="btn all-btn main-bg-color m-b-20" @click="maptogglediv()">Map</span>

                    <div class="map-toggle-div toggle-div">
                            Map Area Here

                            <div class="form-group">
                                    <label>住所<span class="error">*</span></label>
                                    <textarea name="address" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                    <label>交通<span class="error">*</span></label>
                                    <textarea name="address" rows="10" class="form-control"></textarea>
                            </div>
                    </div>
                    <!-- End Map -->

                    <div class="row">
                            <button class="btn news-post-btn all-btn m-t-15">Create</button>
                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                    </div>
            </div>               
    </form>
</div>
</template>

<script>
export default {
       data() {
                return {
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

            scheduletogglediv() {
                    $(".schedule-toggle-div").toggle('medium');
            },

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            factogglediv() {
                    $(".hos-fac-toggle-div").toggle('medium');
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
            
            specialFeAdd() {
                $("#special-features").append('<div class="col-md-12 m-t-15 pad-free"><input type="text" class="form-control" name="specialfeature[]"></div>');
            },

        }
}

</script>