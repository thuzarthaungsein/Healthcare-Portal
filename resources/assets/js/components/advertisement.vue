<template> 
    <div class="row">
        <div class="col-12">
            <div class="card">                    
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-12">
                                <h4 class="page-header header">広告</h4>
                            </div>
                            <div class="col-12">
                                <form @submit.prevent ="add">
                                    <div class="form-group">
                                      
                                            <label for="title"><strong>タイトル :</strong></label>
                                        
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="ads.title">
                                                <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                            <label for="description"><strong>描写:</strong></label>
                                       
                                            <textarea name="description" class="form-control" cols="50" rows="5" v-model="ads.description"></textarea>
                                            <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for ="location" ><strong> ロケーション :</strong>  </label><br>
                                       
                                            <label> <input type = "checkbox" value ="topbar"  name="top_bar" v-model="ads.location" > <strong>Top Bar </strong> (200 円)</label><br/>
                                            <label> <input type = "checkbox"  value ="sidebar"  name="side_bar" v-model="ads.location"><strong> Side Bar </strong>(300 円) </label>
                                            <span v-if="errors.location" class="error">{{errors.location[0]}}</span>
                                    </div>
                                    <div class="form-group">                                        
                                        <label for ="photo" ><strong> メディア :</strong>  </label><br>
                                        <input type="file" id="upload" accept="image/*" @change ="uploadImage" >
                                        <span v-if="errors.photo" class="error">{{errors.photo[0]}}</span>
                                            <!-- <label class="" for="file">No file chosen</label> -->                                       
                                        <div class="col-md-12" id = "par">
                                            <div class="row image_preview" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">                                       
                                        <router-link class="btn btn-danger all-btn" to="/ads" > キャンセル </router-link>
                                        <button class="btn news-post-btn all-btn" to="/ads" >作る</button>                                            
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
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })

            },

    }
}
</script>

