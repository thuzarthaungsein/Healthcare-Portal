<template>    
 <div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center">
                        <h4 style="padding-top: 20px;"> Job Create </h4>
                    </div>
                    <div class="card-body ">    
                        <div class="row">  
                         <div class="col-sm-1"></div>
                         <div class="col-sm-10">
                                <form action="#" class="m-t-16">
                                        <div class="form-group row">
                                            <div class="col-sm-2 text-right">
                                                <label for ="title"  ><strong> Title :</strong>  </label>
                                            </div>
                                             <div class="col-sm-10">
                                                <input type="title" class="form-control box" id="title"  name="title">
                                             </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="category" ><strong> Category :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="sel1">
                                                            <option>Hospital</option>
                                                            <option>Home Special</option>
                                                            <option>Day Service</option>
                                                    </select>
                                                </div>
                                        </div>
                                            
                                        <div class="mb-1 row">
                                            <div class = "col-sm-2"></div>
                                            <div class = "col-sm-10">
                                            <span id="addnew"><a href="javascript:new_link()" class="btn btn-sm main-bg-color all-btn white">  Add New Item  </a></span>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2 text-right">
                                                <label for ="header"><strong> Header : </strong></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="header" name="header" > 
                                            </div>         
                                        </div>
                                        <div class="form-group row">    
                                            <div class="col-sm-2 text-right">
                                                <label for ="body"><strong> Body :</strong>  </label>
                                            </div>  
                                            <div class="col-sm-10">
                                               <div class="summernote" name = "body"></div>
                                            </div>                                                                            
                                        </div>    
                                        <div class="form- group row">
                                            <div class="col-sm-2"></div>
                                        </div>
                                         <div id="newlink"></div>    
                                </form>
                           </div>
                            <div class="col-sm-2"></div>
                            <div id="newlinktpl" style="display:none">
                                    <div class="form-group row" style="margin-top:30px;">
                                            <div class="col-sm-2 text-right">
                                                <label for ="header"> <strong> Header : </strong> </label>
                                            </div>
                                            <div class="col-sm-10 ">
                                                <input type="text" class="form-control" id="header" name="header"  > 
                                            </div>         
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-sm-2 text-right">
                                            <label for ="body"> <strong> Body : </strong>  </label>
                                        </div>  
                                        <div class="col-sm-10">
                                            <!-- <textarea name="body" class="form-control" cols="50" rows="5"  ></textarea>   -->
                                             <div class="summernote" name = "body"></div>
                                        </div>                                        
                                    </div>    
                            </div>     
                       </div>
                       <div class="row">
                           <div class = "col-sm-1"></div>
                           <div class="col-sm-10">
                                    <div class="mb-1 row">
                                            <div class = "col-sm-2"></div>
                                            <div class = "col-sm-10">
                                               <button type = "button" class="btn btn-md main-bg-color  all-btn white" id = "submit"> Submit </button>
                                            </div>       
                                   </div>
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


