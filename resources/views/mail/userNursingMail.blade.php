


<div style="width:80%;margin-left:auto;margin-right:auto;background-color: #f5f5f5;text-align: center;margin-top: 45px;padding: 40px;">
	       

                <img src="{{asset('/images/trust_growth.png')}}" alt="LOGO" width="400"> 
                <div style="padding: 20px;background-color: #fff;margin-top: 40px;">          
	            <h4 style="text-align: left;font-weight: bold;">{{$getComment->name}}様</h4>
            
                <h3 style="text-align: left;">[Healthcare Portal]より資料請求が完了しました。</h3>
    <div style="width:100%;background-color: #f5f5f5;text-align: center;">

    <p style="text-align:left;font-size:14px;padding-top:10px;margin-left:15px;">【資料請求された方について】</p>
    <table style="border: 1px solid black;">
        <tbody>
            <tr>
                <th scope="row" width="50" >お名前：</th>
                <td>{{$getComment->name}}</td>
            </tr>
            <tr>
                <th scope="row" width="50">ふりがな：</th>
                <td>{{$getComment->furigana}}</td>
            </tr>
            <tr>
                <th scope="row" width="50">生年月日：</th>
                <td>{{$getComment->bdate}}</td>
            </tr>
            <tr>
                <th scope="row" width="50">性別：</th>
                <td>{{$getComment->sex1}}</td>
            </tr>
            <tr>
                <th scope="row">郵便番号：</th>
                <td>{{$getComment->postal}}</td>
            </tr>
            <tr>
                <th scope="row">都道府県：</th>
                <td>{{$getComment->division}}</td>
            </tr>
            <tr>
                <th scope="row">市区町村、番地（建物名)：</th>
                <td>{{$getComment->city}}</td>
            </tr>
            <tr>
                <th scope="row">電話番号：</th>
                <td>{{$getComment->phone}}</td>
            </tr>
            <tr>
                <th scope="row">メールアドレス：</th>
                <td>{{$getComment->mail}}</td>
            </tr>
        </tbody>
    </table>

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


	</div>            			
        </div>
	       
</div>



