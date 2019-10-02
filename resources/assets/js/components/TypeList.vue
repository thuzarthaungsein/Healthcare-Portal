<template>
 <div class="row">
      <div class="col-12">
           <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="main-color">ニュース記事を検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchType()">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row m-b-15">
                    <div class="col-md-12">
                        <router-link class="float-right" style="color: blue;" to="/type" >  新しいタイプを作成</router-link>
                    </div>
                    <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
                </div>

        <!--card-->
         <!-- <h4 class="page-header" style="text-align: center;">
               <strong>  Facility List</strong>
        </h4>  -->
        <!--card-->
        <div class="col-md-12 scrolldiv">
            <div v-if="!this.types.length"  class="container-fuid" style="padding-top:30px; height:700px; text-align:center ">

                    No record data

            </div>
            <div class="container-fuid" v-for="type in types" :key="type.id" >
                <div class="card card-default m-b-20">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p> {{type.name}} </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                    <router-link :to="{name: 'type', params: { id: type.id }}" class="btn main-bg-color white all-btn">Edit </router-link>

                                <button class="btn btn-danger all-btn"   @click="deleteType(type.id)" >Delete</button>
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
                types: []
            }
        },
        created() {
            this.axios
                .get('/api/types/type')
                .then(response => {
                    this.types = response.data;
                });
        },
         methods: {
            deleteType(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/types/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.types.map(item => item.id).indexOf(id); // find index of your object
                        this.types.splice(i, 1)
                    });
                }

            },
            searchType() {
                var search_word = $("#search-item").val();
                let fd = new FormData();
                fd.append("search_word", search_word);
                this.axios.post("/api/types/search", fd).then(response => {
                    this.types = response.data;
                });
            }
        }
}
</script>
