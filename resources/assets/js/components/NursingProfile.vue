<template>
<div class="card profile" style="border:none;">
    <form class="col-md-12 form-class">                         

            <div class="col-md-12 pad-free">
                    <div class="form-group">
                            <label class="heading-lbl">名前<span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">メールアドレス<span class="error">*</span></label>
                            <input type="text" class="form-control"  placeholder="Email">
                    </div>                
                    <div class="form-group">
                            <label class="heading-lbl">電話番号<span class="error">*</span></label>
                            <input type="text" class="form-control"  placeholder="Phone">
                    </div>                               

                    <div class="form-group">
                            <label class="heading-lbl">フォトアルバム</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery"></div>
                            </div>                                        
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">動画</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryVideoAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video"></div>
                            </div>                                        
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">特長<span class="error">*</span></label>
                            <!-- <textarea name="feature" class="form-control"></textarea> -->
                            <div id="feature" name = "body"></div>
                    </div>

                    <!-- <hr class="hor-line m-t-30"> -->
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">費用</label>
                                </div>

                                <div class="form-group">
                                        <label class="heading-lbl">支払い方法<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="methodAdd()">+</span>

                                        <div class="col-md-12 pad-free" id="methods"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="heading-lbl">施設の概要</label> 
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="nurseFacToggleDiv()"><i class="fas fa-sort-down"></i></span>

                                <div class="nurse-fac-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:30%">事業主体</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>                                                        
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">開設年月日</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>                                                       
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">土地の権利形態</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">建物の権利形態</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">敷地面積</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">延床面積</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">構造</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">定員</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">総居室・戸数</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居住の権利形態</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">類型</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">入居条件</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室区分・間取り等</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室設備</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">共用施設・設備</td>
                                                        <td style="width:70%"><textarea class="form-control"></textarea></td>
                                                </tr>
                                        </table>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">協力医療機関<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="cooperateAdd()">+</span>                                        
                                        <div class="col-md-12 pad-free" id="cooperate-medical"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">医療面の受入れ</label> 
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="acceptanceList()"><i class="fas fa-sort-down"></i></span>
                                    <div class="col-md-12 accept-toggle-div toggle-div pad-free">
                                            <label for="" class="m-r-15"><i class="fas fa-check green"></i> 受入れ可</label>
                                            <label for="" class="m-r-15"><i class="fas fa-times red"></i> 受入れ不可</label>
                                            <label for="" class="m-r-15"><i class="fas fa-adjust blue"></i> 応相談</label>
                                            <div class="row">
                                                    <div class="col-md-6" v-for="medical in medical_acceptance" :key="medical.id">
                                                            <div class="col-md-12 accept-box">
                                                                    {{medical.name}}
                                                                    <div class="float-right">
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-check green"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-times red"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-adjust blue"></i></label>
                                                                    </div>    
                                                            </div>                                                            
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">備考</label>
                                                    <textarea name="" class="form-control"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="heading-lbl">職員体制</label> 
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="staffToggleDiv()"><i class="fas fa-sort-down"></i></span>

                                <div class="staff-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:20%">介護に関わる職員体制（入居者：職員）</td>
                                                        <td style="width:32%"><textarea class="form-control"></textarea></td>                                                        
                                                        <td style="width:16%">介護職員</td>
                                                        <td style="width:32%"><textarea class="form-control"></textarea></td>                                                        
                                                </tr>
                                                <tr>
                                                        <td style="width:20%">夜間の最少職員数</td>
                                                        <td style="width:32%"><textarea class="form-control"></textarea></td>                                                        
                                                        <td style="width:16%">看護職員数</td>
                                                        <td style="width:32%"><textarea class="form-control"></textarea></td>                                                        
                                                </tr>                                              
                                        </table>

                                        <div class="form-group">
                                                <label for="">備考</label>
                                                <textarea name="" class="form-control"></textarea>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class="heading-lbl">こだわりの特長<span class="error">*</span></label>
                                    <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="specialFeAdd()">+</span>

                                    <div class="col-md-12 pad-free" id="special-features"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="heading-lbl">地図</label> 
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="maptogglediv()"><i class="fas fa-sort-down"></i></span>

                                <div class="map-toggle-div toggle-div">
                                        <div class="col-md-12">
                                            <GoogleMap></GoogleMap>
                                        </div>

                                        <div class="form-group">
                                                <label>住所<span class="error">*</span></label>
                                                <textarea name="address" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                                <label>交通 / アクセス<span class="error">*</span></label>
                                                <textarea name="address" rows="10" class="form-control"></textarea>
                                        </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    

                    
                    
                    <!-- <hr class="hor-line m-t-30"> -->
                    
                    
                    <!-- <hr class="hor-line m-t-30"> -->
                    

                    <!-- <hr class="hor-line m-t-30"> -->
                    

                    <!-- <hr class="hor-line m-t-30"> -->
                    

                    

                    <div class="row">
                            <button class="btn news-post-btn all-btn m-t-15">Create</button>
                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                    </div>
            </div>                
            
    </form>
