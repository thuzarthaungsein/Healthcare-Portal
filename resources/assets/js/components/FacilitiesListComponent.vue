<template>    
 <div class="row">
      <div class="col-12">  
           <div class="card">  
                    <div class="card-body">
                        <h4 class="main-color">ニュース記事を検索</h4>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="検索">
                            </div>
                            <div class="col-md-2">
                                <button class="btn secondary-bg-color all-btn white">検索</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="m-b-30">
                    <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
                    <router-link class="float-right" style="color: blue;" to="/createfacility" >  Create New Facility</router-link>
                </div>
           
        <!--card-->
         <h4 class="page-header" style="text-align: center;">
               <strong>  Facility List</strong>
        </h4> 
        <!--card-->
        <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">
                    
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p>Facility Name : Sample </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--card_end-->

                      <!--card-->
        <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">
                    
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p> Facility Name : Sample </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                    <!--card_end-->

                      <!--card-->
        <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">
                    
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <p> Facility Name : Sample </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color all-btn white">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--card_end-->               
            </div>           
        </div>
    </div>

      </div>
 </div>
</template>
<script>
export default {
          
}
</script>