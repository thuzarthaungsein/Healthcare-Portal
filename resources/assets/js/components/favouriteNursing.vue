<template>
    <div>

        <div class="row">
            <div class="col-md-11" @click="itemCompare()" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <dl class="itemBox favnur" id="bd" v-if="!iscompare">
                            <dt>比較する項目</dt>
                            <dd>比較する項目が選べます</dd>
                            <!-- <dd v-if="address_check">住所</dd>
                            <dd v-if="tran_check">、交通手段</dd>
                            <dd v-if="month_check">、月額費用</dd>
                            <dd v-if="entry_check">、入居一時金</dd>
                            <dd v-if="condition_check"> 入居条件</dd>
                            <dd v-if="special_check">、特長</dd>
                            <dd v-if="medical_check">、医療面の受け入れ</dd>
                            <dd v-if="capacity_check">定員</dd>
                            <dd v-if="opening_check">、開設日</dd> -->
                        </dl>
                        <dl class="itemBox favnur" id="bd" v-else>
                            <dt class="da">比較する項目</dt>
                            <!-- <dd v-if="!iscompare">比較する項目が選べます</dd> -->
                            <dd v-if="address_check" class="da1">住所</dd>
                            <dd v-if="tran_check" style="width: 84px;">、交通手段</dd>
                            <dd v-if="month_check" style="width: 80px;">、月額費用</dd>
                            <dd v-if="entry_check" style="width:100px;">、入居一時金</dd>
                            <dd v-if="condition_check" style="width:80px;">、入居条件</dd>
                            <dd v-if="special_check" style="width: 51px;">、特長</dd>
                            <dd v-if="medical_check" style="width: 135px;">、医療面の受け入れ</dd>
                            <dd v-if="capacity_check" style="width:50px;">、定員</dd>
                            <dd v-if="opening_check" class="da">、開設日</dd>
                        </dl>
                    </div>
            <div class="modal fade bd-example-modal-lg mycheck" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">比較する項目を選ぶ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <button class="btn btn-secondary">閉じる&times;</button>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <p>エリア</p>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" value="address" v-model="address_check" @change="compareBtn"> 住所
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" v-model="tran_check" @change="compareBtn"> 交通手段
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>費用・条件</p>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" v-model="month_check"> 月額費用
                                    </label>
                                    <br>
                                    <label style="width:400px;">
                                        <input type="checkbox" v-model="entry_check"> 入居条件 （自立、要支援、要介護、認知症相談可）
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" v-model="condition_check"> 入居一時金
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>サービス内容</p>
                                </div>
                                <div class="col-md-9">
                                    <label>
                                        <input type="checkbox" v-model="special_check"> 特長 （24時間看護、職員体制、食事メニューの選択など）
                                    </label>
                                    <label>
                                        <input type="checkbox" v-model="medical_check"> 医療面の受け入れ （インシュリン投与、ストーマ・人工肛門、たん吸引など）
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p>施設情報</p>
                                </div>
                                <!-- <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" v-model="aval_check"> 空室状況
                                            </label>
                                        </div> -->
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" v-model="capacity_check"> 定員
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" v-model="opening_check"> 開設日
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-primary">比較する</button>
                                </div> -->
                        <div class="modal-footer text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <button class="btn btn-secondary" @click="compareBtn()">比較する</button>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn news-post-btn all-btn hos-btn m-t-10">変更する</button>
            </div>

            <div class="modal fade bd-example-modal-google googlecheck" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">交通アクセス／</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <button class="btn btn-secondary">閉じる&times;</button>
                            </button>
                        </div>
                        <div class="modal-body">
                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10">
                                <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                            </GmapMap>
                        </div>
                        <div class="modal-body">
                            <strong>住所</strong>
                            <br>
                            <span>{{address}}</span>
                            <hr>
                            <strong>最寄り駅</strong>
                            <br>
                            <span>{{access}}</span>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="list-group col-md-3">
                <div class="list-group-item list-group-item-action" style="height:68px;background:#fff9cb;margin-bottom:39px;"><input type="checkbox" class="che1 check-all-btn" @change="checkAll()" ><div class="tx1">すべてチェック</div></div>
                <div class="list-group-item list-group-item-action" style="height:221px;">
                    <p class="m-l-20">基本情報</p>
                </div>
                
                <div v-if="capacity_check" class="list-group-item list-group-item-action" style="height:50px;">Nursing_staff</div>
                <div class="bd">
                    <div class="list-group-item list-group-item-action" v-if="address_check" style="height:50px;border:none;">住所</div>
                    <div class="list-group-item list-group-item-action bd1" v-if="tran_check" style="height:100px;">交通アクセス</div>
                    <div class="list-group-item list-group-item-action bd1" v-if="tran_check || address_check" style="height:50px;"></div>
                </div>
                <!-- <div class="list-group-item list-group-item-action" style="height:50px;">Email</div> -->
                <div v-if="condition_check" class="list-group-item list-group-item-action" style="height:166px;">Occupancy_condition</div>

                <div v-if="special_check" class="list-group-item list-group-item-action" style="height:300px;">special_features</div>
                <div v-if="opening_check" class="list-group-item list-group-item-action" style="height:70px;">開設日</div>
                <div class="list-group-item list-group-item-action" v-for="medical in medical_accept" :key="medical.id" style="height:70px;">{{medical.name}}</div>
            <div class="list-group-item list-group-item-action" style="height:68px;background:#fff9cb;margin-bottom:39px;"><input type="checkbox" class="che1 check-all-btn" @change="checkAll()" ><div class="tx1">すべてチェック</div></div>
            </div>

            <div class="list-group col-md-3" v-for="nur_profile in fav_nursing" :key="nur_profile.id">

                <div class="list-group-item list-group-item-action checkbox2" style="background:#fff9cb;"><input type="checkbox" class="che checkbox2" value="documentation" name="documentation" v-model="document_status[nur_profile.id]" @change="checkSingle()" ></div>
                <button class="btn btn-danger all-btn hos-btn m-t-8 m-b-3" @click="deleteLocalSto(nur_profile.id)">最近見た施設から削除</button>
                <div class="list-group-item list-group-item-action" ><img class="im" v-bind:src="'/images/' + nur_profile.logo" alt style /><br><br>
                <router-link :to="{name: 'profile', params: {cusid:1, type: 'nursing'}}" >{{nur_profile.name}}</router-link></div>
               
                <div v-if="capacity_check" class="list-group-item list-group-item-action" style="height:50px;">{{nur_profile.nursing_staff }} 人</div>
                <!-- <div class="list-group-item list-group-item-action" style="height:50px;">{{nur_profile.email }}</div> -->
                
                <div class="bd">
                    <div class="list-group-item list-group-item-action" v-if="address_check" style="height:50px;border:none;">{{nur_profile.township_name}} {{nur_profile.city_name}}</div>
                    <div class="list-group-item list-group-item-action bd1" v-if="tran_check" style="height:100px;">{{nur_profile.access }}</div>
                    <div class="list-group-item list-group-item-action bd1" v-if="tran_check || address_check" style="height:50px;"><span class="pseudolink" @click="googlemap(nur_profile.id)" data-toggle="modal" data-target=".bd-example-modal-google"><i class="fa fa-search"></i>地図・交通アクセス</span></div>
                </div>
                <div v-if="condition_check" class="list-group-item list-group-item-action" style="height:166px;">{{nur_profile.occupancy_condition }}</div>
                <div v-if="special_check" class="bd" style="height:30%;">
                    <div style="height:40px;border:none;" class="list-group-item list-group-item-action" v-for="feature in nur_profile.special_features" :key="feature.id">
                        {{ feature.short_name }}
                    </div>
                </div>
                <div v-if="opening_check" class="list-group-item list-group-item-action" style="height:70px;">{{nur_profile.date_of_establishment }}</div>
                 <div class="list-group-item list-group-item-action checkbox2" style="background:#fff9cb;"><input type="checkbox" class="che checkbox2" value="documentation" name="documentation" v-model="document_status[nur_profile.id]" @change="checkSingle()" ></div>
            </div>
                <span class="btn btn-success mt-5 float-right" @click="addingMail()">この内容で送信</span>
        </div>

    </div>
