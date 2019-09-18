<template>
  <!-- Page Content  -->
  <div class="row m-0">
    <div class="col-12 scrolldiv2">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">ホーム</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row m-0">
        <div v-for="hos_profile in fav_hospital" :key="hos_profile.id" class="col-lg-12 pt-3 bd">
          <div class="row m-0">
            <h5 class="m-b-10 col-12 hos-tit">
              <a href="#">{{hos_profile.name}}</a>
            </h5>
            <div class="col-lg-2 col-md-12 mb-5">
              <div class="hos-img">
                <img class="col-md-12" v-bind:src="'/images/' + hos_profile.logo" alt />
              </div>
              <button
                class="btn btn-danger all-btn hos-btn"
                @click="removeFav(hos_profile.customer_id)"
              >最近見た施設から削除</button>
            </div>
            <div class="col-lg-7 col-md-12 mb-4">
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Website</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>
                    <a href="#" target="_blank">{{hos_profile.website}}</a>
                  </p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Medical Departement</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.medical_department}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Phone</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.phone}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Access</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.access}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Email</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.email}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Details</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.details_info}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Subjects</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.subject}}</p>
                </div>
              </div>
              <div class="row list-wrap">
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <p>
                    <strong>Location</strong>
                  </p>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                  <p>{{hos_profile.city_name}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <ul class="fac_container">
                <li v-for="feature in hos_profile.special_features" :key="feature.id">{{ feature }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--next_form-->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="container tabs-wrap">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a
                  href="#input"
                  aria-controls="input"
                  role="tab"
                  data-toggle="tab"
                  aria-expanded="true"
                ></a>
                <!-- <button class="btn btn-success m-t-15"><a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true" style="color:white;">戻る</a></button> -->
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
                <form class="col-md-12">
                  <h3
                    style="border-bottom:1px solid green;display:inline-block;margin-bottom:30px;"
                  >資料請求される方について</h3>
                  <div class="form-group">
                    <label>
                      お名前:
                      <span class="error">*</span>
                    </label>
                    <!-- <input type="text" class="form-control" placeholder="お名前を入力してください。"> -->
                    <input
                      type="text"
                      id="count"
                      name="count"
                      class="form-control"
                      placeholder="お名前を入力してください。"
                      required
                    />
                    <br />
                  </div>

                  <div class="form-group">
                    <label>
                      ふりがな:
                      <span class="error">*</span>
                    </label>
                    <input
                      type="text"
                      id="furigana"
                      name="furigana"
                      class="form-control"
                      placeholder="ふりがなを入力してください。"
                      required
                    />
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>
                        ご住所:
                        <span class="error">*</span>
                      </label>
                      <br />
                      <label>
                        郵便番号:
                        <span class="error">*</span>
                      </label>
                      <!-- <input type="text" id="postal" name="postal" class="form-control" placeholder="郵便番号を入力してください。" required> -->
                      <autocomplete
                        v-model="post"
                        :source="post_list"
                        ref="autocomplete"
                        results-property="data"
                        defaultOpen="false"
                        placeholder="郵便番号を入力してください。"
                        input-class="form-control postal"
                        @input="addDistributionGroup()"
                        id="postal"
                      ></autocomplete>
                      <br />

                      <label>
                        都道府県
                        <span class="error">*</span>
                      </label>
                      <!-- <select class="form-control" id="division" required>
                                                <option>選択してください</option>
                                                <option>
                                                    cccccccccc
                                                </option>
                                                <option>
                                                    bbbbbbbbbb
                                                </option>
                      </select>-->
                      <select
                        v-model="selectedValue"
                        class="form-control"
                        id="division"
                        @change="getCities()"
                      >
                        <option value="0">選択してください。</option>
                        <option
                          v-for="cities in city_list"
                          :key="cities.id"
                          v-bind:value="cities.id"
                        >{{cities.city_name}}</option>
                      </select>
                    </div>
                    <br />

                    <div class="col-md-6 m-t-71">
                      <table>
                        <tr>
                          <td style="padding-right:30px;">例）1006740</td>
                          <td>
                            <a href="https://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>
                      市区町村、番地（建物名）:
                      <span class="error">*</span>
                    </label>
                    <!-- <input type="text" id="city" name="city" class="form-control" placeholder="市区町村、番地を入力してください。" required> -->
                    <input
                      type="text"
                      class="form-control"
                      id="city"
                      placeholder="市区町村、番地を入力してください。"
                      v-model="zipStreet"
                    />
                    <p>例）東京都千代田区丸の内1-9-1 グラントウキョウノースタワー40階</p>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>
                        電話番号:
                        <span class="error">*</span>
                      </label>
                      <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control"
                        placeholder="電話番号を入力してください。"
                        required
                      />
                      <br />
                    </div>

                    <div class="col-md-6" style="margin-top:40px;">
                      <table>
                        <tr>
                          <td style="padding-right:30px;">例）0312345678（半角）</td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>
                        メールアドレス:
                        <span class="error">*</span>
                      </label>
                      <input
                        type="text"
                        id="mail"
                        name="mail"
                        class="form-control"
                        placeholder="メールアドレスを入力してください。"
                        required
                      />
                      <br />
                    </div>

                    <div class="col-md-6" style="margin-top:40px;">
                      <table>
                        <tr>
                          <td style="padding-right:30px;">例）abc@example.jp （半角）</td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>
                      プレゼントのご希望:
                      <span class="error">*</span>
                    </label>
                    <input
                      type="checkbox"
                      id="present"
                      name="present"
                      value="早分かり用語集」プレゼントを希望する"
                      required
                    />「早分かり用語集」プレゼントを希望する
                  </div>

                  <!-- <input type="button" id="btnQueryString" value="Send" class="m-t-30"/><br> -->

                  <!--next_form-->
                  <div class="m-t-30">
                    <h3
                      style="border-bottom:1px solid green;width:47%;margin-bottom:30px;"
                    >入居対象者様について</h3>
                    <div class="col-md-6">
                      <label>
                        都道府県
                        <span class="error">*</span>
                      </label>
                      <select class="form-control" id="relation" required>
                        <option>選択してください。</option>
                        <option>cccccccc</option>
                        <option>bbbbbbb</option>
                      </select>
                      <!-- <select v-model="selectedValue" class="form-control" id="division" @change='getCities()'>
                                                <option value="0">選択してください。</option>
                                                <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                                                    {{cities.city_name}}
                                                </option>
                      </select>-->
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6 m-t-30 m-l-10">
                        <label>
                          お名前:
                          <span class="error">*</span>
                        </label>
                        <input
                          type="text"
                          id="ttname"
                          name="ttname"
                          class="form-control"
                          placeholder="お名前を入力してください。"
                          required
                        />
                        <br />
                      </div>

                      <div class style="margin-top:70px;">
                        <table>
                          <tr>
                            <td style="padding-right:40px;">例）さがし たろう</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>
                      性別:
                      <span class="error">*</span>
                    </label>
                    <input type="radio" id="sex" name="sex" value="男性" required />&nbsp;男性
                    <input type="radio" id="sex" name="sex" value="女性" required />&nbsp;女性
                    <input type="radio" id="sex" name="sex" value="夫婦" required />&nbsp;夫婦
                  </div>

                  <div class="col-md-6">
                    <label>
                      年齢
                      <span class="error">*</span>
                    </label>
                    <select class="form-control" id="years" required>
                      <option value>選択してください</option>
                      <optgroup label="50代">
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                      </optgroup>
                      <optgroup label="60代">
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                      </optgroup>
                      <optgroup label="70代">
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                      </optgroup>
                      <optgroup label="80代">
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                      </optgroup>
                      <optgroup label="90代">
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                      </optgroup>
                      <optgroup label="100歳以上">
                        <option value="100">100</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                        <option value="104">104</option>
                        <option value="105">105</option>
                        <option value="106">106</option>
                        <option value="107">107</option>
                        <option value="108">108</option>
                        <option value="109">109</option>
                        <option value="110">110</option>
                      </optgroup>
                    </select>
                  </div>

                  <div class="col-md-6 m-t-30">
                    <label>
                      介護度
                      <span class="error">*</span>
                    </label>
                    <select class="form-control" id="nursing" required>
                      <option value="選択してください。">選択してください</option>
                      <option value="自立">自立</option>
                      <option value="要支援">要支援</option>
                      <option value="要介護1">要介護1</option>
                      <option value="要介護2">要介護2</option>
                      <option value="要介護4">要介護4</option>
                      <option value="要介護5">要介護5</option>
                      <option value="不明">不明</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6 m-t-30">
                    <label>
                      認知症:
                      <span class="error">*</span>
                    </label>
                    <input type="radio" id="fect" name="fect" value="あり" required />あり
                    <input type="radio" id="fect" name="fect" value="なし" required />なし
                    <input type="radio" id="fect" name="fect" value="わからない" required />わからない
                  </div>

                  <div class="form-group col-md-8 m-t-30">
                    <label>
                      認知症:
                      <span class="error">*</span>
                    </label>
                    <input type="radio" id="desire" name="desire" value="できるだけ早く" required />できるだけ早く
                    <input type="radio" id="desire" name="desire" value="３ヶ月以内" required />３ヶ月以内
                    <input type="radio" id="desire" name="desire" value="半年以内" required />半年以内
                    <input type="radio" id="desire" name="desire" value="1年以内" required />1年以内
                    <input type="radio" id="desire" name="desire" value="未定" required />未定
                  </div>

                  <div class="col-md-6">
                    <label>
                      ご要望や、お困りごと、その他お問い合わせ:
                      <span class="error">*</span>
                    </label>
                    <textarea name="hope" id="hope" cols="30" rows="10" required></textarea>
                  </div>

                  <button
                    type="button"
                    id="btnSubmit"
                    class="btn btn-primary continue m-l-15"
                    value="submit"
                  >Continue</button>
                </form>
              </div>

              <!--output-->
              <div role="tabpanel" class="tab-pane" id="output">
                <h2>Result</h2>

                <div class="row">
                  <div class="col-md-12">
                    <form class="col-md-11">
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
                              />
                              <div class="m-b-15">都道府県</div>
                              <input
                                type="text"
                                name="outputdivision"
                                id="outputdivision"
                                class="mailbox m-b-15"
                                disabled
                              />
                              <div class="m-b-15">市区町村、番地（建物名）</div>
                              <input
                                type="text"
                                name="outputcity"
                                id="outputcity"
                                class="mailbox"
                                disabled
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
                                class="mailbox"
                                style="width:276px;"
                                disabled
                              />
                            </td>
                          </tr>
                        </table>
                      </div>

                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a
                            href="#input"
                            aria-controls="input"
                            role="tab"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="btn btn-success m-t-15 m-r-8"
                          >戻る</a>
                          <!-- <button class="btn btn-success m-t-15"><a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true" style="color:white;">戻る</a></button> -->
                        </li>
                        <li>
                          <button class="btn btn-danger m-t-15">
                            <a href="#" style="color:white;">この内容で送信</a>
                          </button>
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

                      <hr />
                      <!--next_form-->

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
                                class="mailbox"
                                style="width:276px;"
                                disabled
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
                                class="mailbox"
                                style="width:276px;"
                                disabled
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
                                class="mailbox"
                                style="width:276px;"
                                disabled
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
                                class="mailbox"
                                style="width:276px;"
                                disabled
                              />
                            </td>
                          </tr>
                        </table>
                      </div>

                      <!-- <button class="btn btn-success m-t-15"><a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true" style="color:white;">戻る</a></button> -->

                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a
                            href="#input"
                            aria-controls="input"
                            role="tab"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="btn btn-success m-t-15 m-r-8"
                          >戻る</a>
                          <!-- <button class="btn btn-success m-t-15"><a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true" style="color:white;">戻る</a></button> -->
                        </li>
                        <li>
                          <button class="btn btn-danger m-t-15">
                            <a href="#" style="color:white;">この内容で送信</a>
                          </button>
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
                    </form>
                    <!--next_form-->
                  </div>
                </div>

                <!--test-->

                <!--test-->
              </div>
            </div>
          </div>
          <!--next_form-->
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content end  -->
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      fav_hospital: [],
      post_list: [],
      city_list: [],
      local_sto: "",
      post: "",
      selectedCity: "",
      zipStreet: "",
      zipPref: "",
      selectedValue: 0
    };
  },
  created() {
    this.axios.get("/api/hospital/postList").then(response => {
      this.post_list = response.data;
      //console.log(this.post_list);
    });
    this.local_sto = localStorage.getItem("hospital_fav");
    this.getAllFavourite(this.local_sto);
    this.axios.get("/api/hospital/citiesList").then(response => {
      this.city_list = response.data;
    });
  },

  methods: {
    getAllFavourite: function(local_storage) {
      this.axios.post("/api/favHospital/" + local_storage).then(response => {
        this.fav_hospital = response.data;
      });
    },
    removeFav(fav) {
      if (confirm("Are you sure you want to delete?")) {
        this.fav_hospital.splice(fav, 1);
        var splitarray = this.local_sto.split(",");
        splitarray = splitarray.splice(fav.toString(), 1);
        localStorage.setItem("hospital_fav", splitarray);
      }
    },
    // getCities: function() {

    //         this.city_list.id = this.city_id;

    //     },
    addDistributionGroup: function() {
      var selectedId = this.post;
      this.axios
        .post("/api/hospital/selectedCity/" + selectedId)
        .then(response => {
          this.zipStreet = response.data[0].street;
          this.zipPref = response.data[0].pref;
          this.selectedValue = response.data[0].c_Id;
        });
    }
  }
};
</script>