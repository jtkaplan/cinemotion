# Cinemotion

Created by Jonas Kaplan, jtkaplan@usc.edu

Uses video.js to play a video, with a series of buttons underneath for tagging the video with onset and offset of each emotion label. Keypresses can be bound to each button. 

##Requirements
Requires a web server with php. 

##Installation
Drop the cinemotion folder into your webserver in an accessible location (e.g. public_html). 

Individual experiments are set up in the config folder. Inside the config folder, each separate experiment should have its own folder. The release comes with a sample experiment called "examplestudy". To create a new study, copy this folder, rename it with the name of your experiment, and configure according to the instructions below. For example, to make a new study called emotionstudy, you will want a folder at cinemotion/config/emotionstudy containing all of the files and folders necessary for that experiment. 

##Configuration
The config.json file inside your experiment folder contains all the settings for your experiment: 

###config.json
**study.title** - should match the name of the folder for your experiment

**movie.filename** - the filename of the movie which should be placed into the video folder
**movie.type** - the filetype of the movie, e.g. "mp4" or "webm". Supported filetypes depend on browser. See videojs documentation for more info.
**movie.poster** - the poster frame to be shown before the video starts, this is an image placed into the video folder
**movie.width** - display width of the movie 
**movie.height** - display height of the movie

**buttons** - list of buttons to appear under the movie
**button.excited** - this creates a button named "excited"
**button.excited.color** - hex color of the key
**button.excited.key** - keyboard key that user will press to turn on and off

**AllOff.key** - this is a special button that turns off all the other buttons at once. If you dont want this button, set AllOff.key to false. Otherwise the key listed here will be the key bound to the AllOff button. 

**dataUpLoadInterval.seconds** - the user's keypress data will be sent to the server via a POST every X seconds. Data are also always sent whenever the video is paused, or when the end of the video is reached, regardless of this setting.

**options.clickableButtons** - this option determines whether the buttons can be clicked by the mouse. If you want only keyboard interaction, set this to false. 

**options.controls** - sets whether the video controls are visible or not

##Usage

There are two entry points for the experiment, one that initiates a practice before the video, and one that starts directly with the video stimulus itself. To run through a short practice, use the following url: 

http://yourserver.com/cinemotion/start.php?subjectid=101&studyid=examplestudy

Change "examplestudy" to your study name to run a different study. 
Subjectid is the subejctid that will be used to identify the uploaded data. 

To skip the practice use a URL like this: 

http://yourserver.com/cinemotion/index.php?subjectid=101&studyid=examplestudy




