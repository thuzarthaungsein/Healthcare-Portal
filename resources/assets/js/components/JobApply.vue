<template>
<div class="col-md-12">
    <h4 class="h_4 header">求人応募フォーム</h4>
    <div class="col-md-7 offset-md-3">
        <form>
        <div class="form-group">
            <input type="text" class="form-control box" id="name" placeholder="name" name="name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control box" id="birth" placeholder="birthday" name="birthday">
        </div>
        <div class="form-group">
            <input type="text" id="address" name="address" class="form-control" placeholder="address">
        </div>
        <div class="form-group">
            <input type="tel" class="form-control box" id="phone" placeholder="phone" name="phone">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="8" cols="30" style="width: 100%;padding:5px;" placeholder="コンテンツ"></textarea>
        </div>
        <div class="form-group">
            <input type="time" class="form-control box" id="time" placeholder="working_time" name="time">
        </div>
        <div class="form-group">
            <input type="checkbox" name="skill1">Communication<br/>
            <input type="checkbox" name="skill2">Ethics<br/>
            <input type="checkbox" name="skill3">Critical Thinking<br/>
            <input type="checkbox" name="skill4">Attention To Detail<br/>
            <input type="checkbox" name="skill4">Commitment To Development<br/>
            <input type="checkbox" name="skill4">Responsibility
         </div>
        <div class="form-group">
            <!--<label for="message">Message</label>-->
            <textarea class="form-control" name="message" id="message" rows="8" style="width: 100%;padding:5px;" ></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">No file chosen</label>
            </div>
        </div>

        <div class="text-center">
                <router-link to="/" class="btn secondary-bg-color white all-btn">募集</router-link>
                <!-- <button type="submit" class="btn btn-primary">募集</button> -->
        </div>
    </form>
    </div>
</div>
</template>
<script>
export default {

}
</script>
