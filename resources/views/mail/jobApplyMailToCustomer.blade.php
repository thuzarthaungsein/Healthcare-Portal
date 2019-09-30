<div>
<<<<<<< HEAD:resources/views/mail/jobApplyMailToCustomer.blade.php

Dear Customer,
    job_title : {{$getComment->job_title}}  <br>
    first_name : {{$getComment->first_name}}  <br>
    last_name : {{$getComment->last_name}} <br>
    birthday : {{$getComment->birthday}}  <br>
    gender : {{$getComment->gender}}  <br>
    postal : {{$getComment->postal}}  <br>
    street_address : {{$getComment->street_address}}  <br>
    home_address : {{$getComment->home_address}}  <br>
    phone : {{$getComment->phone}}  <br>
    email : {{$getComment->email}}  <br>
    remark : {{$getComment->remark}}  <br>
=======
    
    お名前 : {{$getComment->first_name}}  <br>
    お名前フリガナ : {{$getComment->last_name}}
    生年月日 : {{$getComment->birthday}}  <br>
    性別  : {{$getComment->gender}}  <br>
    郵便番号 : {{$getComment->postal}}  <br>
    住所 : {{$getComment->str_address}}  <br>
    番地以下 : {{$getComment->home_address}}  <br>
    電話番号 : {{$getComment->phone}}  <br>
    メールアドレス : {{$getComment->email}}  <br>
    資格 : {{$getComment->qualification}}  <br>
    実行可能日 : {{$getComment->workable_day}}  <br>
    リマーク  : {{$getComment->remark}}  <br>
>>>>>>> 3b41bbf1e2ccd40d03395576a1e38dcff6c62412:resources/views/mail/jobApplyMail.blade.php


</div>