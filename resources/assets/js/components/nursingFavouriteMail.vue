
<template>
    <div>
        <!-- news details-->
        <!--menu tabs-->
        <ul class="nav nav-tabs card-head-tabs" role="tablist" id="navtab">
                <li role="presentation" class="subtab1 nav-item"><a href="#tab1" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-newspaper"></i> ニュース</a></li>
                <li role="presentation" class="subtab2 nav-item"><a href="#tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院</a></li>
                <li role="presentation" class="active subtab3 nav-item"><a href="#tab3" role="tab" data-toggle="tab" class="nav-link active"><i class="fas fa-user-md"></i> 介護</a></li>
                <li role="presentation" class="subtab5 nav-item"><a href="#tab4" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-users"></i> 求人</a></li>
        </ul>
        <!--end menu tabs-->
        <!-- Tab panes -->
        <div class="tab-content tab-content1 tabs">
            <div role="tabpanel" class="tab-pane fade" id="tab1"><News></News></div>
            <div role="tabpanel" class="tab-pane fade" id="tab2"><hospitalSearch></hospitalSearch></div>
            <div role="tabpanel" class="tab-pane active" id="tab3">
                <div class="col-12 scrolldiv2 pb-5">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><span @click="changeRoute()" class="link-span">介護検索</span></li>
                                <li class="breadcrumb-item"><a href="/"> 新しい詳細</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> 就職活動リスト</li>
                            </ol>
                        </nav>
                    </div>
                    <div class=" col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <!--next_form-->
                                <div class="container tabs-wrap">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true"></a>
                                            <!-- <button class="btn btn-success m-t-15"><a href="#input" aria-controls="input" role="tab" data-toggle="tab" aria-expanded="true" style="color:white;">戻る</a></button> -->
                                        </li>
                                        <li>
                                            <a href="#output" aria-controls="output" role="tab" data-toggle="tab" aria-expanded="false"></a>
                                        </li>
                                        <li>
                                            <a href="#review" aria-controls="review" role="tab" data-toggle="tab" aria-expanded="false"></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="input">
                                            <!--inputform-->
                                            <form class="col-md-12">
                                                <h3 style="border-bottom:1px solid green;width:47%;margin-bottom:30px;">資料請求される方について</h3>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>お名前 <span class="error sp1">必須</span></label>
                                                    <!-- <input type="text" class="form-control" placeholder="お名前を入力してください。"> -->
                                                    <input type="text" id="tbname" name="name" class="form-control" placeholder="お名前を入力してください。" v-model="comments.name" @change="someHandler"/>
                                                    <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                                    <br />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p class="m-t-39">例）探し 太郎</p>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>ふりがな <span class="error sp1">必須</span></label>
                                                    <input type="text" id="furigana" name="furigana" class="form-control" placeholder="ふりがなを入力してください。" v-model="comments.furigana" @change="someHandler"/>
                                                    <span v-if="errors.furigana" class="error">{{errors.furigana[0]}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                        <p class="m-t-39"> 例）さがし たろう</p>
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>ご住所:<span class="error">*</span></label>
                                                        <br>
                                                        <label>郵便番号 <span class="error sp1">必須</span></label>
                                                        <input type="text" v-model="comments.postal" name="postal" class="postal form-control" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7" @change="someHandler"/>
                                                        <span v-if="errors.postal" class="error">{{errors.postal[0]}}</span>
                                                        <div id="jsErrorMessage"></div>
                                                        <br>

                                                        <label> 都道府県<span class="error sp1">必須</span></label>
                                                        <select v-model="comments.selectedValue" class="division form-control" id="division" @change="someHandler">
                                                            <option value="0">選択してください。</option>
                                                            <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                                                                {{cities.city_name}}
                                                            </option>
                                                        </select>
                                                        <span v-if="errors.division" class="error">{{errors.division[0]}}</span>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-6 m-t-71">
                                                        <table>
                                                            <tr>
                                                                <td style="padding-right:30px;"> 例）1006740</td>
                                                                <td><a href="https://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>市区町村、番地（建物名）:<span class="error sp1">必須</span></label>
                                                    <input type="text" id="city" name="city" class="city form-control" placeholder="市区町村、番地を入力してください。" v-model="comments.city" @change="someHandler">
                                                    <span v-if="errors.city" class="error">{{errors.city[0]}}</span>
                                                    <!-- <input type="text" class="form-control" id="city" placeholder="市区町村、番地を入力してください。" v-model="zipStreet"> -->
                                                    <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>電話番号 <span class="error sp1">必須</span></label>
                                                        <input type="text" id="phone" name="number" class="form-control" placeholder="電話番号を入力してください。" v-model="comments.phone" @change="someHandler">
                                                        <span v-if="errors.phone" class="error">{{errors.phone[0]}}</span>
                                                        <br>
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
                                                        <label>メールアドレス <span class="error sp1">必須</span></label>
                                                        <input type="text" id="mail" name="mail" class="form-control" placeholder="メールアドレスを入力してください。" v-model="comments.mail" @change="someHandler">
                                                        <span v-if="errors.mail" class="error">{{errors.mail[0]}}</span>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:40px;">
                                                        <table>
                                                            <tr>
                                                                <td style="padding-right:30px;"> 例）abc@example.jp （半角）</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>プレゼントのご希望:</label>
                                                    <input type="checkbox" id="present" name="present" value="早分かり用語集」プレゼントを希望する" v-model="comments.present" @change="someHandler">「早分かり用語集」プレゼントを希望する
                                                </div>
                                            <table>
                                                    <tr>
                                                        <td>
                                                            <router-link :to="{name: 'favouriteNursing'}" class="btn btn-danger all-btn m-l-10">戻る</router-link>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="submit2 btn btn-primary m-t-0 m-l-10" @click="add()" :disabled="isdisable">同意して進む</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!--next_form-->
                                                <div class="m-t-30">
                                                    <h3 style="border-bottom:1px solid green;width:47%;margin-bottom:30px;">入居対象者様について</h3>
                                                    <div class="col-md-6">
                                                        <label>
                                                            入居対象者様とのご関係<span class="error"></span></label>
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
                                                    <div class="row">
                                                        <div class="form-group col-md-6 m-t-30 m-l-10">
                                                            <label>お名前:<span class="error"></span></label>
                                                            <input type="text" id="ttname" name="ttname" class="form-control" placeholder="お名前を入力してください。"  v-model="comments.ttname">
                                                            <br>
                                                        </div>
                                                        <div class="" style="margin-top:70px;">
                                                            <table>
                                                                <tr>
                                                                    <td style="padding-right:40px;">例）さがし　たろう</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>性別:<span class="error"></span></label>
                                                    <input type="radio" id="sex" name="sex" value="男性"  v-model="comments.sex">&nbsp;男性
                                                    <input type="radio" id="sex" name="sex" value="女性"  v-model="comments.sex">&nbsp;女性
                                                    <input type="radio" id="sex" name="sex" value="夫婦"  v-model="comments.sex">&nbsp;夫婦
                                                </div>
                                                <div class="col-md-6">
                                                    <label>年齢<span class="error"></span></label>
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
                                                <div class="col-md-6 m-t-30">
                                                    <label>介護度<span class="error"></span></label>
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
                                                <div class="form-group col-md-6 m-t-30">
                                                    <label>認知症:<span class="error"></span></label>
                                                    <input type="radio" id="fect" name="fect" value="あり"  v-model="comments.fect">あり
                                                    <input type="radio" id="fect" name="fect" value="なし"  v-model="comments.fect">なし
                                                    <input type="radio" id="fect" name="fect" value="わからない"  v-model="comments.fect">わからない
                                                </div>
                                                <div class="form-group col-md-8 m-t-30">
                                                    <label>入居希望時期:<span class="error">*</span></label>
                                                    <input type="radio" id="desire" name="desire" value="できるだけ早く"  v-model="comments.desire">できるだけ早く
                                                    <input type="radio" id="desire" name="desire" value="３ヶ月以内"  v-model="comments.desire">３ヶ月以内
                                                    <input type="radio" id="desire" name="desire" value="半年以内"  v-model="comments.desire">半年以内
                                                    <input type="radio" id="desire" name="desire" value="1年以内"  v-model="comments.desire">1年以内
                                                    <input type="radio" id="desire" name="desire" value="未定"  v-model="comments.desire">未定
                                                </div>
                                                <div class="col-md-6 m-b-20">
                                                    <label>ご要望や、お困りごと、その他お問い合わせ:<span class="error"></span></label>
                                                    <textarea name="hope" id="hope" cols="30" rows="10"  v-model="comments.hope"></textarea>
                                                </div>        
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <router-link :to="{name: 'favouriteNursing'}" class="btn btn-danger all-btn m-l-10">戻る</router-link>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="submit2 btn btn-primary m-t-0 m-l-10" @click="add()" :disabled="isdisable">同意して進む</button>
                                                        </td>
                                                    </tr>
                                                </table>                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab4"></div>
            <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div>
        </div>
        <!--end Tab panes-->         
    </div>
</template>
<script>
import News from './News.vue'
import hospitalSearch from './hospitalSearch.vue'
// import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
    export default {
        components: {
                News,
                // nursingSearch,
                jobSearch,
                hospitalSearch,
        },
       data() {
            return {
                comments: {
                    name: '',
                    furigana: '',
                    postal: '',
                    division: 0,
                    city: '',
                    phone: '',
                    mail: '',
                    present: '',
                    relation: '',
                    ttname: '',
                    sex: '',
                    years: '',
                    nursing: '',
                    fect: '',
                    desire: '',
                    hope: '',
                    fav_mail: [{}],
                    fav_id: [{}],
                    fav_name: [{}],
                    arr_reserve: [{}],
                    arr_document: [{}],
                    selectedValue: 0,
                },
                errors: [],
                fav_nursing: [],
                local_sto: '',
                post_list: [],
                city_list: [],
                post: '',
                selectedCity: '',
                all_mail: [],
                bk_data: [],
                bk_postal: 0,
                reservation: [],
                documentation: [],
                btn_disable: false
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
                }else{
                    this.btn_disable=true;
                }
        },
        methods: {
            changeRoute(){
                this.$router.push({name:'home', params: {page:'subtab3'}});
            },
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
                this.reservation = JSON.parse(localStorage.getItem("reserve"));
                this.documentation = JSON.parse(localStorage.getItem("document"));
                for (var i = 0; i < this.all_mail.length; i++) {
                    this.comments.fav_mail.push(this.all_mail[i].email);
                    this.comments.fav_id.push(this.all_mail[i].id);
                    this.comments.fav_name.push(this.all_mail[i].name);
                }
                this.comments.arr_reserve = this.reservation;
                this.comments.arr_document = this.documentation;
                localStorage.setItem("inputValue", JSON.stringify(this.comments));
                var data = JSON.parse(localStorage.getItem("inputValue"));
                this.$router.push({
                    name: 'nursingMailConfirm',
                });
            },
            someHandler: function(){
                if(this.comments.name != '' && this.comments.fav_mail != '' && this.comments.postal != '' && this.comments.selectedValue != 0 && this.comments.city != '' && this.comments.phone != '' && this.comments.mail != ''){
                    this.btn_disable=false;
                }else{
                    this.btn_disable=true;
                }
            },
        }
    }
</script>