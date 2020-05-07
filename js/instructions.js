function nextInstructionScreen(numCurrentScreen) {

    var numNextScreen = numCurrentScreen + 1;

    $("#instructions"+numCurrentScreen).fadeOut("slow",function() {

        if ($("#instructions"+numNextScreen).length) {

            //There are more screens. Show the next one
            $("#instructions"+numNextScreen).fadeIn("slow");

        } else {

            var subjectid = $("#subjectid").val();
            var studyid = $("#studyid").val();

            //Instructions are over. Start the practice
            window.location.href = "practice.php?subjectid=" + subjectid + "&studyid=" + studyid;
        }

    });


}