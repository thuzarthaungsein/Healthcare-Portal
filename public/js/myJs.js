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