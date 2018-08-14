var headerToggled = false;

var canToggle = true;

var headerMenu = document.getElementById("header-responsive-menu");

function header_toggle() {
    if(headerToggled == false) {
        //Set animation for header opening

        //Open the actual menu
        headerMenu.style.display = "block";

        //Toggle variable to true
        headerToggled = true;
    }
    else {
        //Set animation for header opening

        //Close the actual menu
        headerMenu.style.display = "none";

        //Toggle variable to true
        headerToggled = false;
    }
}
function openForm(fn) {
    $("#"+fn).css({display: "block"});
}
function closeForm(fn) {
    $("#"+fn).css({display: "none"});
}
