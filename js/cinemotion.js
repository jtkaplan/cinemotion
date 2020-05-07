var eventLog = $("#eventLog");
var myPlayer = videojs("my-video");
var allOffKey = $("#allOffKey").val();
var studyid = $("#studyid").val();
var subjectid = $("#subjectid").val();
var uploadInterval = $("#dataUploadInterval").val();
var previousUpload = 0;

document.addEventListener('keydown', doKeyPress);

$(document).ready(function() {

    var text = $("#startscreentext").html();

    bootbox.alert (text,function(){
        startVideo();
    });
});

function startVideo() {

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;

    eventLog.append("## STUDY " + studyid + "<br>\n");
    eventLog.append("## SUBJECT " + subjectid + "<br>\n");
    eventLog.append("## DATETIME " + dateTime + "<br>\n");

    myPlayer.controls(true);
    myPlayer.play();
    eventLog.append(myPlayer.currentTime() + " ##VIDEO STARTED<br>\n");
    myPlayer.on('timeupdate', function() {
        videoIsPlaying();
    });
    myPlayer.on('ended', function() {
        videoEnded();
    });
}

function videoIsPlaying() {
    var now = myPlayer.currentTime();
    if (now - previousUpload > uploadInterval ) {
        previousUpload = now;
        eventLog.append(now + " ##DATA UPLOADING<br>\n");
        sendData();
    }
}

function videoEnded() {

    var now = myPlayer.currentTime();
    sendData();
    eventLog.append(now + " ##VIDEO ENDED<br>\n");

}


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

    if (thisButton.length) {
        if (thisButton.hasClass('emobutton-on')) {
            thisButton.removeClass('emobutton-on');
            thisButton.addClass('emobutton-off');

            eventLog.append(currentTime + " " + buttonName + " Off<br>\n");
        } else {
            thisButton.removeClass('emobutton-off');
            thisButton.addClass('emobutton-on');

            eventLog.append(currentTime + " " + buttonName + " On<br>\n");

        }
    }
}

function doButtonOff() {

    var currentTime = myPlayer.currentTime();
    eventLog.append(currentTime + " All Off<br>\n");

    $('.emobutton').each(function(i, thisButton) {

        if ($(thisButton).hasClass('emobutton-on')) {
            $(thisButton).removeClass('emobutton-on');
            $(thisButton).addClass('emobutton-off');
        }
    });

}

function toggleLog() {
    $("#eventCard").toggle();
}

function sendData() {

    var eventData = $('#eventLog').text();

    if (eventData) {

        $.ajax({
            url : "savedata.php",
            type: "POST",
            data : {studyid: studyid,
                  subjectid: subjectid,
                    dataLog: eventData},
            success: function(data, textStatus, jqXHR)
            {
                //data - response from server
                eventLog.append(myPlayer.currentTime() + " ##DATA UPLOAD SUCCESS<br>\n");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                eventLog.append(myPlayer.currentTime() + " ##DATA UPLOAD ERROR<br>\n");

            }
        });
    } else {
        eventLog.append(myPlayer.currentTime() + " ##NO DATA TO UPLOAD<br>\n");
    }

}

