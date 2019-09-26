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
                            <td width="70%">
                                <font>method of payment test</font>
                            </td>
                        </tr>
                    </table>
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
</style>
