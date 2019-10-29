
<template>
    <div>
        <div class="col-12 scrolldiv4">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><span @click="changeRoute()" class="link-span">介護のお気に入り</span></li>
                            <li class="breadcrumb-item active">必要項目のご入力</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 m-b-10">
                    <h4 class="job-apply-color">資料請求される方について</h4>
                </div>
                <div class="col-md-12 register_box mt-3" v-if="type == 'register'">
                    <ul class="multi-step">
                        <li class="active">1.必要事項のご入力</li>
                        <li class="no-active">2.内容のご確認</li>
                        <li>3.送信完了</li>
                    </ul>
                    <!--inputform-->
                    <form class="col-md-12 form-wrap">
                        <p class="require-txt"><span class="error sp1">必須</span> のついた項目は全て入力してくださいますようお願いいたします。</p>
                        <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left"><label>お名前 <span class="error sp1">必須</span></label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                                <input type="text" id="tbname" name="name" class="form-control float-left" placeholder="お名前を入力してください。" v-model="comments.name" @change="aggreBtn" @focusout="focusName"/>
                                <span class="error m-l-30" v-if="comment_focus">※入力は必須です。</span>
                                <span class="float-left eg-txt">例）探し 太郎</span>
                            </div>
                        </div>
                        <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left"> <label>ふりがな <span class="error sp1">必須</span></label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                                <input type="text" id="furigana" name="furigana" class="form-control float-left" placeholder="ふりがなを入力してください。" v-model="comments.furigana" @change="aggreBtn" @focusout="focusFuri"/>
                                <span class="error m-l-30" v-if="furigana_focus">※入力は必須です。</span>
                                <span class="float-left eg-txt"> 例）さがし たろう</span>
                            </div>
                        </div>
                        <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left"> <label>生年月日 <span class="error sp1">必須</span></label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                                <input type="text" id="bdate" name="bdate" class="form-control float-left" placeholder="生年月日を入力してください。" v-model="comments.bdate" @change="aggreBtn" @focusout="focusbdate"/>
                                <span class="error m-l-30" v-if="bdate_focus">※入力は必須です。</span>
                            </div>
                        </div>
                        <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>性別 <span class="error sp1">必須</span></label></div>
                                <div class="col-md-9 col-sm-12 form-right pl-4">
                                    <input type="radio" id="sex1" name="sex1" value="男性"  v-model="comments.sex1">&nbsp;男性&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="sex1" name="sex1" value="女性"    v-model="comments.sex1">&nbsp;女性&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="sex1" name="sex1" value="夫婦"   v-model="comments.sex1">&nbsp;夫婦
                                </div>
                            </div>
                        <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left"><label>ご住所:</label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                                <div class="form-group row pl-3">
                                    <div class="col-md-12 "><label> 郵便番号 <span class="error sp1">必須</span></label></div>
                                    <div class="col-md-12 p-0">
                                        <input type="text" v-model="comments.postal" name="postal" class="postal form-control float-left" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7" @change="aggreBtn" @focusout="focusPostal"/>
                                        <span class="error m-l-30" v-if="postal_focus">※入力は必須です。</span>
                                        <div id="jsErrorMessage" class="float-left eg-txt"></div>
                                        <span class="float-left eg-txt">例）1006740 (<a href="https://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>)</span>
                                    </div>
                                </div>
                                <div class="form-group row pl-3">
                                    <div class="col-md-12 "><label>  都道府県<span class="error sp1">必須</span></label></div>
                                    <div class="col-md-12 p-0">
                                        <select v-model="comments.selectedValue" class="division form-control" id="division" @change="aggreBtn">
                                            <option value="0">選択してください。</option>
                                            <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                                                {{cities.city_name}}
                                            </option>
                                        </select>
                                        <span v-if="errors.division" class="error">{{errors.division[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row pl-3">
                                    <div class="col-md-12 "><label>市区町村、番地（建物名<span class="error sp1">必須</span></label></div>
                                    <div class="col-md-12 p-0">
                                         <input type="text" id="city" name="city" class="city form-control float-left" placeholder="市区町村、番地を入力してください。" v-model="comments.city" @change="aggreBtn" @focusout="focusCity">
                                        <span class="float-left eg-txt">例）東京都千代田区丸の内1-9-1 グラントウキョウノースタワー40階</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-0 row bd">
                            <div class="col-md-3 col-sm-12 form-left"><label>電話番号 <span class="error sp1">必須</span></label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                            <div class="form-group row pl-3">
                                    <div class="col-md-6 p-0">
                                        <input type="text" id="phone" name="number" class="form-control float-left" placeholder="電話番号を入力してください。" v-model="comments.phone" @change="aggreBtn" @focusout="focusPhone">
                                        <span class="error m-l-30" v-if="phone_focus">※入力は必須です。</span>
                                        <span class="float-left eg-txt">例）0312345678（半角）</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-0 row bd-all">
                            <div class="col-md-3 col-sm-12 form-left"><label>メールアドレス <span class="error sp1">必須</span></label></div>
                            <div class="col-md-9 col-sm-12 form-right">
                            <div class="form-group row pl-3">
                                <div class="col-md-12 p-0">
                                        <input type="text" id="mail" name="mail" class="form-control float-left" placeholder="メールアドレスを入力してください。" v-model="comments.mail" @change="aggreBtn" @focusout="focusMail">
                                        <span class="error m-l-30" v-if="mail_focus">※入力は必須です。</span>
                                        <span class="float-left eg-txt"> 例）abc@example.jp （半角）</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group m-0 row bd-all">
                            <div class="col-md-3 col-sm-12 form-left"><label>プレゼントのご希望:</label></div>
                            <div class="col-md-9 col-sm-12 form-right pl-4">
                                <input type="checkbox" id="present"  name="present" value="早分かり用語集」プレゼントを希望する" v-model="comments.present" @change="aggreBtn">「早分かり用語集」プレゼントを希望する
                            </div>
                        </div> -->
                        <div class="mt-4 submit txt-err" v-if="btn_disable">
                            <div class="error">※未入力の必須項目がございます</div>
                        </div>

                        <div class="btn-list mt-2  clearfix">
                            <ul>
                                <li class="m-r-15"><router-link :to="{name: 'favouriteNursing'}"  class="btn btn-danger all-btn submit">戻る</router-link></li>
                                <li> <button type="button" class="submit1 btn main-bg-color continue submit" @click="add()" :disabled="isdisable">内容を確認する</button></li>
                            </ul>
                        </div>
                        <!--next_form-->
                        <div class="m-t-30">
                            <h5 class="form-tit">入居対象者様について</h5>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left">
                                    <label>入居対象者様とのご関係</label></div>
                                <div class="col-md-9 col-sm-12 form-right">
                                    <select class="form-control" id="relation"  v-model="comments.relation">
                                    <option value="">選択してください</option>
                                    <option value="本人">本人</option>
                                    <option value="家族">家族</option>
                                    <option value="親族">親族</option>
                                    <option value="友人">友人</option>
                                    <option value="ケアマネージャー">ケアマネージャー</option>
                                    <option value="ソーシャルワーカー">ソーシャルワーカー</option>
                                    <option value="その他">その他</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>お名前</label></div>
                                <div class="col-md-9 col-sm-12 form-right">
                                    <input type="text" id="ttname" name="ttname" class="form-control float-left" placeholder="お名前を入力してください。"  v-model="comments.ttname">
                                    <span class="eg-txt float-left">例）さがし　たろう</span>
                                </div>
                            </div>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>性別</label></div>
                                <div class="col-md-9 col-sm-12 form-right pl-4">
                                    <input type="radio" id="sex" name="sex" value="男性"  v-model="comments.sex">&nbsp;男性&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="sex" name="sex" value="女性"    v-model="comments.sex">&nbsp;女性&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="sex" name="sex" value="夫婦"   v-model="comments.sex">&nbsp;夫婦
                                </div>
                            </div>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>年齢</label></div>
                                <div class="col-md-9 col-sm-12 form-right">
                                    <select class="form-control" id="years"  v-model="comments.years">
                                        <option value="">選択してください</option>
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
                            </div>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>介護度</label></div>
                                <div class="col-md-9 col-sm-12 form-right">
                                    <select class="form-control" id="nursing"  v-model="comments.nursing">
                                        <option value="">選択してください</option>
                                        <option value="自立">自立</option>
                                        <option value="要支援">要支援</option>
                                        <option value="要介護1">要介護1</option>
                                        <option value="要介護2">要介護2</option>
                                        <option value="要介護4">要介護4</option>
                                        <option value="要介護5">要介護5</option>
                                        <option value="不明">不明</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>認知症</label></div>
                                <div class="col-md-9 col-sm-12 form-right pl-4">
                                <input type="radio" id="fect" name="fect" value="あり"  v-model="comments.fect">&nbsp;あり&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="fect" name="fect" value="なし"  v-model="comments.fect">&nbsp;なし&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="fect" name="fect" value="わからない"  v-model="comments.fect">&nbsp;わからない &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                            <!-- <div class="form-group m-0 row bd">
                                <div class="col-md-3 col-sm-12 form-left"><label>認知症</label></div>
                                <div class="col-md-9 col-sm-12 form-right pl-4">
                                    <input type="radio" id="desire" name="desire" value="できるだけ早く"  v-model="comments.desire">&nbsp;できるだけ早く<br>
                                    <input type="radio" id="desire" name="desire" value="３ヶ月以内"  v-model="comments.desire">&nbsp;３ヶ月以内<br>
                                    <input type="radio" id="desire" name="desire" value="半年以内"  v-model="comments.desire">&nbsp;半年以内<br>
                                    <input type="radio" id="desire" name="desire" value="1年以内"  v-model="comments.desire">&nbsp;1年以内<br>
                                    <input type="radio" id="desire" name="desire" value="未定"  v-model="comments.desire">&nbsp;未定
                                </div>
                            </div> -->
                            <div class="form-group m-0 row bd-all">
                                <div class="col-md-3 col-sm-12 form-left"><label>ご要望や、お困りごと、その他お問い合わせ</label></div>
                                <div class="col-md-9 col-sm-12 form-right pl-4">
                                    <textarea name="hope" id="hope" class="form-control m-0"   v-model="comments.hope" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 col-sm-3 submit txt-err" v-if="btn_disable">
                            <div class="error">※未入力の必須項目がございます</div>
                        </div>
                        <div class="btn-list  clearfix">
                            <ul>
                                <li class="m-r-15"><router-link :to="{name: 'favouriteNursing'}"  class="btn btn-danger all-btn submit">戻る</router-link></li>
                                <li> <button type="button" class="submit1 btn main-bg-color continue submit" @click="add()" :disabled="isdisable">内容を確認する</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
       data() {
            return {
                type:'register',
                comments: {
                    name: '',
                    furigana: '',
                    bdate: '',
                    postal: '',
                    division: 0,
                    city: '',
                    phone: '',
                    mail: '',
                    present: '',
                    relation: '',
                    ttname: '',
                    sex: '',
                    sex1: '',
                    years: '',
                    nursing: '',
                    fect: '',
                    desire: '',
                    hope: '',
                    fav_mail: [{}],
                    fav_id: [{}],
                    fav_name: [{}],
                    // arr_reserve: [{}],
                    arr_document: [{}],
                    selectedValue: 0,
                },
                errors: [],
                fav_nursing: [],
                local_sto: '',
                city_list: [],
                all_mail: [],
                bk_data: [],
                bk_postal: 0,
                // reservation: [],
                documentation: [],
                btn_disable: false,
                comment_focus: false,
                furigana_focus: false,
                bdate_focus: false,
                postal_focus: false,
                city_focus: false,
                phone_focus: false,
                mail_focus: false
            }
        },
        computed: {
            isdisable:function() {
                return this.btn_disable;
            }
        },
        created() {
            this.bk_data = this.$route.params.input_data;
            this.bk_postal = this.$route.params.bk_postal;
            if (this.bk_data != undefined) {
                this.comments = this.bk_data;
                this.selectedValue = this.bk_postal;
            }
            this.axios.get('/api/hospital/citiesList')
                .then(response => {
                    this.city_list = response.data;
                });
            if(this.comments.name != '' && this.comments.fav_mail != '' && this.comments.postal != '' && this.comments.selectedValue != 0 && this.comments.city != '' && this.comments.phone != '' && this.comments.mail != ''){
                    this.btn_disable=false;
                    //  $('#error-msg').html('<div class="error"></div>');
                }else{
                    this.btn_disable=true;
                }
        },
        methods: {
            getPostal: function(event) {
                if (this.comments.postal.length > 4) {
                    var postal = this.comments.postal;
                    this.axios
                        .post('/api/hospital/postList/' + postal)
                        .then(response => {
                            var post_data = response.data;
                            var length = response.data.length;
                            if (length > 0) {
                                var pref = post_data[0]['city_id'];
                                if (post_data[0]['street'] == '') {
                                    this.comments.city = post_data[0]['city'];
                                } else {
                                    this.comments.city = post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                                this.comments.selectedValue = pref;
                                this.comments.division = pref;
                                 $('#jsErrorMessage').html('<div class="error"></div>');
                            } else {
                                this.comments.city = '';
                                this.comments.selectedValue = 0;
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
                            }
                        });
                }
            },
            add() {
                this.all_mail = JSON.parse(localStorage.getItem("item"));
                // this.reservation = JSON.parse(localStorage.getItem("reserve"));
                this.documentation = JSON.parse(localStorage.getItem("document"));
                for (var i = 0; i < this.all_mail.length; i++) {
                    this.comments.fav_mail.push(this.all_mail[i].email);
                    this.comments.fav_id.push(this.all_mail[i].id);
                    this.comments.fav_name.push(this.all_mail[i].name);
                }
                // this.comments.arr_reserve = this.reservation;
                this.comments.arr_document = this.documentation;
                localStorage.setItem("inputValue", JSON.stringify(this.comments));
                var data = JSON.parse(localStorage.getItem("inputValue"));
                this.$router.push({
                    name: 'nursingMailConfirm',
                });
            },
            aggreBtn: function(){
                if(this.comments.name != '' && this.comments.fav_mail != '' && this.comments.postal != '' && this.comments.selectedValue != 0 && this.comments.city != '' && this.comments.phone != '' && this.comments.mail != ''){
                    this.btn_disable=false;
                }else{
                    this.btn_disable=true;
                }
            },
            focusName: function(event) {
                if(this.comments.name != ''){
                    this.comment_focus=false;
                }else{
                    this.comment_focus=true;
                    document.getElementById('tbname').style.backgroundColor = black;
                }
            },
            focusFuri: function(event) {
                if(this.comments.furigana != ''){
                    this.furigana_focus=false;
                }else{
                    this.furigana_focus=true;
                }
            },
            focusbdate: function(event) {
                if(this.comments.bdate != ''){
                    this.bdate_focus = false;
                }else{
                    this.bdate_focus = true;
                }
            },
            focusPostal: function(event) {
                if(this.comments.postal != ''){
                    this.postal_focus=false;
                }else{
                    this.postal_focus=true;
                }
            },
            focusCity: function(event) {
                if(this.comments.city != ''){
                    this.city_focus=false;
                }else{
                    this.city_focus=true;
                }
            },
            focusPhone: function(event) {
                if(this.comments.phone != ''){
                    this.phone_focus=false;
                }else{
                    this.phone_focus=true;
                }
            },
            focusMail: function(event) {
                if(this.comments.mail != ''){
                    this.mail_focus=false;
                }else{
                    this.mail_focus=true;
                }
            },
        }
    }
</script>
