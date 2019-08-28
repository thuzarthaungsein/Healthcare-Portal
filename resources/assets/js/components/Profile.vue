<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv">
                
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
                                <label>Gallery<span class="error">*</span></label>
                                <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" multiple>

                                <div class="col-md-12">
                                        <div class="row" id="image_preview"></div>
                                </div>
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

                                <div class="fac-toggle-div toggle-div">
                                        <div v-for="fac in fac_list" :key="fac.id" class="card card-default m-b-20">
                                                <div class="card-body news-post">
                                                       <label for="">
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
                                        This is Map togglediv
                                </div>
                        </div>
                        <div class="row" v-if="type == 'nursing'">
                                Nursing
                        </div>

                
                        <div class="row">
                                <br>
                                <button class="btn news-post-btn all-btn">Create</button>
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
            }
        }
}

</script>