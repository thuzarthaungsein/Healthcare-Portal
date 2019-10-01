<template>
  <div class="row">
    <!--menu tabs-->
    <ul class="nav nav-tabs card-head-tabs col-12" role="tablist" id="navtab">
      <li role="presentation" class="subtab1 nav-item">
        <a href="#tab1" role="tab" data-toggle="tab" class="nav-link">
          <i class="fas fa-newspaper"></i> ニュース
        </a>
      </li>
      <li role="presentation" class="subtab2 nav-item">
        <a href="#tab2" role="tab" data-toggle="tab" class="nav-link">
          <i class="fas fa-briefcase-medical"></i> 病院検索
        </a>
      </li>
      <li role="presentation" class="active subtab3 nav-item">
        <a href="#tab3" role="tab" data-toggle="tab" class="nav-link active">
          <i class="fas fa-user-md"></i> 介護検索
        </a>
      </li>
      <li role="presentation" class="subtab5 nav-item">
        <a href="#tab4" role="tab" data-toggle="tab" class="nav-link">
          <i class="fas fa-users"></i> 求人検索
        </a>
      </li>
    </ul>
    <!--end menu tabs-->
    <div class="tab-content tab-content1 tabs col-12">
      <div role="tabpanel" class="tab-pane fade" id="tab1">
        <News></News>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tab2">
        <hospitalSearch></hospitalSearch>
      </div>
      <div role="tabpanel" class="tab-pane active" id="tab3">
        <div class="col-12 scrolldiv2 pb-5">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <span @click="changeRoute()" class="link-span">介護検索</span>
                </li>
                <li class="breadcrumb-item">
                  <a href="/">新しい詳細</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">就職活動リスト</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-12">
                <!--next_form-->
                <div class="tabs-wrap">
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a
                        href="#input"
                        aria-controls="input"
                        role="tab"
                        data-toggle="tab"
                        aria-expanded="true"
                      ></a>
                    </li>
                    <li>
                      <a
                        href="#output"
                        aria-controls="output"
                        role="tab"
                        data-toggle="tab"
                        aria-expanded="false"
                      ></a>
                    </li>
                    <li>
                      <a
                        href="#review"
                        aria-controls="review"
                        role="tab"
                        data-toggle="tab"
                        aria-expanded="false"
                      ></a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="input">
                      <!--inputform-->
                      <form class="col-md-12 form-wrap" @submit.prevent="add" method="post">
                        <div class="mb-5">
                          <h3 class="form-tit">確認内容</h3>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>お名前</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputSpan"
                                id="outputSpan"
                                class="mailbox"
                                v-model="comments.name"
                                disabled
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>ふりがな</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputfurigana"
                                id="outputfurigana"
                                class="mailbox"
                                disabled
                                v-model="comments.furigana"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>ご住所</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <div class="form-group row pl-3">
                                <div class="col-md-12">
                                  <label>郵便番号</label>
                                </div>
                                <div class="col-md-12 p-0">
                                  <input
                                    type="text"
                                    name="outputpostal"
                                    id="outputpostal"
                                    class="mailbox m-b-10"
                                    disabled
                                    v-model="comments.postal"
                                  />
                                </div>
                              </div>
                              <div class="form-group row pl-3">
                                <div class="col-md-12">
                                  <label>都道府県</label>
                                </div>
                                <div class="col-md-12 p-0">
                                  <input
                                    type="text"
                                    name="outputdivision"
                                    id="outputdivision"
                                    class="mailbox m-b-15"
                                    disabled
                                    v-model="comments.division"
                                  />
                                </div>
                              </div>
                              <div class="form-group row pl-3">
                                <div class="col-md-12">
                                  <label>市区町村、番地（建物名）</label>
                                </div>
                                <div class="col-md-12 p-0">
                                  <input
                                    type="text"
                                    name="outputcity"
                                    id="outputcity"
                                    class="mailbox"
                                    disabled
                                    v-model="comments.city"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>電話番号</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="number"
                                name="outputphone"
                                id="outputphone"
                                class="mailbox"
                                disabled
                                v-model="comments.phone"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>メールアドレス</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="email"
                                name="outputmail"
                                id="outputmail"
                                class="mailbox"
                                disabled
                                v-model="comments.mail"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd-all">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>プレゼントのご希望</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputpresent"
                                id="outputpresent"
                                class="mailbox"
                                disabled
                                v-model="comments.present"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="mb-5">
                          <h3 class="form-tit">入居対象者様について</h3>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>入居対象者様とのご関係</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputrelation"
                                id="outputrelation"
                                class="mailbox"
                                v-model="comments.relation"
                                disabled
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>お名前</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputttname"
                                id="outputttname"
                                class="mailbox"
                                v-model="comments.ttname"
                                disabled
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>性別</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputsex"
                                id="outputsex"
                                class="mailbox"
                                disabled
                                v-model="comments.sex"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>年齢</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputyears"
                                id="outputyears"
                                class="mailbox"
                                disabled
                                v-model="comments.years"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>介護度</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputnursing"
                                id="outputnursing"
                                class="mailbox"
                                disabled
                                v-model="comments.nursing"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>認知症</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputfect"
                                id="outputfect"
                                class="mailbox"
                                disabled
                                v-model="comments.fect"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>入居希望時期</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputdesire"
                                id="outputdesire"
                                class="mailbox"
                                disabled
                                v-model="comments.desire"
                              />
                            </div>
                          </div>
                          <div class="form-group m-0 row bd-all">
                            <div class="col-md-3 col-sm-12 form-left">
                              <label>ご要望や、お困りごと、その他お問い合わせ</label>
                            </div>
                            <div class="col-md-9 col-sm-12 form-right">
                              <input
                                type="text"
                                name="outputhope"
                                id="outputhope"
                                class="mailbox"
                                disabled
                                v-model="comments.hope"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                          <router-link
                            :to="{name: 'nursingFavouriteMail', params: {input_data: this.comments, bk_postal: this.comments.selectedValue}, props: true}"
                            class="btn btn-success m-r-8"
                          >戻る</router-link>&nbsp;
                          <button
                            class="btn btn-danger m-t-15 m-l-10 m-b-15 submit-button"
                            id="myButton"
                          >この内容で送信この内容で送信</button>
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
      <div role="tabpanel" class="tab-pane fade" id="tab4">
        <jobSearch></jobSearch>
      </div>
    </div>
    <!-- 
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">ホーム</a>
          </li>
          <li class="breadcrumb-item">
            <a href="../news/news_details.html">新しい詳細</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">就職活動リスト</li>
        </ol>
      </nav>
    </div>
    <div class="col-12 scrolldiv3">
      <div class="row">
        <div class="col-md-12">
          <form class="col-md-11" @submit.prevent="add" method="post">
            <h3 style="border-bottom:1px solid green;margin-bottom:30px;">確認内容</h3>
            <div style="border:1px solid #dad6d6;padding:30px;border-radius:5px;">
              <table class="table">
                <tr>
                  <td class="bk">お名前</td>
                  <td>
                    <input
                      type="text"
                      name="outputSpan"
                      id="outputSpan"
                      class="mailbox"
                      v-model="comments.name"
                      disabled
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">ふりがな</td>
                  <td>
                    <input
                      type="text"
                      name="outputfurigana"
                      id="outputfurigana"
                      class="mailbox"
                      disabled
                      v-model="comments.furigana"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">ご住所</td>
                  <td>
                    <div style="margin-bottom:13px;">郵便番号</div>
                    <input
                      type="text"
                      name="outputpostal"
                      id="outputpostal"
                      class="mailbox m-b-10"
                      disabled
                      v-model="comments.postal"
                    />
                    <div class="m-b-15">都道府県</div>
                    <input
                      type="text"
                      name="outputdivision"
                      id="outputdivision"
                      class="mailbox m-b-15"
                      disabled
                      v-model="comments.division"
                    />
                    <div class="m-b-15">市区町村、番地（建物名）</div>
                    <input
                      type="text"
                      name="outputcity"
                      id="outputcity"
                      class="mailbox"
                      disabled
                      v-model="comments.city"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">電話番号</td>
                  <td>
                    <input
                      type="number"
                      name="outputphone"
                      id="outputphone"
                      class="mailbox"
                      disabled
                      v-model="comments.phone"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">メールアドレス</td>
                  <td>
                    <input
                      type="email"
                      name="outputmail"
                      id="outputmail"
                      class="mailbox"
                      disabled
                      v-model="comments.mail"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">プレゼントのご希望</td>
                  <td>
                    <input
                      type="text"
                      name="outputpresent"
                      id="outputpresent"
                      class="mai
                      disabled
                      v-model="comments.present"
                    />
                  </td>
                </tr>
              </table>
            </div>

            <h3 style="border-bottom:1px solid green;margin-bottom:30px;">入居対象者様について</h3>
            <div style="border:1px solid #dad6d6;padding:30px;border-radius:5px;">
              <table class="table">
                <tr>
                  <td class="bk">入居対象者様とのご関係</td>
                  <td>
                    <input
                      type="text"
                      name="outputrelation"
                      id="outputrelation"
                      class="mailbox"
                      v-model="comments.relation"
                      disabled
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">お名前</td>
                  <td>
                    <input
                      type="text"
                      name="outputttname"
                      id="outputttname"
                      class="mailbox"
                      v-model="comments.ttname"
                      disabled
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">性別</td>
                  <td>
                    <input
                      type="text"
                      name="outputsex"
                      id="outputsex"
                      class="mailbox"
                      disabled
                      v-model="comments.sex"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">年齢</td>
                  <td>
                    <input
                      type="text"
                      name="outputyears"
                      id="outputyears"
                      class="mailbox"
                      disabled
                      v-model="comments.years"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">介護度</td>
                  <td>
                    <input
                      type="text"
                      name="outputnursing"
                      id="outputnursing"
                      class="mai
                      disabled
                      v-model="comments.nursing"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">認知症</td>
                  <td>
                    <input
                      type="text"
                      name="outputfect"
                      id="outputfect"
                      class="mai
                      disabled
                      v-model="comments.fect"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">入居希望時期</td>
                  <td>
                    <input
                      type="text"
                      name="outputdesire"
                      id="outputdesire"
                      class="mai
                      disabled
                      v-model="comments.desire"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="bk">ご要望や、お困りごと、その他お問い合わせ</td>
                  <td>
                    <input
                      type="text"
                      name="outputhope"
                      id="outputhope"
                      class="mai
                      disabled
                      v-model="comments.hope"
                    />
                  </td>
                </tr>
              </table>
            </div>
            <router-link
              :to="{name: 'nursingFavouriteMail', params: {input_data: this.comments, bk_postal: this.comments.selectedValue}, props: true}"
              class="btn btn-success m-r-8"
            >戻る</router-link>&nbsp;
            <button
              class="btn btn-danger m-t-15 m-l-10 m-b-15 submit-button"
              id="myButton"
            >この内容で送信この内容で送信</button>
          </form>
        </div>
      </div>
    </div>-->
  </div>
