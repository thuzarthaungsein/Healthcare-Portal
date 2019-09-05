$('path').on("click", function(e) {
    e.preventDefault();
    $('path.selected').attr("class", "");
    $(this).attr("class", "selected");
    var title = $(this).attr("title");
    var id = $(this).attr("id");
     console.log(e);
    var url = "http://localhost:8000/api/getmap";
    $.ajax({
        type:'get',
        data:{"title":title,"id":id},
        url:url,
        success:function(data){
            console.log(data.title);
        }
    });


});

$('#feature').summernote({
    placeholder: 'Write Feature',
    height: 200,
  });

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
        var image_x = document.getElementById('x-image');
        image_x.parentNode.removeChild(image_x);
        document.getElementById('showimage').style.display = 'block';
        console.log("close");
    }

    function showImg(c,event) {
        $("."+c).html("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'>");
    }

    function closevideo() {
        alert('Are you sure to delete?');
        var file = document.getElementById("upload_file").files[0];
        var file_path = 'upload/videos/'+file.name;

        var url = "http://localhost:8000/api/customer/deletevideo";
        $.ajax({
            type:'post',
            data:{"fiel_path":file_path},
            url:url,
            success:function(data){
               $('#video-area').remove();
            }
        });
        
    }

    