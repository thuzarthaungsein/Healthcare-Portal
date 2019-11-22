<template>
    <div class="row">
        <div class="col-12">
            <!--card-->
            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
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
                    <div v-else class="container-fuid">
                        <h4 class="main-color m-b-10">コメント 検索</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchcomment()" />
                            </div>

                        </div>
                        <hr />
                        <h5 class="header">コメント一覧</h5>
                        <div class="card card-default m-b-20" v-for="comment in displayItems" :key="comment.id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- <strong>タイトル :</strong> {{comment.title}}  <br/>
                                        <strong>顧客名 :</strong> {{comment.name}}  <br/>
                                        <strong>メールアドレス:</strong>{{comment.email}} -->
                                       <table>
                                           <tr>
                                               <td>タイトル :</td>
                                               <td> {{comment.title}}</td>
                                           </tr>
                                            <tr>
                                               <td>顧客名 :</td>
                                               <td> {{comment.name}} </td>
                                           </tr>
                                             <tr>
                                               <td>メールアドレス: </td>
                                               <td> {{comment.email}} </td>
                                           </tr>
                                       </table>
                                    </div>

                                    <div class="col-md-4 text-right">
                                        <!-- <button class="'btn btn all-btn main-bg-color changeLink'+payment.id" type="button" @click="commentToggle(comment.id)"><span  :id="'icon' + comment.id"  class="fa fa-angle-down"></span></button> -->
                                        <button :class="'btn btn all-btn main-bg-color changeLink'+comment.id" style="min-width: 0px;" @click="commentToggle(comment.id)">
                                            <i :id="'icon' + comment.id" class="fa fa-angle-down"></i> 見る</button>
                                        <button class="btn confirmed" v-if="comment.status != 0" style ="opacity: 0.5;cursor: not-allowed;" >確認</button>
                                        <button class="btn confirm-borderbtn" v-else @click="commentConfirm(comment.id)">確認</button>
                                        <button class="btn text-danger delete-borderbtn" @click="deleteComment(comment.id)">削除</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse card-body" :id="'changeLink' + comment.id">
                                <div class="comment-title" id="nursingView">
                                   
                                    <div class="d-flex">
                                    <p class="profile_subtit">{{comment.title}}</p> <span style="font-size:12px;">(コメント)</span>
                                     <p class="comment-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{comment.created_date | moment("YYYY年MM月DD日") }}投稿 <span class="ml-2"><i class="fa fa-clock" aria-hidden="true"></i> {{comment.created_time}}</span></p>
                                    </div>
                                    <!-- <h5 style="background:linear-gradient(45deg, #ffbe9f, transparent);padding:8px;">{{comment.title}} <span style="font-size:14px;">(コメント)</span></h5> -->                                                                     
                                </div>
                                 <div name="exp[]" class="col-md-12"><p style="color:#736e6e;">{{comment.comment}}</p></div>
                            </div>
                        </div>
                        <div class="offset-md-4 col-md-8 mt-3" v-if="pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <span class="spanclass" @click="first"><i class='fas fa-angle-double-left'></i> 最初</span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="prev"><i class='fas fa-angle-left'></i> 前へ</span>
                                    </li>
                                    <li class="page-item" v-for="(i,index) in displayPageRange" :key="index" :class="{active_page: i-1 === currentPage}">
                                        <span class="spanclass" @click="pageSelect(i)">{{i}}</span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="next">次へ <i class='fas fa-angle-right'></i></span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="last">最後 <i class='fas fa-angle-double-right'></i></span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
                return {
                    comments: [],
                    norecord: 0,
                    currentPage: 0,
                    size: 10,
                    pageRange: 5,
                    items: [],
                    pagination: false,
                }

            },
            created() {
                this.axios
                    .get('/api/comments/comment'+ this.comments )
                    .then(response => {
                        this.comments = response.data;
                        this.norecord = this.comments.length;
                        if(this.norecord > this.size){
                            this.pagination = true;
                        }else{
                            this.pagination = false;
                        }
                    });


            },
            computed: {
            pages() {
                    return Math.ceil(this.comments.length / this.size);
                },
                displayPageRange() {
                    const half = Math.ceil(this.pageRange / 2);
                    const isEven = this.pageRange / 2 == 0;
                    const offset = isEven ? 1 : 2;
                    let start, end;
                    if (this.pages < this.pageRange) {
                        start = 1;
                        end = this.pages;
                    } else if (this.currentPage < half) {
                        start = 1;
                        end = start + this.pageRange - 1;
                    } else if (this.pages - half < this.currentPage) {
                        end = this.pages;
                        start = end - this.pageRange + 1;
                    } else {
                        start = this.currentPage - half + offset;
                        end = this.currentPage + half;
                    }
                    let indexes = [];
                    for (let i = start; i <= end; i++) {
                        indexes.push(i);
                    }
                    return indexes;
                },
                displayItems() {
                    const head = this.currentPage * this.size;
                    return this.comments.slice(head, head + this.size);
                },
                isSelected(page) {
                    return page - 1 == this.currentPage;
                }
            },
            methods: {
                deleteComment(id) {
                        this.$swal({
                            title: "確認",
                            text: "削除よろしいでしょうか。",
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
                                    this.comments = response.data;
                                    this.norecord = this.comments.length;
                                    if(this.norecord > this.size){
                                        this.pagination = true;
                                    }else{
                                        this.pagination = false; 
                                    }
                                    // let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
                                    // this.categories.splice(i, 1);
                                    this.$swal({
                                        title: "削除済",
                                        text: "コメントが削除されました。",
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
                        this.$swal({
                            title: "確認",
                            text: "確認よろしでしょうか。",
                            type: "info",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "確認",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => {
                            this.axios.get(`/api/comments/confirm/${id}`)
                                .then(response => {
                                    this.comments = response.data.comments;
                                    this.$swal({
                                            title: "確認済",
                                            text: "コメントを確認しました。",
                                            type: "success",
                                            width: 350,
                                            height: 200,
                                            confirmButtonText: "はい",
                                            confirmButtonColor: "#6cb2eb"
                                        })
                                        .catch(() => {
                                            this.$swal({
                                                title: "エラーメッセージ",
                                                text: "プロセスを続行します",
                                                type: "error",
                                                width: 350,
                                                height: 200,
                                                confirmButtonText: "はい",
                                                confirmButtonColor: "#dc3545"
                                            });
                                        });
                                    //
                                    // alert('Successfully Confirm!');
                                    //console.log(this.comments);
                                })

                        });
                    },
                    searchcomment() {
                        var search_word = $("#search-item").val();
                        let fd = new FormData();
                        fd.append("search_word", search_word);
                        this.axios.post("/api/comments/search", fd).then(response => {
                            this.comments = response.data;
                            if(this.comments.length > this.size){
                                this.pagination = true;
                            }else{
                                this.pagination = false;
                            }
                            });
                    },
                    commentToggle(id) {
                        var class_by_id = $('#icon' + id).attr('class');
                        if (class_by_id == "fa fa-angle-down") {
                            $('#icon' + id).removeClass("fa fa-angle-down");
                            $('.changeLink' + id).removeClass("fa fa-angle-up");
                            $('#icon' + id).addClass("fa fa-angle-up");
                            $('#changeLink' + id).show('medium');
                        } else {

                            $('#icon' + id).removeClass("fa fa-angle-up");
                            $('.changeLink' + id).removeClass("fa fa-angle-up");
                            $('#icon' + id).addClass("fa fa-angle-down");
                            $('#changeLink' + id).hide('medium');
                        }

                    },
                first() {
                    this.currentPage = 0;
                },
                last() {
                    this.currentPage = this.pages - 1;
                },
                prev() {
                    if (0 < this.currentPage) {
                        this.currentPage--;
                    }
                },
                next() {
                    if (this.currentPage < this.pages - 1) {
                        this.currentPage++;
                    }
                },
                pageSelect(index) {
                    this.currentPage = index - 1;
                    window.scrollTo(0,0);
                },
            }
    }
</script>
<style scoped>
    .comment-title {
    background-size: 29px;
    /* background :#b6b4b4; */
    color: #3fc8d6;
    display: block;
    font-size: 16px;
    font-weight: 700;
    padding-bottom: 10px;
}
.comment-date {
    margin-left: auto;
    font-size: 12px;
    color: #777;

}
</style>
