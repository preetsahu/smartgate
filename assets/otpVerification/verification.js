function sendOTP() {
    $(".error").html("").hide();
    var number = $("#mobile").val();
    if (number.length == 10 && number != null) {
        var input = {
            "mobile_number": number,
            "action": "send_otp"
        };
        $.ajax({
            url: 'assets/otpVerification/controller.php',
            // type: 'POST',
            method: 'POST',
            data: input,
            success: function(response) {
                $(".m").html(response);
            }
        });
    } else {
        $(".error").html('Please enter a valid number!')
        $(".error").show();
    }
}

function verifyOTP() {
    $(".error").html("").hide();
    $(".success").html("").hide();
    var otp = $("#mobileOtp").val();
    var verify_otp = "verify_otp";
    // var input = {
    //     "otp": otp,
    //     "action": "verify_otp"
    // };
    if (otp.length == 6 && otp != null) {
        $.ajax({
            type: 'ajax',
            url: 'assets/otpVerification/controller.php',
            method: 'POST',
            data: {
                otp: otp,
                action: verify_otp
            },
            dataType: 'json',
            success: function(response) {
                    // $("." + response.type).html(response.message)
                    // $("." + response.type).show();
                    alert("done");
                    alert(response.success);
                    alert(response.message);
                }
                // error: function() {
                //     alert("ss");
                // }
        });
    } else {
        $(".error").html('You have entered wrong OTP.')
        $(".error").show();
    }
}