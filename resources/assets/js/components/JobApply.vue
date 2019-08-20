<template>
    <div>
        <section class="main-content">
            <div class="container-fluid main-wrapper">
                <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                                </ol>
                        </nav> -->
                <!--jssor carousel-->
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:160px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                    </div>
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="/images/h5.jpg" />
                        </div>
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                            </svg>
                        </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                        </svg>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-md container ">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="h_4">求人応募フォーム</h4>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control box" id="jobid" placeholder=" ジョブID" name="jobid">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control box" id="email" placeholder="名" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="電子メールアドレス">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control box" id="phone" placeholder="電話番号" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control box" id="address" placeholder="アドレッ" name="address">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="8" cols="30" style="width: 100%;padding:5px;" placeholder="コンテンツ"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control box" id="comp" placeholder="会社名" name="comp">
                                    </div>
                                    <div class="form-group">

                                        <select id="form_need" name="need" class="form-control" data-error="Please specify your need.">
                                            <option value="">必要職業</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Nurse">Nurse</option>
                                            <option value="pharmacists">Pharmacists</option>
                                            <option value="health professionals">Health Professionals</option>
                                            <option value="Other">Other Hospital Staff</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">アップロード</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">ファイルを選ぶ</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="home" class="btn main-bg-color white all-btn">募集</a>
                                        <!-- <button type="submit" class="btn btn-primary">募集</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-auto">
                        <div class="row m-b-10">
                            <div class="col-6">
                                <a href="../pages/news/search_news_result.html" class="btn all-btn secondary-bg-color float-right" style="width:100%">Cus search</a>
                            </div>
                            <div class="col-6">
                                <a href="../pages/news/search_news_result.html" class="btn all-btn main-bg-color float-right" style="width:100%">Job search</a>

                            </div>
                        </div>
                        <div class="card m-b-10 ads-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">一つ目の広告</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/company-profile1.png" alt="" class="img-responsivie" style="width:100%">
                            </div>
                        </div>
                        <div class="card m-b-10 ads-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">二つ目の広告</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width:100%">
                            </div>
                        </div>
                        <div class="card m-b-10 ads-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">三つ目の広告</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/company-profile1.png" alt="" class="img-responsivie" style="width:100%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            $(document).ready(function() {
                jssor_1_slider_init();

            });
        }

    }
</script>

<style scoped>
    /*for jssor*/
    /*jssor slider loading skin spin css*/

    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    /*jssor slider bullet skin 057 css*/

    .jssorb057 .i {
        position: absolute;
        cursor: pointer;
    }

    .jssorb057 .i .b {
        fill: none;
        stroke: #fff;
        stroke-width: 2000;
        stroke-miterlimit: 10;
        stroke-opacity: 0.4;
    }

    .jssorb057 .i:hover .b {
        stroke-opacity: .7;
    }

    .jssorb057 .iav .b {
        stroke-opacity: 1;
    }

    .jssorb057 .i.idn {
        opacity: .3;
    }
    /*jssor slider arrow skin 073 css*/

    .jssora073 {
        display: block;
        position: absolute;
        cursor: pointer;
    }

    .jssora073 .a {
        fill: #ddd;
        fill-opacity: .7;
        stroke: #000;
        stroke-width: 160;
        stroke-miterlimit: 10;
        stroke-opacity: .7;
    }

    .jssora073:hover {
        opacity: .8;
    }

    .jssora073.jssora073dn {
        opacity: .4;
    }

    .jssora073.jssora073ds {
        opacity: .3;
        pointer-events: none;
    }
    /*end for jssor*/
</style>
