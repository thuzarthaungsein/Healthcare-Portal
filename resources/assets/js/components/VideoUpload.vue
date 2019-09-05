<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv2">
                
                <form class="col-md-12">
                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                                <div class="form-group">
                                        <label>Upload Video<span class="error">*</span></label>
                                        <!-- <input type="file" class="" value="Upload Video" id="upload_file"> -->

                                        <div class="col-md-12">
                                              
                                               <!-- <div class="row" id="video_preview"></div> -->
                                        </div>
                                </div>
                        </div>

                        <div class="row" id="video_preview">
                            <!-- <video src='/upload/test.mp4' autoplay controls></video> -->
                        </div>
                
                        <div class="row" >
                                <input type="file" class="" @change ="onFileSelected" value="Upload Video" id="upload_file" name="file">
                                <div class="col-md-12">
                                    <span class="btn news-post-btn all-btn m-t-15" @click="videoAdd()">Upload</span>
                                </div>
                        </div>
                </form>
        </div>
</div>
</template>

<script>
export default {
        data() {
            return {
                type: 'video',
                videos: []
            }
        },
        methods: {

                onFileSelected(event) {  
                this.file = event.target.files[0]
        
                },

                videoAdd: function()   {
                        var file = document.getElementById("upload_file").files[0];
                        var pid =  1;
                        var Vname = file.name;
                        var Pname = Vname.slice(0, Vname.indexOf(".")); //get filename without extension
                        var Ptype = file.type;

                         let fd = new FormData();
                                fd.append('file' ,this.file )
                                fd.append('name',Vname)

                       axios.post('http://localhost:8000/api/customer/uploadvideo', fd)
                            .then(response => {
                                console.log(response); 
                            $('#video_preview').append("<div class='col-md-6' id='video-area'><span onClick='closevideo()'>X</span><video src='upload/videos/"+Vname+"' controls></video></div>");
                            }).catch(error=>{
                                console.log(error);
                            if(error.response.status == 422){
                                this.errors = error.response.data.errors
                            }
                        })

                }
        }
}

</script>