</template>
<script>
export default {
  props: ["favmail"],
  data() {
    return {
      comments: {
        name: "",
        furigana: "",
        postal: "",
        division: "",
        city: "",
        phone: "",
        mail: "",
        present: "",
        relation: "",
        ttname: "",
        sex: "",
        years: "",
        nursing: "",
        fect: "",
        desire: "",
        hope: "",
        fav_mail: [{}],
        fav_id: [{}],
        fav_name: [{}],
        arr_reserve: [{}],
        arr_document: [{}],
        selectedValue: 0
      },
      errors: [],
      fav_nursing: [],
      local_sto: "",
      post_list: [],
      city_list: []
    };
  },
  created() {
    this.comments = JSON.parse(localStorage.getItem("inputValue"));
    console.log("confirm", this.comments);
    if (this.comments.present) {
      this.comments.present = "する";
    } else {
      this.comments.present = "しない";
    }
    this.axios.get("/api/hospital/citiesList").then(response => {
      this.city_list = response.data;
      console.log("testing", this.comments.division);
      for (var i = 0; i < this.city_list.length; i++) {
        if (this.comments.division == this.city_list[i].id) {
          this.comments.division = this.city_list[i].city_name;
        }
      }
    });
  },
  methods: {
    add() {
      axios
        .post("/api/nurse/add", this.comments)
        .then(response => {
          alert("Mail Sent Successfully !");
          location.href = "nursingFavouriteMail";
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
      localStorage.removeItem("item");
      localStorage.removeItem("inputValue");
      localStorage.removeItem("reserve");
      localStorage.removeItem("document");
    }
    // back() {
    //     this.$router.push({
    //             name: 'nursingFavouriteMail',
    //             params: { input_data: this.comments, bk_postal: this.comments.selectedValue},
    //             props: true
    //         });
    // },
  }
};
</script>