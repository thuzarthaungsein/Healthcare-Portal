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
          <h4 class="job-apply-color">{{Job.title}}</h4>
        </div>

      <div class="col-md-12 register_box mt-3" v-if="type == 'register'">
        <ul class="multi-step">
          <li class="active">1.必要事項のご入力</li>
          <li class="no-active">2.内容のご確認</li>
          <li>3.送信完了</li>
        </ul>
<!-- test date-picker -->
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
                <input type="text" class="form-control float-left" id="first_name" placeholder="お名前を入力してください。" v-model="jobApply.first_name" @focusout="focusName" @change="aggreBtn"/>
                <span class="float-left eg-txt">例）探し 太郎</span>
                <span class="error m-l-30" v-if="focus_name">※入力は必須です。</span>
                <!-- <div v-if="errors.first_name" class="text-danger mt-2 ml-4">{{ errors.first_name }}</div> -->
            </div>
        </div>
        <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
                <label for="last_name">
                    <strong>
                  ふりがな
                  <span class="error sp1">必須</span>
                </strong>
                </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
                <input type="text" class="form-control float-left" id="last_name" placeholder="ふりがなを入力してください。" v-model="jobApply.last_name" @keyup="ChekChar" @focusout="focusLname" @change="aggreBtn"/>
                <span class="float-left eg-txt"> 例）さがし たろう</span>
                <span class="error m-l-30" v-if="focus_lname">※入力は必須です。</span>
                <div v-if="errors.last_name" class="text-danger mt-2 ml-4">{{ errors.last_name }}</div> 
                <div class="text-danger mt-2 ml-4 char-err"></div>
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

                <date-picker class="box date-of-establishment" v-model="jobApply.birthday" id="datepickerbox" valueType="format" style="margin-left: 11px;"></date-picker>

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
                    <input type="radio" v-model="jobApply.gender" value="Female" /> 男性
                    <div class="control__indicator"></div>
                </label>
                <label class="control control--radio">
                    <input type="radio" v-model="jobApply.gender" value="Male" /> 女性
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
                <input type="text" class="form-control box" id="postal" placeholder="郵便番号を入力してください。" v-model="jobApply.postal" maxlength="7" v-on:keyup="getPostal" />
                <div id="jsErrorMessage" class="float-left eg-txt"></div>
                <span class="float-left eg-txt">例）1006740 (<a href="https://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>)</span>
            </div>
        </div>
        <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
                <label for="str_address">
                    <strong>
                  都道府県
                </strong>
                <span class="error sp1">必須</span>
                </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
                <select v-model="jobApply.selectedValue" class="division form-control" id="division" @change="aggreBtn">
                    <option value="0">選択してください。</option>
                    <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                    {{cities.city_name}}
                    </option>
                </select>
                <span v-if="errors.division" class="error">{{errors.division[0]}}</span>
                <!-- <input type="text" class="form-control box" v-model="jobApply.pref" /> -->
            </div>
        </div>
        <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
                <label for="str_address">
                    <strong>
                  市区町村、番地（建物名)
                  <span class="error sp1">必須</span>
                </strong>
                </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
                <input type="text" class="city form-control float-left" id="str_address" v-model="jobApply.str_address" placeholder="市区町村、番地を入力してください。" @focusout="focusCity" @change="aggreBtn"/>
                <span class="float-left eg-txt">例）東京都千代田区丸の内1-9-1 グラントウキョウノースタワー40階</span>
                <br>
                <span class="error m-l-30" v-if="focus_city">※入力は必須です。</span>
                <div v-if="errors.str_address" class="text-danger mt-2 ml-4">{{ errors.str_address }}</div>
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
                <input type="text" class="form-control box" id="phone" v-model="jobApply.phone" placeholder="電話番号を入力してください。" @focusout="focusMail"  @change="aggreBtn"/>
                <span class="error m-l-30" v-if="focus_mail">※入力は必須です。</span>
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
                <input type="text" class="form-control float-left" id="email" placeholder="メールアドレスを入力してください。" v-model="jobApply.email" @focusout="focusMail"  @change="aggreBtn"/>
                <span class="float-left eg-txt"> 例）abc@example.jp （半角）</span>
                <span class="error m-l-30" v-if="focus_mail">※入力は必須です。</span>
            </div>
        </div>
        <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
                <label for="remark">
                    <strong>
                  ご希望等
                </strong>
                </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
                <textarea name="remark" class="form-control" cols="50" rows="5" v-model="jobApply.remark"></textarea>
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
                    <input type="checkbox" v-model="jobApply.terms" @change="aggreBtn"/> 同意する
                    <div class="control__indicator"></div>
                </label>
                <div v-if="errors.terms" class="text-danger ml-4">{{ errors.terms }}</div>
            </div>
        </div>
        <div class="mt-4 col-sm-3 submit txt-err" v-if="btn_disable">
            <div class="error">※未入力の必須項目がございます</div>
        </div>
        <div class="text-center mt-2 pb-5">
            <button type="button" :disabled="isdisable" class="btn main-bg-color white all-btn width17" @click="checkValidate()">確認画面へ進む</button>
        </div>
</form>

