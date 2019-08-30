jssor_slider2_init = function () {
    //Reference https://www.jssor.com/development/tip-make-responsive-slider.html
    var options = {
        $AutoPlay: 1,           //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
        $DragOrientation: 3     //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0),
    };

    var jssor_slider2 = new $JssorSlider$('slider2_container', options);
    /*#region responsive code begin*/
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider() {

        //reserve blank width for margin+padding: margin+padding-left (10) + margin+padding-right (10)
        var paddingWidth = 20;

        //minimum width should reserve for text
        var minReserveWidth = 225;

        var parentElement = jssor_slider2.$Elmt.parentNode;

        //evaluate parent container width
        var parentWidth = parentElement.clientWidth;

        if (parentWidth) {

            //exclude blank width
            var availableWidth = parentWidth - paddingWidth;

            //calculate slider width as 70% of available width
            var sliderWidth = availableWidth * 0.7;

            //slider width is maximum 600
            sliderWidth = Math.min(sliderWidth, 600);

            //slider width is minimum 200
            sliderWidth = Math.max(sliderWidth, 200);
            var clearFix = "none";

            //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
            if (availableWidth - sliderWidth < minReserveWidth) {

                //set slider width to available width
                sliderWidth = availableWidth;

                //slider width is minimum 200
                sliderWidth = Math.max(sliderWidth, 200);

                clearFix = "both";
            }

            //clear fix for safari 3.1, chrome 3
            var toClearElment = $Jssor$.$GetElement("clearFixDiv");
            toClearElment && (toClearElment.style["clear"] = clearFix);

            jssor_slider2.$ScaleWidth(sliderWidth);
        }
        else
            $Jssor$.$Delay(ScaleSlider, 30);
    }

    ScaleSlider();
    $Jssor$.$AddEvent(window, "load", ScaleSlider);

    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
};