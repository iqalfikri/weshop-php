$(document).ready(function () {
    
    //get class and add function click
    $('.btn-hide-show').click(function () {
        //get type input
        let typeInputSaatIni = $('.input-password').attr('type');

        //if "password"
        if (typeInputSaatIni == "password") {

            //change to the text
            $('.input-password').attr('type', 'text');

            //delete class "eye-slash"
            $(this).removeClass('fa-eye-slash');
            //add class "eye"
            $(this).addClass('fa-eye');
            //change atrribute
            $(this).attr('title', 'Hide Password');

        } else if (typeInputSaatIni == "text") {

            //change to the password
            $('.input-password').attr('type', 'password');

            //delete class "eye-slash"
            $(this).removeClass('fa-eye');
            //add class "eye"
            $(this).addClass('fa-eye-slash');
            //change atrribute
            $(this).attr('title', 'Show Password');

        }
    });
});