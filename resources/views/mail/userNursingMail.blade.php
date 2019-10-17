<pre>
{{$getComment->name}}様

    [Healthcare Portal]より資料請求が完了しました。


    【資料請求された方について】
    お名前： {{$getComment->name}}
    ふりがな：{{$getComment->furigana}}
    生年月日：{{$getComment->bdate}}
    性別：{{$getComment->sex1}} 
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