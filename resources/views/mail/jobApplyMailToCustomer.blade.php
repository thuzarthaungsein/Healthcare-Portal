<div style="margin-left:auto;margin-right:auto;background:#fff9ec;width:800px;">
<div style="text-align: center;">
	        <div style="padding: 60px;">

    <pre>
        [施設名」([施設No])様

        [サイト名]より求人への応募がありました。


        【 {{$getComment->job_title}} 】
        xxxxxx
        [求人番号]

        【ご応募された方の情報】
        お名前：{{$getComment->first_name}}
        ふりがな：{{$getComment->last_name}}
        生年月日：{{$getComment->birthday}}
        性別：{{$getComment->gender}}
        郵便番号：{{$getComment->postal}}
        都道府県：
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

    Job Description
    job_title : {{$getComment->job_title}}  <br>
    job_description: {{$getComment->job_description}} <br>
    job_location: {{$getComment->job_location}} <br>
    job_nearest_station: {{$getComment->job_nearest_station}} <br>
    job_employment_status: {{$getComment->job_employment_status}} <br>
    job_salary: {{$getComment->job_salary}} <br>
    job_working_hours: {{$getComment->job_working_hours}} <br>

	            <h5 style="color:#3e4348;font-size: 12px;margin-bottom: 30px;font-weight: bold;text-align: left;">
                {{$getComment->cus_name}} ([施設No])&nbsp;&nbsp;様
                    <p style="margin-top:10px;">【サイト名】より求人への応募がありました。</p>                    
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
  
