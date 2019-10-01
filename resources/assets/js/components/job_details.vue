<template>
    
        <div class="row justify-content-md-center">
            <div class="col-md container cont-pad">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h4 class="h_4 header">{{job_details.title}}</h4>
                        <!-- <img src="/images/img1.jpg" class="img-responsive" style="width:150px;"> -->
                        <div class="maintable_wrapper">
                            <!-- <h4 class="h_4">お仕事  No.04058  平日のみ月10日程度の仕事！富裕層向け通販会社での電話受注スタッフ</h4> -->
                        <div class="table_wrapper" style="clear:both;">
                        <table class="table" style="margin:0 auto;border-collapse:separate;">                            
                            <tbody>       
                                <tr>
                                <th class="ds_detail_1" scope="row">仕事内容</th>
                                <td class="ds_detail_2">{{job_details.description}}</td>                                
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">経験・スキル</th>
                                <td class="ds_detail_2">{{job_details.skills}}</td>                                
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">勤務地</th>
                                <td class="ds_detail_2">{{job_details.location}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">最寄り駅</th>
                                <td class="ds_detail_2">{{job_details.nearest_station}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">雇用形態</th>
                                <td class="ds_detail_2">{{job_details.employment_status}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">給与</th>
                                <td class="ds_detail_2">{{job_details.salary}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">諸手当</th>
                                <td class="ds_detail_2">{{job_details.allowances}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">各種保険</th>
                                <td class="ds_detail_2">{{job_details.insurance}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th class="ds_detail_1" scope="row">就業時間</th>
                                <td class="ds_detail_2">{{job_details.working_hours}}</td>                               
                                </tr>
                                <tr><td colspan="2" class="ds_cellline"></td></tr>
                                <tr>
                                <th  class="ds_detail_1" scope="row">休日休暇</th>
                                <td class="ds_detail_2">{{job_details.holidays}}</td>                               
                                </tr>                                                               
                            </tbody>
                        </table>                        
                        </div>
                        <h4 style="padding:3px;"></h4>    
                        </div>                                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <button type="button" class="btn btn-warning btn-width white">戻る</button> -->
                        <router-link to="/jobapply" class="btn secondary-bg-color white all-btn">この案件に応募</router-link>
                    </div>
                </div>
                <div class="row">
                    Job Number : {{job_details.id}}
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
                 .get(`/api/job_details/${this.$route.params.id}`)
                 .then(response=>{
                     this.job_details = response.data;
                 });
        }

    }
</script>
