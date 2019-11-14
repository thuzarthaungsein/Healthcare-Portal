<template>
    <div class="row">
        <div class="col-12">
            <div class="row m-b-15" v-if="norecord!== 0">
                <div class="col-md-12">
                    <router-link to="/advertisement" class="float-right main-bg-color create-btn all-btn" style="color: blue;">
                        <i class="fas fa-plus-circle"></i> 広告を作成
                    </router-link>
                </div>
            </div>

            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
                <div class="scrolldiv col-12">
                    <div v-if="!norecord" class="card card-default card-wrap">
                        <p class="record-ico">
                            <i class="fa fa-exclamation"></i>
                        </p>
                        <p>OOPS!!</p>
                        <p class="record-txt01">表示するデータありません</p>
                        <p>表示するデータありません‼新しいデータを作成してください。</p>
                        <a href="/advertisement" class="main-bg-color create-btn all-btn">
                            <i class="fas fa-plus-circle"></i> 新しいデータ作成
                        </a>
                    </div>
                    <div v-else class="container-fuid">
                        <h4 class="main-color m-b-10">広告検索</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="広告検索" id="search-item" @keyup="searchAdvertisment()" />
                            </div>
                        </div>
                        <hr />
                        <h5 class="header">広告一覧</h5>
                        <div v-for="ads in displayItems" :key="ads.id" class="card card-default m-b-20">
                            <div class="card-body news-post">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img :src="'/upload/advertisement/'+ ads.photo" class="img-fluid" alt="ads" @error="imgUrlAlt" />
                                    </div>
                                    <div class="row col-md-10">
                                        <div class="col-md-2 max-width16">
                                            <strong>タイトル :</strong>
                                        </div>
                                        <div class="col-md-10">{{ads.title}}</div>
                                        <!-- <div class="col-md-2 max-width16"><strong>描写  :</strong></div><div class="col-md-10">{{ads.description}}</div> -->

                                        <div class="row col-12 mt-2">
                                            <div class="col-4 col-offset-4 pl-3">
                                                <router-link :to="{name: 'editadvertisement', params: { id: ads.id }}" class="btn edit-borderbtn">編集</router-link>
                                                <button class="btn delete-borderbtn" @click="deleteAds(ads.id)">削除</button>
                                                <!-- <button class="btn delete-borderbtn" @click="toggleModal">削除</button>                                 -->
                                            </div>
                                        </div>
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
        </div>
    </div>
</template>
<script>
    export default {
        data() {
                return {
                    advertisements: [],
                    isOpen: false,
                    norecord: 0,
                    currentPage: 0,
                    size: 10,
                    pageRange: 5,
                    items: [],
                    pagination: false
                };
            },
            created() {
                this.axios.get("/api/advertisement/ads").then(response => {
                    this.advertisements = response.data;
                    this.norecord = this.advertisements.length;
                    if(this.norecord > this.size){
                        this.pagination = true;
                    }else{
                        this.pagination = false;
                    }
                });
            },
            computed: {
            pages() {
                    return Math.ceil(this.advertisements.length / this.size);
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
                    return this.advertisements.slice(head, head + this.size);
                },
                isSelected(page) {
                    return page - 1 == this.currentPage;
                }
            },
            methods: {
                // toggleModal() {
                //     this.isOpen = !this.isOpen;
                // },
                deleteAds(id) {
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
                            this.axios.delete(`/api/advertisement/delete/${id}`).then(response => {
                                this.advertisements = response.data;
                                this.norecord = this.advertisements.length;
                                if(this.norecord > this.size){
                                    this.pagination = true;
                                }else{
                                    this.pagination = false;
                                }
                                //alert("Delete Successfully!");
                                //   let a = this.advertisements.map(item => item.id).indexOf(id);
                                //   this.advertisements.splice(a, 1);
                                this.$swal({
                                    title: "削除済",
                                    text: "広告を削除されました。",
                                    type: "success",
                                    width: 350,
                                    height: 200,
                                    confirmButtonText: "はい",
                                    confirmButtonColor: "#dc3545"
                                });
                            });
                        })

                    },

                    searchAdvertisment() {
                        var search_word = $("#search-item").val();
                        let fd = new FormData();
                        fd.append("search_word", search_word);
                        this.axios.post("/api/advertisement/search", fd).then(response => {
                            this.advertisements = response.data;
                        });
                    },
                    imgUrlAlt(event) {
                        event.target.src = "images/noimage.jpg"
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
    }
</script>