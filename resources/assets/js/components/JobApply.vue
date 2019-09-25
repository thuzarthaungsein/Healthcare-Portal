<template>
<div class="col-md-12 scrolldiv">
    <h4 class="h_4 text-center header">Job Apply Form</h4>
    <div class="col-md-7 offset-md-3 register_box" v-if="type == 'register'">
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="first_name"  ><img src="/images/require_field.gif" alt="必須" > <strong>お名前 : </strong>   </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="first_name" placeholder="トラスト　太郎" v-model="jobApply.first_name"  >
                <div v-if="errors.first_name" class="text-danger">{{ errors.first_name }}</div>
            </div>    
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="last_name"><img src="/images/require_field.gif" alt="必須" ><strong>お名前フリガナ : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="last_name" placeholder="トラスト　タロウ" v-model="jobApply.last_name" >
                <div v-if="errors.last_name" class="text-danger">{{ errors.last_name }}</div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="birthday"  ><strong>生年月日 : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="birthday" v-model="jobApply.birthday"  >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="gender"  ><strong> 性別 : </strong>   </label>
            </div>
            <div class="col-sm-9">
                <label> <input type="radio" class="custom-radio" v-model="jobApply.gender" value="0"  > Male </label>
                <label> <input type="radio" class="custom-radio" v-model="jobApply.gender" value="1" >Female </label>
            </div>    
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="postal"  > <img src="/images/require_field.gif" alt="必須" > <strong>郵便番号 : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="postal" placeholder="165879" v-model="jobApply.postal" v-on:keyup="getPostal" >
                <div v-if="errors.postal" class="text-danger">{{ errors.postal }}</div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="str_address"  ><strong>住所: </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="str_address" v-model="jobApply.str_address"  >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="home_address"  ><strong>番地以下 : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="home_address" v-model="jobApply.home_address"  >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="phone"  ><img src="/images/require_field.gif" alt="必須" ><strong>電話番号 : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="phone" v-model="jobApply.phone">
                <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="email"  ><img src="/images/require_field.gif" alt="必須" ><strong>メールアドレス : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="email" placeholder="user@email.com" v-model="jobApply.email">
                <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="qualification"  ><strong>保有資格 : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="qualification" v-model="jobApply.qualification"  >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="workable_day"  ><strong>就業可能日数 </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="workable_day" v-model="jobApply.workable_day"  >
            </div>
        </div>
        <!-- <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="skill"  ><strong>Skill : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control box" id="skill" v-model="jobApply.skill"  >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="remark"  ><strong>Remark : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <textarea name="remark" class="form-control" cols="50" rows="5" v-model="jobApply.remark"></textarea>
            </div>
        </div> -->

        <div class="form-group row">
            <div class="col-sm-3 text-right">
                <label for ="terms"  ><img src="/images/require_field.gif" alt="必須" ><strong>個人情報について : </strong>  </label>
            </div>
            <div class="col-sm-9">
                <label> <input type="checkbox" v-model="jobApply.terms"> Accept terms and conditions. </label>
                <div v-if="errors.terms" class="text-danger">{{ errors.terms }}</div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" :disabled='isDisabled' class="btn main-bg-color white all-btn" @click="checkValidate()">確認画面へ進む</button>
        </div>
        <br>
    </div>

    <div class="col-md-7 offset-md-3 confirm_box" v-if="type == 'confirm'">
        <form @submit.prevent="apply">
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="first_name"  ><strong>First Name : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.first_name }} </span>
                </div>    
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="last_name"  ><strong>Last Name : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.last_name }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="birthday"  ><strong>Birthday : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.birthday }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="gender"  ><strong> Gender : </strong>   </label>
                </div>
                <div class="col-sm-9">
                    <span v-if="jobApply.gender == 0">Male</span>
                    <span v-if="jobApply.gender == 1">Female</span>
                </div>    
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="postal"  ><strong>Postal : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.postal }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="str_address"  ><strong>Street Address : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.str_address }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="home_address"  ><strong>Home Address : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.home_address }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="phone"  ><strong>Phone : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.phone }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="email"  ><strong>Email : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.email }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="qualification"  ><strong>Qualification : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.qualification }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="workable_day"  ><strong>Workable Days : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.workable_day }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="skill"  ><strong>Skill : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.skill }} </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 text-right">
                    <label for ="remark"  ><strong>Remark : </strong>  </label>
                </div>
                <div class="col-sm-9">
                    <span>{{ jobApply.remark }} </span>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn main-bg-color white all-btn " @click="editUserInfo()">Back</button>
                <button type="submit" class="btn main-bg-color white all-btn ">Register</button>
            </div><br>
                <!-- <div v-if="success" class="alert alert-success mt-3">Apply sent!</div> -->

                <!-- <router-link to="" class="btn main-bg-color white all-btn">Apply</router-link> -->
        </form>
    </div>

    <div class="col-md-7 offset-md-3 confirm_box" v-if="type == 'completed'">
        <h5>Your job has been applied successfully.</h5><br>
    </div>
