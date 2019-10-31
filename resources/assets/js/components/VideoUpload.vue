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

        <!-- <youtube :video-id="videoId" :player-vars="{ autoplay: 1 }" player-width="1280" player-height="750" @playing="playing"></youtube> -->

        <iframe width="1280" height="720" src="https://www.youtube.com/embed/lG0Ys-2d4MA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>

</div>
</template>

<script>
// import VueYoutube from 'vue-youtube'
 
// Vue.use(VueYoutube)
export default {
        data() {
            return {
                type: 'video',
                videos: [],
                videoId: 'lG0Ys-2d4MA',
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
                        console.log(fd);return;
                       this.axios.post('/api/customer/uploadvideo', fd)
                            .then(response => {
                            $('#video_preview').append("<div class='col-md-6' id='video-area'><span onClick='closevideo()'>X</span><video src='upload/videos/"+Vname+"' controls></video></div>");
                            }).catch(error=>{
                                console.log(error);
                            if(error.response.status == 422){
                                this.errors = error.response.data.errors
                            }
                        })

                },
                playVideo() {
                        this.player.playVideo()
                },
                playing() {
                        console.log('\o/ we are watching!!!')
                }
        }
}

</script>