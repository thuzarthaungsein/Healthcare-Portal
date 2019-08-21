<template>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md container cont-pad">
                <div class="row m-b-20">
                    <div class="col-md-12 scroll2">
                        <h4 class="h_4">	
                                        【京都】ヘルスケア製品の評価＊オムロングループ＊残業少なめ</h4>
                        <img src="/images/img1.jpg" class="img-responsive img_6" height="" width="15%">
                        <div v-for="jobDetail in job_details" :key="jobDetail.id" class="col-md-12">
                             <div class="topic b"> 
                                 <h4 class="item text-center">{{jobDetail.header}}</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{jobDetail.body}}</p>
                                <!-- </dd> -->
                             </div> 
                            <!-- <dl class="topic">
                                <h5 class="item text-center">時給</h5>
                                <dd class="data">■モデル月収
                                    <br>1,500円×7.75時間×20日=232,500円
                                    <br>※ご経験により応相談
                                    <br>※残業が発生した場合は別途全額支給
                                </dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">勤務地</h5>
                                <dd class="data">向日市／最寄り駅：桂川駅(京都府)、洛西口駅 京都府向日市
                                </dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">対象となる方</h5>
                                <dd class="data">≪必要な経験・スキル≫
                                    <br>以下のいずれかに該当する方
                                    <br>・ハード分野（電気または機械）の評価経験や知識をお持ちの方
                                    <br>・試験機の校正または使用経験や知識をお持ちの方
                                    <br>対応手順のレクチャーなど周囲のサポートもありますので、 ブランクがある方や経験が浅い方もまずはご相談くださいませ!
                                </dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">勤務時間</h5>
                                <dd class="data">9:00～17:30　（休憩45分）
                                    <br>※残業時間：10時間程度
                                    <br>残業なし等の要望があればお気軽にご相談ください。
                                </dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">休日休暇</h5>
                                <dd class="data">土・日・祝（就業先カレンダーに基づきます）</dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">勤務期間</h5>
                                <dd class="data">即日～　※開始時期応相談／３カ月以上（長期）</dd>
                            </dl>
                            <dl class="topic">
                                <h5 class="item text-center">勤務先について</h5>
                                <dd class="data">きれいな建屋・全館禁煙・食堂あり・駅近など、人気の職場です♪
                                    <br>業種： メーカー関連</dd>
                            </dl> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <button type="button" class="btn btn-warning btn-width white">戻る</button> -->
                        <a href="job_apply_form.html" class="btn main-bg-color white all-btn">この案件に応募</a>
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
                job_details:[]
            }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/job_details')
                 .then(response=>{
                     this.job_details = response.data;
                 })
        }

    }
</script>
