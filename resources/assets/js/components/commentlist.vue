<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-10" v-if="norecord !== 0">
        <div class="col-md-12">
          <router-link to="/comment" class="float-right main-bg-color create-btn all-btn">
            <i class="fas fa-plus-circle"></i> 新しいコメントを作成
          </router-link>
        </div>
      </div>
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
            <h4 class="main-color m-b-10">コメント一覧 検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="検索"
                  id="search-item"
                  @keyup="searchcomment()"
                />
              </div>
            
            </div>
            <hr />
            <h5 class="header">コメント一覧</h5>
            <div class="card card-default m-b-20" v-for="comment in comments" :key="comment.id">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-8 m-t-8">
                                        <strong>タイトル :</strong> {{comment.title}}
                                    </div>
                  <div class="col-md-4 text-right">
                    <!-- <button class="'btn btn all-btn main-bg-color changeLink'+payment.id" type="button" @click="commentToggle(comment.id)"><span  :id="'icon' + comment.id"  class="fa fa-angle-down"></span></button> -->
                    <button :class="'btn btn all-btn main-bg-color changeLink'+comment.id" style="min-width: 0px;" @click="commentToggle(comment.id)" >
                                                            <i :id="'icon' + comment.id" class="fa fa-angle-down"></i> 見る</button>
                    <button class="btn-secondary all-btn confirmed" v-if="comment.status != 0" style="padding:5px;border-radius:2px;">確認しました。</button>
                    <button class="btn btn-info all-btn" v-else @click="commentConfirm(comment.id)">確認してください。</button>
                    <button class="btn btn-danger all-btn" @click="deleteComment(comment.id)">削除</button>
                  </div>
                </div>
              </div>
              <div class="collapse card-body" :id="'changeLink' + comment.id">
    <div class="col-md-12">
        <h5 style="background:linear-gradient(45deg, #ffbe9f, transparent);padding:8px;">{{comment.title}}</h5><br>
        <table class="table">
            <tr>
                <th>タイトル</th>
                <th>
                    <input type="text" name="exp[]" class="form-control expense-moving white-bg-color" v-model="comment.title">
                </th>
            </tr>
            <tr>
                <th>コメント</th>
                <th>
                    <input type="text" name="exp[]" class="form-control living-room-type white-bg-color" v-model="comment.comment">
                </th>
            </tr>
            <tr>
                <th>メール</th>
                <th>
                    <input type="text" name="exp[]" class="form-control monthly-fees white-bg-color" v-model="comment.email">
                </th>
            </tr>
            <tr>
                <th>名前</th>
                <th>
                    <input type="text" name="exp[]" class="form-control area white-bg-color" v-model="comment.name">
                </th>
            </tr>
        </table>
    </div>
</div>
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
                            this.$swal({
                            title: "確認",
                            text: "確認をよろしでしょうか。",
                            type:"info",
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
                                        title: "確認しました。",
                                        text: "ファイルを確認しました。",
                                        type: "success",
                                        width: 350,
                                        height: 200,
                                        confirmButtonText: "はい",
                                        confirmButtonColor: "#6cb2eb"
                                    })
                                    .catch(() => {
                                    this.$swal({
                                        title: "エラーメッセージ",
                                        text: "プロセスは続行します",
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
                        });
                    },
                     commentToggle(id)
                {
                     var class_by_id = $('#icon'+id).attr('class');
                      if(class_by_id == "fa fa-angle-down")
                      {     
                                $('#icon'+id).removeClass("fa fa-angle-down");
                                $('.changeLink'+id).removeClass("fa fa-angle-up"); 
                                $('#icon'+id).addClass("fa fa-angle-up");
                                $('#changeLink'+id).show('medium');  
                      }
                      else {
                         
                                $('#icon'+id).removeClass("fa fa-angle-up");
                                $('.changeLink'+id).removeClass("fa fa-angle-up");  
                                $('#icon'+id).addClass("fa fa-angle-down");                                
                                $('#changeLink'+id).hide('medium');        
                      }
    
    
                },

            }
    }
</script>