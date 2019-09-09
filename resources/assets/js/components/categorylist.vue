<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default m-b-20">

              <div class="card-body">
                        <h4 class="main-color">カテゴ一覧 検索</h4>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchCategory()">
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                            </div>
                        </div>
                </div>
          </div>
           <div class="row m-b-15 m-r-5">
                <div class="col-md-12">
                    <router-link to="/createcategory" class="float-right main-bg-color create-btn all-btn"><i class="fas fa-plus-circle"></i> 新しいカテゴリを作成</router-link>
                </div>
                <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
            </div>
          <!-- <div class="card-header text-center">
              <h4 style="padding-top:20px;"> カテゴリーリスト   </h4>
          </div> -->
            <!--card-->
            <div class="col-md-12 scrolldiv border-style">
                <h5 class="main-color header">カテゴ一覧</h5>
                <div class="container-fuid" v-for="category in categories" :key="category.id">
                    <div class="card card-default m-b-20">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 m-t-8">
                                    {{category.name}}
                                </div>
                                <div class="col-md-2 pad-free" style="margin-top: 8px;">

                                   
                                    <small><router-link :to ="{name:'editcategory', params:{id : category.id}}" class="btn edit-borderbtn"> 編集</router-link></small> &nbsp;
                                    <small><a class="btn text-danger delete-borderbtn" @click="deleteCategory(category.id)"> 削除</a></small>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            categories:[]
        }
    },

     created() {
            this.axios
                .get('/api/category/categories')
                .then(response => {
                    this.categories = response.data;
                });
                this.axios
                .get('/api/user')
                .then(response => {  
                    console.log(response)
                });
        },
        methods: {
            deleteCategory(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/category/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
                        this.categories.splice(i, 1)
                    });
                }

            },

            searchCategory() {
                var search_word = $('#search-item').val();
                let fd = new FormData();
                    fd.append('search_word' ,search_word )
                this.axios.post('/api/category/search', fd)
                    .then(response => {
                        this.categories = response.data;
                    });
               

            }

        }
}
</script>
