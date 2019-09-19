


   <template>
            <div class="fullpage-container" style="height: 150vh;">
                <div class="button-group">
                        <button type="button" :class="{active:index ==0}" @click="moveTo(0)">Information</button>
                        <button type="button" :class="{active:index ==1}" @click="moveTo(1)">Features</button>
                        <button type="button" :class="{active:index ==2}" @click="moveTo(2)">Cost</button>
                        <button type="button" :class="{active:index ==3}" @click="moveTo(3)">Review</button>
                </div>

                <div class="fullpage-wp clearfix" v-fullpage="opts" ref="fullpage">

                    <div class="page-1 page">
                        <h1 class="part-1" >Information</h1><br/>
                         <div class="fac-wrap">
                            <ul class="fac_container">
                                <li v-for="special in special_features" :key="special.id">{{special.short_name}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-2 page">
                        <h2 class="part-2" >Features</h2>
                        <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-6 offset-md-3">
                            {{nurseprofile.feature}}
                        </div>
                    </div>
                    <div class="page-3 page">
                        <h2 class="part-3" >Cost</h2><br/>
                          <div  v-for="cost in method_payment" :key="cost.id" class="col-md-6 offset-md-3" >
                            <table border="1" class="table">
                                                <tr>
                                                        <td style="width:30%" >Payment Name : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.payment_name}}</div></td>
                                                </tr>
                                                 <tr>
                                                        <td style="width:30%">Expense : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.expense_moving}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Monthly Fees : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.monthly_fees}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Living Room Type : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.living_room_type}}</div></td>
                                                </tr>
                                                 <tr>
                                                        <td style="width:30%">Area: </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.area}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Remark: </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.remark}}</div></td>
                                                </tr>

                                </table>
                        </div>

                    </div>
                    <div class="page-4 page">
                        <h2 class="part-4" >Review</h2><br/>
                                 <div class="row" v-for="comment in comments" :key="comment.id">
                                <div class="col-md-2">
                                 <i class="fas fa-comments" style='font-size:24px;color:#F4A460'></i>

                                 </div>
                                 </div>
                    </div>
                    </div>
                </div>
        </template>

 <script>
 export default {
  data() {
            var that = this;
            return {
                index: 0,
                pageNum: 0,
                nursing_profiles:[],
                special_features:[],
                method_payment:[],
                comments:[],
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration:500,
                    beforeChange: function(ele, current, next) {
                        console.log('before', current, next)
                        that.index = next;
                    },
                    afterChange: function(ele, current) {
                        that.index = current;
                        console.log('after', current)
                    }
                }
            };
        },
        created(){
            this.axios
                .get('/api/feature/featurelist')
                .then(response => {
                    this.special_features = response.data;
                });
        this.axios
                .get('/api/nurse')
                .then(response => {
                    this.nursing_profiles = response.data;
                });
        this.axios
                .get('/api/cost')
                .then(response => {
                    this.method_payment = response.data;

                });
                this.axios
                .get('/api/comments/comment')
                .then(response => {
                    this.comments = response.data;

                });
    },
        methods: {
            moveTo: function(index) {

                this.$refs.fullpage.$fullpage.moveTo(index, true);
            },
        }
 }

</script>
<style scoped>
.fullpage-container {
    position: relative;
    width: 100%;
    height: 800px;
    overflow: hidden;
}
</style>








