<template>
    <!-- Page Content  -->
    <div class="row">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">{{ header }}</h4>
                            <br />
                        </div>
                        <form @submit.prevent="add" class="mt-2 pb-5 col-md-12">
                            <div class="form-group">
                                <label for="title">
                                    施設種別名:
                                    <span class="error sp2">必須</span>
                                </label>
                                <input type="title" class="form-control box" id="title" name="title" v-model="joboffer.title" placeholder="施設種別名を入力してください。" />
                                <!-- <span v-if="errors.title" class="error">{{ errors.title }}</span> -->
                                 <span v-if="errors.title" class="error">{{errors.title}}</span>
                            </div>

                            <div class="form-group">
                                <label for="description">
                                    仕事内容:
                                    <span class="error sp2">必須</span>
                                </label>
                                <textarea name="description" class="form-control" cols="50" rows="5" v-model="joboffer.description" placeholder="仕事内容を入力してください。"></textarea>
                                <!-- <span v-if="errors.description" class="error">{{errors.description}}</span> -->
                                 <!-- <span v-if="errors.includes('description')" class="error">題名が必須です。(description)</span> -->
                                <span v-if="errors.description" class="error">{{errors.description}}</span>
                            </div>

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="title">
                    <strong>
                      施設種別
                      <span class="error sp2">必須</span>
                    </strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <input
                    type="title"
                    class="form-control box"
                    id="title"
                    name="title"
                    v-model="joboffer.title"
                  />
                  <div class="mt-1">
                    <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                  </div>
                </div>
              </div>-->

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="description">
                    <strong>
                      仕事内容
                      <span class="error sp2">必須</span>
                    </strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <textarea
                    name="description"
                    class="form-control"
                    cols="50"
                    rows="5"
                    v-model="joboffer.description"
                  ></textarea>
                  <div class="mt-1">
                    <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                  </div>
                </div>
              </div>-->

                            <div class="form-group">
                                <label for="description" class="mt-2">
                                    経験・スキル:
                                    <a class="btn btn-sm main-bg-color all-btn white mb-2 ml-4" @click="addRow">
                                        <i class="fas fa-plus-circle"></i> 新スキルを追加
                                    </a>
                                </label>
                                <div class="mb-5">
                                    <div class="form-group row sk" id="newlinktpl" v-for="(field,id) in joboffer.fields" :key="id">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" v-model="field.skills" placeholder="経験・スキルを入力してください。" />
                                            <!-- <input type="text" class="form-control"  v-model="joboffer.skills" >  -->
                                        </div>

                                        <div class="col-sm-3">
                                            <a class="text-danger" style="cursor: pointer;" @click="delRow(id)">削除</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="newlink"></div>
                            </div>

                            <!-- <div class="mb-1 row">
                <div class="col-sm-3">
                  <label for="skill">
                    <strong>経験・スキル</strong>
                  </label>
                </div>
                <div class="col-sm-9">
                  <a class="btn btn-sm main-bg-color all-btn white mb-2" @click="addRow">
                    <i class="fas fa-plus-circle"></i> 新スキルを追加
                  </a>
                </div>
              </div>
              <div class="mb-5">
                <div
                  class="form-group row sk"
                  id="newlinktpl"
                  v-for="(field,id) in joboffer.fields"
                  :key="id"
                >
                  <div class="col-sm-3"></div>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" v-model="field.skills" />

                  </div>

                  <div class="col-sm-2">
                    <a class="text-danger" style="cursor: pointer;" @click="delRow(id)">削除</a>
                  </div>
                </div>
              </div>
              <div id="newlink"></div>-->
                            <div class="form-group">
                                <label for="location">
                                    郵便番号:
                                    <span class="error sp2">必須</span>
                                </label>
                                <input type="text" class="form-control box" id="postal" placeholder="165879" v-model="joboffer.postal" maxlength="7" v-on:keyup="getPostal" />
                          
                                <!-- <span v-if="errors.includes('postal')" class="error">題名が必須です。(postal)</span> -->
                                 <span v-if="errors.postal" class="error">{{errors.postal}}</span>
                            </div>
                            <div class="form-group">
                                <label for="location">
                                    都道府県:
                                    <span class="error sp2">必須</span>
                                </label>
                                <input type="text" class="form-control box" v-model="joboffer.pref" placeholder="都道府県を入力してください。" />
                                <!-- <span v-if="errors.pref" class="error">{{errors.pref}}</span> -->
                                <!-- <span v-if="errors.includes('pref')" class="error">題名が必須です。(pref)</span> -->
                                 <span v-if="errors.pref" class="error">{{errors.pref}}</span>
                            </div>
                            <div class="form-group">
                                <label for="location">
                                    市区町村、番地（建物名):
                                    <span class="error sp2">必須</span>
                                </label>
                                <input type="text" class="form-control box" v-model="joboffer.str_address" placeholder="市区町村、番地を入力してください。" />
                                <span v-if="errors.str_address" class="error">{{errors.str_address}}</span>
                                <!-- <span v-if="errors.includes('str_address')" class="error">題名が必須です。(str_address)</span> -->
                                   <!-- <span v-if="errors.name" class="error">{{errors.str_address}}</span> -->
                            </div>
                            <div class="form-group">
                                <label for="location">
                                    勤務地:
                                    <span class="error sp2">必須</span>
                                </label>
                                <textarea name="location" class="form-control" cols="50" rows="5" v-model="joboffer.location" placeholder="勤務地を入力してください。"></textarea>
                                 <span v-if="errors.location" class="error">{{errors.location}}</span>
                                 <!-- <span v-if="errors.includes('location')" class="error">題名が必須です。(location)</span> -->
                                  
                            </div>

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="勤務地">
                    <strong>
                      勤務地
                      <span class="error sp2">必須</span>
                    </strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <textarea
                    name="location"
                    class="form-control"
                    cols="50"
                    rows="5"
                    v-model="joboffer.location"
                  ></textarea>
                  <div class="mt-1">
                    <span v-if="errors.location" class="error">{{errors.location[0]}}</span>
                  </div>
                </div>
              </div>-->

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="neareststation">
                    <strong>最寄り駅</strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <textarea
                    name="neareststation"
                    class="form-control"
                    cols="50"
                    rows="5"
                    v-model="joboffer.nearest_station"
                    placeholder="最寄り駅を入力してください。"
                  ></textarea>
                </div>
              </div>-->

                            <div class="form-group">
                                <label for="neareststation">最寄り駅:</label>
                                <textarea name="neareststation" class="form-control" cols="50" rows="5" v-model="joboffer.nearest_station" placeholder="最寄り駅を入力してください。"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="neareststation">雇用形態:</label>
                                <br />
                                <label class="control control--radio">
                                    <input type="radio" value="契約社員" v-model="joboffer.employmentstatus" /> 契約社員 &nbsp;&nbsp;&nbsp;
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--radio">
                                    <input type="radio" value="非常勤" v-model="joboffer.employmentstatus" /> 非常勤 &nbsp;&nbsp;&nbsp;
                                    <div class="control__indicator"></div>
                                </label>

                                <label class="control control--radio">
                                    <input type="radio" value="正職員" v-model="joboffer.employmentstatus" /> 正職員 &nbsp;&nbsp;&nbsp;
                                    <div class="control__indicator"></div>
                                </label>

                                <label class="control control--radio">
                                    <input type="radio" value="その他" v-model="joboffer.employmentstatus" /> その他
                                    <div class="control__indicator"></div>
                                </label>
                            </div>

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="neareststation">
                    <strong>雇用形態</strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <label>
                    <input
                      type="radio"
                      value="ContractEmployee"
                      v-model="joboffer.employmentstatus"
                    />
                    <strong>契約社員</strong>
                  </label>

                  <label>
                    <input type="radio" value="Part" v-model="joboffer.employmentstatus" />
                    <strong>非常勤</strong>
                  </label>

                  <label>
                    <input type="radio" value="Full" v-model="joboffer.employmentstatus" />
                    <strong>正職員</strong>
                  </label>

                  <label>
                    <input type="radio" value="Other" v-model="joboffer.employmentstatus" />
                    <strong>その他</strong>
                  </label>
                </div>
              </div>-->

                            <!-- <div class="form-group row">
                <div class="col-sm-3"></div>

                <div class="col-sm-9">
                  <span
                    v-if="errors.employment_status"
                    class="error"
                  >{{errors.employment_status[0]}}</span>
                </div>
              </div>-->

                            <div class="form-group">
                                <label for="salary">職種:</label>

                                <select v-model="joboffer.occupation_id" class="form-control">
                                    <option value="0">なし</option>
                                    <option v-for="occupation in OccupationList" :key="occupation.id" :value="occupation.id">{{occupation.name}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="salary">
                                    給与:
                                    <span class="error sp2">必須</span>
                                </label>
                                <div class="row form-group">
                                  <select v-model="joboffer.salary_type" class="form-control col-md-4 joboffer-salary-type">
                                        <option v-bind:value='-1'>選択 </option>
                                        <option value='時給'>時給</option>
                                        <option value="日給">日給</option>
                                        <option value="月給">月給</option>
                                    </select>
                                      <span v-if="errors.salary_type" class="error">{{errors.salary_type}}</span>
                                       <!-- <span v-if="errors.includes('salary_type')" class="error">題名が必須です。(salary_type)</span> -->
                                       
                                    <input type="text" class="form-control col-md-4 joboffer-salary" v-model="joboffer.salary" name="salary" placeholder="給与を入力してください。" v-on:keydown="isNumber" />
                                    <span v-if="errors.salary" class="error">{{errors.salary}}</span>
                                    <!-- <span v-if="errors.includes('salary')" class="error">題名が必須です。(salary)</span> -->
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="salary_remark">給料備考:</label>
                                <textarea name="salary_remark" class="form-control" cols="50" rows="5" v-model="joboffer.salary_remark" placeholder="給料備考を入力してください。"></textarea>
                            </div>

                            <!-- <div class="form-group row">
                <div class="col-sm-3">
                  <label for="salary">
                    <strong>
                      給与
                      <span class="error sp2">必須</span>
                    </strong>
                  </label>
                </div>

                <div class="col-sm-9">
                  <input type="text" class="form-control" v-model="joboffer.salary" name="salary" />
                  <div class="mt-2">
                    <span v-if="errors.salary" class="error">{{errors.salary[0]}}</span>
                  </div>
                </div>
              </div>-->

                            <div class="form-group">
                                <label for="allowance">諸手当:</label>
                                <textarea name="allowance" class="form-control" cols="50" rows="5" v-model="joboffer.allowances" placeholder="諸手当を入力してください。"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="insurance">各種保険:</label>
                                <textarea name="insurance" class="form-control" cols="50" rows="5" v-model="joboffer.insurance" placeholder="各種保険を入力してください。"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="workhour">
                                    就業時間:
                                    <span class="error sp2">必須</span>
                                </label>
                                <input type="workhour" class="form-control" name="workhour" v-model="joboffer.working_hours" placeholder="就業時間を入力してください。" />
                                <span v-if="errors.working_hours" class="error">{{errors.working_hours}}</span>
                                <!-- <span v-if="errors.includes('working_hours')" class="error">題名が必須です。(working_hours)</span> -->
                              
                            </div>

                            <div class="form-group">
                                <label for="holiday">休日休暇:</label>
                                <textarea name="holiday" class="form-control" cols="50" rows="5" v-model="joboffer.holidays" placeholder="休日休暇を入力してください。"></textarea>
                            </div>
                            <div class="form- group row">
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="form-group mt-3 pb-5">
                                <span class="btn main-bg-color white all-btn"  @click="checkValidate()">{{subtitle}}</span>
                                <router-link class="btn btn-danger all-btn" to="/jobofferlist">キャンセル</router-link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
                return {
                header: "求人採用作成",
                subtitle: "作成する",
                errors: {
                  title: '',
                  description:'',
                  postal:'',
                  pref:'',
                  str_address:'',
                  location:'',
                  salary_type:'',
                  salary:'',
                  working_hours:''
                },
                OccupationList: {
                    id: "",
                    name: ""
                },

                    joboffer: {
                        title: "",
                        description:"",
                        customer_id: "",
                        occupation_id: 0,
                        description: "",
                        salary_type:-1,
                        fields: [{
                            skills: "",

                            id: ""
                        }],
                        postal: "",
                        zipcode_id: "",
                        pref: "",
                        str_address: "",
                        township_id: "",
                        location: "",
                        nearest_station: "",
                        employmentstatus: "",
                        working_hours: "",
                        employment_status: [{
                            pchecked: false,
                            fchecked: false,
                            echecked: false,
                            cchecked: false,
                            ochecked: false
                        }],
                        salary_type: '-1',
                        salary: "",
                        salary_remark: '',

                        insurance: "",
                        
                        holidays: "",

                        user_id: "",

                        recordstatus: ""
                    },

                    ischeck: "",

                    selectedValue: 0
                };
            },

            created() {
                this.axios.get("/api/job/occupationlist").then(
                    function(response) {
                        this.OccupationList = response.data;
                    }.bind(this)
                );

                this.joboffer.employmentstatus = "ContractEmployee";

                if (this.$route.params.id) {
                    this.axios

                        .get(`/api/job/edit/${this.$route.params.id}`)

                    .then(response => {
                        this.joboffer.title = response.data[0].title;
                        this.joboffer.postal = '0' + response.data[0].zip7_code;
                        this.joboffer.zipcode_id = response.data[0].zip_id;
                        this.joboffer.str_address = response.data[0].township;
                        this.joboffer.pref = response.data[0].cityname;

                        this.joboffer.customer_id = response.data[0].customer_id;

                        this.selectedValue = response.data[0].occupation_id;
                        this.joboffer.occupation_id = response.data[0].occupation_id;

                        this.joboffer.description = response.data[0].description;

                        this.joboffer.fields.skills = response.data[0].skills;

                        let arr = [];

                        arr = this.joboffer.fields.skills.split(",");

                        this.createskill(arr);

                        this.joboffer.location = response.data[0].location;

                        this.joboffer.nearest_station = response.data[0].nearest_station;

                        this.joboffer.employmentstatus = response.data[0].employment_status;

                        // this.ischeck = response.data.employment_status;

                        // this.createCheck(this.ischeck);
                        this.joboffer.salary_type = response.data[0].salary_type;
                        this.joboffer.salary = response.data[0].salary;
                        this.joboffer.salary_remark = response.data[0].salary_remark;

                        this.joboffer.allowances = response.data[0].allowances;

                        this.joboffer.insurance = response.data[0].insurance;

                        this.joboffer.working_hours = response.data[0].working_hours;

                        this.joboffer.holidays = response.data[0].holidays;

                        this.joboffer.user_id = response.data[0].user_id;

                        this.joboffer.recordstatus = response.data[0].recordstatus;
                        this.header = " 求人採用更新";
                        this.subtitle = "更新する";
                        return this.header;
                        return this.subtitle;
                    });
                }
            },

            methods: {
              checkValidate() {
                //   alert(1);
                      console.log("Validation fun");
                    //   if(this.errors.length ==0){
                            console.log('joboffer');                                                
                            // this.$swal({
                            //     title: "作成",
                            //     text: "作成よろしでしょうか。",
                            //     type: "success",
                            //     width: 350,
                            //     height: 200,
                            //     showCancelButton: true,
                            //     confirmButtonColor: "#6cb2eb",
                            //     cancelButtonColor: "#b1abab",
                            //     cancelButtonTextColor: "#000",
                            //     confirmButtonText: "作成",
                            //     cancelButtonText: "キャンセル",
                            //     confirmButtonClass: "all-btn",
                            //     cancelButtonClass: "all-btn"
                            // })
                            
                        
                        // if (this.joboffer.title == '' ) {
                          
                        //     this.errors.push("title");            
                        // } else {
                        //      this.errors=[];

                        // }

                        // if (this.joboffer.description == '') {
                            
                        //      this.errors.push("description");  
                        // } else {
                        //     this.errors=[];
                        // }

                        // if (this.joboffer.postal == '') {
                           
                        //      this.errors.push("postal");  
                        // } else {
                        //     this.errors=[];
                        // }

                        // if (this.joboffer.pref == '') {
                            
                        //      this.errors.push("pref");  
                        // } else {
                        //     this.errors=[];
                        // }

                        // if (this.joboffer.str_address == '') {
                         
                        //      this.errors.push("str_address");  
                        // } else {
                        //     this.errors=[];
                        // }

                        // if (this.joboffer.location == '') {
                           
                        //      this.errors.push("location");  
                        // } else {
                        //     this.errors=[];
                        // }

                        // if (this.joboffer.salary_type == '-1') {
                           
                        //    this.errors.push("salary_type");  
                        // }
                        // else {
                        //    this.errors=[];
                        // }

                        // if (this.joboffer.salary == '') {
                           
                        //      this.errors.push("salary");  
                        // } else {
                        //     this.errors=[];
                        // }

                        //  if (this.joboffer.working_hours == '') {
                           
                        //      this.errors.push("working_hours");  
                        // } else {
                        //     this.errors=[];
                        // }
                         
                        //  if(`${this.$route.params.id}` == "undefined"){
                        // console.log("go to add")
                        // this.add();
                        // }
                        // else{
                        //     console.log("go to upd")
                        //     this.updateJob();
                        // }
                         
                         if (this.joboffer.title == '') {
                            this.errors.title = '施設種別名が必須です。';
                        } else {
                            this.errors.title = "";
                        }

                          if (this.joboffer.description == '') {
                            this.errors.description = '仕事内容が必須です。';
                        } else {
                            this.errors.description = "";
                        } 

                          if (this.joboffer.postal == '') {
                            this.errors.postal = '郵便番号が必須です。';
                        } else {
                            this.errors.postal = "";
                        }               

                        if (this.joboffer.pref == '') {
                            this.errors.pref = '都道府県が必須です。';
                        } else {
                            this.errors.pref = "";
                        }

                        if (this.joboffer.str_address == '') {
                            this.errors.str_address = '市区町村が必須です。';
                        } else {
                            this.errors.str_address = "";
                        }

                        if (this.joboffer.location == '') {
                            this.errors.location = '勤務地が必須です。';
                        } else {
                            this.errors.location = "";
                        }

                        if (this.joboffer.salary_type == '-1') {
                            this.errors.salary_type = " 給与タイプが必須です。";
                        }
                        else {
                            this.errors.salary_type = null;
                        }

                        if (this.joboffer.salary == '') {
                            this.errors.salary = '給与が必須です。';
                        } else {
                            this.errors.salary = "";
                        }

                        if (this.joboffer.working_hours == '') {
                            this.errors.working_hours = '就業時間が必須です。';
                        } else {
                            this.errors.working_hours = "";
                        }
                        
                        if (
                            !this.errors.title && 
                            !this.errors.description &&
                            !this.errors.postal &&
                            !this.errors.pref &&
                            !this.errors.location &&
                            !this.errors.description &&
                            !this.errors.salary_type &&
                            !this.errors.salary &&
                            !this.errors.working_hours
                            
                        ) {
                            
                            this.add();
                        }

                        // if (this.joboffer.postal == '') {
                        //     this.errors.postal = 'postal';
                        // } else {
                        //     this.errors.postal = "";
                        // }                

                        // if (this.joboffer.pref == '') {
                        //     this.errors.pref = 'pref';
                        // } else {
                        //     this.errors.pref = "";
                        // }

                        // if (this.joboffer.str_address == '') {
                        //     this.errors.str_address = 'str_address';
                        // } else {
                        //     this.errors.str_address = "";
                        // }

                        // if (this.joboffer.location == '') {
                        //     this.errors.location = 'location';
                        // } else {
                        //     this.errors.location = "";
                        // }

                        // if (this.joboffer.salary_type == '-1') {
                        //     this.errors.salary_type = " salary_type";
                        // }
                        // else {
                        //     this.errors.salary_type = null;
                        // }

                        // if (this.joboffer.salary == '') {
                        //     this.errors.salary = 'salary';
                        // } else {
                        //     this.errors.salary = "";
                        // }

                        // if (this.joboffer.working_hours == '') {
                        //     this.errors.working_hours = 'working_hours';
                        // } else {
                        //     this.errors.working_hours = "";
                        // }
                  },
                getPostal: function(event) {
                    if (this.joboffer.postal.length > 4) {
                        var postal = this.joboffer.postal;
                        this.axios.post("/api/hospital/postList/" + postal).then(response => {
                            var post_data = response.data;
                            var length = response.data.length;
                            if (length > 0) {
                                var pref = post_data[0]["city_id"];
                                this.joboffer.zipcode_id = post_data[0]["id"];
                                if (post_data[0]["street"] == "") {
                                    this.joboffer.pref = post_data[0]["pref"];
                                    this.joboffer.str_address = post_data[0]["city"];
                                    // this.joboffer.zipcode_id = post_data[0]["id"];
                                } else {
                                    this.joboffer.str_address =
                                        post_data[0]["pref"] +
                                        " - " +
                                        post_data[0]["city"] +
                                        " - " +
                                        post_data[0]["street"];
                                }
                            } else {
                                this.joboffer.city = "";
                                $("#jsErrorMessage").html(
                                    '<div class="error">郵便番号の書式を確認してください。</div>'
                                );
                            }
                        });
                    }
                },

                add() {
                    console.log(this.joboffer);
                    if (this.$route.params.id) {
                      console.log('aaaaa');
                        this.updateJob();
                    } else {
                        this.$swal({
                            title: "確認",
                            text: "作成よろしいでしょうか。",
                            type: "info",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "作成",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => {
                            this.axios
                                .post("/api/job/add", this.joboffer)

                            .then(response => {
                                    this.$swal({
                                        position: "top-end",
                                        type: "success",
                                        title: "作成されました。",
                                        // text: "ファイルが作成されました。",
                                        // type: "success",
                                        width: 350,
                                        height: 200,
                                        confirmButtonText: "はい",
                                        confirmButtonColor: "#6cb2eb",
                                    });

                                    // alert('Successfully Created')

                                    this.$router.push({
                                        name: "jobofferlist"
                                    });

                                    this.$route.params.id = null;
                                })
                                .catch(error => {
                                    if (error.response.status == 422) {
                                        this.errors = error.response.data.errors;
                                    }
                                });
                        });
                    }
                },

                getParent: function() {
                  this.joboffer.occupation_id = this.selectedValue;
                },
            //      add() {                   
            //      if(this.errors.length ==0)
            //     {   
            //       // this.$swal({
            //       //       title: "確認",
            //       //       text: "更新よろしいでしょうか。",
            //       //       type: "info",
            //       //       width: 350,
            //       //       height: 200,
            //       //       showCancelButton: true,
            //       //       confirmButtonColor: "#6cb2eb",
            //       //       cancelButtonColor: "#b1abab",
            //       //       cancelButtonTextColor: "#000",
            //       //       confirmButtonText: "更新",
            //       //       cancelButtonText: "キャンセル",
            //       //       confirmButtonClass:  "all-btn",
            //       //       cancelButtonClass: "all-btn"
            //       //   }).then(response => {
            //         console.log("add fun no error");
            //         this.axios.post("/api/job/add", this.joboffer)
            //         .then(response => {
            //         this.name = ''
            //         // console.log(response);
            //         this.$swal({
            //         position: 'top-end',
            //         type: 'success',
            //         title: '作成されました',
            //         confirmButtonText: "はい",
            //         confirmButtonColor: "#6cb2eb",

            //         width: 250,
            //         height: 200,
            //         })
            //         // alert('Successfully Created')
            //         this.$router.push({name: 'jobofferlist'});
            //         }).catch(error=>{

            //             if(error.response.status == 422){

            //                 this.errors = error.response.data.errors

            //             }
            //         })
            // // })
            //     }
            // },

                addRow: function() {
                    this.joboffer.fields.push({
                        skills: "",

                        id: ""
                    });
                },

                delRow: function(id) {
                    this.joboffer.fields.splice(id, 1);

                    // this.joboffer.fields.pop();
                },

                createskill: function(arr) {
                    this.joboffer.fields.shift();

                    for (var i = 0; i < arr.length; i++) {
                        this.joboffer.fields.push({
                            skills: arr[i],

                            id: arr[i]
                        });
                    }
                },

                isNumber: function(event) {
                    if (!(event.keyCode >= 48 && event.keyCode <= 57) && !(event.keyCode >= 96 && event.keyCode <= 105) && event.keyCode != 8 && event.keyCode != 46 && !(event.keyCode >= 37 && event.keyCode <= 40)) {
                        event.preventDefault();
                    }
                },

                // onBlurNumber(e) {
                //   this.joboffer.salary = this.thousandSeprator(this.joboffer.salary);
                // },
                // thousandSeprator(amount) {
                //   if (amount !== '' || amount !== undefined || amount !== 0 || amount !== '0' || amount !== null) {
                //       return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                //   } else {
                //       return amount;
                //   }
                // },

                // my_function (event) {
                // 	// const char = String.fromCharCode(event.keyCode);
                // 	// if (!/[0-9]/.test(char)) {
                //   // 	event.preventDefault();
                //   // }

                //   var keyCode = event.key;
                //   if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
                //     console.log(keyCode);
                //     return false;
                //   }  
                // },
                // createCheck: function(check) {

                //     this.joboffer.employment_status.shift()

                //     if (check == "Full") {

                //         this.joboffer.employment_status.push({

                //             fchecked: 1,

                //         });

                //     } else if (check == "Part") {

                //         this.joboffer.employment_status.push({

                //             pchecked: 1,

                //         });

                //     } else {

                //         this.joboffer.employment_status.push({

                //             fchecked: 1,

                //             pchecked: 1

                //         });

                //     }

                // },

                updateJob() {
                  // console.log('bbb');
                      if (this.$route.params.id){
                        console.log('bbbbb');
                        this.$swal({
                        title: "確認",
                        text: "更新よろしいでしょうか。",
                        type: "info",
                        width: 350,
                        height: 200,
                        showCancelButton: true,
                        confirmButtonColor: "#6cb2eb",
                        cancelButtonColor: "#b1abab",
                        cancelButtonTextColor: "#000",
                        confirmButtonText: "更新",
                        cancelButtonText: "キャンセル",
                        confirmButtonClass:  "all-btn",
                        cancelButtonClass: "all-btn"
                    }).then(response => {
                        this.axios.post(`/api/job/update/${this.$route.params.id}`, this.joboffer)

                        .then(response => {
                          console.log("JOB");
                                this.$swal({
                                    title: "更新されました。",
                                    // text: "ファイルが更新されました。",
                                    type: "success",
                                    width: 350,
                                    height: 200,
                                    confirmButtonText: "はい",
                                    confirmButtonColor: "#6cb2eb"
                                });

                                this.$router.push({
                                    name: "jobofferlist"
                                });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    this.errors = error.response.data.errors;
                                }
                            });
                        });
                    }

                      }
                   
                  //console.log("update");
                    
                }
            };

</script>