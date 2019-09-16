<template>
    <div class="row">
        <div class="col-12">
           <div class="row m-b-10">
                <div class="col-md-12">
                    <router-link to="/specialfeature" class="float-right main-bg-color create-btn all-btn"><i class="fas fa-plus-circle"></i> 新しいカテゴリを作成</router-link>
                </div>
            </div>
        <!--card-->
        <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
            <h4 class="main-color">Feature List Search</h4>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchFeature()">
                </div>
                <!-- <div class="col-md-2 text-right">
                    <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                </div> -->
            </div>
            <hr>
            <h5 class="header">Feature List</h5>
            <div class="col-md-12 scrolldiv">
                <div class="container-fuid" v-for="feature in features" :key="feature.id">
                    <div class="card card-default m-b-20">

                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-md-10 m-t-8">{{feature.name}}</div> -->
                                <div class="col-sm-3"><strong>Name :</strong>{{feature.name}}</div>
                                <div class="col-sm-3"><strong>Short Name :</strong>{{feature.short_name}}</div>
                                <div class="col-sm-3"><strong>Type :</strong>{{feature.type}}</div>
                                <div class="col-sm-3 pad-free">
                                    <small><router-link :to ="{name:'specialfeature', params:{id : feature.id}}" class="btn edit-borderbtn"> 編集</router-link></small> &nbsp;
                                    <small><a class="btn text-danger delete-borderbtn" @click="deleteFeature(feature.id)"> 削除</a></small>
                                </div>
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
            features:[]
        }
    },

     created() {
            this.axios
                .get('/api/feature/featurelist')
                .then(response => {
                    this.features = response.data;
                });

        },
        methods: {
            deleteFeature(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/feature/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.features.map(item => item.id).indexOf(id); // find index of your object
                        this.features.splice(i, 1)
                    });
                }

            },

            searchFeature() {
                var search_word = $('#search-item').val();
                let fd = new FormData();
                    fd.append('search_word' ,search_word )
                this.axios.post('/api/Feature/search', fd)
                    .then(response => {
                        this.categories = response.data;
                    });


            }

        }
}
</script>
