function nextStudyInfoScreen(numCurrentScreen) {

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

function finishStudyInfo() {
    var subjectid = $("#subjectid").val();
    var studyid = $("#studyid").val();
    var password = $("#password").val();

    //Instructions are over. Start the practice
    window.location.href = "instructions.php?subjectid=" + subjectid + "&studyid=" + studyid + "&password=" + password;
}

function reloadJs(src) {
    src = $('script[src$="' + src + '"]').attr("src");
    $('script[src$="' + src + '"]').remove();
    $('<script/>').attr('src', src).appendTo('head');
}

