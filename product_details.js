/*
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
*/
$(document).ready( () => {
    $("#details_img").mouseover(function() {
        $("#details_img").css({"filter":"invert(100%)"});
    });
    $("#details_img").mouseout(function() {
        $("#details_img").css({"filter":"invert(0%)"});
    });
});