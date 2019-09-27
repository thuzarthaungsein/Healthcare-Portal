<template>
  <div id="app">
    <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav">
       <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn">
         Information
      </button>
       <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn">
         Features
      </button>
       <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn">
         Cost
      </button>
       <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn">
         Equipment
      </button>
       <button v-scroll-to="{ el: '#element5' }" class="top-fixed-btn">
         Map
      </button>
       <button v-scroll-to="{ el: '#element6' }" class="top-fixed-btn">
         Review
      </button>
       <button v-scroll-to="{ el: '#element7' }" class="top-fixed-btn">
         Job Offer
      </button>
    </div>


         <div class="row m-lr-0 ele" id="element1">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12">
                      <p><strong>Information</strong></p>
                      <div class="row">
                        <div class="col-sm-5 detail_profile_left">
                           left

                        </div>
                        <div class="col-sm-7 detail_profile_right">

                        </div>
                    </div>
                  </div>
              </div>
          </div>



         <div class="row m-lr-0 ele" id="element1">
             <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Address :</strong></p></div>
                <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Phone :</strong></p></div>
                <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
            </div>

             <h5 class="header">special Features</h5>
                <div class="row m-lr-0">
                    <ul class="fac_container" v-for="special in features" :key="special.id">
                        <li>{{special.short_name}}</li>
                    </ul>
                </div>
        </div>
         <div class="row ele m-lr-0" id="element2">
             <h5 class="header">Features</h5>
               <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-8">{{nurseprofile.feature}}</div>
          </div>
          <div class="row ele m-lr-0" id="element3">
              <h5 class="header">Cost</h5>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th width="30%">
                                <font>method of payment</font>
                            </th>
                            <td width="50%">
                                <font>method of payment test</font>
                            </td>
                        </tr>
                    </table>
                    <div class="cost_tb"  v-for="cost in method_payment" :key="cost.id">
                        <table class="cost_table">
                            <tbody>
                            <tr>
                                <th width="150">入居にかかる費用(Expense)</th>
                                    <td >{{cost.expense_moving}}</td>
                                    <th>居室タイプ(type)</th>
                                    <td>{{cost.living_room_type}}</td>
                            </tr>
                            <tr>
                                <th width="150">月額料金 (monthly)</th>
                                    <td>{{cost.monthly_fees}}</td>
                                <th>広さ(area)</th>
                                    <td>{{cost.area}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="cost_btnwrapper">
                            <button class="btn edit-borderbtn okbtn" type="button" data-toggle="collapse" :data-target="'#costDetails' + cost.customer_id">View</button>
                        </div> <br/>


                    <div class="collapse" :id="'costDetails' + cost.customer_id">
                            <table class="cost_table">
                                <h4>入居にかかる費用(Expense Moving)</h4>
                            <tbody>
                                <tr>
                                    <th width="300">入居一時金または(deposit)</th>
                                        <td>{{cost.deposit}}</td>
                                </tr>
                                <tr>
                                    <th>その他（使途）(other)</th>
                                        <td>{{cost.other_use}}</td>
                                </tr>
                            </tbody>
                        </table>
                         <table class="cost_table">
                                <h4>月額費用(Monthly Cost)</h4>
                            <tbody>
                                <tr>
                                    <th width="300">賃料 (rent)</th>
                                    <td>{{cost.rent}}</td>
                                </tr>
                                <tr>
                                    <th>管理費(admin_expense)</th>
                                    <td>{{cost.admin_expense}}</td>
                                </tr>
                                <tr>
                                    <th>食費 (food_expense)</th>
                                    <td>{{cost.food_expense}}</td>
                                </tr>
                                <tr>
                                    <th>介護上乗せ金（生活サービス費(nursing care)</th>
                                    <td>{{cost.nurse_care_surcharge}}</td>
                                </tr>
                                <tr>
                                    <th>その他 (other monthly cost)</th>
                                    <td>{{cost.other_monthly_cost}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="cost_table">
                                <h4>返還金について(refund system)</h4>
                            <tbody>
                                <tr>
                                    <th width="300">返還制度 (refund)</th>
                                    <td>{{cost.refund_system}}</td>
                                </tr>
                                <tr>
                                    <th>償却期間(Depreciation)</th>
                                    <td>{{cost.depreciation_period}}</td>
                                </tr>
                                <tr>
                                    <th>初期償却(InitialDepreciation)</th>
                                    <td>{{cost.initial_deprecration}}</td>
                                </tr>
                                <tr>
                                    <th>その他メッセージ(other message)</th>
                                    <td>{{cost.other_message_refund}}</td>
                                </tr>
                            </tbody>
                        </table>
                         </div>
                    </div>
          </div>

          <div class="row ele m-lr-0" id="element4">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Equipment</strong></p></div>

              </div>
              <h5 class="header">Equipment</h5>

          </div>
           <div class="row ele m-lr-0" id="element5">
               <h5 class="header">Map</h5>
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Map</strong></p></div>

              </div>


          </div>
           <div class="row ele m-lr-0" id="element6">
               <h5 class="header">Review</h5>
              <div class="row" v-for="comment in comments" :key="comment.id">
                    <div class="col-md-12" style="font-size:20px;">タイトル:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                    <div class="col-md-5" style="font-size:20px;">電子メールアドレス:{{comment.email}}</div>
                    <div class="col-md-3" style="font-size:20px;">年月日投稿:{{comment.year}}</div>
                        <br/><br/>
                                      <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">
                                         <div class="content hideContent">{{comment.comment}}</div>
                                     </div> -->
                                     <!-- <button onclick="function()">See more</button> -->
                    <div class="row col-md-12 m-lr-0">
                        <p class="showContent"> {{comment.comment}}</p>
                            <span class="displaytext">{{comment.comment}}</span>
                                <a class="mt-2 readMore" href ="#">続きを読む</a>

                    </div>

                </div>


          </div>
           <div class="row ele m-lr-0" id="element7">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Job Offer</strong></p></div>

              </div>
              <h5 class="header">Job Offer</h5>

          </div>

  </div>
</template>
<script>
export default {
  data() {
      var that = this;
      return {
          customer:[],
          features:[],
          nursing_profiles:[],
          comments:[],
          method_payment:[],
      }
  },
  created() {
        this.axios.get(`/api/customers`).then(response => {
            this.customer= response.data;
        });

        this.axios.get(`/api/special`).then(response => {
            this.features= response.data;
        });
        this.axios.get('/api/nurse') .then(response => {
                    this.nursing_profiles = response.data;
        });
         this.axios.get('/api/comments/comment').then(response => {
                    this.comments = response.data;

        });
        this.axios .get('/api/cost').then(response => {
                    this.method_payment = response.data;

        });


  },
}
</script>


<style scoped>
.fixed-nav{
    position: fixed;
    z-index: 4;
    overflow: hidden;
    background: #fff;
    width: 65.9%;
    margin-top:-1px;

}
.top-fixed-btn{
  border: 1px solid #b7dad2;
  box-shadow: 0px 2px 1px rgba(70, 70, 70, 0.3);
  color: #095c5f;
  background: #b7dad2;
  width: 145px;
  cursor: pointer;
  padding: 10px;
}
.ele{
  margin-top: 27px;
  padding-top: 60px;
}
.cost_tb{
    border: 1px solid #ccc;
    /* border-left: 0px; */
    /* border-bottom: 0px; */
    padding-bottom: 1px;
    background: #fff;
    /* padding: 10px;*/
    padding-bottom: 20px;
}
.cost_table{
    width: 820px;
    height: 81px;
    float: left;
    border-bottom: 1px solid #ccc;
    margin-bottom: -2px;
}
.cost_table h4 {
    border-left: 6px solid #b7dad2;
    padding-left: 10px;
    margin-bottom: 10px;
    font-size: 1.286em;
    line-height: 1.3;
    margin-top: 30px;
    padding-top: 2px;
}
.cost_table th{
    border: 1px solid #ccc;
    padding: 8px 10px;
    text-align: center;
    background: #f0f0f0;
    color: #000;
    line-height: 1.7;
    vertical-align: top;
    min-width: 100px;
}
.cost_table td{
    border: 1px solid #ccc;
    padding: 8px 10px;
    text-align: left;
    line-height: 1.7;
    background: #fff;
}
.cost_btnwrapper{
    float: right;
    width: 158px;
    text-align: center;
    padding-top: 21px;
}
.cost_btnwrapper .okbtn{
    width: 125px;
    margin-bottom: 0;
    padding-left: 20px;
    padding-right: 0;
}
</style>
