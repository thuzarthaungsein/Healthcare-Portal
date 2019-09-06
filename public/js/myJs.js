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
    $('path.selected').attr("class", "");
    $(this).attr("class", "selected");
    var title = $(this).attr("title");
    var id = $(this).attr("id");
     console.log(e);
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

    var dynamicInput = [];
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

