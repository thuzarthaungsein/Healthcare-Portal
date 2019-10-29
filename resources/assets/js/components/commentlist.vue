<template>
    <div class="row">
        <div class="col-12">
            <div class="row m-b-15">
                <div class="col-md-12">
                    <router-link class="float-right main-bg-color create-btn all-btn" style="color: blue;" to="/comment"><i class="fas fa-plus-circle"></i>コメント作成</router-link>
                </div>
            </div>
            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
                <h4 class="main-color">コメント一覧検索</h4>
                <br>
                <div class="row">
                    <div class="col-md-12">

                        <input type="text" class="form-control" placeholder="コメント検索" id="search-item" @keyup="searchcomment()" />
                    </div>
                </div>
                <hr>
                <h5 class="header">コメント一覧</h5>
                <div class="col-md-12 scrolldiv">

                    <div v-if="norecord === 0" class="card card-default card-wrap">
                        <p class="record-ico">
                            <i class="fa fa-exclamation"></i>
                        </p>
                        <p>OOPS!!</p>
                        <p class="record-txt01">表示するデータありません</p>
                        <p>表示するデータありません‼新しいデータを作成してください。</p>
                        <a href="/comment" class="main-bg-color create-btn all-btn">
                            <i class="fas fa-plus-circle"></i> 新しいデータ作成
                        </a>
                    </div>
                    <!-- <div v-if="!this.comments.length" class="container-fuid" style="padding-top:30px; height:700px; text-align:center ">

                        No Record Data

                    </div> -->
                    <div v-else class="container-fuid" v-for="comment in comments" :key="comment.id">
                        <div class="card card-default m-b-20">
                            <div class="card-body">
                                <div class=" row">
                                    <div class="col-md-8 m-t-8">
                                        <strong>タイトル :</strong> {{comment.title}}
                                    </div>
                                    <div class="col-md-4 ">
                                        <button class="btn edit-borderbtn" type="button" data-toggle="collapse" :data-target="'#showDetails' + comment.id">見る</button>
                                        <!-- <button class="btn edit-borderbtn" @click="show(comment.id)">View</button> -->
                                        <button class="btn confirm-borderbtn confirmed" v-if="comment.status != 0">確認</button>
                                        <button class="btn confirm-borderbtn" v-else @click="commentConfirm(comment.id)">確認</button>
                                        <button class="btn delete-borderbtn" @click="deleteComment(comment.id)">削除</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse card-body" :id="'showDetails' + comment.id">
                            <!-- <div class="col-md-10 m-t-8 "><strong>Title :</strong>{{comment.title}}</div>
                                <div class="col-md-12  "><strong>Comment :</strong>{{comment.comment}}</div>
                                <div class="col-md-10 m-t-8 "><strong>Email :</strong>{{comment.email}}</div>
                                <div class="col-md-10 m-t-8"><strong>Name :</strong>{{comment.name}}</div> -->
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td style="width:30%">タイトル : </td>
                                    <td style="width:70%">
                                        <div class="col-md-10 m-t-8 ">{{comment.title}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%">コメント :</td>
                                    <td style="width:70%">
                                        <div class="col-md-12  ">{{comment.comment}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%">メール :</td>
                                    <td style="width:70%">
                                        <div class="col-md-10 m-t-8 ">{{comment.email}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%">名前 :</td>
                                    <td style="width:70%">
                                        <div class="col-md-10 m-t-8 ">{{comment.name}}</div>
                                    </td>
                                </tr>
                            </table>

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
                    comments: [],
                    norecord: 0
                }
            },
            created() {
                this.axios
                    .get('/api/comments/comment')
                    .then(response => {
                        this.comments = response.data;
                        this.norecord = this.comments.length;

                    });
            },

            methods: {
                deleteComment(id) {
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
                            this.axios
                                .delete(`/api/comments/delete/${id}`)
                                .then(response => {
                                    this.comments= response.data;  
                                    this.norecord= this.comments.length;

                                    // let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
                                    // this.categories.splice(i, 1);
                                    this.$swal({
                                        title: "削除された",
                                        text: "ファイルが削除されました。",
                                        type: "success",
                                        width: 350,
                                        height: 200,
                                        confirmButtonText: "はい",
                                        confirmButtonColor: "#dc3545"
                                    });

                                })
                                .catch(() => {
                                    this.$swal("Failed", "wrong");
                                });
                        });

                    },
                    commentConfirm(id) {
                        if (confirm("Are you sure you want to confirm?")) {
                            this.axios.get(`/api/comments/comfirm/${id}`)
                                .then(response => {
                                    this.comments = response.data.comments;
                                    //
                                    alert('Successfully Confirm!');
                                    //console.log(this.comments);
                                })
                        }

                    },
                    searchcomment() {
                        var search_word = $("#search-item").val();
                        let fd = new FormData();
                        fd.append("search_word", search_word);
                        this.axios.post("/api/comments/search", fd).then(response => {
                            this.comments = response.data;
                        });
                    }

            }
    }
</script>