<template>
 <div class="row">
     <div class="col-12">
         <div class="card card-default m-b-20">

              <div class="card-body">
                        <h4 class="main-color">Comment List Search</h4>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchCategory()">
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                            </div>
                        </div>
                </div>
          </div>
           <div class="scrolldiv col-12 border-style">
               <h5 class="main-color header">Comment</h5>
               <div class=" card card-default m-b-20">
                   <div class="card-body news-post">
                       <div class="row col-md-12">

                       </div>
                   </div>
               </div>
           </div>
     </div>
 </div>
</template>
