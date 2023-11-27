$(document).ready(function () {
    $("#editBtn").click(function () {
        $(".profile-input").prop("disabled", false);

        $("#editBtn").hide();
        $("#saveBtn").show();
    });

    $("#saveBtn").click(function () {
        var id = 1; 
        var name = $("#nameInput").val();
        var fatherName = $("#fatherNameInput").val();
        var motherName = $("#motherNameInput").val();
        var email = $("#emailInput").val();
        var address = $("#addressInput").val();
        var mobile = $("#mobileInput").val();
        var dob = $("#dobInput").val();

        $.ajax({
            type: "POST",
            url: "api_profile.php", 
            data: {
                action: "updateUserData", 
                id: id,
                name: name,
                fatherName: fatherName,
                motherName: motherName,
                email: email,
                address: address,
                mobile: mobile,
                dob: dob
            },
            success: function (response) {
                alert(response);

                $(".profile-input").prop("disabled", true);

                $("#saveBtn").hide();
                $("#editBtn").show();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#logoutBtn").click(function () {

    });
});
