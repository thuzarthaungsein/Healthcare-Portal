<template>
    <!-- Page Content  -->
    <div class="row">
        <div class="col-12">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                                <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> 就職活動リスト</li>
                        </ol>
                </nav>
        </div>

        <div class=" col-12 scrolldiv2">
                <div v-for="hos_profile in fav_hospital" :key="hos_profile.id" class="card card-default m-b-20 scrolldiv">
                        <div class="card-body news-post">
                                <div class="row">
                                        <div class="col-md-3" >
                                                <img class="col-md-12" v-bind:src="'/images/' + hos_profile.logo" alt="" style="">
                                                <button class="btn btn-danger all-btn" @click="removeFav(hos_profile.customer_id)" style="margin-top: 10px;margin-left: 15px;display:block;align:center;width: 200px;">最近見た施設から削除 </button>
                                        </div>
                                        <div class="col-md-5">
                                                <div class="pad-free mb-2 ">
                                                        <h4> <a href="#"> {{hos_profile.name}} </a></h4>
                                                        <strong>Website  :</strong><a href=""> {{hos_profile.website}}</a><br/>
                                                        <a><strong>Medical Department    :</strong>{{hos_profile.medical_department}}</a><br/>
                                                        <a><strong>Phone    :</strong>{{hos_profile.phone}}</a><br/>
                                                        <a><strong>Access  :</strong>{{hos_profile.access}}</a><br/>
                                                        <a><strong>Email  :</strong>{{hos_profile.email}}</a><br/>
                                                        <a><strong>Details  :</strong>{{hos_profile.details_info}}</a><br/>
                                                        <a><strong>Subjects  :</strong>{{hos_profile.subject}}</a><br/>
                                                        <a><strong>Location    :</strong>{{hos_profile.township_name}}, {{hos_profile.city_name}}</a><br/>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="fac_container" v-for="feature in hos_profile.special_features" :key="feature.id">
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

                    <form class="col-md-12">
                        <h3 style="border-bottom:1px solid green;width:47%;margin-bottom:30px;">資料請求される方について</h3>
                        <div class="form-group">
                            <label>お名前:<span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="お名前を入力してください。">
                        </div>

                        <div class="form-group">
                            <label>ふりがな:<span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="ふりがなを入力してください。">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>ご住所:<span class="error">*</span></label>
                                <br>
                                <label>郵便番号:<span class="error">*</span></label>
                                <autocomplete v-model="post"
                                :source="post_list" ref="autocomplete" results-property="data" 
                                placeholder="郵便番号を入力してください。" input-class="form-control" @input="addDistributionGroup()">
                                </autocomplete>
                                <br>
                                <label> 都道府県<span class="error">*</span></label>
                                <select v-model="city_id" class="form-control" @change='getCities()'>
                                    <option v-bind:value="-1">選択してください。</option>
                                    <option v-for="cities in city_list" :key="cities.id" v-bind:value="cities.id">
                                        {{cities.city_name}}
                                    </option>
                                </select>
                            </div>
                            <br>

                            <div class="col-md-6" style="margin-top:40px;">

                                <table>
                                    <tr>
                                        <td style="padding-right:30px;"> 例）1006740</td>
                                        <td><a href="#">郵便番号検索</a></td>
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
                            <input type="text" class="form-control" placeholder="市区町村、番地を入力してください。">
                            <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>電話番号:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="ご住所を入力してください。">
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
                                <input type="text" class="form-control" placeholder="メールアドレスを入力してください。">
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
                            <input type="radio">「早分かり用語集」プレゼントを希望する

                        </div>
                    </form>
                        <!--next_form-->
                        <form action="col-md-12">
                                 <label> 都道府県<span class="error">*</span></label>
                                <select class="form-control" @change='getstates()'>
                                    <option>選択してください。</option>
                                    <option>
                                        aaaaaaaa
                                    </option>
                                </select>
                        </form>
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
                    city_id: '-1',
                    errors: [],
                    fav_hospital: [],
                    post_list: [],
                    city_list: [],
                    local_sto: '',
                    post:''
                }
            },
            created() {
                    this.axios.get('/api/hospital/postList')
                 .then(response=>{
                     
                     this.post_list = response.data;
                     console.log(this.post_list); 
                    
                 });
                this.local_sto = localStorage.getItem("hospital_fav");                
                this.getAllFavourite(this.local_sto);
                this.axios.get('/api/hospital/citiesList')
                .then(response=>{
                    this.city_list = response.data;
                }); 
            },
            
            methods: {
                getAllFavourite: function(local_storage) {
                    this.axios
                        .post('/api/favHospital/' + local_storage)
                        .then(response => {
                            this.fav_hospital = response.data;
                        });
                },
                removeFav(fav) {
                        if(confirm("Are you sure you want to delete?"))
                        {
                        this.fav_hospital.splice(fav,1);
                        var splitarray = this.local_sto.split(",");
                        splitarray = splitarray.splice(fav.toString(),1);
                        localStorage.setItem('hospital_fav',splitarray);
                        
                        }
                },
                getCities: function() {

                        this.city_list.id = this.city_id;

                    },
                addDistributionGroup: function(){
                    var id = this.post;
                     this.axios
                        .post('/api/favHospital/')
                  
                   } 
            }
    }
</script>