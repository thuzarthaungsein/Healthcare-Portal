<div style="width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

                <span style="font-size: 40px;font-weight: bold;color: #d2571c;text-shadow: 3px 4px #ccc;">LOGO <span style="font-size: 30px; color: #f57e46;">HERE</span></span>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
                {{$getComment->name}}&nbsp;&nbsp;様
                    <p style="margin-top:10px;">【サイト名】より資料請求が完了しました。</p>                    
	            </h5>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;"><span style="color:#d2571c">◎</span>【資料請求された方について】</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;">
                    お名前：{{$getComment->name}}
                    <br>
                    ふりがな：{{$getComment->furigana}}
                    <br>
                    生年月日：{{$getComment->bdate}}
                    <br>
                    性別：{{$getComment->sex1}}
                    <br>
                    郵便番号：{{$getComment->postal}}
                    <br>
                    都道府県：{{$getComment->division}}
                    <br>
                    市区町村、番地（建物名)：{{$getComment->city}}
                    <br>
                    電話番号：{{$getComment->phone}}
                    <br>
                    メールアドレス：{{$getComment->mail}}
                    </p> 
                    <br>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;"><span style="color:#d2571c">◎</span>【入居対象者様について】</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;">
                    入居対象者様とのご関係：{{$getComment->relation}}
                    <br>
                    お名前：{{$getComment->ttname}}
                    <br>
                    性別：{{$getComment->sex}}
                    <br>
                    年齢：{{$getComment->years}}
                    <br>
                    介護度：{{$getComment->nursing}}
                    <br>
                    認知症：{{$getComment->fect}}
                    <br>
                    ご要望や、お困りごと、その他お問い合わせ：{{$getComment->hope}}                    
                    </p>
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
  


  










<!-- <div style="margin-left:auto;margin-right:auto;background:#fff9ec;width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

                <a style="font-size: 40px;font-weight: bold;color: #d2571c;text-shadow: 3px 4px #ccc;">LOGO <span style="font-size: 30px; color: #f57e46;">HERE</span></a>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
                {{$getComment->fav_name}}「施設番号: {{$getComment->fav_id}}」&nbsp;&nbsp;様
                    <p style="margin-top:10px;">【サイト名】より資料請求がございました。。</p>                    
	            </h5>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;">◎【資料請求された方について】</p> 
                    <table  style="border-collapse: collapse;background:#fff9ec;">
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">お名前：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->name}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">ふりがな：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->furigana}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">生年月日：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->bdate}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 性別：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->sex1}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 郵便番号：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->postal}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 都道府県：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->division}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 市区町村、番地（建物名)：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->city}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">電話番号：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->phone}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> メールアドレス：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->mail}}</td>
                            </tr>
                          </table>
                          <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;">◎【入居対象者様について】</p> 
                    <table  style="border-collapse: collapse;">
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">入居対象者様とのご関係：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->relation}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">お名前：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->ttname}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">性別：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->sex}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 年齢：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->years}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 介護度：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->nursing}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 認知症：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->fect}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> ご要望や、お困りごと、その他お問い合わせ：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->hope}}</td>
                            </tr>                            
                        </table> 
                    <span style="text-align: left;margin: 0px;">***********************************************************************************************************************************</span>    
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
</div> -->