<template>    
 <div class="row">
      <div class="col-12">  
           <div class="card">  
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
                <div class="m-b-30">
                    <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
                    <router-link class="float-right" style="color: blue;" to="/createfacility" >  Create New Facility</router-link>
                </div>
           
        <!--card-->
         <h4 class="page-header" style="text-align: center;">
               <strong>  Facility List</strong>
        </h4> 
        <!--card-->
        <div class="container-fuid" v-for="facility in facilities" :key="facility.id" >
                <div class="card card-default m-b-20 m-t-22">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p> {{facility.description}} </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                 <router-link :to="{name: 'editfacility', params: { id: facility.id }}" class="btn main-bg-color white all-btn">Edit </router-link>
                               
                                <button class="btn btn-danger all-btn"   @click="deleteFacility(facility.id)" >Delete</button>
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
                facilities: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/facilities')
                .then(response => {
                    this.facilities = response.data;
                });
        },
         methods: {
            deleteFacility(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`http://localhost:8000/api/facility/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.facilities.map(item => item.id).indexOf(id); // find index of your object
                        this.facilities.splice(i, 1)
                    });
                }
               
            }
        }
}
</script>