$(document).ready(function () {
    
    $(".login-form").submit(function (event) {
        
        event.preventDefault();

        var email = $("#floatingInput").val();
        var password = $("#floatingPassword").val();

        $.ajax({
            type: "POST",
            url: "login.php", 
            data: {
                action: "storeData", 
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
            url: "login.php", 
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
