<template> 
    <div class="row">
        <div class="col-12">
            <div class="card">                    
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-12">
                                <h4 class="page-header header"> Advertisements </h4>
                            </div>
                            <div class="col-12">
                                <form @submit.prevent ="add">
                                    <div class="form-group">
                                      
                                            <label for="title"><strong>Title :</strong></label>
                                        
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="ads.title" required>
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                            <label for="description"><strong>Description :</strong></label>
                                       
                                            <textarea name="description" class="form-control" cols="50" rows="5" v-model="ads.description"></textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for ="location" ><strong> Location :</strong>  </label><br>
                                       
                                            <label> <input type = "checkbox" value ="topbar"  name="top_bar" v-model="ads.location" > <strong>Top Bar </strong> (200 円)</label><br/>
                                            <label> <input type = "checkbox"  value ="sidebar"  name="side_bar" v-model="ads.location"><strong> Side Bar </strong>(300 円) </label>
                                        
                                    </div>
                                    <div class="form-group">                                        
                                        <label for ="photo" ><strong> Photo/Image :</strong>  </label><br>
                                        <input type="file" id="upload" accept="image/*" @change ="uploadImage" >
                                            <!-- <label class="" for="file">No file chosen</label> -->                                       
                                        <div class="col-md-12" id = "par">
                                            <div class="row image_preview" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">                                       
                                        <router-link class="btn btn-danger all-btn" to="/ads" > Cancel </router-link>
                                        <router-link class="btn news-post-btn all-btn" to="/ads" > create </router-link>                                            
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
                            $('.image_preview').append("<div class='col-md-2'><img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'></div>");
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

