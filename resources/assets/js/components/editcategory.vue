<template>
  <div id="content" class="row">
    <div class="col-md-12">
      <div class="card text-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-header header">カテゴリ更新</h4>
            </div>

            <form @submit.prevent="updateCategory" class="col-md-12">
              <div class="form-group">
                <label>
                  カテゴリ名:
                  <span class="error">*</span>
                </label>
                <input type="text" class="form-control" v-model="category.name" placeholder="カテゴリ名を入力してください。" />
                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
              </div>

              <div class="form-group">
                <router-link to="/categorylist" class="btn btn-danger all-btn">キャンセル</router-link>
                <button class="btn news-post-btn all-btn">更新する</button>
                <!-- <router-link to="/categorylist" class="btn news-post-btn all-btn">更新</router-link> -->
                <!-- <a href="categorylist" class="btn btn-warning">Cancel</a> -->
              </div>
            </form>
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
      category: {
        name: "",
        user_id: "",
        recordstatus: ""
      }
    };
  },
  created() {
    this.axios
      .get(`/api/category/edit/${this.$route.params.id}`)
      .then(response => {
        this.category = response.data;
      });
  },

  methods: {
    updateCategory() { 
      this.axios.post(`/api/category/update/${this.$route.params.id}`, this.category).then(response => {
        this.name = "";
        this.$swal({
            position: 'top-end',
            type: 'success',
            title: '更新されました',
            showConfirmButton: false,
            timer: 1500,
            width: 250,
            height: 200,
        })
         this.$router.push({ name: "categorylist" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
      // this.axios
      //   .post(`/api/category/update/${this.$route.params.id}`, this.category)
      //   .then(response => {
      //     this.name = "";
      //     alert("Successfully Updated!");
      //     this.$router.push({ name: "categorylist" });
      //   })
      //   .catch(error => {
      //     if (error.response.status == 422) {
      //       this.errors = error.response.data.errors;
      //     }
      //   });
    }
  }
};
</script>