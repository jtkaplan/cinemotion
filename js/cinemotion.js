var eventLog = $("#eventLog");
var myPlayer = videojs("my-video");
var numButtons = $("#numButtons").val();

document.addEventListener('keydown', doKeyPress);

function doKeyPress(e) {

    if (e.key == "0") {

        doButtonOff(numButtons);

    } else {

        doButtonClick(e.key);
    }

}

function doButtonClick(buttonNum) {

    var thisButton = $("#button"+buttonNum);
    var currentTime = myPlayer.currentTime();
    var buttonName = thisButton.text();

    if (thisButton.hasClass('btn-success')) {
        thisButton.removeClass('btn-success');
        thisButton.addClass('btn-outline-success');

       eventLog.append(currentTime + " " + buttonName + " Off<br>");
    } else {
        thisButton.removeClass('btn-outline-success');
        thisButton.addClass('btn-success');

        eventLog.append( currentTime + " " + buttonName + " On<br>");

    }
}

function doButtonOff(numButtons) {


    var currentTime = myPlayer.currentTime();
    eventLog.append(currentTime + " All Off<br>");

    for (button=1; button <=numButtons; ++button  ) {

        var thisButton = $("#button"+button);
        if (thisButton.hasClass('btn-success')) {
            thisButton.removeClass('btn-success');
            thisButton.addClass('btn-outline-success');
        }

    }

}