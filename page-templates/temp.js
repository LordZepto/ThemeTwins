jQuery(document).ready(function($) { 
    $('#container').fadeIn(1000);
    $('#palmericas').css({
        'left': ($(window).width() - 3000)/2
    });
    $("#nav ul li").click(function(e){
        e.preventDefault();
        var link = $(this).find('a').attr('href');
        console.log(link);
        $('#container').fadeOut(400, function() {
            window.location = link;
        });
    });

    

    $("#manifesto ul li").hide();

    $("#manifesto ul li:first").show();

    progressEffect(10, $("#manifesto ul li:first")); 

    $('#manifesto ul li').mouseover(function() {
        timerStop();
    });

    $('#manifesto ul li').mouseout(function() {
        timerStop();
        progressEffect(10, $(this)); 
        
    });
});

function isPBFinished () {
    if ($('.progressIndicator').width() >= 780) {
        return true;
    } else {
        return false;
    }
}
// Changes #meh images
function inOut(elem) {
    timerStop();
    elem.fadeIn(600).fadeOut(600,
        function() {
            if (elem.next().length > 0) { 
                progressEffect(10,elem.next().fadeIn(600)); 
            } else { 
                progressEffect(10,$("#manifesto ul li:first").fadeIn(600));
                console.log(elem.siblings(':first'));
            }
    });
    
    $('.progressIndicator').css({width : 0});    
}
var timerStop = function(){
        if(!$("#manifesto ul li").is(":animated")) {
           
       }
        clearInterval(timer);
       
}
function progressEffect(milisecs, ele) {
    timer = setInterval(function(){
        $('.progressIndicator').css({width : $('.progressIndicator').width() + 1});
        if(isPBFinished()) { inOut(ele); }
    }, milisecs);
}

function lavaLamp(type) {
    if(type === 'inv') {
        $("a.current").css({"color" : "#434B53"});
        $("ul.nav").lavaLamp({
            speed: 300,
        });
        $("ul.nav li").hover(function() {
            if ($(this).not("li.selectedLava")) {
                $("a.current").css({"color" : "#E8E0BA"});
            }
        }, function() {
            if ($(this).not("li.selectedLava")) {
                $("a.current").css({"color" : "#434B53"}); 
            }
        });
    } else {
        $("a.current").css({"color" : "#E8E0BA"});
        $("ul.nav").lavaLamp({
            speed: 300,
        });
        $("ul.nav li").hover(function() {
            if ($(this).not("li.selectedLava")) {
                $("a.current").css({"color" : "#434B53"});
            }
        }, function() {
            if ($(this).not("li.selectedLava")) {
                $("a.current").css({"color" : "#E8E0BA"}); 
            }
        });
    }
    
}
function placeholder(){
        $('#name', '#contacto').placeholder({text: 'Nombre'});
        $('#mail', '#contacto').placeholder({text: 'Correo'});
        $('#comentario', '#contacto').placeholder({text: 'Comentario'});
}


        
$("#contacto").submit(function(){
    $("body").css("cursor", "progress");
    $('#send').off();
    $.ajax({
        type: "POST",
        url: "assets/bin/form.php",
        data: $("#contacto").serialize(),
        dataType: "json",
        async: 'true',
        success: function(json){
            alert('bien! ' + json.message);
            $('#contacto').each(function(){this.reset();});
            $('#name', '#contacto').placeholder({text: 'Nombre'});
            $('#mail', '#contacto').placeholder({text: 'Correo'});
            $('#comentario', '#contacto').placeholder({text: 'Comentario'});
            $("body").css("cursor", "default");
            $('#send').click(function(){
                $("#contacto").submit();
            });
        },
        error: function(){
            alert('Something went terribly wrong! Prueba en un rato');
            $("body").css("cursor", "default");
            $('#send').click(function(){
                $("#contacto").submit();
            });
        }
    });
    //make sure the form doesn't post
    return false;
});       


    var slides = $("#proyectosCont").find("a").length;

    function slider (dir, vel) {

        if ($("#proyectosCont").not(":animated")) { // no está animado.

            if (dir === "-") {
                $("#proyectosCont").animate({"left" : dir+"=940"}, vel);
                console.log("Moviendo 1 bloque a la derecha...");
                sliderCount = (dir === '-') ? ++sliderCount : --sliderCount;
            } else if (dir === "+") {
                $("#proyectosCont").animate({"left" : dir+"=940"}, vel);
                console.log("Moviendo 1 bloque a la izquierda...");
                sliderCount = (dir === '-') ? ++sliderCount : --sliderCount;
            } 
            
        } else {
            $(".flecha").click( function() { return false; } );
        }
        //sliderCount = (dir === '-') ? sliderCount++ : sliderCount--;
    }

function sliderChecker() {
    console.log('SliderCount === ' + sliderCount);
    
    if(sliderCount === 0 || sliderCount === (Math.floor(slides/4)-1) ) { 
        console.log('Final de las slides!');
        return false; 
    }

    sliderChecker(); 
}