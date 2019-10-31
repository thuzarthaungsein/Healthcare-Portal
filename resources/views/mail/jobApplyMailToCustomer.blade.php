<div style="width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

                <span style="font-size: 40px;font-weight: bold;color: #d2571c;text-shadow: 3px 4px #ccc;">LOGO <span style="font-size: 30px; color: #f57e46;">HERE</span></span>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
              {{$getComment->cus_name}} ([施設No])&nbsp;&nbsp;様
                    <p style="margin-top:10px;">【サイト名】より求人への応募がありました。</p>                    
              </h5>
              <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;font-weight:bold;"><span style="color:#d2571c">◎&nbsp;</span>{{$getComment->job_title}}</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;padding-left:10px;"> 【求人番号: {{$getComment->jobnum}}】</p>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;">◎【ご応募された方の情報】</p> 
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;">
                    お名前：{{$getComment->first_name}}
                    <br>
                    ふりがな：{{$getComment->last_name}}
                    <br>
                    生年月日：{{$getComment->birthday}}
                    <br>
                    性別：{{$getComment->gender}}
                    <br>
                    郵便番号：{{$getComment->postal}}
                    <br>
                    都道府県：{{$getComment->city_name}}
                    <br>
                    市区町村、番地（建物名)：{{$getComment->home_address}}
                    <br>
                    電話番号：{{$getComment->phone}}
                    <br>
                    メールアドレス：{{$getComment->email}}
                    <br>
                    ご希望等：
                    </p> 
                    <br>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>   
                    <p style="font-size:12px;color:#807c7c;text-align:left;"> 
                       <span style="color:#000">[サイト名] </span>
                        <br/>
                        〒163-0713
                        <br/>                        
                        東京都新宿区西新宿2-7-1小田急第一生命ビル13階 
                        <br/>                       
                        TEL：03-6911-???? FAX：03-6911-????
                   </p>	          
	        </div>
	    </div>
</div>