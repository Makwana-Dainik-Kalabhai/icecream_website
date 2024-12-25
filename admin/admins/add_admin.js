$(document).ready(() => {
    $("li").hide();

    $("#pass").focus(() => {
        $("li").show();
    });

    $("#pass").blur(() => {
        $("li").hide();
    });
});