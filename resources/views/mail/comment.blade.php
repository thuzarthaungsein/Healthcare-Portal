
<div style="width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

                <span style="font-size: 40px;font-weight: bold;color: #d2571c;text-shadow: 3px 4px #ccc;">LOGO <span style="font-size: 30px; color: #f57e46;">HERE</span></span>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
                【サイト名】 管理者&nbsp;&nbsp;様
                    <p style="margin-top:10px;">【サイト名】に口コミの登録がありました。</p>                    
	            </h5>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>                    
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;">
                    事業所番号：{{$getComment[0]->cusid}} 
                    <br>
                    事業所名：{{$getComment[0]->cusname}}
                    <br>
                    投稿者ニックネーム：{{$getComment[0]->name}} 
                    <br>
                    投稿者メールアドレス：{{$getComment[0]->email}}
                    <br>
                    生まれた年：{{$getComment[0]->year}} 
                    <br>
                    性別 ：{{$getComment[0]->gender}}
                    <br>
                    郵便番号：{{$getComment[0]->zipcode}} 
                    <br>
                    口コミタイトル：{{$getComment[0]->title}} 
                    <br>
                    口コミ内容：{{$getComment[0]->comment}} 
                    </p>	          
	        </div>
	    </div>
</div>