<template>
<div class="col-md-12">
    <h4 class="h_4 header">求人応募フォーム</h4>
    <div class="col-md-7 offset-md-3">
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
            <textarea class="form-control" rows="8" cols="30" style="width: 100%;padding:5px;" placeholder="コンテンツ"></textarea>
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
            <!--<label for="message">Message</label>-->
            <textarea class="form-control" name="message" id="message" rows="8" style="width: 100%;padding:5px;" ></textarea>
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
                <a href="home" class="btn secondary-bg-color white all-btn">募集</a>
                <!-- <button type="submit" class="btn btn-primary">募集</button> -->
        </div>
    </form>
    </div>
</div>
</template>
