$(document).ready(() => {
    $("#update_pic").hide();

    $("#show_profile_btn").click(() => {
        // When click then sliding underline
        $("#show_profile").show();
        $("#underline").css({ left: "0", transition: "0.3s linear" });

        // When click then sliding form
        $("#show_profile").css({ left: "0", transition: "0.3s linear" });
        $("#edit_profile").css({ left: "100%", transition: "0.3s linear" });
        $("#update_pic").hide();
    });
    $("#edit_profile_btn").click(() => {
        // When click then sliding underline
        $("#edit_profile").show();
        $("#underline").css({ left: "50%", transition: "0.3s linear" });
        
        // When click then sliding form
        $("#edit_profile").css({ left: "0", transition: "0.3s linear" });
        $("#show_profile").css({ left: "-100%", transition: "0.3s linear" });
        $("#update_pic").hide();
    });
    
    
    $("#edit_profile #btns a").click(() => {
        $("#show_profile").hide();
        $("#edit_profile").hide();
        $("#update_pic").show();
    });
    $("#update_pic #back").click(() => {
        $("#show_profile").show();
        $("#edit_profile").show();
        $("#update_pic").hide();
    });
});