<template>
     <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="page-header">Edit Advertisement</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateAds">
                            <div class="form-group">
                                <label>Title :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="advertisement.title"  required>
                            </div>
                            <div class="form-group">
                                <label>Description :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="advertisement.description"  required>
                            </div>

                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn">Update</button>
                                    </div>
                                    <div class="col-1 pad-free">
                                        <router-link class="btn btn-warning" to="/ads" > Cancel </router-link>
                                    </div>
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
</template>
<script>
export default {
          data() {
            return {
                errors: [],
                advertisement: {
                        title: '',
                        description:''
                    }
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/advertisement/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.advertisement = response.data;

                });
        },

         methods: {
            updateAds() {
                this.axios
                    .post(`http://localhost:8000/api/advertisement/update/${this.$route.params.id}`, this.advertisement)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({title: 'advertisementlist'});
                    });
            }

        }

}
</script>

