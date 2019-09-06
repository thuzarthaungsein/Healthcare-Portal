<template>
     <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="page-header">Edit Advertisement</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateAds">
                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="title"><strong>Title :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                     <input type="title" class="form-control box" id="title"  name="title" v-model="advertisement.title" required>
                                                      <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="description"><strong>Description :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="advertisement.description"></textarea>

                                                </div>
                                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-2 text-right">
                                                        <label for ="location" ><strong> Location :</strong>  </label>
                                    </div>
                                    <div class="col-sm-9" v-for="advertisements in advertisement.location" :key="advertisements.id">
                                                  <label> <input type = "checkbox" value ="topbar" id="tbar" name="top_bar" v-model="advertisements.topbars" > <strong>Top Bar </strong> (200 円)</label><br/>
                                                  <label> <input type = "checkbox"  value ="sidebar" id="sbar" name="side_bar" v-model="advertisements.sidebars"><strong> Side Bar </strong>(300 円) </label>
                                                    <span v-if="errors.location" class="error">{{errors.location[0]}}</span>
                                    </div>
                            </div>
                             <div class="form-group" style="display:none" id="showimage">

                                <label for ="photo" ><strong> Photo/Image :</strong>  </label><br/>

                                <div class="custom-file col-sm-10">
                                    <input type="file"  ref="file" accept="image/*" @change ="fileSelected">
                                </div>

                            </div>
                            <div class="form-group">

                            </div>
                            <div class="image_show"></div>
                            <div class="form-group image_update" id="x-image">
                                   <div class="col-md-12">
                                        <div class="row">

                                        </div>
                                    </div>
                            </div>

                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn" >Update</button>
                                    </div>
                                    <div class="col-1 pad-free">
                                        <router-link class="btn btn-warning" to="/ads" > Cancel </router-link>
                                    </div>
                                </div>
                            </div>
                                </form>
                            </div>
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
                        location : [{
                            topbars: false,
                            sidebars:false
                        }],
                        photo:''
                    },
                    ischeck:''
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/advertisement/edit/${this.$route.params.id}`)
                .then((response) => {
                     this.advertisement.title = response.data.title;
                     this.advertisement.description = response.data.description;
                     this.ischeck = response.data.location;
                     this.updateCheck(this.ischeck);
                     this.advertisement.photo=response.data.photo;
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

              updateCheck: function (check){
                     this.advertisement.location.shift()
               if(check == "topbar"){
                 this.advertisement.location.push({
                            topbars: 1,
                            sidebars:0   });
               }
               else if(check == "sidebar"){
                    this.advertisement.location.push({
                            topbars: 0,
                            sidebars:1  });
               }
               else{
                    this.advertisement.location.push({
                            topbars: 1,
                            sidebars:1
                        });
                     }
                },
            updateAds() {
            let adsData = new FormData();
            var arr = this.advertisement.location;
            for(var i=0;i<arr.length;i++)
            {
                if(arr[i]['topbars'] == 1 && arr[i]['sidebars'] == 0)
                {
                     adsData.append('location', 'topbar');
                }
                else if(arr[i]['sidebars'] == 1 && arr[i]['topbars'] == 0)
                {
                     adsData.append('location', 'sidebar');
                }
                else if(arr[i]['sidebars'] == 1 && arr[i]['topbars'] == 1)
                {
                    adsData.append('location', 'sidebar,topbar');
                }


            }
             adsData.append('title',this.advertisement.title)
             adsData.append('description',this.advertisement.description)
             adsData.append('photo',this.advertisement.photo)
             console.log(adsData);
                this.axios.post(`http://localhost:8000/api/advertisement/update/${this.$route.params.id}`, adsData)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'ads'});
                    });
            }

        }
}
</script>

