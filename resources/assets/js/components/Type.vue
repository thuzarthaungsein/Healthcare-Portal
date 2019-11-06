<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-header header">{{ header }}</h4>
            </div>
            <div class="col-md-12">
              <form @submit.prevent="add">
                <div class="form-group">
                  <label>
                    事業者の種類 :
                    <span class="error">*</span>
                  </label>
                  <input type="text" class="form-control" v-model="Type.name" placeholder="事業者の種類" />
                  <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                </div>
                <div class="form-group">
                  <label>
                    ペアレント :
                    <span class="error">*</span>
                  </label>
                  <select v-model="selectedValue" class="form-control" @change="getParent()">
                    <option value="0">なし</option>
                    <option
                      v-for="typelist in TypeList"
                      :key="typelist.id"
                      v-bind:value="typelist.id"
                    >{{typelist.name}}</option>
                  </select>
                </div>
                <br />
                <div class="form-group">
                  <router-link class="btn btn-danger all-btn" to="/typelist">キャンセル</router-link>
                  <!-- <router-link class="btn news-post-btn all-btn" to="/featurelist" >Create</router-link>             -->
                  <button class="btn news-post-btn all-btn">{{subtitle}}</button>
                </div>
              </form>
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

      Type: {
        name: "",
        parent: ""
      },
      TypeList: {
        id: "",
        name: ""
      },

      selectedValue: 0,
      header: "タイプ作成",
      subtitle: "作成する"
    };
  },
  created() {
    this.axios.get("/api/types/typelist").then(
      function(response) {
        this.TypeList = response.data;
      }.bind(this)
    );
  },
  mounted() {
    if (this.$route.params.id) {
      this.axios
        .get(`/api/types/edit/${this.$route.params.id}`)
        .then(response => {
          this.Type.name = response.data.name;
          this.Type.parent = response.data.parent;
          this.selectedValue = response.data.parent;
          this.TypeList.name = response.data.name;
          this.header = " タイプ更新";
          this.subtitle = "更新する";
          return this.header;
          return this.subtitle;
        });
    }
  },

  methods: {
    add() {
      if (this.$route.params.id) {
        this.updateType();
      } else {
        this.$swal({
          title: "確認",
          text: "作成よろしいでしょうか",
          type: "info",
          width: 350,
          height: 200,
          showCancelButton: true,
          confirmButtonColor: "#6cb2eb",
          cancelButtonColor: "#b1abab",
          cancelButtonTextColor: "#000",
          cancelButtonText: "キャンセル",
          confirmButtonText: "作成",
          confirmButtonClass: "all-btn",
          cancelButtonClass: "all-btn"
        }).then(response => {
          this.axios
            .post("/api/types/add", this.Type)
            .then(response => {
              this.name = "";
              console.log(response);
              this.$swal({
                position: "top-end",
                type: "作成済",
                title: "作成されました",
                text: "事業者の種類を作成されました。",
                type: "success",
                width: 350,
                height: 200,
                confirmButtonText: "はい",
                confirmButtonColor: "#6cb2eb"
              });
              // alert('Successfully Created')
              this.$router.push({ name: "typelist" });
            })
            .catch(error => {
              if (error.response.status == 422) {
                this.errors = error.response.data.errors;
              }
            });
        });
      }
    },
    getParent: function() {
      this.Type.parent = this.selectedValue;
    },
    updateType() {
      this.$swal({
        title: "確認",
        text: "編集をよろしでしょうか。",
        type: "info",
        width: 350,
        height: 200,
        showCancelButton: true,
        confirmButtonColor: "#6cb2eb",
        cancelButtonColor: "#b1abab",
        cancelButtonTextColor: "#000",
        cancelButtonText: "キャンセル",
        confirmButtonText: "更新",
        confirmButtonClass: "all-btn",
        cancelButtonClass: "all-btn"
      }).then(response => {
        this.axios
          .post(`/api/types/update/${this.$route.params.id}`, this.Type)
          .then(response => {
            this.types = response.data;
            this.norecord = this.types.length;
            this.$swal({
              title: "更新済",
              text: "事業者の種類を更新されました。",
              type: "success",
              width: 350,
              height: 200,
              confirmButtonText: "はい",
              confirmButtonColor: "#6cb2eb"
            });
            this.$router.push({ name: "typelist" });
          })
          .catch(() => {
            this.$swal("Failed", "wrong");
          });
      });
    }
  }
};
</script>
