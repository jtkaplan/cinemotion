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

       eventLog.append(currentTime + " " + buttonName + " Off<br>\n");
    } else {
        thisButton.removeClass('emobutton-off');
        thisButton.addClass('emobutton-on');

        eventLog.append( currentTime + " " + buttonName + " On<br>\n");

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

        var filename = $('#data_filename').val();

        alert("will send data to file:  " + filename);

        $.ajax({
            url : "savedata.php",
            type: "POST",
            data : {filename: filename,
                     dataLog: eventData},
            success: function(data, textStatus, jqXHR)
            {
                //data - response from server
                alert("data: " + data + " textStatus: " + textStatus);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("error");
            }
        });
    } else {
        alert("No data to send");
    }

}