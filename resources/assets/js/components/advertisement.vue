<template>
 <div class="row">
      <div class="col-12 scrolldiv">
          <div class="card">
                    <div class="card-header text-center">
                        <h4 style="padding-top: 20px;"> Advertisements </h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                                <div class="col-sm-10">
                                    <form @submit.prevent ="ads" class="m-t-16">
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="title"><strong>Title :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                     <input type="title" class="form-control box" id="title"  name="title" v-model="ads.title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                    <label for="description"><strong>Description :</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="ads.description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="location" ><strong> Location :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                  <label> <input type = "checkbox" value="top" name="top_bar" v-model="ads.topbar"> <strong>Top Bar </strong> (200 円)</label><br/>
                                                  <label> <input type = "checkbox"  value="side" name="side_bar" v-model="ads.sidebar"><strong> Side Bar </strong>(300 円) </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="image" ><strong> Photo/Image :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                        <input type="file" accept="" @change="onFileSelected" id="file" ref="file">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                    <button type="submit" class="btn main-bg-color white all-btn ">Submit</button>
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
                advertisements: {
                    title:'',
                    description:'',
                    location:'',
                    photo:''
                }
            }

    },
    methods:{
        ads() {

                this.axios.post('http://localhost:8000/api/advertisement')
                    .then((response) => {
                    alert('Successfully')
                    console.log(response);
                    //console.log(this.jobApply.toString());
                    this.ads = response.data;
                    })
            }
    }
}


</script>