<!-- end date-picker -->

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
              <span class="pl-4">{{ jobApply.selectedValue }}</span>
            </div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="str_address">
                <strong>市区町村、番地（建物名)</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.str_address }}</span>
            </div>
          </div>
          <!-- <div class="form-group m-0 row bd">
            <div class="col-sm-3 form-left">
              <label for="home_address">
                <strong>番地以下</strong>
              </label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">
              <span class="pl-4">{{ jobApply.home_address }}</span>
            </div>
          </div> -->
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
            </div>f
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
        terms: false,
        selectedValue: 0,
        division: 0,
        focus_name: false,
        focus_lname: false,
        focus_pref: false,
        focus_city: false,
        focus_mail: false
      },
    Job: {
      title: ''
        // fields: [
        //   {
        //     skills: []
        //   }
        // ]
      },
    type: "register",
    city_list: [],
    focus_name: false,
    focus_lname: false,
    focus_pref: false,
    focus_city: false,
    focus_mail: false,
    btn_disable: false

    };
  },
  created() {
    this.jobApply.job_id = this.$route.params.job_id;
    // this.axios.get("/api/getskill").then(response => {
    //   this.Job.fields = response.data;
    // });
    this.axios.get("/api/getjobtitle/" + this.jobApply.job_id).then(response => {
      this.Job.title = response.data[0].title;
    });
    this.axios.get("/api/hospital/citiesList").then(response => {
      this.city_list = response.data;
    });
    if(this.jobApply.first_name != '' && this.jobApply.last_name != '' && this.jobApply.selectedValue != 0 && this.jobApply.str_address != '' && this.jobApply.email != '' && this.jobApply.terms == true){
        this.btn_disable=false;
    }else{
        this.btn_disable=true;
    }
  },
  computed: {
    isdisable: function() {
        return this.btn_disable;
    }
  },
  methods: {
    getPostal: function(event) {
                if (this.jobApply.postal.length > 4) {
                    var postal = this.jobApply.postal;
                    this.axios
                        .post('/api/hospital/postList/' + postal)
                        .then(response => {
                            var post_data = response.data;
                            var length = response.data.length;
                            if (length > 0) {
                                var pref = post_data[0]['city_id'];
                                if (post_data[0]['street'] == '') {
                                    this.jobApply.str_address = post_data[0]['city'];
                                } else {
                                    this.jobApply.str_address = post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                                this.jobApply.selectedValue = pref;
                                this.jobApply.division = pref;
                                 $('#jsErrorMessage').html('<div class="error"></div>');
                            } else {
                                this.jobApply.str_address = '';
                                this.jobApply.selectedValue = 0;
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
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
  
    //   if (this.jobApply.first_name) {
    //     this.errors.first_name = "";
    //   } else {
    //     this.errors.first_name = "お名前が必須です。";
    //   }
    //   if (this.jobApply.last_name) {
    //     this.errors.last_name = "";
    //   } else {
    //     this.errors.last_name = "ふりがなが必須です。";
    //   }
    //   if (this.jobApply.str_address) {
    //     this.errors.str_address = "";
    //   } else {
    //     this.errors.str_address = "電話番号が必須です。";
    //   }
    //   if (this.jobApply.phone) {
    //     this.errors.phone = "";
    //   } else {
    //     this.errors.phone = "電話番号が必須です。";
    //   }
    //   if (this.jobApply.email) {
    //     this.errors.email = "";
    //   } else {
    //     this.errors.email = "メールアドレスが必須です。";
    //   }
    //   if (this.jobApply.terms) {
    //     this.errors.terms = "";
    //   } else {
    //     this.errors.terms = "「同意する」にチェックが必須です。";
    //   }
      if (
        !this.errors.first_name &&
        !this.errors.first_name &&
        !this.errors.postal &&
        !this.errors.email &&
        !this.errors.terms
      ) {
        this.type = "confirm";
         for (var i = 0; i < this.city_list.length; i++) {
        if (this.jobApply.selectedValue == this.city_list[i].id) {
            this.jobApply.selectedValue = this.city_list[i].city_name;
        }
         }
      }
    },
    editUserInfo() {
      this.type = "register";
    },
    focusName: function(event) {
        if(this.jobApply.first_name != ''){
            this.focus_name=false;
        }else{
            this.focus_name=true;
        }
    },
    focusLname: function(event) {
        if(this.jobApply.last_name != ''){
            this.focus_lname=false;
        }else{
            this.focus_lname=true;
        }
    },
    focusCity: function(event) {
        if(this.jobApply.str_address != ''){
            this.focus_city=false;
        }else{
            this.focus_city=true;
        }
    },
    focusMail: function(event) {
        if(this.jobApply.email != '' || this.jobApply.phone != ''){
            this.focus_mail=false;
        }else{
            this.focus_mail=true;
        }
    },
    aggreBtn: function(){
        console.log('job',this.jobApply)
        if(this.jobApply.first_name != '' && this.jobApply.last_name != '' && this.jobApply.selectedValue != 0 && this.jobApply.str_address != '' && this.jobApply.email != '' && this.jobApply.terms == true || this.jobApply.phone){
            this.btn_disable=false;
        }else{
            this.btn_disable=true;
        }
    },
    ChekChar: function(event) {
        $('.char-err').text('');
        var input_val = $('#furigana').val();
        var code = 0;
               
        code = input_val.charCodeAt();
        if ((12448<= code && code <= 12543) || (19968<= code && code <= 19893)) {
                        
        } else {
          $('.char-err').text('カタカナのみを書いてください!');
        }
        
      }
   
  }
};
</script>
