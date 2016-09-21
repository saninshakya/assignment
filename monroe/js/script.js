/*
 * Author: Sanindra Shakya
 Validation and form submit
 */

$('document').ready(function ()
{
    /* validation */
    $("#login-form").validate({
        rules:
                {
                    password: {
                        required: true,
                        minlength: 5
                    },
                    username: "required"
                },
        messages:
                {
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    username: "please enter your username",
                },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm()
    {
        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: data,
            success: function (response)
            {
                var arr = JSON.parse(response);
                if (arr.success == 'true') {
                    $("#login-form").fadeOut("normal");
                    $("#shadow").fadeOut();
                    $("#profile").html("Welcome " + arr.username + " <a href='logout.php' class='red' id='logout'>Logout</a>");
                } else {
                    $("#profile").html("Wrong username or password");
                }
            },
            beforeSend: function ()
            {
                $("#add_err").html("Loading...")
            }
        });
        return false;
    }
    /* login submit */
});