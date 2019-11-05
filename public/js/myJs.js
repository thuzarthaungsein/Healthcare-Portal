var timeout;
// $(".path").hover(
//   function() {
//     clearTimeout(timeout);
//     $('#info-box').css({
//       'display':'block',
//     });

//     $('.info-box').html($(this).data('info'));

//     $('.'+$(this).data('info')).css({
//       'opacity': '0.5',
//       'font-weight':'bold',
//       'text-decoration':'underline',
//        'color':'#fff',
//     });
//   },
//   function(){
//   	timeout = setTimeout(function(){
//       $('.info-box').css('display','none');
//       },1000);
// });

//   $(".path").mouseout(function(){
    // $('.'+$(this).data('info')).css({
    //   'background':'transparent',
    //   'opacity':'1'
    // });

//     $(".path").mouseleave(function(e) {
//       $(".info-box").css("display", "none");
//     });

// $(document)
// .mousemove(function(e) {
//   $(".info-box").css("top", e.pageY - $(".info-box").height() - 35);
//   $(".info-box").css("left", e.pageX - $(".info-box").width() / 2);
// })
// .mouseover();

// $(".path").mouseout(function(){
//   $('.'+$(this).data('info')).css({
//     'background':'transparent',
//     'opacity':'1',
//     'text-decoration':'none'
//   });
// })

// var ios = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
// if(ios) {
//   $('abbr').on('click touchend', function() {
//     var link = $(this).attr('href');
//     window.open(link,'_blank');
//     return false;
//   });
// }

// $('.path').on("click", function(e) {
    // e.preventDefault();
    // $('.path').removeClass('selected');
    // $('.path.selected').attr("class", "");
    // $('.'+$(this).data('info')).addClass("selected");
    // var title = $(this).attr("title");
    // var id = $(this).attr("id");

// });
// $('#select').on('change',function(){
//   var id = this.value;

// })
// $('.text').click(function() {
//   $('.checkbox, .nursgingcheckbox, .jobcheckbox').slideToggle("slow");
// });

// save button get value search map
$('#save_value').click(function(){
  var checkvalue = [];
  $(':checkbox:checked').each(function(){
    checkvalue.push(parseInt($(this).val()));
  });
  // console.log(checkvalue);
});

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

    function DeltArr(index,type)
    {
        if(type == '0') { type = 'photo'; }
        if(type == '1') { type = 'video'; }
        if(type == '2') { type = 'cooperation'; }
        if(type == '3') { type = 'payment'; }

        var isDivThere = $('#gallery-'+type+' #gallery-'+type+index+'').index();

        var j_arr = $('#galleryarea-'+type+''+index+'').attr('class').split("_");
        var j_indx = j_arr[1];

        var eleId = 'gallery-'+type+index;
        var ele = document.getElementById(eleId);
        var getId = 'gallery-'+type;
        var parentEle = document.getElementById(getId);
        parentEle.removeChild(ele);

        var next_id;
        var getClass = 'gallery-area-'+type;
        var photo = document.getElementsByClassName(getClass);

        for (var i = j_indx; i < photo.length; i++) {
            var new_index = Number(i) + Number(1);
            var oldClass = 'gallery_'+i;
            var newClass = 'gallery_'+new_index;

            $('div.gallery-area-'+type+'').each(function (index, value) {
              if(Number(index) == Number(isDivThere)) {
                var next_arr = $(this).attr('id').split(type);
                next_id = next_arr[1];
              }
            });

            $('#gallery-'+type+next_id+' .gallery-area-'+type).removeClass(newClass);
            $('#gallery-'+type+next_id+' .gallery-area-'+type).addClass(oldClass);

            isDivThere ++;

        }
    }


/*select check

*/
// $(document).ready(function(){
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


/*data_carry



/*data_carry

*/
// $(function() {
//     $('#btnSubmit').on('click', function() {
//       // your code goes here
//       $('#outputSpan').val($('#name').val());
//       $('#outputfurigana').val($('#furigana').val());
//       $('#outputpostal').val($('.postal').val());
//       $('#outputdivision').val($('#division').val());
//       $('#outputcity').val($('#city').val());
//       $('#outputphone').val($('#phone').val());
//       $('#outputmail').val($('#mail').val());

//     //   $('#outputpresent').val($('#present').val());
//       $('#outputpresent').val($('input:checkbox[name=present]:checked').val());

//       $('#outputrelation').val($('#relation').val());
//       $('#outputttname').val($('#ttname').val());

//       $('#outputsex').val($('input:radio[name=sex]:checked').val());
//     //   alert($('input:radio[name=sex]:checked').val());

//       $('#outputyears').val($('#years').val());
//       $('#outputnursing').val($('#nursing').val());

//     //   $('#outputfect').val($('#fect').val());

//       $('#outputfect').val($('input:radio[name=fect]:checked').val());
//     //   alert($('input:radio[name=fect]:checked').val());

//     //   $('#outputdesire').val($('#desire').val());
//       $('#outputdesire').val($('input:radio[name=desire]:checked').val());

