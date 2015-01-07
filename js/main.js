jQuery(document).ready(function() {
    jQuery('#content blockquote,#sidebar .info-list blockquote').wrapInner('<div>');
    jQuery('#slider').cycle({
        fx: 'fade',
        timeout: 6000
    });
    jQuery("a.fancy-video").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic'
    });
    jQuery(".fancy-video").click(function() {
        jQuery.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 640,
            'height': 385,
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });
        return false;
    });


    $("#btn-navbar_id").click(function() {
        $(".navbar-collapse").slideToggle();
    });
});

function contact_form_submit() {
    var cerror = "";
    var cname = trim(jQuery('#contact-name').val());
    var cemail = trim(jQuery('#contact-email').val());
    var cphone = trim(jQuery('#contact-phone').val());
    var ccomment = trim(jQuery('#contact-comment').val());
    var cpp = jQuery('#privacy_policy').is(':checked');
    var ccaptcha = trim(jQuery('#contact-captcha').val());

    if (cname == '') {
        cerror += "Please enter your Name.\n";
    }
    if (cphone == '') {
        cerror += "Please enter your Phone.\n";
    }
    if (!cpp)
    {
        cerror += "Please check checkbox Privacy Policy.\n";
    }
    if (ccaptcha == '') {
        cerror += "Please enter Captcha.";
    }

    if (cerror == "") {
        return true;
        /*jQuery.post(
         js_siteurl+'index.php',
         {
         FormAction: 'ContactSubmit',
         contact_name: cname,
         contact_email: cemail,
         contact_phone: cphone,
         contact_comment: ccomment
         },
         function() {
         document.contact_form.reset();
         alert("Contact Form was successfully sent. Thank You.");
         }
         );*/
    } else {
        alert(cerror);
        return false;
    }
}
function trim(str) {
    return str.replace(/^\s+|\s+$/g, "");
}