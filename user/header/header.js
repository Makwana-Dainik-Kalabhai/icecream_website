$(document).ready(() => {
    $("#menu").click(() => {
        $("#right_menu_block .menu_items").toggle();
    });
    $("#hide_menu").click(() => {
        $("#left_menu_block .menu_items").toggle();
    });
});