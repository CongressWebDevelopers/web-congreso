//$slider = $('#slideshow').css("width",$('#slideshow IMG.active').css("width"));
//function slideSwitch() {
//    var $active = $('#slideshow IMG.active');
//    var $slider = $('#slideshow')
//    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
//
//    var $next =  $active.next().length ? $active.next()
//        : $('#slideshow IMG:first');
//
//    $active.addClass('last-active');
//
//    console.log($slider.css("width"));
//    $next.css({opacity: 0.0})
//        .addClass('active')
//        .animate({opacity: 1.0}, 1000, function() {
//
//        $slider = $('#slideshow').css("width",$next.css("width"));
//        .animate({width:$next.css("width")},500)
//        $active.removeClass('active last-active');
//        });
//}

//var imagenes;
//var tamano;
//var i = 0;
//var animacion = [];
//
//function movimientoIzq(idImagen) {
//    marginleft = imagenes[idImagen].style.marginLeft
//    marginleft.replace("px", "");
//    marginleft = parseInt(marginleft);
//    marginleft++;
//    imagenes[idImagen].style.marginLeft = (marginleft.toString().concat("px"));
//    console.log(imagenes[idImagen])
//
//}
//
//
//function slider(imagenes) {
//
//    if (i < imagenes.length) {
//        imagenes[i].style.zIndex = "10" + i;
//        imagenes[i].style.marginLeft = "0px";
//        idAnima = setInterval("movimientoIzq(i)", 10);
//        animacion[0] = idAnima
//        i += 2;
//    }
//    //    else
//    //        for (img in imagenes)
//    //            img.style.marginLeft = 0;
//}
//
//function iniciarSlider(div) {
//    imagenes = div.childNodes;
//    tamano = div.style.width;
//    i = 1;
//    for (img = 1; img < imagenes.length; img += 2)
//        imagenes[img].style.marginLeft = "0px";
//    setInterval("slider(imagenes)", 6000);
//}


//var i = 0;
//
//function cambiarClaseActiva(imagenes) {
//    console.log(imagenes[i])
//    imagenes[i].classList.add('active');
//    if (i < imagenes.length) {
//        i++;
//        setTimeout(cambiarClaseActiva(imagenes))
//    } else
//        setTimeout(cambiarClaseActiva(imagenes));
//}
var i = 0;
function animateLeft(obj, from, to, speed) {
    if (from >= to) {
        obj.style.visibility = 'hidden';
        return;
    } else {
        var box = obj;
        box.style.paddingLeft = from + "px";
        setTimeout(function() {
            animateLeft(imagenes[i], from + 1, to,speed);
        }, speed)
    }
}

/**
 sbi -> Second between images
**/

var imagenes = document.getElementById("slideshow").getElementsByTagName("img");
var timeBetweenImages = 2000;

window.onload = function() {
    imagenes[i].style.visibility = 'visible';
    setTimeout(function(){animateLeft(imagenes[i],0,400,0.5)},1000);
    setInterval(function(){
        if(i <= imagenes.length -2)
            i++;
        else
            i = 0;
        imagenes[i].style.visibility = 'visible';
        setTimeout(function(){animateLeft(imagenes[i],0,400,0.5)},1000);
    },3000)

}
