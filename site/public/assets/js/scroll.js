$("#main_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#main").offset().top
    }, 1000);
});

$("#about_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#about").offset().top - 100
    }, 1000);
});

$("#advantages_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#advantages").offset().top - 100
    }, 1000);
});

$("#usage_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#usage").offset().top - 100
    }, 1000);
});

$("#media_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#media").offset().top - 100
    }, 1000);
});

$("#faq_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#faq").offset().top - 100
    }, 1000);
});

$("#socials_link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#socials").offset().top - 100
    }, 1000);
});