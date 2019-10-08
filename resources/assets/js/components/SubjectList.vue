<template>
 <div class="row">
     <div class="col-md-12">
         <div class="row m-b-10" v-if="this.subjects.length !== 0">
                <div class="col-md-12">
                    <router-link to="/subject" class="float-right main-bg-color create-btn all-btn">
                        <i class="fas fa-plus-circle"></i> Create New Subject
                    </router-link>
                </div>
         </div>
                <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
                    <div class="col-md-12 scrolldiv">
                        <div v-if="subjects == 0" class="card card-default card-wrap">
                            <p class="record-ico">
                                <i class="fa fa-exclamation"></i>
                            </p>
                            <p>OOPS!!</p>
                            <p class="record-txt01">表示するデータありません</p>
                            <p>表示するデータありません‼新しいデータを作成してください。</p>
                                <a href="/subject" class="main-bg-color create-btn all-btn">
                                <i class="fas fa-plus-circle"></i> 新しく作る
                            </a>
                    </div>
                     <div v-else class="container-fuid">
                          <h4 class="main-color m-b-10">Medical Subject Search</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="検索" id="search-item" />
                        </div>
                    </div>
                    <hr/>
                        <h5 class="header">Subject List</h5>
                    <div class="card card-default m-b-20"  v-for="subject in subjects" :key="subject.id">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">{{subject.name}}</div>
                        <div class="col-md-3 text-right">
                            <small>
                            <router-link
                                :to="{name:'subject', params:{id : subject.id}}"
                                class="btn edit-borderbtn"
                            >編集</router-link>
                            </small> &nbsp;
                            <small>
                            <a
                                class="btn text-danger delete-borderbtn"
                                @click="deleteSubject(subject.id)"
                            >削除</a>
                            </small>
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
                subjects: []
            }
        },
        created() {
            this.axios
                .get('/api/subjects/subject')
                .then(response => {
                    this.subjects = response.data;
                });
        },
         methods: {
            deleteSubject(id) {
                this.$swal({
                title: "確認",
                text: "削除よろしいでしょうか",
                type: "warning",
                width: 350,
                height: 200,
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#b1abab",
                cancelButtonTextColor: "#000",
                confirmButtonText: "削除",
                cancelButtonText: "キャンセル",
                confirmButtonClass: "all-btn",
                cancelButtonClass: "all-btn"
            }).then(response => {
            this.axios.delete(`/api/subjects/delete/${id}`)
                   .then(response => {
                       let i = this.subjects.map(item => item.id).indexOf(id); // find index of your object
                        this.subjects.splice(i, 1)
                         this.$swal({
                title: "削除された",
                text: "ファイルが削除されました。",
                type: "success",
                width: 350,
                height: 200,
                confirmButtonText: "はい",
                confirmButtonColor: "#dc3545"
                    });
                }).catch(() => {
                this.$swal("Failed", "wrong");
            });
        });


                // if(confirm("Are you sure you want to delete?"))
                // {
                //      this.axios
                //     .delete(`/api/subjects/delete/${id}`)
                //     .then(response => {
                //         // alert('Delete Successfully!');
                //         let i = this.subjects.map(item => item.id).indexOf(id); // find index of your object
                //         this.subjects.splice(i, 1)
                //     });
                // }

            }
        }
}
</script>