</template>

<style scoped>

    .da
    {
        width: 104px;
    }
    .da1
    {
        width: 37px;
    }
         .bd1
    {
        border-top:1px solid rgba(0, 0, 0, 0.125); 
        border-style: dashed;
        border-left:none;
        border-right:none;
        border-bottom:none;
    }

        .bd2{
               border: 1px solid rgba(0, 0, 0, 0.125); 
               min-height: 100px;

            }

        .bd{
               border: 1px solid rgba(0, 0, 0, 0.125); 
            }
    .che
    {
        size:45%;
        width:25px;
        height:25px;
        margin-left:149px;
        margin-top:9px;
    }
    .che1
    {
        margin-left:30px;
        width:25px;
        height:25px;
        margin-top:9px;
    }
    .im
    {
        width:200px;
        height: 150px;
    }
    .tx1
    {
    margin-left: 56px;
    margin-bottom: -4px;
    margin-top: -31px;
}

    .m-b-3
    {
        margin-bottom: 3px;
    }
    .bd
    {
        border-bottom:none;
    }
    .hh
    {
        margin-bottom: -14px;
    }
.pseudolink { 
   color:blue; 
   text-decoration:underline; 
   cursor:pointer; 
   }


</style>

<script>
    export default {
        data() {
                return {
                    errors: [],
                    fav_nursing: [],
                    local_sto: "",
                    post_list: [],
                    city_list: [],
                    post: "",
                    selectedCity: "",
                    zipStreet: "",
                    zipPref: "",
                    selectedValue: 0,
                    fav_email: [],
                    arr_email: [],
                    reserv_status: [],
                    document_status: [],
                    type: 'nursing',
                    specialfeature: [],
                    modal_btn: false,
                    address_check: false,
                    tran_check: false,
                    month_check: false,
                    entry_check: false,
                    condition_check: false,
                    special_check: false,
                    medical_check: false,
                    capacity_check: false,
                    opening_check: false,
                    iscompare: false,
                    markers: [{
                        position: {
                            lat: 0.0,
                            lng: 0.0
                        }
                    }],
                    center: {
                        lat: 0,
                        lng: 0
                    },
                    address: '',
                    access: '',
                    medical_accept: []
                        // check_count: 0

                };
            },
            created() {
                $('.checkbox1').prop("checked", true);
                this.local_sto = localStorage.getItem("nursing_fav");
                this.getAllFavourite(this.local_sto);

                // this.axios.get(`/api/profile/specialfeature/${this.type}`) .then(response => {
                //     this.specialfeature = response.data;
                // });
            },
            methods: {
                // changeRoute(){
                //     this.$router.push({name:'home', params: {page:'subtab3'}});
                // },
                deleteLocalSto: function(id) {
                    if (confirm("Are you sure you want to delete?")) {
                        alert('Delete Successfully!');
                    }
                    var l_sto = this.local_sto;
                    var l_sto_arr = l_sto.split(",");
                    var rm_id = id.toString();
                    var index = l_sto_arr.indexOf(rm_id);
                    if (index > -1) {
                        l_sto_arr.splice(index, 1);
                        var new_local = l_sto_arr.toString();
                        localStorage.setItem('nursing_fav', new_local);
                        this.local_sto = localStorage.getItem("nursing_fav");
                        if (this.local_sto) {
                            this.getAllFavourite(this.local_sto);
                        } else {
                            // window.location.reload();
                            this.$router.push({
                                name: 'home',
                                params: {
                                    page: 'subtab3'
                                }
                            });
                        }
                    }
                },
                getAllFavourite: function(local_storage) {
                    this.axios
                        .post('/api/nursing_fav/' + local_storage)
                        .then(response => {
                            this.fav_nursing = response.data;
                            for (var i = 0; i < this.fav_nursing.length; i++) {
                                var j = this.fav_nursing[i].id;
                                this.reserv_status[j] = true;
                            }
                            console.log('fav', this.fav_nursing)

                        });
                },
                addingMail() {
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        this.fav_email.push({
                            'id': this.fav_nursing[i]['id'],
                            'email': this.fav_nursing[i]['email'],
                            'name': this.fav_nursing[i]['name']
                        });
                    }
                    localStorage.setItem("reserve", JSON.stringify(this.reserv_status));
                    localStorage.setItem("document", JSON.stringify(this.document_status));
                    localStorage.setItem("item", JSON.stringify(this.fav_email));
                    this.$router.push({
                        name: 'nursingFavouriteMail',
                        // params: { favmail: this.fav_email},
                        // props: true
                    });
                },
                checkAll() {

                    if ($('.check-all-btn').is(":checked")) {
                        $('.checkbox1').prop("checked", true);
                        $('.checkbox2').prop("checked", true);
                    } else {
                        $('.checkbox1').prop("checked", false);
                        $('.checkbox2').prop("checked", false);
                    }
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        var j = this.fav_nursing[i].id;
                        if ($('.check-all-btn').is(":checked")) {
                            this.document_status[j] = true;
                            this.reserv_status[j] = true;
                        } else {
                            this.document_status[j] = false;
                            this.reserv_status[j] = false;
                        }
                    }
                },
                checkSingle() {
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        var j = this.fav_nursing[i].id;
                        if (this.document_status[j] == true && this.reserv_status[j] == true) {
                            $('.check-all-btn').prop("checked", true);
                        } else if (this.document_status[j] == false && this.reserv_status[j] == false) {
                            $('.check-all-btn').prop("checked", false);
                        } else {
                            $('.check-all-btn').prop("checked", false);
                        }
                    }
                },
                itemCompare() {
                    $('.mycheck').css('display', 'block');
                    this.axios.get('/api/medical')
                .then(response => {
                    this.medical_accept = response.data;
                });
                },
                compareBtn() {
                    if (this.address_check == true || this.tran_check == true || this.month_check == true || this.entry_check == true || this.condition_check == true || this.special_check == true || this.medical_check == true || this.capacity_check == true || this.opening_check == true) {
                        this.iscompare = true;
                    } else {
                        this.iscompare = false;
                    }

                },
                googlemap: function(id) {
                    $('.googlecheck').css('display', 'block');
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        if (this.fav_nursing[i].id == id) {
                            this.address = this.fav_nursing[i].address;
                            this.access = this.fav_nursing[i].access;
                            this.markers[0]['position']['lat'] = this.fav_nursing[i].latitude;
                            this.markers[0]['position']['lng'] = this.fav_nursing[i].longitude;
                            this.center['lat'] = this.fav_nursing[i].latitude;
                            this.center['lng'] = this.fav_nursing[i].longitude;
                        }
                    }
                }
            }
    };
</script>