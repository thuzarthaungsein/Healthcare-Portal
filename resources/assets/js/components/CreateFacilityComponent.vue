<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header">Create Facility</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Facility Name :<span class="error">*</span></label>
                                <input type="text" class="form-control" name="title" placeholder="Facility Name">
                            </div>
                        </div>
                        
                        <!-- <div class="row"> -->
                            <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-1 pad-free">
                                            <button class="btn news-post-btn">Search</button>
                                        </div>
                                        <div class="col-3 pad-free">
                                          
                                                 <router-link class="btn btn-warning" to="/facilitieslist" >  Cancel </router-link>
                                          
                                        </div>
                                    </div>       
                            </div>
                        <!-- </div> -->

                    </div>
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


