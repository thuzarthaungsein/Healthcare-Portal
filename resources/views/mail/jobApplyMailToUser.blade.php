<div style="margin-left:auto;margin-right:auto;background:#fff9ec;width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

                <a style="font-size: 40px;font-weight: bold;color: #d2571c;text-shadow: 3px 4px #ccc;">LOGO <span style="font-size: 30px; color: #f57e46;">HERE</span></a>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
                    {{$getComment->first_name}}&nbsp;&nbsp;様
                    <p style="margin-top:10px;">以下の求人へ応募が完了いたしました。</p>                    
	            </h5>
	            <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;color:#d2571c;font-weight:bold;"><span style="font-size:18px;">◎</span>{{$getComment->job_title}}</p>                   
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 12px;padding-left:10px;"> 【求人番号: {{$getComment->jobnum}}】</p>
                    <p style="text-align: left;margin: 0px;">
                    ***********************************************************************************************************************************</p>
                    <p style="text-align:left;margin:2px;color:#3e4348;font-size: 16px;">◎【ご応募された方の情報】</p>  
                       
                       
                        <table  style="border-collapse: collapse;">
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">お名前：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->first_name}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">ふりがな：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->last_name}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">生年月日：</td>
                              <td style="padding:10px;text-align:left;"> {{$getComment->birthday}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 性別：</td>
                              <td style="padding:10px;text-align:left;"> {{$getComment->gender}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 郵便番号：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->postal}} </td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 都道府県：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->city_name}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> 市区町村、番地（建物名)：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->home_address}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;">電話番号：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->phone}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> メールアドレス：</td>
                              <td style="padding:10px;text-align:left;">{{$getComment->email}}</td>
                            </tr>
                            <tr>
                              <td style="padding:10px;text-align:right;font-weight:bold;"> ご希望等：</td>
                              <td style="padding:10px;text-align:left;"> </td>
                            </tr>
                          </table>
				
	            </p>  
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
</div>
  