//       $('#outputhope').val($('#hope').val());
//       // not triiger output tab to be open
//       $('[href="#output"]').trigger('click');
//     });
//   });
    $(".checkbox").on("click", function() {
        if ($(".checkbox:checked").length == $(".checkbox").length) {
            $(".select_all").prop("checked", true);
        } else {
            $(".select_all").prop("checked", false);
        }
      });
    // });

     /* start nurse profile*/


      $(".readMore").click(function() {
        var elem = $(".readMore").text();
        if (elem == "ReadMore") {
          //Stuff to do when btn is in the read more state
          $(".readMore").text("ReadLess");
          $(".displaytext").slideDown();
        } else {
          //Stuff to do when btn is in the read less state
          $(".readMore").text("ReadMore");
          $(".displaytext").slideUp();
        }
      });

     /* end nurse profile*/

/*select check

*/

    // function scrollTab() {

    //     $("#a").on("click", function() {

    //     });

    //     if ($(".detal_wrap").length) {
    //         $(".a_sp a[href^='#']").click(function() {

    //             var speed = 600;
    //             var href = $(this).attr("href");
    //             var target = $(href === "#" || href === "" ? "html" : href);
    //             var position = target.offset().top;
    //             $("html, body, .scrolldiv2").animate({ scrollTop: position - 60 },
    //                 speed,
    //                 "swing"
    //             );

    //         });
    //     }
    // }

    // function changeType() {
    //     if (this.type == "nursing") {
    //         document.getElementById("hospital-lbl").classList.add("dim-btn");
    //         document.getElementById("nursing-lbl").classList.remove("dim-btn");

    //         scrollTab();
    //     } else {
    //         document.getElementById("nursing-lbl").classList.add("dim-btn");
    //         document.getElementById("hospital-lbl").classList.remove("dim-btn");

    //         scrollTab();
    //     }
    // }

    // $("nav-item").on("change", function(e) {
    //     e.preventDefault();

    // });



    // var profilePublish = $("#profilePublish");
    // stickyDiv = "sticky";
    // header = $(".header").height();

    // $(".scrolldiv2").scroll(function() {
    //     if ($(this).scrollTop() > header) {
    //         profilePublish.addClass(stickyDiv);
    //     } else {
    //         profilePublish.removeClass(stickyDiv);
    //     }
    // });

  //   $(".a_sp a[href^='#']").click(function() {
  //     var speed = 600;
  //     var href = $(this).attr("href");
  //     var target = $(href === "#" || href === "" ? "html" : href);
  //     var position = target.offset().top;
  //     $("html, body, .scrolldiv2").animate({ scrollTop: position - 60 },
  //         speed,
  //         "swing"
  //     );
  // });

//   function closeBtnMethod(){

//     if(confirm("Are you sure you want to delete?"))
//     {
//         var image_x = document.getElementById('x-image');
//         image_x.parentNode.removeChild(image_x);
//         document.getElementById('showimage').style.display = 'block';
//     }
// }

function closeBtnPreview(indx) {
  if(confirm("Are you sure you want to delete?"))
  {
      var panorama_preview = document.getElementById('preview-panorama'+indx);
      panorama_preview.parentNode.removeChild(panorama_preview);
  }
}


  // function closebtn(){
  //   swal({
  //     title: "Are you sure?",
  //     text: "You will not be able to recover this imaginary file!",
  //     type: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: '#DD6B55',
  //     confirmButtonText: 'Yes, delete it!',
  //     closeOnConfirm: false,
  //     //closeOnCancel: false
  //   },
  //   function (isConfirm){
  //     if(isConfirm){
  //         var image_x = document.getElementById('x-image');
  //         image_x.parentNode.removeChild(image_x);
  //         document.getElementById('showimage').style.display = 'block';
  //     }

  //   }
  //   );
  // };

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

    function DeltArr(index,type)
    {
        if(type == '0') { type = 'photo'; }
        if(type == '1') { type = 'video'; }
        if(type == '2') { type = 'cooperation'; }
        if(type == '3') { type = 'payment'; }

        var isDivThere = $('#gallery-'+type+' #gallery-'+type+index+'').index();

        var j_arr = $('#galleryarea-'+type+''+index+'').attr('class').split("_");
        var j_indx = j_arr[1];

        var eleId = 'gallery-'+type+index;
        var ele = document.getElementById(eleId);
        var getId = 'gallery-'+type;
        var parentEle = document.getElementById(getId);
        parentEle.removeChild(ele);

        var next_id;
        var getClass = 'gallery-area-'+type;
        var photo = document.getElementsByClassName(getClass);

        for (var i = j_indx; i < photo.length; i++) {
            var new_index = Number(i) + Number(1);
            var oldClass = 'gallery_'+i;
            var newClass = 'gallery_'+new_index;

            $('div.gallery-area-'+type+'').each(function (index, value) {
              if(Number(index) == Number(isDivThere)) {
                var next_arr = $(this).attr('id').split(type);
                next_id = next_arr[1];
              }
            });

            $('#gallery-'+type+next_id+' .gallery-area-'+type).removeClass(newClass);
            $('#gallery-'+type+next_id+' .gallery-area-'+type).addClass(oldClass);

            isDivThere ++;

        }
    }

//   $('input[name="number"]').keyup(function(e)
//   {
//   if (/\D/g.test(this.value))
//   {
//     // Filter non-digits from input value.
//     this.value = this.value.replace(/\D/g, '');
//   }
// });
