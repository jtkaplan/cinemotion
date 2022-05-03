# Cinemotion

Created by Jonas Kaplan, jtkaplan@usc.edu

Uses video.js to play a video, with a series of buttons underneath for tagging the video with onset and offset of each emotion label. Keypresses can be bound to each button. 

Sample version running here: 

http://www.jonaskaplan.com/cinemotion/start.php?studyid=examplestudy&subjectid=101


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

**AllOff.key** - this is a special button that turns off all the other buttons at once. 

**AllOff.hidden** - if you dont want the AllOff button to appear, set this to true.

**dataUpLoadInterval.seconds** - the user's keypress data will be sent to the server via a POST every X seconds. Data are also always sent whenever the video is paused, or when the end of the video is reached, regardless of this setting.

**options.clickableButtons** - this option determines whether the buttons can be clicked by the mouse. If you want only keyboard interaction, set this to false. 

**options.controls** - sets whether the video controls are visible or not

##Usage

There are three entry points for the experiment, one that initiates a practice before the video, and one that starts directly with the video stimulus itself. To run through a short practice with instructions, use the following url: 

http://yourserver.com/cinemotion/start.php?subjectid=101&studyid=examplestudy

Change "examplestudy" to your study name to run a different study. 
Subjectid is the subejctid that will be used to identify the uploaded data. 

To run the practice without instructions, use: 

http://yourserver.com/cinemotion/practice.php?subjectid=101&studyid=examplestudy

To skip the practice use a URL like this: 

http://yourserver.com/cinemotion/index.php?subjectid=101&studyid=examplestudy

###Practice screens, start screens, and end screens

Inside the study folder are several html files which you can edit to provide instructions, and messages at the start and end of the experiment. 

**instructions1.html** is the first instructions screen, and the practice will run through as many of these numbered instructions files as there are in your config folder. 

**startscreen.html** is text shown just before the start of the experiment. If you skip the practice, for example, this is the first text your participants will see. 

**endscreen.html** this is shown when the video comes to an end. You can use this to redirect subjects to another video, for example in a multi-part study where you want breaks, or to direct them to a post-video survey or a site that logs their participation. 






