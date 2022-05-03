var eventLog = $("#eventLog");
var myPlayer = videojs("my-video");
var allOffKey = $("#allOffKey").val();
var firstButton = $(".emobutton").first();
var secondButton = $(".emobutton").eq(2);
var thirdButton = $(".emobutton").eq(3);
var practiceButton = $("#practiceButton");
var practiceTitle = $("#practiceTitle");
var practicePhase = 0;
var studyid = $("#studyid").val();
var subjectid = $("#subjectid").val();
var password = $("#password").val();
var numButtons = $(".emobutton").length;

console.log("numbuttons: " + numButtons);
console.log("secondbutton " + secondButton.text() );
console.log("thirdbutton " + thirdButton.text() );
console.log("loc: " + window.location.href.toString().split("practice.php")[0]);


function doPractice() {

    var buttonName = firstButton.text();

    bootbox.alert ("We will now begin the practice.<br><br>When the clip starts, press the button that corresponds to the onset of <b>"+buttonName+"</b>",function(){
        startVideo();
        practiceButton.hide();
        practiceTitle.html("Press the <b>"+buttonName+"</b> key to turn it on.");
        practicePhase = 1;
    });



}

function startVideo() {

    myPlayer.play();
    document.addEventListener('keydown', doKeyPress);

}

function buttonOneTurnedOn() {

    document.removeEventListener('keydown', doKeyPress);
    var buttonName = firstButton.text();

    bootbox.alert("Great! Notice how the button corresponding to "+buttonName+ " is now highlighted, which shows that you are currently indicating " + buttonName + ". <br><br>Next, press the key to turn off " + buttonName + ".",function(){
        document.addEventListener('keydown', doKeyPress);
        practiceTitle.html("Press the <b>"+buttonName+"</b> key to turn it off.");
    });

}

function buttonOneTurnedOff() {

    document.removeEventListener('keydown', doKeyPress);

    var firstButton = $(".emobutton").first();
    var buttonName = firstButton.text();

    bootbox.alert("Good job! See how it goes back to being transparent? This indicates that this category is turned off and you are not currently indicating " + buttonName + ".",function(){

        document.addEventListener('keydown', doKeyPress);
        doButtonOff();
        if (numButtons > 1) {
            practicePhase = 2;
            doPhase2();
        } else {
            doPhase3();
        }

    });

}

function doPhase2() {

    document.removeEventListener('keydown', doKeyPress);

    bootbox.alert("Next, press the key that corresponds to <b>" + secondButton.text()  + ".</b>", function() {

        practiceTitle.html("Press the <b>"+secondButton.text()+"</b> key to turn it on.");
        document.addEventListener('keydown', doKeyPress);
    });

}

function doPhase2B () {

    document.removeEventListener('keydown', doKeyPress);

    bootbox.alert("Next, press the key that corresponds to <b>" + thirdButton.text()  + ".</b>", function() {
        practiceTitle.html("Press the <b>"+thirdButton.text()+"</b> key to turn it on.");
        document.addEventListener('keydown', doKeyPress);
    });
}
function doPhase2C () {

    document.removeEventListener('keydown', doKeyPress);

    bootbox.alert("This indicates that you are feeling both <b>" + secondButton.text() + "</b> and <b>"+ thirdButton.text() + "</b> right now in response to the clip.<br><br> Now, you can either press the key for <b>" + secondButton.text() + "</b> and the key for <b>"+ thirdButton.text() + "</b> in sequence to turn those emotions off. Or, if you are no longer feeling either emotion, you can use the <b>"+ allOffKey +"</b> key to deselect all emotions at once. Try pressing that next.",function() {
        practiceTitle.html("Press the <b>"+allOffKey+"</b> key to turn all emotions off.");
        practicePhase = 3;
        document.addEventListener('keydown', doKeyPress);
    });


}

function doPhase3() {

    document.removeEventListener('keydown', doKeyPress);
    var hrefStem = window.location.href.toString().split("practice.php")[0];

    bootbox.alert("Good job! We are ready to start the study. Press OK to begin when you are ready.",function() {
        var url = hrefStem + "index.php?subjectid="+subjectid+"&studyid="+studyid+"&password="+password;
        window.location.replace(url);
    });
}

function doKeyPress(e) {
    console.log('e.key: ' + e.key + 'and allOffkey: ' + allOffKey)
    if (e.key==" "){
        doButtonClick("space");
    }
    if (e.key == allOffKey) {
        doButtonOff();
    } else {
        doButtonClick(e.key);
    }
}

function doButtonClick(buttonNum) {

    var buttonID = "button"+buttonNum;
    var thisButton = $("#"+buttonID);
    var currentTime = myPlayer.currentTime();
    var buttonName = thisButton.text();
    var firstButton = $(".emobutton").first();

    if (thisButton.hasClass('emobutton-on')) {
        thisButton.removeClass('emobutton-on');
        thisButton.addClass('emobutton-off');

        eventLog.append(currentTime + " " + buttonName + " Off<br>\n");
    } else {
        thisButton.removeClass('emobutton-off');
        thisButton.addClass('emobutton-on');

        eventLog.append( currentTime + " " + buttonName + " On<br>\n");

    }
    if (practicePhase === 1 && buttonID === firstButton.attr('id') && thisButton.hasClass('emobutton-on')) {
        buttonOneTurnedOn();
    } else if (practicePhase === 1 && buttonID === firstButton.attr('id') && thisButton.hasClass('emobutton-off')) {
        buttonOneTurnedOff();
    } else if (practicePhase === 2 && buttonID === secondButton.attr('id') && thisButton.hasClass('emobutton-on')) {
        doPhase2B();
    } else if (practicePhase === 2 && buttonID === thirdButton.attr('id') && thisButton.hasClass('emobutton-on')) {
        doPhase2C();
    }

}

function doButtonOff() {

    var currentTime = myPlayer.currentTime();
    eventLog.append(currentTime + " All Off<br>\n");

    $('.emobutton').each(function (i, thisButton) {

        if ($(thisButton).hasClass('emobutton-on')) {
            $(thisButton).removeClass('emobutton-on');
            $(thisButton).addClass('emobutton-off');
        }
    });

    if (practicePhase === 3) {
        doPhase3();
    }

}

