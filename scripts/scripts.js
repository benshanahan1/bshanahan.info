// open section and hide all others
function reveal(div_id) {
    $(".section").each(function(index) {
        if ($(this).attr("id") == div_id) {
            if ($.browser.mobile) {
                $(this).show();
            } else {
                $(this).show("fast");
            }
        } else {
            if ($.browser.mobile) {
                $(this).hide();
            } else {
                $(this).hide("slow");
            }
        }
    });
}

// toggle section
function toggle(id) {
    $(id).toggle("show");
}

// replace text on hover
function replacetext(id, text) {
    $(id).text(text);
}

// delegate function for lightbox bootstrap plugin
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 


// Lightbox call for PrettyPhoto function
$(document).ready(function(){
    $("[rel^='lightbox']").prettyPhoto();
});



// Add cookie to remember if alert boxes have been closed by user
$(document).ready(function() {
    if ($.cookie("infobox") === "hidden") {
        $(".alert").hide();
    }
    $(".close").click(function(e) {
        e.preventDefault();
        $.cookie("infobox", "hidden");
    });
});



// Smooth-scroll page to requested #id section
// $(document).ready(function() {
//     $('a[href*="#"]:not([href="#"])').click(function() {
//         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//             var target = $(this.hash);
//             target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//             if (target.length) {
//                 // $(target).toggle("show");  // display target
//                 $('html, body').animate({scrollTop: target.offset().top}, 1000);  // scroll to target
//                 return false;
//             }
//         }
//     });
// });