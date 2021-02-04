function nextInstructionScreen(numCurrentScreen) {

    var numNextScreen = numCurrentScreen + 1;

    $("#instructions"+numCurrentScreen).fadeOut("slow",function() {

        if ($("#instructions"+numNextScreen).length) {

            //There are more screens. Show the next one
            $("#instructions"+numNextScreen).fadeIn("slow");

        } else {

            var subjectid = $("#subjectid").val();
            var studyid = $("#studyid").val();
            var password = $("#password").val();

            //Instructions are over. Start the practice
            window.location.href = "practice.php?subjectid=" + subjectid + "&studyid=" + studyid + "&password=" + password;
        }

    });


}

function reloadJs(src) {
    src = $('script[src$="' + src + '"]').attr("src");
    $('script[src$="' + src + '"]').remove();
    $('<script/>').attr('src', src).appendTo('head');
}

function showHeadphoneCheck() {

    var attempts = 0;
    var maxAttempts = $("#headphonecheckMaxAttempts").val();
    var headphoneCheckConfig = {};

    //set up the listener
    $(document).on('hcHeadphoneCheckEnd', function(event, data) {
        var headphoneCheckDidPass = data.didPass;
        var headphoneCheckData = data.data;

        if (headphoneCheckDidPass) {

            doPassedHeadphoneCheck();

        } else {

            attempts = attempts + 1;

            if (attempts >= maxAttempts) {

                alert("You have reached the maximum number of attempts.");

            } else {

                alert("You did not pass the headphone check. Please try again.");
                $("#hc-container").empty();

                HeadphoneCheck.rerunHeadphoneCheck(headphoneCheckConfig);

            }
        }

    });

    //fade out the first instruction card and show the headphonecheck
    $("#instructions1").fadeOut("slow",function() {

        $("#headphonecheckScreen").fadeIn("slow");


        /* 5) Run the headphone check, with customization options defined in headphoneCheckConfig */
        HeadphoneCheck.runHeadphoneCheck(headphoneCheckConfig);


    });


}

function doPassedHeadphoneCheck() {

    var numNextScreen=2;

    $("#headphonecheckScreen").hide();


    if ($("#instructions"+numNextScreen).length) {

        //There are more screens. Show the next one
        $("#instructions"+numNextScreen).fadeIn("slow");

    } else {

        var subjectid = $("#subjectid").val();
        var studyid = $("#studyid").val();

        //Instructions are over. Start the practice
        window.location.href = "practice.php?subjectid=" + subjectid + "&studyid=" + studyid;
    }


}