<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default m-b-20">

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
               <!-- <a href="createcategory" class="float-right" style="color: blue;">Create New Category</a> -->
               <router-link to="/createcategory" class="float-right" style="color: blue;">Create New Category</router-link>
           </div><br/>
          <div class="card-header text-center">
              <h4 style="padding-top:20px;">ユーザーリストテーブル</h4>
          </div>
          <div class="scroll col-12">
        <div v-for="category in categories" :key="category.id" class="card card-default m-b-20">
            <div class="card-body news-post">
                <div class="row">
                        <div class="col-md-9 m-t-8">
                            <a>{{category.name}}</a><br/>
                        </div>
                             <div class="col-md-3" style="margin-top: 8px;">
                                    <button class="btn main-bg-color all-btn white">Edit</button>
                                    <button class="btn btn-danger all-btn">Delete</button>
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
        return {
            categories:[]
        }
    },
    created(){
        this.axios
                .get('http://localhost:8000/api/categories')
                .then(response => {
                    this.categories = response.data;
                });
    }
}
</script>

