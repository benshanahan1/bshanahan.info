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

// delegate function for lightbox bootstrap plugin
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 


// Lightbox call for PrettyPhoto function
$(document).ready(function(){
    $("[rel^='lightbox']").prettyPhoto();
});