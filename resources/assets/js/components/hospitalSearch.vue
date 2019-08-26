<template>
<div class="search-map">
        <div class="row">
        
                <div class="col-md-7 divisions">
                        <div class="row m-b-30">
                                <div class="col-md-3">
                                        <div class="card" style="background: #c296c5">
                                                <div class="card-header">
                                                中国・東海
                                                </div>
                                                <div class="card-body" style="padding: 10px;">

                                                <input type="checkbox" id="hiroshima" v-model="checked">
                                                <label for="hiroshima"><span>広島</span> </label>

                                                <input type="checkbox" id="okayama" v-model="checked">
                                                <label for="okayama"><span>岡山</span> </label><br>

                                                <input type="checkbox" id="yamaguchi" v-model="checked">
                                                <label for="yamaguchi"><span>山口</span> </label>

                                                <input type="checkbox" id="tottori" v-model="checked">
                                                <label for="tottori"><span>鳥取</span> </label><br>

                                                <input type="checkbox" id="shimane" v-model="checked">
                                                <label for="shimane"><span>島根</span></label>

                                                <input type="checkbox" id="aichi" v-model="checked">
                                                <label for="aichi"><span>愛知</span></label><br>

                                                <input type="checkbox" id="shizuoka" v-model="checked">
                                                <label for="shizuoka"><span>静岡</span> </label>

                                                <input type="checkbox" id="gifu" v-model="checked">
                                                <label for="gifu"><span>岐阜</span> </label><br>
                                                
                                                <input type="checkbox" id="triple" v-model="checked">
                                                <label for="triple"><span>三重</span></label>
                                                                                      
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="card" style="background: #fab755">
                                                <div class="card-header">
                                                近畿
                                                </div>
                                                <div class="card-body">

                                                <input type="checkbox" id="osaka" v-model="checked">
                                                <label for="osaka"><span>大阪</span></label>

                                                <input type="checkbox" id="hyogo" v-model="checked">
                                                <label for="hyogo"><span>兵庫</span></label><br>

                                                <input type="checkbox" id="kyoto" v-model="checked">
                                                <label for="kyoto"><span>京都</span> </label>

                                                <input type="checkbox" id="nara" v-model="checked">
                                                <label for="nara"><span>奈良</span></label><br>

                                                <input type="checkbox" id="shiga" v-model="checked">
                                                <label for="shiga"><span>滋賀</span></label><br>

                                                <input type="checkbox" id="wakayama" v-model="checked">
                                                <label for="wakayama"><span>和歌山</span></label>
                                                                                 
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="card" style="background: #ec9a9c">
                                                <div class="card-header">
                                                甲信越・北陸
                                                </div>
                                                <div class="card-body">
                                                
                                                <input type="checkbox" id="ishikawa" v-model="checked">
                                                <label for="ishikawa"><span>石川</span></label>

                                                <input type="checkbox" id="niigata" v-model="checked">
                                                <label for="niigata"><span>新潟</span></label><br>

                                                <input type="checkbox" id="fukui" v-model="checked">
                                                <label for="fukui"><span>福井</span></label>

                                                <input type="checkbox" id="toyama" v-model="checked">
                                                <label for="toyama"><span>富山</span></label><br>

                                                <input type="checkbox" id="nagano" v-model="checked">
                                                <label for="nagano"><span>長野</span> </label>

                                                <input type="checkbox" id="yamanashi" v-model="checked">
                                                <label for="yamanashi"><span>山梨</span></label><br>

                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="card" style="background: #9ac1d6;">
                                                <div class="card-header">
                                                北海道・東北
                                                </div>
                                                <div class="card-body" style="padding: 10px;">                                                 
                                                <span>宮城</span> 
                                                <span>北海道</span><br>
                                                <span>青森</span> 
                                                <span>岩手</span> <br>
                                                <span>山形</span> 
                                                <span>福島</span>                                                                                         
                                                <span>秋田</span>                                                               
                                                </div>
                                        </div>
                                </div>
                        </div> 

                        <div class="row">
                                <div class="col-md-3">
                                        <div class="card" style="background:#f26d6d;">
                                                <div class="card-header">
                                                九州・沖縄
                                                </div>
                                                <div class="card-body">
                                                <span>福岡</span> 
                                                <span>熊本</span><br>
                                                <span>長崎</span> 
                                                <span>鹿児島</span> <br>
                                                <span>宮崎</span> 
                                                <span>大分</span> <br>
                                                <span>佐賀</span> 
                                                <span>沖縄</span>                                                
                                                </div>
                                        </div>
                                </div>
                                
                                <div class="col-md-3">
                                        <div class="card" style="background: #a2ce4b">
                                                <div class="card-header">
                                                関東
                                                </div>
                                                <div class="card-body">
                                                <span>東京</span> 
                                                <span>神奈川</span> <br>
                                                <span>千葉</span> 
                                                <span>埼玉</span> <br>
                                                <span>群馬</span>  
                                                <span>茨城</span>  <br>
                                                <span>栃木</span>  
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="card" style="background: #9cd9e0;">                               
                                                <div class="card-header">
                                                四国
                                                </div>
                                                <div class="card-body">                                        
                                                <span>愛媛</span> 
                                                <span>香川</span> <br> 
                                                <span>高知 </span>  
                                                <span>徳島</span>    
                                                </div>
                                        </div>
                                </div>
                                <!-- <div class="col-md-3">
                                        <div class="card" style="background: #849fd2">
                                                <div class="card-header">
                                                東海
                                                </div>
                                                <div class="card-body">                                        
                                                <span>愛知</span> 
                                                <span>静岡</span> <br>
                                                <span>岐阜</span> 
                                                <span>三重</span>    
                                                </div>
                                        </div>
                                </div> -->
                        </div>          
                </div>
                <div class="col-md-5">
                        <img src="/images/map.png" alt="" style="width:100%" class="img-responsive">
                </div>
        </div>
</div>
</template>

