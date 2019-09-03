<template>
<!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">病院プロフィール</h4>
                                        <br>
                                    </div>

                              
                                      
                                    <div class="col-md-12 card">
                                          <div class="row" v-for="newsList in favourite_list" :key="newsList.id">
                                                <div class="col-md-3" style="margin-right:30px"> 
                                                        <img src="images/aa.png" class="img-responsive m-t-15 m-b-20" width="250px" height="250px" style=""><br>
                                                    <a href="#" class="m-t-l">病院レビュー</a>
                                                    </div>
                                                    
                                                    <div class="col-md-3 m-t-55" style="">

                                                         <button class="btn btn-danger all-btn">削除</button><br><br>

                                                            <button class="btn main-bg-color white all-btn">予約</button><br><br>

                                                            
                                                              <button class="btn secondary-bg-color all-btn white">リクエスト文書</button>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <p class="m-t-30">名前  -  </p>  <p>{{newsList.website}}</p>
                                                              <p class="m-t-30">電話番号 - </p>
                                                                <p class="m-t-30">アドレス - </p>
                                                                  <p class="m-t-30">アクセス - </p>
                                                        </div>
                                                    
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
       
        data() {
            return {
                favourite_list:[] 
            }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/hospitalprofile/favourite_list')
                 .then(response=>{
                     this.favourite_list = response.data;
                 });
        }
        

    }
</script>

