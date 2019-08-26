<template>
<div class="search-map">
        <h4>Profile</h4>
        <form @submit.prevent="add" class="col-md-12">
                <div class="form-group">
                        <label>Name<span class="error">*</span></label>
                        <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                        <label>Email<span class="error">*</span></label>
                        <input type="text" class="form-control"  placeholder="Email">
                </div>                
                <div class="form-group">
                        <label>Phone<span class="error">*</span></label>
                        <input type="text" class="form-control"  placeholder="Phone">
                </div>
                <div class="form-group">
                        <label>Address<span class="error">*</span></label>
                        <textarea name="address" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <label>Location Access<span class="error">*</span></label>
                        <textarea name="address" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <label>Type<span class="error">*</span></label>
                        <label for="hospital">
                                <input type="radio" name="type" id="hospital"> Hospital
                        </label>
                        <label for="nursing">
                                <input type="radio" name="type" id="nursing"> Nursing Home
                        </label>
                </div>


               
                <div class="row">
                        <br>
                        <button class="btn news-post-btn all-btn">Create</button>
                        <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                </div>
        </form>
</div>
</template>

