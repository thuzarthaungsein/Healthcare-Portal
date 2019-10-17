<template>
  <div>
    <div class="col-md-12 scrolldiv4">
      <div class="row">
        <div class="col-12 text-center p-3 jt1 mb-4">
          <h4>求人応募フォーム</h4>
        </div>
      </div>
      <div class="col-md-12 register_box" v-if="type == 'register'">
        <form class="col-md-12 form-wrap">
          <input type="hidden" v-model="jobApply.job_id" >
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="first_name">
                <strong>
                  お名前
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="first_name"
                placeholder="トラスト　太郎"
                v-model="jobApply.first_name"
              />
              <div v-if="errors.first_name" class="text-danger">{{ errors.first_name }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="last_name">
                <strong>
                  お名前フリガナ
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="last_name"
                placeholder="トラスト　タロウ"
                v-model="jobApply.last_name"
              />
              <div v-if="errors.last_name" class="text-danger">{{ errors.last_name }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="birthday">
                <strong>
                  生年月日
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                placeholder="○○日○○月○○○○年"
                id="birthday"
                v-model="jobApply.birthday"
              />
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="gender">
                <strong>
                  性別
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right pl-4">
              <label>
                <input type="radio" class="custom-radio" v-model="jobApply.gender" value="Male" /> 女性
              </label>
              <label>
                <input type="radio" class="custom-radio" v-model="jobApply.gender" value="Female" /> 男性
              </label>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="postal">
                <strong>
                  郵便番号
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="postal"
                placeholder="165879"
                v-model="jobApply.postal"
                maxlength="7"
                v-on:keyup="getPostal"
              />
              <div v-if="errors.postal" class="text-danger">{{ errors.postal }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="str_address">
                <strong>
                  住所
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="str_address"
                v-model="jobApply.str_address"
              />
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="home_address">
                <strong>
                  番地以下
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="home_address"
                v-model="jobApply.home_address"
              />
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="phone">
                <strong>
                  電話番号
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input type="text" class="form-control box" id="phone" v-model="jobApply.phone" />
              <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="email">
                <strong>
                  メールアドレス
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                id="email"
                placeholder="例：abc@gmail.com"
                v-model="jobApply.email"
              />
              <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
            </div>
          </div>
          <!-- <div class="form-group m-0 row bd">
                <div class="col-md-3 col-sm-12 form-left">
                    <label for ="skill"  ><strong>Skill : </strong>  </label>
                </div>
                <div class="col-md-9 col-sm-12 form-right">
                    <input type="text" class="form-control box" id="skill" v-model="jobApply.skill"  >
                </div>
          </div>-->
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="remark">
                <strong>
                  リマーク
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <textarea
                name="remark"
                class="form-control"
                cols="50"
                rows="5"
                v-model="jobApply.remark"
              ></textarea>
            </div>
          </div>

          <div class="form-group m-0 row bd-all">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="terms">
                <strong>
                  個人情報について
                  <span class="error sp1">必須</span>
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <label for class="ml-4">
                <router-link to="/termsAndConditions" target="_blank">「プライバシーポリシー」</router-link>をご確認いただき、よろしければ「同意する」にチェックをして、内容を送信してください。
              </label>
              <br />
              <label class="ml-4">
                <input type="checkbox" v-model="jobApply.terms" /> 同意する
              </label>
              <div v-if="errors.terms" class="text-danger">{{ errors.terms }}</div>
            </div>
          </div>
          <div class="text-center mt-4 pb-5">
            <span
              :disabled="isDisabled"
              class="btn main-bg-color white all-btn"
              @click="checkValidate()"
            >確認画面へ進む</span>
          </div>
        </form>
      </div>

      <div class="col-md-7 offset-md-3 confirm_box" v-if="type == 'confirm'">
        <form >
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="first_name">
                <strong>お名前 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.first_name }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="last_name">
                <strong>お名前フリガナ :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.last_name }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="birthday">
                <strong>生年月日 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.birthday }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="gender">
                <strong>性別 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span v-if="jobApply.gender == 'Male'">女性</span>
              <span v-if="jobApply.gender == 'Female'">男性</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="postal">
                <strong>郵便番号 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.postal }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="str_address">
                <strong>住所 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.str_address }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="home_address">
                <strong>番地以下 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.home_address }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="phone">
                <strong>電話番号 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.phone }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="email">
                <strong>メールアドレス :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.email }}</span>
                <label for ="remark"  ><strong>連絡事項 <span class="error sp1">必須</span></strong>  </label>
            </div>
            <div class="col-sm-9">
                <textarea name="remark" placeholder="連絡事項等がございましたらご記入をおねがいいたます。" class="form-control" cols="50" rows="5" v-model="jobApply.remark"></textarea>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="qualification">
                <strong>資格 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.qualification }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="workable_day">
                <strong>実行可能日 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.workable_day }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="skill">
                <strong>スキル :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.skill }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="remark">
                <strong>リマーク :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span>{{ jobApply.remark }}</span>
            </div>
          </div>

          <div class="text-center">
            <span class="btn main-bg-color white all-btn" @click="editUserInfo()">戻る</span>
            <span class="btn main-bg-color white all-btn" @click="apply()">登録</span>
          </div>
          <br />
          <!-- <div v-if="success" class="alert alert-success mt-3">Apply sent!</div> -->

          <!-- <router-link to="" class="btn main-bg-color white all-btn">Apply</router-link> -->
        </form>
      </div>
      <div class="col-md-7 offset-md-3 confirm_box" v-if="type == 'completed'">
        <h5>Your job has been applied successfully.</h5><br>
        <router-link class="btn btn-info all-btn center" to="/"  > Back To Home </router-link><br>
        <br />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      errors: {
        first_name: "",
        last_name: "",
        postal: "",
        phone: "",
        email: "",
        terms: ""
      },

      jobApply: {
        job_id: "",
        first_name: "",
        last_name: "",
        birthday: "",
        gender: "",
        postal: "",
        str_address: "",
        home_address: "",
        phone: "",
        email: "",
        skills: [],
        remark: "",
        terms: false
      },
      Job: {
        fields: [
          {
            skills: []
          }
        ]
      },
      type: "register",
      city_list: []
    };
  },
  created() {
    this.jobApply.job_id = this.$route.params.job_id;
    this.axios.get("/api/getskill").then(response => {
      this.Job.fields = response.data;
    });
    this.axios.get("/api/hospital/citiesList").then(response => {
      this.city_list = response.data;
    });
  },
  computed: {
    isDisabled: function() {
      return !this.jobApply.terms;
    }
  },
  methods: {
    getPostal: function(event) {
      if (this.jobApply.postal.length > 4) {
        var postal = this.jobApply.postal;
        this.axios.post("/api/hospital/postList/" + postal).then(response => {
          var post_data = response.data;
          var length = response.data.length;
          if (length > 0) {
            var pref = post_data[0]["city_id"];
            if (post_data[0]["street"] == "") {
              this.jobApply.str_address =
                post_data[0]["pref"] + " - " + post_data[0]["city"];
            } else {
              this.jobApply.str_address =
                post_data[0]["pref"] +
                " - " +
                post_data[0]["city"] +
                " - " +
                post_data[0]["street"];
            }
          } else {
            this.jobApply.city = "";
            $("#jsErrorMessage").html(
              '<div class="error">郵便番号の書式を確認してください。</div>'
            );
          }
        });
      }
    },
    apply() {
      this.axios
        .post("/api/jobapply", this.jobApply)
        .then(response => {
          alert("Successful Apply");
          this.jobApply = response.data;
          this.errors.email = this.jobApply;
          this.type = "completed";
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
    getcheckbox(job) {
      this.jobApply.skills.push(job);
    },
    checkValidate() {
      if (this.jobApply.first_name) {
        this.errors.first_name = "";
      } else {
        this.errors.first_name = "ニュースの題名が必須です。";
      }
      if (this.jobApply.last_name) {
        this.errors.last_name = "";
      } else {
        this.errors.last_name = "ニュースの題名が必須です。";
      }
      if (this.jobApply.postal) {
        this.errors.postal = "";
      } else {
        this.errors.postal = "ニュースの題名が必須です。";
      }
      if (this.jobApply.phone) {
        this.errors.phone = "";
      } else {
        this.errors.phone = "ニュースの題名が必須です。";
      }
      if (this.jobApply.email) {
        this.errors.email = "";
      } else {
        this.errors.email = "ニュースの題名が必須です。";
      }
      if (this.jobApply.terms) {
        this.errors.terms = "";
      } else {
        this.errors.terms = "ニュースの題名が必須です。";
      }
      if (
        !this.errors.first_name &&
        !this.errors.first_name &&
        !this.errors.postal &&
        !this.errors.phone &&
        !this.errors.email &&
        !this.errors.terms
      ) {
        this.type = "confirm";
      }
    },
    editUserInfo() {
      this.type = "register";
    }
  }
};
</script>
