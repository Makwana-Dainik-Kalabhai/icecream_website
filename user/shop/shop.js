// To Hide header menu items
$(document).ready(() => {
    $("main").click(() => {
        $(".menu_block .menu_items").hide();
    });


    // When meadia query will apply, then you can set categories menu 
    var display_categories = false;
    $("#display_cat").click(() => {
        if (!display_categories) {
            $("#left_category").css("left", "0");

            $("#hide_category").show();
            $("#hide_category").css({ width: "100vw", height: "700px", filter: "brightness(15%)", backgroundColor: "rgba(0, 0, 0, 0.8)" });
            $("#display_cat").toggleClass("fa-arrow-left");
            $("#display_cat").toggleClass("fa-arrow-right");
            display_categories = true;

            $("#hide_category").click(() => {
                $("#left_category").css("left", "-40%");
                $("#hide_category").hide();

                if (display_categories) {
                    $("#display_cat").toggleClass("fa-arrow-left");
                    $("#display_cat").toggleClass("fa-arrow-right");
                    display_categories = false;
                }
            });
            return;
        }

        if (display_categories) {
            $("#left_category").css("left", "-40%");

            $("#display_cat").toggleClass("fa-arrow-left");
            $("#display_cat").toggleClass("fa-arrow-right");
            display_categories = false;

            $("#hide_category").hide();
            return;
        }
    });

});