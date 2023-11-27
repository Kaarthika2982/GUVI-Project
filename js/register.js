$(document).ready(function () {
    $("#registerBtn").click(function () {
        // Validate form before sending AJAX request
        if (validateForm()) {
            // Get form data
            var formData = $("#registrationForm").serialize();

            // AJAX request to the server
            $.ajax({
                type: "POST",
                url: "php/register.php",
                data: formData,
                success: function (response) {
                    // Handle the response from the server
                    if (response === "success") {
                        // Redirect to login page
                        window.location.href = "login.html";
                    } else {
                        alert("Registration failed. Please try again.");
                    }
                }
            });
        }
    });

    function validateForm() {
        // Your existing form validation logic
        // Ensure all fields are filled, passwords match, etc.
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }

        return true;
    }
});
