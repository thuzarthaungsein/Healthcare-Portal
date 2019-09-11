
var timeout;
$(".path").hover(
  function() {
    clearTimeout(timeout);
    $('#info-box').css({
      'display':'block',
      'position':'fixed',
      'top':"175px",
      'left':'1350px'
    });
    $('#info-box').html($(this).data('info'));
  },
  function(){
  	timeout = setTimeout(function(){
    	$('#info-box').css('display','none');
      },1000);
  });

var ios = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
if(ios) {
  $('abbr').on('click touchend', function() { 
    var link = $(this).attr('href');   
    window.open(link,'_blank');
    return false;
  });
}

$('path').on("click", function(e) {
    e.preventDefault();
    
    $('.path.selected').attr("class", "");
    $(this).attr("class", "selected");
    var title = $(this).attr("title");
    var id = $(this).attr("id");
    var url = "/api/getmap";
    $.ajax({
        type:'post',
        data:{"title":title,"id":id},
        url:url,
        success:function(data){
            console.log(data);
            $('#select').css({'display':'block'});
            $('#checkbox').empty();
            $('#select').empty();
            var city = data.getCity;
            var townships = data.getTownships;
            $.each(city,function(k,v){
              $('#select').append('<option  value="'+v.id+'">'+v.city_name+'</option>')
            });
            $.each(townships,function(k,v){
                console.log(v);
                $('#checkbox').append('<div class="custom-control custom-checkbox col-sm-3"><input type="checkbox" class="custom-control-input" id="checkbox['+v.id+']" ><label class="custom-control-label" for="checkbox['+v.id+']">'+v.township_name+'</label></div>');
            });
           
           
        }
    });


});




// $('#method-textarea').summernote({
//     placeholder: 'Write Feature',
//     height: 200,
//   });

    var dynamicInput = [] ;
    var ct = 1;
    function new_link()
    {
        ct++;
        var div1 = document.createElement('div');
        div1.id = dynamicInput[ct];
        // link to delete extended form elements
        var delLink = '<div class ="row"><div class ="col-sm-2"></div><div class ="col-sm-9"></div><div class="col-sm-1"><a class="text-danger" style="padding-top: 1px;" href="javascript:delIt('+ ct +')">  delete </a>  </div> </div>  ';
        div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
        document.getElementById('newlink').appendChild(div1);
    }
    // function to delete the newly added set of elements
    function delIt(eleId)
    {
        d = document;
        var ele = d.getElementById(eleId);
        var parentEle = d.getElementById('newlink');
        parentEle.removeChild(ele);
    }

    function closebtn(){
        if(confirm("Are you sure you want to delete?"))
        {
            var image_x = document.getElementById('x-image');
            image_x.parentNode.removeChild(image_x);
            document.getElementById('showimage').style.display = 'block';
            console.log("close");
        }
    }

    function showImg(c,event) {
        $("."+c).html("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'>");
    }

    $("select").on("click" , function() {
  
        $(this).parent(".select-box").toggleClass("open");
        
      });
      
      $(document).mouseup(function (e)
      {
          var container = $(".select-box");
      
          if (container.has(e.target).length === 0)
          {
              container.removeClass("open");
          }
      });
      
      
      $("select").on("change" , function() {
        
        var selection = $(this).find("option:selected").text(),
            labelFor = $(this).attr("id"),
            label = $("[for='" + labelFor + "']");
          
        label.find(".label-desc").html(selection);
          
      });  
    function closevideo() {
        alert('Are you sure to delete?');
        var file = document.getElementById("upload_file").files[0];
        var file_path = 'upload/videos/'+file.name;

        var url = "/api/customer/deletevideo";
        $.ajax({
            type:'post',
            data:{"fiel_path":file_path},
            url:url,
            success:function(data){
               $('#video-area').remove();
            }
        });    
    }
/*select check

*/
$(document).ready(function(){
    $('.select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('.select_all').prop('checked',true);
        }else{
            $('.select_all').prop('checked',false);
        }
    });
});

/*select check

*/




// function scrollTab(){
//     console.log('scroll');
//     // $("p").css('color','red');
//     $('#a').on('click',function(){
//         console.log('onclick');
//     });
  
//     if($('.detal_wrap').length){    
//         $(".a_sp a[href^='#']").click(function () { 
//             console.log("a_sp");
//         var speed = 600;
//         var href = $(this).attr("href");
//         var target = $(href === "#" || href === "" ? 'html' : href);
//         var position = target.offset().top;
//         $("html, body, .scrolldiv2").animate({scrollTop: position - 60}, speed, "swing" );
//             //return false;
//         });
//     }
// }




//  function changeType() {

//     if(this.type == 'nursing') {
        
//             document.getElementById("hospital-lbl").classList.add("dim-btn");
//             document.getElementById("nursing-lbl").classList.remove("dim-btn");
           
//             scrollTab();
           
//     }
//     else{
//            document.getElementById("nursing-lbl").classList.add("dim-btn"); 
//            document.getElementById("hospital-lbl").classList.remove("dim-btn");
         
//            scrollTab();
//     }
// }

// $('nav-item').on('change',function(e){
//     e.preventDefault();
//     console.log($('#a1').val());
// })

// jQuery(document).ready(function($) {

//     var profilePublish = $("#profilePublish");
//     stickyDiv = "sticky";
//     header = $('.header').height();
   

// $('.scrolldiv2').scroll(function() {
//   if( $(this).scrollTop() > header ) {
//     profilePublish.addClass(stickyDiv);
//   } else {
//     profilePublish.removeClass(stickyDiv);
//   }
// });
    
//     $(".a_sp a[href^='#']").click(function () { 
//     var speed = 600;
//     var href = $(this).attr("href");
//     var target = $(href === "#" || href === "" ? 'html' : href);
//     var position = target.offset().top;
//     $("html, body, .scrolldiv2").animate({scrollTop: position - 60}, speed, "swing" );
    
//     });
// });






    
    
  



