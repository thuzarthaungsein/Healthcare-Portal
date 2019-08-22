<template>
<!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">ニュース投稿を作成</h4>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>題名:<span class="error">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="題名を入力してください。">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>主な情報:<span class="error">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="ニュースの主な情報を入力してください。">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <button class="btn main-bg-color white dropdown-toggle all-btn" type="button" data-toggle="dropdown">
                                                    種類
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Doctor</a></li>
                                                <li><a href="#">Nurse</a></li>
                                                <li><a href="#">Pharmacist</a></li>
                                                <li><a href="#">Administrative Staff</a></li>
                                                <li><a href="#">Therapists</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>内容:<span class="error">*</span></label>
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2 imgUp">
                                            <br>
                                            <label class="menu-pos">メディア:<span class="error">*</span></label>
                                            <br>
                                            <label class="btn bg-color all-btn">
                                                    写真/画像を投稿する
                                                 <input type="file" class="uploadFile img" value="Upload Photo">
                                            </label>
                                            <div class="imagePreview"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <a href="news_list.html" class="btn news-post-btn all-btn">ニュースを投稿する</a>
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

