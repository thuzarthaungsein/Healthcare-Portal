<template>
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card card-default m-b-20">

                <div class="card-body">
                    <h4 class="main-color">ニュース役職の検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row m-b-15">
                
                <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
            </div>
            <div class="col-md-12 scrolldiv">
                <div v-for="favourite in favourite_list" :key="favourite.id" class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">

                            <div class="col-md-5">

                                <img src="images/h5.jpg" class="col-md-12" alt="image" width="5600px" height="250px"> 

                            <div class="m-t-30" style="text-align:center;">
                                <a href="#">病院プロフィール</a>
                            </div>
                               
                            </div>
                            

                            <div class="col-md-2  m-t-15">

		

                                    
                                    <button class="btn btn-danger all-btn" @click="deletehospital(favourite.id)" >削除</button>

                                        <button class="btn main-bg-color white all-btn m-t-30 form-check"><label class="form-check-label" for="check2">
                                                <input type="checkbox" class="form-check-input" id="check2" name="acs" value="予約">予約
                                        </label></button>

                                        <button class="btn secondary-bg-color all-btn white m-t-30 form-check"><label class="form-check-label" for="check3">
                                                    <input type="checkbox" class="form-check-input" id="check3" style="margin-left:-14px;" name="acs" value="書類請求"> 書類請求
                                        </label></button>

                                      <div class="m-t-22"> 
                                        <input type="button" class="btn" @click='selectAll()' value="すべて選択" style="border:1px solid black;"/>
                                        <input type="button" class="btn m-t-15" @click='UnSelectAll()' value="すべて選択解除" style="border:1px solid black;"/>
                                      </div>
                                     
                            </div>
                            
                            <div class="col-md-5" style="">
                                
                                    <table class="table table-secondary table-striped table-bordered " >
                                            <tr>
                                                <td width="130px">アクセス</td>
                                                   <td>{{favourite.access}}</td>
                                            </tr>
                                             <tr>
                                                <td>医療部</td>
                                                   <td>{{favourite.medical_department}}</td>
                                            </tr>

                                             <tr>
                                                <td>スペシャリスト</td>
                                                   <td>{{favourite.specialist}}</td>
                                            </tr>

                                             <tr>
                                                <td>詳細情報</td>
                                                   <td>{{favourite.details_info}}</td>
                                            </tr>

                                             <tr>
                                                <td>件名</td>
                                                   <td>{{favourite.subject}}</td>
                                            </tr>

                                             <tr>
                                                <td>休業日</td>
                                                   <td>{{favourite.closed_day}}</td>
                                            </tr>

                                             <tr>
                                                <td>施設</td>
                                                   <td>{{favourite.facilities}}</td>
                                            </tr>

                                             <tr>
                                                <td>ウェブサイト</td>
                                                   <td>{{favourite.website}}</td>
                                            </tr>

                                             <tr>
                                                <td>特別な機能</td>
                                                   <td>{{favourite.special_features}}</td>
                                            </tr>

                                             <tr>
                                                <td>混雑</td>
                                                   <td>{{favourite.congestion}}</td>
                                            </tr>
                                           
                                        </table>

                                
                                
                               
                              
                           
                           
                               
                                
                            
                                
                                

                            </div>
                        </div>
                    </div> 
                </div>
                 <h2 style="text-align:left;text-decoration:none;" class="am-l-10">資料請求される方について</h2>
                <div class="row"  style="padding:23px;">
                   
                    <!-- <div class="col-md-2">
                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                       <p class="m-t-15">お名前:<span class="error">*</span></p>

                        <p class="m-t-15">お名前:<span class="error">*</span></p>

                    </div> -->

                    <div class="col-md-10">
                          <form class="col-md-12" style="border:1px solid #b5c1ce;padding:23px;border-radius:8px;">
                        <div class="form-group">
                                           <label>お名前:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="お名前を入力してください。" style="height:45px;width:89%;" required>
                                        </div>

                                         <label>ふりがな:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="ふりがなを入力してください。" style="height:45px;width:89%;" required>
                                        </div>

                                         <label class="m-t-30">ご住所:<span class="error">*</span></label>
                                         <div class="btn-group">
             
                                            <button class="btn main-bg-color white all-btn" type="button">
                                                    都道府県
                                                <span class=""></span>
                                            </button>

                        <select class="" id=""  aria-invalid="false" required>
                            <option value="">選択してください</option>
                        	<option value="1">東京都</option>
                        	<option value="3">茨城県</option>
                        	<option value="4">栃木県</option>
                        	<option value="5">群馬県</option>
                        	<option value="6">埼玉県</option>
                        	<option value="7">千葉県</option>
                        	<option value="8">神奈川県</option>
                        	<option value="9">静岡県</option>
                        	<option value="10">北海道</option>
                        	<option value="11">青森県</option>
                        	<option value="12">岩手県</option>
                        	<option value="13">宮城県</option>
                        	<option value="14">秋田県</option>
                        	<option value="15">山形県</option>
                        	<option value="16">福島県</option>
                        	<option value="17">山梨県</option>
                        	<option value="18">新潟県</option>
                        	<option value="19">長野県</option>
                        	<option value="20">富山県</option>
                        	<option value="21">石川県</option>
                        	<option value="22">福井県</option>
                        	<option value="23">岐阜県</option>
                        	<option value="24">愛知県</option>
                        	<option value="25">三重県</option>
                        	<option value="26">滋賀県</option>
                        	<option value="27">京都府</option>
                        	<option value="28">大阪府</option>
                        	<option value="29">兵庫県</option>
                        	<option value="30">奈良県</option>
                        	<option value="31">和歌山県</option>
                        	<option value="32">鳥取県</option>
                        	<option value="33">島根県</option>
                        	<option value="34">岡山県</option>
                        	<option value="35">広島県</option>
                        	<option value="36">山口県</option>
                        	<option value="37">徳島県</option>
                        	<option value="38">香川県</option>
                        	<option value="39">愛媛県</option>
                        	<option value="40">高知県</option>
                        	<option value="41">福岡県</option>
                        	<option value="42">佐賀県</option>
                        	<option value="43">長崎県</option>
                        	<option value="44">熊本県</option>
                        	<option value="45">大分県</option>
                        	<option value="46">宮崎県</option>
                        	<option value="47">鹿児島県</option>
                        	<option value="48">沖縄県</option>
                        </select>

                                   
                                  
                                   
                                        </div><br>

                                        <label class="m-t-30">郵便番号:<span class="error">*</span></label>
                                        <a href="https://www.post.japanpost.jp/zipcode/" target="blank">郵便番号検索</a>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="郵便番号を入力してください。" style="height:45px;width:89%;" required>
                                        </div>

                                        <label class="m-t-30">電話番号:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="電話番号を入力してください。" style="height:45px;width:89%;" required>
                                        </div>

                                        <label class="m-t-30">メールアドレス:<span class="error">*</span></label>
                                        <div class="form-group">
                                            <!-- <label>題名:<span class="error">*</span></label> -->
                                            <input type="text" class="form-control" placeholder="メールアドレスを入力してください。" style="height:45px;width:89%;" required>
                                        </div>

                                        <label class="m-t-22">プレゼントのご希望:<span class="error">*</span></label>
                                        <div class="form-group m-b-30">
                                            <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="" required>「早分かり用語集」プレゼントを希望する
                                        </label>
                                    </div>
                                        </div>

                                        <hr>
                         <h2 style="text-align:left;text-decoration:none;" class="m-t-30">入居対象者様について</h2><span class="error">※お差しつかえがなければご入力ください。</span>
                                <div class="form-group">
                        <!--select-->
                                    <label class="m-t-30">入居対象者様とのご関係:<span class="error">*</span></label>
                                         <div class="btn-group">
                                             <select name="" id="" required>
                                               <option value="">選択してください</option>
                                                <option value="1">本人</option>
                                                <option value="2">家族</option>
                                                <option value="3">親族</option>
                                                <option value="4">友人</option>
                                                <option value="5">ケアマネージャー</option>
                                                <option value="6">ソーシャルワーカー</option>
                                                <option value="7">その他</option>
                                            </select>
                                        </div><br>
                                    <!--select-->

                                    


                                           <label class="m-t-22">お名前:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="お名前を入力してください。" style="height:45px;width:29%;" required>
                                        </div>

                                         <!-- radio -->
                                        <div class="form-group">
                                            <div class="form-check">
                                        
                                            <table>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <td width="90px"> <label style="margin-top:10px;margin-left:-21px;" for="sex">性別:<span class="error">*</span></label></td>
                                                    <td width="70px"><input type="radio" class="form-check-input" id="sex" name="sex" value="男性" required>男性</td>
                                                     <td width="70px"><input type="radio" class="form-check-input" id="sex" name="sex" value="女性" required>女性</td>
                                                      <td width="50px"><input type="radio" class="form-check-input" id="sex" name="sex" value="夫婦" required>夫婦</td>
                                                 </tr>
                                                
                                            </table>
                                         
                                        
                                    </div>
                                </div>
                            <!-- radio -->
                              <!--select-->
                    <label class="m-t-22">年齢:<span class="error">*</span></label>
                                         <div class="btn-group">

                                            <select class="mR10" style="margin-left:17px;" required>
                        <option value="">選択してください</option>
                        <optgroup label="50代">
                            <option value="50">50</option>
               	             <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </optgroup>
                        <optgroup label="60代">
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                        </optgroup>
                        <optgroup label="70代">
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                        </optgroup>
                        <optgroup label="80代">
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                        </optgroup>
                        <optgroup label="90代">
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                        </optgroup>
                        <optgroup label="100歳以上">
                            <option value="100">100</option>
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                            <option value="105">105</option>
                            <option value="106">106</option>
                            <option value="107">107</option>
                            <option value="108">108</option>
                            <option value="109">109</option>
                            <option value="110">110</option>
                        </optgroup>
                    </select>
                                        </div><br>
                                    <!--select-->
                             <!--select-->
                    <label class="m-t-22 select-box">介護度:<span class="error">*</span></label>
                                <div class="btn-group">
                                    <select id="select-box1" class="select" required>
                                        <option value="">選択してください</option>
                                        <option value="1">自立</option>
                                        <option value="2">要支援</option>
                                        <option value="3">要介護1</option>
                                        <option value="4">要介護2</option>
                                        <option value="5">要介護3</option>
                                        <option value="6">要介護4</option>
                                        <option value="7">要介護5</option>
                                        <option value="7">要介護6</option>
                                    </select>
                                </div><br>
                                    <!--select-->

                                        <!-- radio -->
                                        <div class="form-group m-t-22">
                                            <div class="form-check">
                                        <label class="">
                                            <table>
                                                <tr>
                                                    <td width="90px"> <label style="margin-top:10px;margin-left:-21px;" for="health">認知症:<span class="error">*</span></label></td>
                                                    <td width="70px"><input type="radio" class="form-check-input" id="" name="health" value="あり" required>あり</td>
                                                    <td width="70px"><input type="radio" class="form-check-input" id="" name="health" value="なし" required>なし</td>
                                                    <td width="90px"><input type="radio" class="form-check-input" id="" name="health" value="わからない" required>わからない</td>
                                                </tr>
                                            </table>
                                         
                                        </label>
                                    </div>
                                </div>
                            <!-- radio -->

                                <!-- radio -->
                                        <div class="form-group m-t-22">
                                            <div class="form-check">
                                        <label class="">
                                            <table>
                                                <tr>
                                                    <td width="120px"> <label style="margin-top:10px;margin-left:-21px;" for="time">入居希望時期:<span class="error">*</span></label></td>
                                                    <td width="125px"><input type="radio" class="" id="radio1" name="time" value="できるだけ早く" required>できるだけ早く</td>
                                                    <td width="100px"><input type="radio" class="" id="radio2" name="time" value="ヶ月以内" required>ヶ月以内</td>
                                                    <td width="100px"><input type="radio" class="" id="radio3" name="time" value="半年以内" required>半年以内</td>
                                                    <td width="100px"><input type="radio" class="" id="radio4" name="time" value="1年以内" required>1年以内</td>
                                                    <td width="100px"><input type="radio" class="form-check-input" id="radio1" name="time" value="未定" required>未定</td>
                                                </tr>
                                            </table>
                                         
                                        </label>
                                    </div>
                                </div>
                            <!-- radio -->
                            <label class="m-t-22">ご要望や、お困りごと、その他お問い合わせ:<span class="error">*</span></label><br>
                            <textarea name="" id="" cols="34" rows="30" required></textarea>


                             <div class="" style="text-align:center">
                                        <button class="btn news-post-btn-blue"> 同意して進む</button>
                                    </div>
                    </form>
                 
                    </div>

                    <!-- <div class="col-md-2">
                          
                    </div> -->
                </div>
                
    
            
            


            </div>
            
        </div>
    </div>
    <!-- Page Content end  -->
    
    
</template>

<script>
export default {
       
        data() {
            return {
                favourite_list:[]
            }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/hospital/favourite_list')
                 .then(response=>{
                     this.favourite_list = response.data;
                 });
        },

         methods: {

              selectAll(){
				var items=document.getElementsByName('acs');
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox')
						items[i].checked=true;
				}
			},
			
			UnSelectAll(){
				var items=document.getElementsByName('acs');
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox')
						items[i].checked=false;
				}
			},		
            
            deletehospital(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`http://localhost:8000/api/hospital/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.favourite_list.map(item => item.id).indexOf(id); // find index of your object
                        this.favourite_list.splice(i, 1)
                    });
                }

            }
        }

    }
		
</script>
