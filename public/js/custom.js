//for jssor for ads
jssor_1_slider_init = function() {
    var jssor_1_options = {
        $AutoPlay: 1,
        $AutoPlaySteps: 5,
        $SlideDuration: 160,
        $SlideWidth: 237,
        $SlideSpacing: 3,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $Steps: 5
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
        }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*#region responsive code begin*/

    var MAX_WIDTH = 700;

    function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {
            var expectedWidth = Math.min(
                MAX_WIDTH || containerWidth,
                containerWidth
            );

            jssor_1_slider.$ScaleWidth(expectedWidth);
        } else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
};

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