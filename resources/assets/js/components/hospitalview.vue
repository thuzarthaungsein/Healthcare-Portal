<template>
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card card-default m-b-20">

                <div class="card-body">
                    <h4 class="main-color">ニュース役職の検索</h4>
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
            <div class="row m-b-15">
                
                <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
            </div>
            <div class="col-md-12 scrolldiv">
                <div v-for="favourite in favourite_list" :key="favourite.id" class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">

                            <div class="col-md-5">

                                <img src="images/h5.jpg" class="col-md-12" alt="image" width="5600px" height="250px"> 

                            <div class="m-t-30" style="text-align:center;">
                                <a href="#">病院プロフィール</a>
                            </div>
                               
                            </div>
                            

                            <div class="col-md-2  m-t-15">
                                    
                                    <button class="btn btn-danger all-btn" @click="deletehospital(favourite.id)">削除</button>

                                     <button class="btn main-bg-color white all-btn m-t-30 form-check"><label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">予約
                                            </label></button>

                                            <button class="btn secondary-bg-color all-btn white m-t-30 form-check"><label class="form-check-label" for="check3">
                                        <input type="checkbox" class="form-check-input" id="check3" name="option2" value="something" style="margin-left:-14px;"> 書類請求
                                            </label></button>

                                     
                            </div>
                            
                            <div class="col-md-5" style="">
                                
                                    <table class="table table-secondary table-striped table-bordered " >
                                            <tr>
                                                <td>アクセス</td>
                                                   <td>{{favourite.access}}</td>
                                            </tr>
                                             <tr>
                                                <td>医療部</td>
                                                   <td>{{favourite.medical_department}}</td>
                                            </tr>

                                             <tr>
                                                <td>スペシャリスト</td>
                                                   <td>{{favourite.specialist}}</td>
                                            </tr>

                                             <tr>
                                                <td>詳細情報</td>
                                                   <td>{{favourite.details_info}}</td>
                                            </tr>

                                             <tr>
                                                <td>件名</td>
                                                   <td>{{favourite.subject}}</td>
                                            </tr>

                                             <tr>
                                                <td>休業日</td>
                                                   <td>{{favourite.closed_day}}</td>
                                            </tr>

                                             <tr>
                                                <td>施設</td>
                                                   <td>{{favourite.facilities}}</td>
                                            </tr>

                                             <tr>
                                                <td>ウェブサイト</td>
                                                   <td>{{favourite.website}}</td>
                                            </tr>

                                             <tr>
                                                <td>特別な機能</td>
                                                   <td>{{favourite.special_features}}</td>
                                            </tr>

                                             <tr>
                                                <td>混雑</td>
                                                   <td>{{favourite.congestion}}</td>
                                            </tr>
                                           
                                        </table>

                                
                                
                               
                              
                           
                           
                               
                                
                            
                                
                                

                            </div>
                        </div>
                    </div> 
                </div>
                 <h2 style="text-align:left;text-decoration:none;" class="am-l-10">資料請求される方について</h2>
                <div class="row"  style="padding:23px;">
                   
                    <!-- <div class="col-md-2">
                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                        <p class="m-t-15">お名前:<span class="error">*</span></p>

                    </div> -->

                    <div class="col-md-10">
                          <form class="col-md-12" style="border:1px solid #b5c1ce;padding:23px;border-radius:8px;">
                        <div class="form-group">
                                           <label>お名前:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="お名前を入力してください。" style="height:45px;width:89%;">
                                        </div>

                                         <label>ふりがな:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="ふりがなを入力してください。" style="height:45px;width:89%;">
                                        </div>

                                         <label class="m-t-30">ご住所:<span class="error">*</span></label>
                                         <div class="btn-group">
             
                                            <button class="btn main-bg-color white all-btn" type="button">
                                                    都道府県
                                                <span class=""></span>
                                            </button>

                                            <select name="" id="">
                                                <option value="">東京都</option>
                                                <option value="">茨城県</option>
                                                <option value="">青森県</option>
                                            </select>
                                   
                                  
                                   
                                        </div><br>

                                        <label class="m-t-30">郵便番号:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="郵便番号を入力してください。" style="height:45px;width:89%;">
                                        </div>

                                        <label class="m-t-30">電話番号:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="電話番号を入力してください。" style="height:45px;width:89%;">
                                        </div>

                                        <label class="m-t-30">メールアドレス:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="メールアドレスを入力してください。" style="height:45px;width:89%;">
                                        </div>

                                        <label class="m-t-22">プレゼントのご希望:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="">「早分かり用語集」プレゼントを希望する
                                        </label>
                                    </div>
                                        </div>
                    </form>
                    </div>

                    <!-- <div class="col-md-2">
                          
                    </div> -->
                </div>
                 <h2 style="text-align:left;text-decoration:none;" class="am-l-10">入居対象者様について</h2><span class="error am-l-10">※お差しつかえがなければご入力ください。</span>
                 <div class="row"  style="padding:23px;">
                   
                    <!-- <div class="col-md-2">
                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                        <p class="m-t-15">お名前:<span class="error">*</span></p>

                    </div> -->

                    <div class="col-md-10">
                          <form class="col-md-12" style="border:1px solid #b5c1ce;padding:23px;border-radius:8px;">
                        <div class="form-group">

                    <label class="m-t-30">入居対象者様とのご関係:<span class="error">*</span></label>
                                         <div class="btn-group">
             
                                            <button class="btn main-bg-color white all-btn" type="button">
                                                    都道府県
                                                <span class=""></span>
                                            </button>

                                            <select name="" id="">
                                                <option value="">東京都</option>
                                                <option value="">茨城県</option>
                                                <option value="">青森県</option>
                                            </select>
                                        </div><br>



                                           <label class="m-t-22">お名前:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="お名前を入力してください。" style="height:45px;width:29%;">
                                        </div>

                                         <label class="m-t-22">プレゼントのご希望:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">男性

                                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">女性

                                             <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option2">夫婦
                                        </label>
                                    </div>
                                        </div>

                    </form>
                    </div>

                    <!-- <div class="col-md-2">
                          
                    </div> -->
                </div>
            
            


            </div>
            
        </div>
    </div>
    <!-- Page Content end  -->
    
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
                 .get('http://localhost:8000/api/hospital/favourite_list')
                 .then(response=>{
                     this.favourite_list = response.data;
                 });
        },

         methods: {
            deletehospital(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`http://localhost:8000/api/hospital/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.favourite_list.map(item => item.id).indexOf(id); // find index of your object
                        this.favourite_list.splice(i, 1)
                    });
                }

            }
        }

    }
</script>