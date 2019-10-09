<template>
  <div id="content" class="row">
    <div class="col-md-12">
      <div class="card text-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-header header">test</h4>
            </div>

            <form @submit.prevent="updateStation" class="col-md-12">
              <div class="form-group">
                <label>
                  駅名:
                  <span class="error">*</span>
                </label>
                <input type="text" class="form-control" v-model="station.name" placeholder="種別名" />
                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
              </div>

              <div class="form-group">
                <router-link to="/stationlist" class="btn btn-danger all-btn">キャンセル</router-link>
                <button class="btn news-post-btn all-btn">更新</button>
                <!-- <router-link to="/stationlist" class="btn news-post-btn all-btn">更新</router-link> -->
                <!-- <a href="stationlist" class="btn btn-warning">Cancel</a> -->
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
      station: {
        name: "",
        user_id: "",
        recordstatus: ""
      }
    };
  },
  created() {
    this.axios
      .get(`/api/station/edit/${this.$route.params.id}`)
      .then(response => {
        this.station = response.data;

      });
  },

  methods: {
    updateStation() { 
      this.axios.post(`/api/station/update/${this.$route.params.id}`, this.station).then(response => {
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
         this.$router.push({ name: "stationlist" });
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