
    <pre>
        [ {{$getComment->cus_name}} 」([施設No])様

        [サイト名]より求人への応募がありました。


        【 {{$getComment->job_title}} 】
        xxxxxx
        [{{$getComment->jobnum}}]

        【ご応募された方の情報】
        お名前：{{$getComment->first_name}}
        ふりがな：{{$getComment->last_name}}
        生年月日：{{$getComment->birthday}}
        性別：{{$getComment->gender}}
        郵便番号：{{$getComment->postal}}
        都道府県：{{$getComment->city_name}}
        市区町村、番地（建物名)：{{$getComment->home_address}}
        電話番号：{{$getComment->phone}}
        メールアドレス：{{$getComment->email}}
        ご希望等：


        --------------
        [サイト名]

        〒163-0713
        東京都新宿区西新宿2-7-1小田急第一生命ビル13階 
        TEL：03-6911-???? FAX：03-6911-????

    </pre>

