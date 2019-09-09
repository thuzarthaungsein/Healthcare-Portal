<template>
     <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">             
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="page-header header">Edit Advertisement</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateAds">
                            <div class="form-group">
                                <label>Title :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="advertisement.title" required>
                            </div>
                            <div class="form-group">
                                <label>Description :<span class="error"></span></label>
                                <input type="text" class="form-control"  v-model="advertisement.description">
                            </div>
                             <div class="form-group" style="display:none" id="showimage">

                                <label for ="photo" ><strong>メディア:</strong>  </label><br/>

                                <div class="custom-file">
                                    <input type="file"  ref="file" accept="image/*" @change ="fileSelected">
                                </div>

                            </div>
                            <div class="form-group">

                            </div>
                            <div class="image_show"></div>
                            <div class="form-group image_update" id="x-image">
                                   <div class="col-md-12">
                                        
                                    </div>
                            </div>

                            <div class="form-group">
                                <router-link to="/ads" class="btn btn-danger all-btn">戻る</router-link>
                                <button class="btn news-post-btn all-btn">更新</button>                                
                            </div>
                                </form>
                            </div>
                         </div>
                    </div>               
            </div>
          </div>
      </div>
</template>
<script>
export default {
          data() {
            return {
                errors: [],
                advertisement: {
                        title: '',
                        description:'',
                        photo:''
                    }
            }
        },
        created() {
            this.axios
                .get(`/api/advertisement/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.advertisement = response.data;
                    this.updateselected();
                });

        },

         methods: {
              fileSelected(){

                     $('.image_show').html("<div class='col-md-2'><img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'></div>");

                     this.advertisement.photo = event.target.files[0]

              },
              updateselected()
              {
                   $('.image_update').append("<div id='x-image' class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src= upload/advertisement/"+this.advertisement.photo+" class='show-img''></div>");
              },
            updateAds() {
             let adsData = new FormData();

              adsData.append('title',this.advertisement.title)
             adsData.append('description',this.advertisement.description)
             adsData.append('photo',this.advertisement.photo)
            //ads.photo=this.advertisement.photo
                this.axios.post(`/api/advertisement/update/${this.$route.params.id}`, adsData)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'ads'});
                    });
            }

        }
}
</script>

