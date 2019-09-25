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
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Features</strong></p></div>

              </div>

              <h5 class="header">special Features</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Short Name </li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Information from Clinic</li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Subject </li>
                  </ul>
              </div>
              <h5 class="header">Consultation hours</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Consultation hours</li>
                  </ul>
              </div>
              <h5 class="header">Facility</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li >Facility</li>
                  </ul>
              </div>
              <h5 class="header">special Features</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Short Name </li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Information from Clinic</li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Subject </li>
                  </ul>
              </div>
              <h5 class="header">Consultation hours</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Consultation hours</li>
                  </ul>
              </div>
              <h5 class="header">Facility</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li >Facility</li>
                  </ul>
              </div>
              <h5 class="header">special Features</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Short Name </li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container">
                      <li > Information from Clinic</li>
                  </ul>
              </div>
              <h5 class="header">Information from clinic</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Subject </li>
                  </ul>
              </div>
              <h5 class="header">Consultation hours</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li > Consultation hours</li>
                  </ul>
              </div>
              <h5 class="header">Facility</h5>
              <div class="row m-lr-0">
                    <ul class="fac_container" >
                      <li >Facility</li>
                  </ul>
              </div>
          </div>
          <div class="row ele m-lr-0" id="element3">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Cost</strong></p></div>
              </div>
              <h5 class="header">cost</h5>
          </div>

          <div class="row ele m-lr-0" id="element4">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Equipment</strong></p></div>

              </div>
              <h5 class="header">Equipment</h5>

          </div>
           <div class="row ele m-lr-0" id="element5">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Map</strong></p></div>

              </div>
              <h5 class="header">Map</h5>

          </div>
           <div class="row ele m-lr-0" id="element6">
              <div class="row list-wrap m-lr-0">
                  <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Review</strong></p></div>

              </div>
              <h5 class="header">Review</h5>

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
      }
  },
  created() {
        this.axios.get(`/api/customers`).then(response => {
            this.customer= response.data;
        });

        this.axios.get(`/api/special`).then(response => {
            this.features= response.data;
        });
  }
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
