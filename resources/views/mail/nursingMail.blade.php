<!-- <div>    
    お名前 : {{$getComment->name}}  <br>
    ふりがな : {{$getComment->furigana}}  <br>
    郵便番号 : {{$getComment->postal}}  <br>
    都道府県: {{$getComment->division}}  <br>
    市区町村 、番地（建物名） : {{$getComment->city}}  <br>
    電話番号  : {{$getComment->phone}}  <br>
    メールアドレス : {{$getComment->mail}}  <br> 
    プレゼントのご希望 : {{$getComment->present}}  <br> 
    入居対象者様とのご関係 : {{$getComment->relation}}  <br> 
    お名前 : {{$getComment->ttname}}  <br> 
    性別 : {{$getComment->sex}}  <br> 
    年齢 : {{$getComment->years}}  <br> 
    介護度 : {{$getComment->nursing}}  <br> 
    認知症 : {{$getComment->fect}}  <br>
    入居希望時期 : {{$getComment->desire}}  <br> 
    ご要望や、お困りごと、その他お問い合わせ : {{$getComment->hope}}  <br> 
    @if(isset($getComment->arr_reserve[$getComment->fav_id]))
      @if($getComment->arr_reserve[$getComment->fav_id] == true)
          見学予約 : はい <br> 
      @else 
          見学予約 : いいえ <br> 
      @endif
    @else
        見学予約 : いいえ <br> 
    @endif
    @if(isset($getComment->arr_document[$getComment->fav_id]))
      @if($getComment->arr_document[$getComment->fav_id] == true)
          資料請求 : はい <br> 
      @else 
          資料請求 : いいえ <br> 
      @endif
    @else
        資料請求 : いいえ <br> 
    @endif
    </div> -->

<pre>
    [施設名」([施設No])様

    [Healthcare Portal]より資料請求がございました。


    【資料請求された方について】
    お名前： {{$getComment->name}}
    ふりがな：{{$getComment->furigana}}
    生年月日：
    性別：{{$getComment->sex}} 
    郵便番号：{{$getComment->postal}}
    都道府県：{{$getComment->division}}
    市区町村、番地（建物名)：{{$getComment->city}}
    電話番号： {{$getComment->phone}}
    メールアドレス： {{$getComment->mail}}

    【入居対象者様について】
    入居対象者様とのご関係： {{$getComment->relation}}
    お名前：{{$getComment->ttname}}
    性別：{{$getComment->sex}} 
    年齢：{{$getComment->years}}
    介護度：{{$getComment->nursing}} 
    認知症：{{$getComment->fect}}
    ご要望や、お困りごと、その他お問い合わせ：{{$getComment->hope}} 


    --------------
    [Healthcare Portal]

    〒163-0713
    東京都新宿区西新宿2-7-1小田急第一生命ビル13階 
    TEL：03-6911-???? FAX：03-6911-????
</pre>

    