</div>
</template>
<script>
export default {
    data() {
            return {
                errors: {
                    first_name: '',
                    last_name: '',
                    postal: '',
                    phone: '',
                    email: '',
                    terms: ''
                },

                jobApply: {
                        first_name: '',
                        last_name: '',
                        birthday:'',
                        gender: '',
                        postal: '',
                        str_address: '',
                        home_address: '',
                        phone:'',
                        email:'',
                        qualification: '',
                        workable_day:'',
                        skills:[],
                        remark: '',
                        terms: false
                    },
                    Job:{
                        fields:[{
                            skills:[]
                        }],
                    },
                    type: 'register',
                    city_list: [],
            }
    },
     created(){
        this.axios
                .get('/api/getskill')
                .then(response => {
                 this.Job.fields = response.data;

                });
        this.axios.get('/api/hospital/citiesList')
                .then(response => {
                    this.city_list = response.data;
                });
    },
    computed: {
        isDisabled: function(){
            return !this.jobApply.terms;
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
                            console.log(response);
                            if (length > 0) {
                                var pref = post_data[0]['city_id'];
                                if (post_data[0]['street'] == '') {
                                    this.jobApply.str_address = post_data[0]['city'];
                                } else {
                                    this.jobApply.str_address = post_data[0]['pref'] + ' - ' + post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                            } else {
                                this.jobApply.city = '';
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
                            }
                        });
                }
            },
            apply() {
                console.log(this.jobApply);
                this.axios.post('/api/jobapply',this.jobApply)
                    .then((response) => {
                    alert('Successful Apply');
                    this.jobApply = response.data;
                    this.type = 'completed';

                    }).catch(error=>{
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
                })
            },
            getcheckbox(job)
            {
               this.jobApply.skills.push(job);
            },
            checkValidate() {
                if(this.jobApply.first_name) {
                    this.errors.first_name = "";
                }
                else {
                    this.errors.first_name = "ニュースの題名が必須です。";
                }
                if(this.jobApply.last_name) {
                    this.errors.last_name = "";
                }
                else {
                    this.errors.last_name = "ニュースの題名が必須です。";
                }
                if(this.jobApply.postal) {
                    this.errors.postal = "";
                }
                else {
                    this.errors.postal = "ニュースの題名が必須です。";
                }
                if(this.jobApply.phone) {
                    this.errors.phone = "";
                }
                else {
                    this.errors.phone = "ニュースの題名が必須です。";
                }
                if(this.jobApply.email) {
                    this.errors.email = "";
                }
                else {
                    this.errors.email = "ニュースの題名が必須です。";
                }
                if(this.jobApply.terms) {
                    this.errors.terms = "";
                }
                else {
                    this.errors.terms = "ニュースの題名が必須です。";
                }
                if(!this.errors.first_name && !this.errors.first_name && !this.errors.postal && !this.errors.phone && !this.errors.email && !this.errors.terms) {
                    this.type = 'confirm';
                }
            },
            editUserInfo() {
                this.type = 'register';
            }
        }
}
</script>
