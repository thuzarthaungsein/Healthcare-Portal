<template>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                    <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        就職活動リスト</li>
                </ol>
            </nav>
        </div>

        <div class=" col-12">
            <!-- <input type="checkbox" class="select_all" /> Select all -->
            <div v-for="nur_profile in fav_nursing" :key="nur_profile.id" class="card card-default m-b-20 scrolldiv m-t-20">
                <div class="card-body news-post">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="col-md-12" v-bind:src="'/images/' + nur_profile.logo" alt="" style="">
                            <button class="btn btn-danger all-btn" @click="removeFav(nur_profile.customer_id)" style="margin-top: 10px;margin-left: 15px;display:block;align:center;width: 200px;">最近見た施設から削除 </button>
                            <br>
                            <button class="btn news-post-btn all-btn">
                                <input type="checkbox" class="checkbox" value="1">
                                <span class="checkmark"></span>見学予約</button>
                            <br>
                            <br>
                            <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary m-l-17">
                                <input type="checkbox" class="checkbox" value="2">
                                <span class="checkmark"></span>資料請求</button>

                        </div>
                        <div class="col-md-5">
                            <div class="pad-free mb-2 ">
                                <h4> <a href="#"> {{nur_profile.name}} </a></h4>
                                <strong>Website  :</strong><a href=""> {{nur_profile.website}}</a>
                                <br/>
                                <a><strong>Phone    :</strong>{{nur_profile.phone}}</a>
                                <br/>
                                <a><strong>Access  :</strong>{{nur_profile.access}}</a>
                                <br/>
                                <a><strong>Email  :</strong>{{nur_profile.email}}</a>
                                <br/>
                                <a><strong>Occupancy Condition  :</strong>{{nur_profile.occupancy_condition}}</a>
                                <br/>
                                <a><strong>Location    :</strong>{{nur_profile.township_name}}, {{nur_profile.city_name}}</a>
                                <br/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fac_container" v-for="feature in nur_profile.special_features" :key="feature.id">
                                <ul class="equipment">
                                    <li>{{ feature }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
                                    <div class="form-group">
                                        <label>お名前:<span class="error">*</span></label>
                                        <!-- <input type="text" class="form-control" placeholder="お名前を入力してください。"> -->
                                        <input type="text" id="name" name="name" class="form-control" placeholder="お名前を入力してください。" required v-model="comments.name"/>
                                        <br />
                                    </div>

                                    <div class="form-group">
                                        <label>ふりがな:<span class="error">*</span></label>
                                        <input type="text" id="furigana" name="furigana" class="form-control" placeholder="ふりがなを入力してください。" v-model="comments.furigana" required/>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>ご住所:<span class="error">*</span></label>
                                            <br>
                                            <label>郵便番号:<span class="error">*</span></label>
                                            <input type="text" v-model="comments.postal" name="postal" class="postal form-control" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7" required>
                                            <div id="jsErrorMessage"></div>
                                            <br>

                                            <label> 都道府県<span class="error">*</span></label>
                                            <select v-model="selectedValue" class="division form-control" id="division">
                                                <option value="0">選択してください。</option>
                                                <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                                                    {{cities.city_name}}
                                                </option>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-md-6 m-t-71">

                                            <table>
                                                <tr>
                                                    <td style="padding-right:30px;"> 例）1006740</td>
                                                    <td><a href="https://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a></td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>市区町村、番地（建物名）:<span class="error">*</span></label>
                                        <input type="text" id="city" name="city" class="city form-control" placeholder="市区町村、番地を入力してください。" required v-model="comments.city">
                                        <!-- <input type="text" class="form-control" id="city" placeholder="市区町村、番地を入力してください。" v-model="zipStreet"> -->
                                        <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>電話番号:<span class="error">*</span></label>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="電話番号を入力してください。" required v-model="comments.phone">
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
                                            <label>メールアドレス:<span class="error">*</span></label>
                                            <input type="text" id="mail" name="mail" class="form-control" placeholder="メールアドレスを入力してください。" required v-model="comments.mail">
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
                                        <label>プレゼントのご希望:<span class="error">*</span></label>
                                        <input type="checkbox" id="present" name="present" value="早分かり用語集」プレゼントを希望する" required v-model="comments.present">「早分かり用語集」プレゼントを希望する
                                    </div>

                                    <!-- <input type="button" id="btnQueryString" value="Send" class="m-t-30"/><br> -->

                                    <!--next_form-->
                                    <div class="m-t-30">
                                        <h3 style="border-bottom:1px solid green;width:47%;margin-bottom:30px;">入居対象者様について</h3>
                                        <div class="col-md-6">
                                            <label>
                                                入居対象者様とのご関係<span class="error">*</span></label>

                                            <select class="form-control" id="relation" required v-model="comments.relation">
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
                                                <label>お名前:<span class="error">*</span></label>
                                                <input type="text" id="ttname" name="ttname" class="form-control" placeholder="お名前を入力してください。" required v-model="comments.ttname">
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
                                        <label>性別:<span class="error">*</span></label>
                                        <input type="radio" id="sex" name="sex" value="男性" required v-model="comments.sex">&nbsp;男性
                                        <input type="radio" id="sex" name="sex" value="女性" required v-model="comments.sex">&nbsp;女性
                                        <input type="radio" id="sex" name="sex" value="夫婦" required v-model="comments.sex">&nbsp;夫婦
                                    </div>
                                    <div class="col-md-6">
                                        <label>年齢<span class="error">*</span></label>
                                        <select class="form-control" id="years" required v-model="comments.years">
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
                                        <label>介護度<span class="error">*</span></label>
                                        <select class="form-control" id="nursing" required v-model="comments.nursing">
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
                                        <label>認知症:<span class="error">*</span></label>
                                        <input type="radio" id="fect" name="fect" value="あり" required v-model="comments.fect">あり
                                        <input type="radio" id="fect" name="fect" value="なし" required v-model="comments.fect">なし
                                        <input type="radio" id="fect" name="fect" value="わからない" required v-model="comments.fect">わからない
                                    </div>
                                    <div class="form-group col-md-8 m-t-30">
                                        <label>認知症:<span class="error">*</span></label>
                                        <input type="radio" id="desire" name="desire" value="できるだけ早く" required v-model="comments.desire">できるだけ早く
                                        <input type="radio" id="desire" name="desire" value="３ヶ月以内" required v-model="comments.desire">３ヶ月以内
                                        <input type="radio" id="desire" name="desire" value="半年以内" required v-model="comments.desire">半年以内
                                        <input type="radio" id="desire" name="desire" value="1年以内" required v-model="comments.desire">1年以内
                                        <input type="radio" id="desire" name="desire" value="未定" required v-model="comments.desire">未定
                                    </div>
                                    <div class="col-md-6">
                                        <label>ご要望や、お困りごと、その他お問い合わせ:<span class="error">*</span></label>
                                        <textarea name="hope" id="hope" cols="30" rows="10" required v-model="comments.hope"></textarea>
                                    </div>
                                    <span class="btn btn-primary continue m-l-15 m-t-15" @click="add()">同意して進む</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['input_data'],
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
                    arr_reserve: [{}],
                    arr_document: [{}]

                },
                errors: [],
                fav_nursing: [],
                local_sto: '',
                post_list: [],
                city_list: [],
                post: '',
                selectedCity: '',
                zipStreet: '',
                zipPref: '',
                selectedValue: 0,
                all_mail: [],
                bk_data: [],
                bk_postal: 0
            }
        },
        created() {
            this.bk_data = this.$route.params.input_data;
            this.bk_postal = this.$route.params.bk_postal;
            console.log('bk',this.bk_postal);
            if(this.bk_data != undefined){
                this.comments = this.bk_data;
                this.selectedValue = this.bk_postal;
            }
            this.axios.get('/api/hospital/citiesList')
                .then(response => {
                    this.city_list = response.data;
                });
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
                                var pref = post_data[0]['city_Id'];
                                if (post_data[0]['street'] == '') {
                                    this.comments.city = post_data[0]['city'];
                                } else {
                                    this.comments.city = post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                                this.selectedValue = pref;
                                this.comments.division = pref;
                            } else {
                                this.comments.city = '';
                                this.selectedValue = 0;
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
                            }
                        });
                }
            },
            add() {
                this.all_mail = JSON.parse(localStorage.getItem("item"));
            for(var i=0; i<this.all_mail.length; i++){
                this.comments.fav_mail.push(this.all_mail[i].email);
                this.comments.arr_reserve.push(this.all_mail[i].arr_reserve);
                this.comments.arr_document.push(this.all_mail[i].arr_document);
            }
                localStorage.setItem("inputValue",JSON.stringify(this.comments));
                var data = JSON.parse(localStorage.getItem("inputValue"));
                // localStorage.removeItem("item");
                this.$router.push({
                        name: 'nursingMailConfirm',
                    });
            },
        }
    }
</script>