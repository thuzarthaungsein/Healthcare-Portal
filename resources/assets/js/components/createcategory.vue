<template>
      <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">Create Category</h4>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <form @submit.prevent="add">
                                        <div class="form-group">
                                            <label>Category Name :<span class="error">*</span></label>
                                            <input type="text" class="form-control" name="title"  v-model="category.name">
                                        </div>
                                
                                        <div class="form-group row">
                                            <div class="col-1 pad-free">
                                                <button class="btn news-post-btn">Create</button>
                                            </div>
                                            <div class="col-3 pad-free">
                                                <!-- <a href="categorylist" class="btn btn-warning">Cancel</a> -->
                                                <router-link to="/categorylist" class="btn btn-warning">Cancel</router-link>
                                            </div>
                                        </div>

                                        </form>
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
     methods: {
            add() {
                axios.post('http://localhost:8000/api/category/add', this.category)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'categorylist'});
                    })
            }
           
        }
}
</script>
