<template>    
 <div class="row">
      <div class="col-12">  
           <div class="card m-b-20">  
                <div class="card-body">
                    <h4 class="main-color">施設一覧検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchFacility()">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                        </div>
                    </div>
                </div>  
            </div>
                <div class="row m-b-15 m-r-5">
                    <div class="col-md-12">
                        <router-link class="float-right main-bg-color create-btn all-btn" style="color: blue;" to="/createfacility" ><i class="fas fa-plus-circle"></i> 新しい施設を作る</router-link>
                    </div>
                    <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
                </div>
           
        <!--card-->
         <!-- <h4 class="page-header" style="text-align: center;">
               <strong>  Facility List</strong>
        </h4>  -->
        <!--card-->
        <div class="col-md-12 scrolldiv border-style">
            <h5 class="main-color header">施設一覧</h5>
            <div class="container-fuid" v-for="facility in facilities" :key="facility.id" >
                <div class="card card-default m-b-20">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-t-8">
                                <p> {{facility.description}} </p>
                            </div>
                            <div class="col-md-2" style="margin-top: 8px;">
                                    <router-link :to="{name: 'editfacility', params: { id: facility.id }}" class="btn edit-borderbtn">編集</router-link>
                                
                                <button class="btn delete-borderbtn"  @click="deleteFacility(facility.id)">削除</button>
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
          data() {
            return {
                facilities: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/facility/facilities')
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
               
            },

            searchFacility() {
                var search_word = $('#search-item').val();
                let fd = new FormData();
                    fd.append('search_word' , search_word )
                this.axios.post('http://localhost:8000/api/facility/search', fd)
                    .then(response => {
                        this.facilities = response.data;
                    });
               

            }
        }
}
</script>