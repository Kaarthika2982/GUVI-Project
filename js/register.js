$(document).ready(function () {
    $("#registerBtn").click(function () {
        if (validateForm()) {
            var formData = $("#registrationForm").serialize();
            $.ajax({
                type: "POST",
                url: "php/register.php",
                data: formData,
                success: function (response) {
                    if (response === "success") {
                        window.location.href = "login.html";
                    } else {
                        alert("Registration failed. Please try again.");
                    }
                }
            });
        }
    });

    function validateForm() {
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }
        return true;
    }
});
