jQuery(document)
    .ready(function ($) {

    $("#manifesto ul li")
        .hide();

    $("#manifesto ul li:first")
        .show();

    progressEffect(10, $("#manifesto ul li:first"));

    $('#manifesto ul li')
        .mouseover(function () {
        timerStop();
    });

    $('#manifesto ul li')
        .mouseout(function () {
        timerStop();
        progressEffect(10, $(this));

    });
});

function isPBFinished() {
    if ($('.progressIndicator')
        .width() >= 780) {
        return true;
    } else {
        return false;
    }
}

// Changes #meh images
function inOut(elem) {
    timerStop();
    elem.fadeIn(600)
        .fadeOut(600,

    function () {
        if (elem.next()
            .length > 0) {
            progressEffect(10, elem.next().fadeIn(600));
        } else {
            progressEffect(10, $("#manifesto ul li:first").fadeIn(600));
            console.log(elem.siblings(':first'));
        }
    });

    $('.progressIndicator')
        .css({
        width: 0
    });
}
var timerStop = function () {
    if (!$("#manifesto ul li")
        .is(":animated")) {

    }
    clearInterval(timer);

}
function progressEffect(milisecs, ele) {
    timer = setInterval(function () {
        $('.progressIndicator')
            .css({
            width: $('.progressIndicator')
                .width() + 1
        });
        if (isPBFinished()) {
            inOut(ele);
        }
    }, milisecs);
}

function sliderChecker() {
    console.log('SliderCount === ' + sliderCount);

    if (sliderCount === 0 || sliderCount === (Math.floor(slides / 4) - 1)) {
        console.log('Final de las slides!');
        return false;
    }

    sliderChecker();
}