<template>
    <div class="content">
        <div class="container">
            <div class="card card-default m-b-20">

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
               <!-- <a href="createcategory" class="float-right" style="color: blue;">Create New Category</a> -->
               <router-link to="/createcategory" class="float-right" style="color: blue;">Create New Category</router-link>
           </div><br/>
          <div class="card-header text-center">
              <h4 style="padding-top:20px;">ユーザーリストテーブル</h4>
          </div>
            <!--card-->
            <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <strong>Category Name:</strong> General Hospital
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <strong>Category Name:</strong>Obihiro-Adachi Eye Clinic
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <strong>Category Name:</strong>Aichi Cancer Center Hospital
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fuid">
                <div class="card card-default m-b-20 m-t-22">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                <strong>Category Name:</strong>Grandparents and Grandchildren
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                <button class="btn main-bg-color white all-btn">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
