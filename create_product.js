/*
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
*/

$(document).ready(() => {
    $("#create_product").submit( () => {
        let isValid = true;
        if($("#code").val() == ""){
            $("#code").next().text("This field is required.");
            isValid = false;
        }
        else if($("#code").val().length < 4 || $("#code").val().length > 10){
            $("#code").next().text("Code must have a length within 4-10 characters.");
            isValid = false;
        }
        else{
            $("#code").next().text("");
        }

        if($("#name").val() == ""){
            $("#name").next().text("This field is required.");
            isValid = false;
        }
        else if($("#name").val().length < 10 || $("#name").val().length > 100){
            $("#name").next().text("Name must have a length within 10-100 characters.");
            isValid = false;
        }
        else{
            $("#name").next().text("");
        }

        if($("#description").val() == ""){
            $("#description").next().text("This field is required.");
            isValid = false;
        }
        else if($("#description").val().length < 10 || $("#description").val().length > 255){
            $("#description").next().text("Description must have a length within 10-255 characters.");
            isValid = false;
        }
        else{
            $("#description").next().text("");
        }

        if($("#color").val() == ""){
            $("#color").next().text("This field is required.");
            isValid = false;
        }
        else{
            $("#color").next().text("");
        }

        if($("#price").val() == ""){
            $("#price").next().text("This field is required.");
            isValid = false;
        }
        else if(isNaN($("#price").val())){
            $("#price").next().text("Price must be a number.");
            isValid = false;
        }
        else if(parseFloat($("#price").val()) <= 0){
            $("#price").next().text("Price must be a non-negative number.");
            isValid = false;
        }
        else if(parseFloat($("#price").val()) > 100000){
            $("#price").next().text("Price cannot exceed $100,000.");
            isValid = false;
        }
        else{
            $("#price").next().text("");
        }

        if(!isValid){
            event.preventDefault();
        }
    });
});