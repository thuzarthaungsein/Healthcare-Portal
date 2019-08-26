<template>
<div class="search-map">
        <h4>Profile</h4>
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

                        <div class="btn all-btn main-bg-color" @click="togglediv()">Consultation Hours</div>

                        <div class="toggle-div">
                                <table class="table table-striped table-bordered">
                                        <tr>
                                                <th>A.M</th>
                                                <th>Afternoon</th>
                                                <th>Other</th>
                                        </tr>
                                        <tr>
                                                <td>Monday</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Tuesday</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Wed</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Thu</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Friday</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sat</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sunday</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                </table>
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
</template>

<script>
export default {
       data() {
                return {
                        type: 'hospital'
                }
        },
        methods: {
             preview_image() 
                {
                        var total_file = document.getElementById("upload_file").files.length;
                        for(var i=0;i<total_file;i++)
                        {
                        $('#image_preview').append("<div class='col-md-2'><span class='img-close-btn' v-on:click='closebtn()'>X</span><img src='"+URL.createObjectURL(event.target.files[i])+"' class='show-img'></div>");
                        }
                },
                
            closebtn:function() {
                    console.log("close");
            },

            togglediv() {
                    $(".toggle-div").toggle('medium');
            }
        }
}

</script>