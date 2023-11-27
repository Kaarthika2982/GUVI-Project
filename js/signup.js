$(document).ready(function () {
    $(".signup-form").submit(function (event) {
        event.preventDefault();

        var email = $("#signupEmail").val();
        var password = $("#signupPassword").val();

        $.ajax({
            type: "POST",
            url: "signup.php", 
            data: {
                action: "storeUserData", 
                email: email,
                password: password
            },
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "POST",
            url: "signup.php",
            data: {
                action: "retrieveData" 
            },
            success: function (data) {
                console.log(data); 
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});