var ul;
var li_items;
var li_number;
var slider_width = 0;
var current = 0;
var positions = [0];
var actual_page_size = 0;
var actual_procesed_size = 0;
var actual_position = 0;

function init() {
    ul = document.getElementById('image_slider');
    li_items = ul.children;
    li_number = li_items.length;
    slider_width = document.getElementById('patrocinadores').clientWidth;

    for (i = 0; i < li_number; i++) {
        image_width = li_items[i].childNodes[1].clientWidth;
        if (image_width + actual_page_size < slider_width)
            actual_page_size += image_width;
        else {
            positions.push(actual_procesed_size);
            actual_page_size = 0;
        }
        actual_procesed_size += image_width;
    }

    ul.style.width = parseInt(slider_width) + 'px';
    setTimeout(slider(), 2000);
}

function slider() {

    if (actual_position < positions.length) {
        ul.style.left = "-" + positions[actual_position] + "px";
        actual_position++;
        setTimeout(slider(), 2000);
    } else {
        // after 2 seconds, call the goBack function to slide to the first image
        setTimeout(function() {
            ul.style.left = 0 + "px";
            actual_position = 0;
        }, 2000);
        setTimeout(function() {
            slider()
        }, 4000);
    }
}

window.onload = init;
