$(document).ready(function () {

    /* This is for show password of signUp_form */
    $("#sign_form .hide_pass").hide();
    $("#sign_form .hide_cpass").hide();

    //Click on show_pass btn in signUp_form, then display password
    $("#sign_form .show_pass").click(function () {
        $("#sign_form .hide_pass").show();
        $("#sign_form .show_pass").hide();
        $("#sign_form .pass").attr("type", "text");
    });

    //Click on show_cpass btn in signUp_form, then display confirm password
    $("#sign_form .show_cpass").click(function () {
        $("#sign_form .hide_cpass").show();
        $("#sign_form .show_cpass").hide();
        $("#sign_form #cpass").attr("type", "text");
    });

    //Click on hide_pass btn in signUp_form, then hide the password
    $("#sign_form .hide_pass").click(function () {
        $("#sign_form .show_pass").show();
        $("#sign_form .hide_pass").hide();
        $("#sign_form .pass").attr("type", "password");
    });

    //Click on hide_cpass btn in signUp_form, then hide the confirm password
    $("#sign_form .hide_cpass").click(function () {
        $("#sign_form .show_cpass").show();
        $("#sign_form .hide_cpass").hide();
        $("#sign_form #cpass").attr("type", "password");
    });


    /* This is for hide password of login_form */
    $("#login_form .hide_pass").hide();

    //Click on show_pass btn in login_form, then display password
    $("#login_form .show_pass").click(function () {
        $("#login_form .hide_pass").show();
        $("#login_form .show_pass").hide();
        $("#login_form .pass").attr("type", "text");
    });

    //Click on hide_pass btn in login_form, then hide the password
    $("#login_form .hide_pass").click(function () {
        $("#login_form .show_pass").show();
        $("#login_form .hide_pass").hide();
        $("#login_form .pass").attr("type", "password");
    });


    // Focus on password textbox, then display password description
    $(".pass").focus(() => {
        $("#pass_description").css("display","inline-block");
    });
    // Focus out on password textbox, then hide password description
    $(".pass").blur(() => {
        $("#pass_description").css("display","none");
    });
});