</div>
</template>

<script>
$(document).ready(function(){
        $('#feature').summernote({
        placeholder: 'Write Feature',
        height: 200,
        });
});

import GoogleMap from './GoogleMap.vue'

export default {
        components: {
                GoogleMap,
        },
       data() {
                return {
                        fac_list: [],
                        medical_acceptance:[],
                }
        },
        created(){
                this.axios
                .get('/api/facilities')
                .then(response=>{
                //  console.log(response);
                this.fac_list = response.data;
                });

                this.axios
                .get('/api/medical/medicalacceptance')
                .then(response => {
                    this.medical_acceptance = response.data;                  
                //      console.log(response.data);
                });
        },
        methods: {

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            nurseFacToggleDiv() {
                    $(".nurse-fac-toggle-div").toggle('medium');
            },

            staffToggleDiv() {
                    $(".staff-toggle-div").toggle('medium');
            },

            galleryAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                    $("#gallery").append('<div class="col-md-3"><input type="file" name="" class=" m-b-15 '+classname+'" id="upload_img" onChange="showImg('+c+',event)"><div class="col-md-12 hello '+classname+'"></div></div><div class="col-md-9"><input type="text" name="title" placeholder="タイトル" class="form-control m-b-15"><textarea name="description" placeholder="コンテンツ" class="form-control m-b-15"></textarea></div>');
            },

            galleryVideoAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                    $("#gallery-video").append('<div class="col-md-3"><input type="file" name="" class=" m-b-15 '+classname+'" id="upload_img" onChange="showImg('+c+',event)"><div class="col-md-12 hello '+classname+'"></div></div><div class="col-md-9"><input type="text" name="title" placeholder="タイトル" class="form-control m-b-15"><textarea name="description" placeholder="コンテンツ" class="form-control m-b-15"></textarea></div>');
            },

            methodAdd() {
                   $("#methods").append('<div class="row method-box"><div class="col-md-3 m-b-15 m-t-10"><label>方法</label><textarea name="method[]" class="form-control"></textarea></div><div class="col-md-9"><table class="table table-bordered"> <tr><th>入居時にかかる費用</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>居室タイプ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>月額利用料</th><th><input type="text" name="exp[]" class="form-control"></th></tr> <tr><th>広さ</th><th><input type="text" name="exp[]" class="form-control"></th></tr> </table></div><div class="col-md-3">詳細</div> <div class="col-md-9"><textarea class="form-control" name="breakdown[]"></textarea></div> </div> '); 
            },

            cooperateAdd() {
                   $("#cooperate-medical").append(' <div class="col-md-12 pad-free m-t-20"> <div class="form-group"> <label>名前 :</label> <input type="text" class="form-control" name="co-medical-header[]"> </div> <table class="table table-bordered"> <tr> <th style="width:30%">診療科目</th> <th style="width:70%"> <textarea class="form-control" name="clinical-sub"></textarea> </th> </tr> <tr> <th>協力内容</th> <th><textarea class="form-control" name="details"></textarea></th> </tr> <tr> <th>診療費用</th> <th> <textarea class="form-control" name="expense"></textarea> </th> </tr> <tr> <th>備考</th> <th> <textarea class="form-control" name="remark"></textarea> </th> </tr> </table> </div> '); 
            },

            acceptanceList() {
                $(".accept-toggle-div").toggle('medium');
            },

            specialFeAdd() {
                $("#special-features").append('<div class="row m-t-15"><div class="col-md-10"><input type="text" class="form-control" name="specialfeature[]"></div><div class="col-md-2"><span class="btn text-danger delete-borderbtn">Delete</span></div></div>');
            },
        }
}

</script>