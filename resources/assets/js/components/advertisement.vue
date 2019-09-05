<template>
 <div class="container">
      <div class="row">
          <div class="col-sm-12 card text-dark">
                    <div class="text-center">
                        <h4 style="padding-top: 20px;" class="header"> Advertisements </h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                                <div class="col-sm-10">
                                    <form @submit.prevent ="add" class="m-t-16">
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="title"><strong>Title :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                     <input type="title" class="form-control box" id="title"  name="title" v-model="ads.title">
                                                     <!-- <span v-if="errors.title" class="error">{{errors.title[0]}}</span> -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="description"><strong>Description :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="ads.description"></textarea>
                                                     <!-- <span v-if="errors.description" class="error">{{errors.description[0]}}</span> -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="location" ><strong> Location :</strong>  </label>
                                                </div>
                                                 <div class="col-sm-9">
                                                  <label> <input type = "checkbox" value ="topbar"  name="top_bar" v-model="ads.location" > <strong>Top Bar </strong> (200 円)</label><br/>
                                                  <label> <input type = "checkbox"  value ="sidebar"  name="side_bar" v-model="ads.location"><strong> Side Bar </strong>(300 円) </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="photo" ><strong> Photo/Image :</strong>  </label>
                                                </div>
                                                <div class="custom-file col-sm-10">
                                                        <input type="file" id="upload" accept="image/*" @change ="uploadImage" >
                                                        <!-- <span v-if="errors.photo" class="error">{{errors.photo[0]}}</span> -->

                                                        <!-- <label class="" for="file">No file chosen</label> -->
                                                </div>
                                                 <div class="col-md-12" id = "par">
                                                    <div class="row image_preview" ></div>
                                                 </div>
                                        </div>
                                            <div class="form-group ">
                                        <div class="form-group row">
                                            <div class="col-1 pad-free">
                                                <button class="btn news-post-btn">Create</button>
                                            </div>
                                            <div class="col-1">
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
</template>

<script>
export default {
    data() {
            return {
                errors:[],
                ads: {
                    title:'',
                    description:'',
                    location:[],
                    photo:''
                }
            }

    },
    methods:{
             uploadImage() {
                            $('.image_preview').html("<div class='col-md-2'><img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'></div>");
                            this.ads.photo = event.target.files[0]

         },
        add() {
             let adsData = new FormData();
             adsData.append('title',this.ads.title)
             adsData.append('description',this.ads.description)
             adsData.append('location',this.ads.location)
             adsData.append('photo',this.ads.photo)

                this.axios.post('http://localhost:8000/api/advertisement/add',adsData)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                    this.$router.push({name: 'ads'});
                    })
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            },

    }
}
</script>

