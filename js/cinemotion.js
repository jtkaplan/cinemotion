var eventLog = $("#eventLog");
var myPlayer = videojs("my-video");
var allOffKey = $("#allOffKey").val();

document.addEventListener('keydown', doKeyPress);

function doKeyPress(e) {
    if (e.key == allOffKey) {
        doButtonOff();
    } else {
        doButtonClick(e.key);
    }
}

function doButtonClick(buttonNum) {

    var thisButton = $("#button"+buttonNum);
    var currentTime = myPlayer.currentTime();
    var buttonName = thisButton.text();

    if (thisButton.hasClass('emobutton-on')) {
        thisButton.removeClass('emobutton-on');
        thisButton.addClass('emobutton-off');

       eventLog.append(currentTime + " " + buttonName + " Off<br>");
    } else {
        thisButton.removeClass('emobutton-off');
        thisButton.addClass('emobutton-on');

        eventLog.append( currentTime + " " + buttonName + " On<br>");

    }
}

function doButtonOff() {

    var currentTime = myPlayer.currentTime();
    eventLog.append(currentTime + " All Off<br>");

    $('.emobutton').each(function(i, thisButton) {

        if ($(thisButton).hasClass('emobutton-on')) {
            $(thisButton).removeClass('emobutton-on');
            $(thisButton).addClass('emobutton-off');
        }
    });

}