///////////////////////////////for summernote//////////////////////////
$(".summernote").summernote({
    placeholder: "Hello bootstrap 4",
    tabsize: 2,
    height: 100
});

///////////////////////////js///////////////////////////////
var ct = 1;

function new_link() {
    ct++;
    var div1 = document.createElement("div");
    div1.id = ct;
    // link to delete extended form elements
    var delLink =
        '<div class ="row"><div class ="col-sm-2"></div><div class ="col-sm-9"></div><div class="col-sm-1"><a class="text-danger" style="padding-top: 1px;" href="javascript:delIt(' +
        ct +
        ')">  delete </a>  </div> </div>  ';
    div1.innerHTML = document.getElementById("newlinktpl").innerHTML + delLink;
    document.getElementById("newlink").appendChild(div1);
}
// function to delete the newly added set of elements
function delIt(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById("newlink");
    parentEle.removeChild(ele);
}