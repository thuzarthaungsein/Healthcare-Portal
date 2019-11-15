<template>
    <div class="row">
        <div class="col-12">
            <div class="row m-b-10" v-if="norecord !== 0">
                <div class="col-md-12">
                    <router-link to="/createcategory" class="float-right main-bg-color create-btn all-btn">
                        <i class="fas fa-plus-circle"></i> 新しいカテゴリーを作成
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
                        <a href="/createcategory" class="main-bg-color create-btn all-btn">
                            <i class="fas fa-plus-circle"></i> 新しいデータ作成
                        </a>
                    </div>
                    <div v-else class="container-fuid">
                        <h4 class="main-color m-b-10">カテゴリー検索</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="カテゴリー検索" id="search-item" @keyup="searchCategory()" />
                            </div>
                            <!-- <div class="col-md-2 text-right">
                    <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
              </div>-->
                        </div>
                        <hr />
                        <h5 class="header">カテゴリー一覧</h5>
                        <div class="card card-default m-b-20" v-for="category in displayItems" :key="category.id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 m-t-8">{{category.name}}</div>
                                    <div class="col-md-3 text-right">
                                        <small>
                      <router-link
                        :to="{name:'editcategory', params:{id : category.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small> &nbsp;
                                        <small>
                      <a
                        class="btn text-danger delete-borderbtn"
                        @click="deleteCategory(category.id)"
                      >削除</a>
                    </small>
                                    </div>
                                </div>
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
                    categories: [],
                    norecord: 0,
                    currentPage: 0,
                    size: 10,
                    pageRange: 5,
                    items: [],
                    pagination: false,
                };
            },

            created() {
                this.axios.get("/api/category/categories").then(response => {
                    this.categories = response.data;
                    this.norecord = this.categories.length;
                    if(this.norecord > this.size){
                        this.pagination = true;
                    }else{
                        this.pagination = false;
                    }
                });
            },
            computed: {
            pages() {
                    return Math.ceil(this.categories.length / this.size);
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
                    return this.categories.slice(head, head + this.size);
                },
                isSelected(page) {
                    return page - 1 == this.currentPage;
                }
            },
            methods: {
                deleteCategory(id) {
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
                                .delete(`/api/category/delete/${id}`)
                                .then(response => {
                                    this.categories = response.data;
                                    this.norecord = this.categories.length;
                                    if(this.norecord > this.size) {
                                        this.pagination = true;
                                    }else{
                                        this.pagination = false;
                                    }
                                    // let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
                                    // this.categories.splice(i, 1);
                                    this.$swal({
                                        title: "削除済",
                                        text: "カテゴリーを削除されました。",
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

                    searchCategory() {
                        var search_word = $("#search-item").val();
                        let fd = new FormData();
                        fd.append("search_word", search_word);
                        this.axios.post("/api/category/search", fd).then(response => {
                            this.categories = response.data;
                        });
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
                },
            }
    };
</script>