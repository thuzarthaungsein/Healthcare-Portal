<template>    
 <div class="row">
      <div class="col-12">  
           <div class="card m-b-20">  
                <div class="card-body">
                    <h4 class="main-color">ニュース記事を検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
                </div>  
            </div>
                <div class="row m-b-15">
                    <div class="col-md-12">
                        <router-link class="float-right" style="color: blue;" to="/createmedicalacceptance" >  Create New </router-link>
                    </div>
                    <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
                </div>
           
        <!--card-->
         <!-- <h4 class="page-header" style="text-align: center;">
               <strong>  Facility List</strong>
        </h4>  -->
        <!--card-->
        <div class="col-md-12 scrolldiv">
            <div class="container-fuid" v-for="medical in medical_acceptance" :key="medical.id">
                <div class="card card-default m-b-20">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p> {{medical.name}} </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <router-link :to ="{name:'editmedicalacceptance', params:{id : medical.id}}" class="btn main-bg-color white all-btn">Edit </router-link>                                
                               <button class="btn btn-danger all-btn" @click="deletemedical(medical.id)">Delete</button>
                            </div>
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
    data(){
        return{
            medical_acceptance:[]
        }
    },
     created() {
            this.axios
                .get('/api/medical/medicalacceptance')
                .then(response => {
                    this.medical_acceptance = response.data;
                });
        },

          methods: {
            deletemedical(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/medical/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.medical_acceptance.map(item => item.id).indexOf(id); // find index of your object
                        this.medical_acceptance.splice(i, 1)
                    });
                }
               
            }
        }
    
        }

</script>