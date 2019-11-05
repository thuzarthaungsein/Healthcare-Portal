<template>

    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
         <div class="col-md-12 scrolldiv">
            <div class="container-fuid">
                <div class="header">
                    パスワードを再設定した事業者一覧
                </div>
            </div>
        <div class="col-md-12 pad-free scrolldiv">
            <div class="container-fuid">
                <table class="table table-hover custom-table">
                    <!-- <div v-if="!this.getReset.length" style="padding-top:30px; height:700px; text-align:center " >

                        No Record Data

                    </div> -->
                    <thead style="background-color:rgb(183, 218, 210);">
                        <tr>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>再設定した日付</th>
                            <th></th>
                        </tr>
                   </thead>
                    <tbody>

                        <tr v-for="getUser in getReset" :key="getUser.id">
                            <th>{{getUser.name}}</th>
                            <th>{{getUser.email}}</th>
                            <th>{{getUser.password}}</th>
                            <th class="text-right">
                                <!-- <button class="btn btn-sm btn-primary all-btn" v-if="getUser.status == 1">Approved</button> -->
                                <button class="btn pending-borderbtn"  @click="approve(getUser.id)">Pedding</button>
                            </th>
                        </tr>
                   </tbody>



                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                getReset: []
            }
        },
        created() {
            this.axios
                .get('/api/getReset')
                .then(response => {
                    this.getReset = response.data;
                    //console.log(response.data);
                });
        },
        methods: {
            approve(id){
                this.axios.get(`/api/approve/${id}`)
                .then(response=>{
                    ajax.reload();
                })
            }
        }
    }
</script>
