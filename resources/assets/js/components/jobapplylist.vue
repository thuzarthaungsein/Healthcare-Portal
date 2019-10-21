<template>
        <div class="row">
            <div class="col-12">
                 <div class="row m-b-10">
            <!-- <div class="col-md-12">
          <router-link
            to="/joboffercreate"
            class="float-right main-bg-color create-btn all-btn"
            style="color: blue;">
            <i class="fas fa-plus-circle"></i> 新しい投稿を作成
          </router-link>
        </div> -->
            </div>
            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
                <div class="col-md-12 scrolldiv">
                    <div class="container-fluid">
                <h4 class="main-color m-b-10">Search</h4>
                <div class="row">
                     <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-12">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="検索"
                      id="search-item"/>
                    <input type="hidden" class=form-contrl id="customer-id">
                  </div>
                </div>
              </div>
                </div>
                <hr/>
                <h4 class="header">JobApplyList</h4>
                 <table class="table table-hover custom-table">
                    <thead style="background-color:rgb(183, 218, 210);">
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Postal</th>
                        <th>Street Address</th>
                        <th>Home Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="jobapply in jobapplies" :key="jobapply.id">
                        <th>{{jobapply.first_name}}</th>
                        <th>{{jobapply.last_name}}</th>
                         <th>{{jobapply.birthday}}</th>
                        <th>{{jobapply.gender}}</th>
                        <th>{{jobapply.postal}}</th>
                        <th>{{jobapply.street_address}}</th>
                        <th>{{jobapply.home_address}}</th>
                        <th>{{jobapply.phone}}</th>
                        <th>{{jobapply.email}}</th>
                    </tr>
                    </tbody>
                 </table>
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
      jobapplies: [],
    };
  },
  created(){
      this.axios.get("/api/jobapplylist").then(response => {
      this.jobapplies = response.data;
    });

  }

}
</script>

