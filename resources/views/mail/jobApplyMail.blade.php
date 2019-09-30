<div>
    
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


</div>