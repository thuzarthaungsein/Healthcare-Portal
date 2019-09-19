<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-header header">施設一を編集</h4>
            </div>
            <div class="col-md-12">
              <form @submit.prevent="updateFacility">
                <div class="form-group">
                  <label>
                    施設一名:
                    <span class="error">*</span>
                  </label>
                  <input type="text" class="form-control" v-model="facility.description" />
                  <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                </div>

                            <div class="form-group ">
                                <router-link to="/facilitieslist" class="btn btn-danger all-btn">キャンセル</router-link>   
                                <button class="btn news-post-btn all-btn" > 更新 </button>                                             
                                <!-- <router-link to="/facilitieslist" class="btn news-post-btn all-btn">更新</router-link>                                -->
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      errors: [],
      facility: {
        description: ""
      }
    };
  },
  created() {
    this.axios
      .get(`/api/facility/edit/${this.$route.params.id}`)
      .then(response => {
        this.facility = response.data;
      });
  },

  methods: {
    updateFacility() {
      this.axios
        .post(`/api/facility/update/${this.$route.params.id}`, this.facility)
        .then(response => {
          this.description = "";
          alert("Successfully Updated!");
          this.$router.push({ name: "facilitieslist" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  }
};
</script>


