<template>
  <div>
    <div class="tab-content job-detail">
      <div class="col-md-12 pad-free m-b-20">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <router-link to="/" class="router-link-active">ホーム</router-link>
          </li>
          <li aria-current="page" class="breadcrumb-item active">仕事詳細</li>
        </ol>
      </nav>
    </div>

        <!-- <div class="col-12 text-center p-3 jt1 mb-4">
          <h4>求人応募フォーム</h4>
        </div> -->
        <div class="col-12 m-b-10">
          <h4 class="job-apply-color">求人応募フォーム</h4>
        </div>

      <div class="col-md-12 register_box mt-3" v-if="type == 'register'">
        <ul class="multi-step">
          <li class="active">1.必要事項のご入力</li>
          <li class="no-active">2.内容のご確認</li>
          <li>3.送信完了</li>
        </ul>
        <form class="col-md-12 form-wrap">
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
              <div v-if="errors.first_name" class="text-danger mt-2 ml-4">{{ errors.first_name }}</div>
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
              <div v-if="errors.last_name" class="text-danger mt-2 ml-4">{{ errors.last_name }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="birthday">
                <strong>
                  生年月日
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <!-- <input
                type="text"
                class="form-control box"
                placeholder="○○日○○月○○○○年"
                id="birthday"
                v-model="jobApply.birthday"
              /> -->
              <date-picker class="box date-of-establishment" v-model="jobApply.birthday" id ="datepickerbox" valueType="format"  style="margin-left: 11px;"></date-picker>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="gender">
                <strong>
                  性別
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right pl-4">
              <label class="control control--radio">
                <input type="radio"  v-model="jobApply.gender" value="Male" /> 女性
                <div class="control__indicator"></div>
              </label>
              <label class="control control--radio">
                <input type="radio" v-model="jobApply.gender" value="Female" /> 男性
                <div class="control__indicator"></div>
              </label>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="postal">
                <strong>
                  郵便番号
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
              <div v-if="errors.postal" class="text-danger mt-2 ml-4">{{ errors.postal }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="str_address">
                <strong>
                  都道府県
                </strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <input
                type="text"
                class="form-control box"
                v-model="jobApply.pref"
              />
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
              <div v-if="errors.str_address" class="text-danger mt-2 ml-4">{{ errors.str_address }}</div>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label for="home_address">
                <strong>
                  番地以下
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
              <div v-if="errors.phone" class="text-danger mt-2 ml-4">{{ errors.phone }}</div>
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
              <div v-if="errors.email" class="text-danger mt-2 ml-4">{{ errors.email }}</div>
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
                  ご希望等
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
            <div class="col-md-9 col-sm-12 form-right" style="cursor:pointer;">
              <label for class="ml-4">
                <router-link to="/termsAndConditions" target="_blank">「プライバシーポリシー」</router-link>をご確認いただき、よろしければ「同意する」にチェックをして、内容を送信してください。
              </label>
              <br />
              <label class="ml-4 control control--checkbox">
                <input type="checkbox" v-model="jobApply.terms" /> 同意する
                <div class="control__indicator"></div>
              </label>
              <div v-if="errors.terms" class="text-danger ml-4">{{ errors.terms }}</div>
            </div>
          </div>
          <div class="text-center mt-4 pb-5">
            <span
              :disabled="isDisabled"
              class="btn main-bg-color white all-btn width17"
              @click="checkValidate()"
            >確認画面へ進む</span>
          </div>
        </form>
      </div>

      <div class="col-md-12 confirm_box" v-if="type == 'confirm'">
        <div id="loader"></div>
        <ul class="multi-step">
          <li class="active">1.必要事項のご入力</li>
          <li class="active">2.内容のご確認</li>
          <li>3.送信完了</li>
        </ul>
        <form class="col-md-10 offset-md-1 form-wrap">
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="first_name">
                <strong>お名前</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.first_name }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="last_name">
                <strong>お名前フリガナ</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.last_name }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="birthday">
                <strong>生年月日</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.birthday }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="gender">
                <strong>性別</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span v-if="jobApply.gender == 'Male'" class="pl-4">女性</span>
              <span v-if="jobApply.gender == 'Female'" class="pl-4">男性</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="postal">
                <strong>郵便番号</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.postal }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="str_address">
                <strong>都道府県</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.pref }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="str_address">
                <strong>住所 :</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.str_address }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="home_address">
                <strong>番地以下</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.home_address }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="phone">
                <strong>電話番号</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.phone }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="email">
                <strong>メールアドレス</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.email }}</span>
            </div>
          </div>
          <!-- <div class="form-group m-0 row bd">
            <div class="col-sm-3">
              <label for="skill">
                <strong>スキル</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.skill }}</span>
            </div>
          </div> -->
          <div class="form-group m-0 row bd-all">
            <div class="col-sm-3 form-left">
              <label for="remark">
                <strong>ご希望等</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.remark }}</span>
            </div>
          </div>

          <div class="text-center mt-4 pb-5">
            <span class="btn btn-danger white all-btn width17" @click="editUserInfo()">入力画面へ戻る</span>
            <span class="btn main-bg-color white all-btn width17" @click="apply()">応募する</span>
          </div>
          <br />
          <!-- <div v-if="success" class="alert alert-success mt-3">Apply sent!</div> -->

          <!-- <router-link to="" class="btn main-bg-color white all-btn">Apply</router-link> -->
        </form>
      </div>
      <div class="col-md-12 confirm_box" v-if="type == 'completed'">
        <ul class="multi-step">
          <li class="active">1.必要事項のご入力</li>
          <li class="active">2.内容のご確認</li>
          <li class="active">3.送信完了</li>
        </ul>
        <div class="text-center">
          <h3>入力内容は送信されました‼</h3>
          <br />
          <p>ご登録頂き、ありがとうございます。</p>
          <p>今後ともどうぞよろしくお願い申し上げます。</p>
          <br />
          <br />
          <router-link class="btn btn-info all-btn width17" to="/">ホームへ戻る</router-link>
        </div>

        <br />
        <br />
      </div>
    </div>
  </div>
</template>
<script>
import DatePicker from 'vue2-datepicker';

export default {
  components: { DatePicker },
  data() {
    return {
      errors: {
        first_name: "",
        last_name: "",
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
        pref: "",
        city_id: "",
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
              this.jobApply.city_id = post_data[0]["city_id"];
              this.jobApply.pref = post_data[0]["pref"];
              this.jobApply.str_address = post_data[0]["city"];
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

    this.$loading(true);

      // $("#loader").css("display", "block");
      this.axios
        .post("/api/jobapply", this.jobApply)
        .then(response => {
          // alert("Successful Apply");
          this.$loading(false);
          // $("#loader").css("display", "none");
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
        this.errors.first_name = "お名前が必須です。";
      }
      if (this.jobApply.last_name) {
        this.errors.last_name = "";
      } else {
        this.errors.last_name = "フリガナが必須です。";
      }
      if (this.jobApply.str_address) {
        this.errors.str_address = "";
      } else {
        this.errors.str_address = "電話番号が必須です。";
      }
      if (this.jobApply.phone) {
        this.errors.phone = "";
      } else {
        this.errors.phone = "電話番号が必須です。";
      }
      if (this.jobApply.email) {
        this.errors.email = "";
      } else {
        this.errors.email = "メールアドレスが必須です。";
      }
      if (this.jobApply.terms) {
        this.errors.terms = "";
      } else {
        this.errors.terms = "「同意する」にチェックが必須です。";
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
