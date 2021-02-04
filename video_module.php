<div class="mx-auto" style="width: <?=$movie_width?>px;">

    <video
        id="my-video"
        class="video-js"
        preload="auto"
        width="<?=$movie_width?>"
        height="<?=$movie_height?>"
        poster="<?=$movie_poster?>"
        data-setup="{}"
    >
        <?php if ($movie2_filename) {
            echo "<source src=\"$movie2_filename\" type=\"video/$movie2_type\" />";
        }
        ?>


        <source src="<?=$movie_filename?>" type="<?=$movie_type_prefix?>/<?=$movie_type?>" />

        <?php
        if ($captions_file){
            echo "<track kind=\"captions\" src=\"$captions_file\" srclang=\"$captions_lang\" label=\"$captions_label\" default>";
        }
        ?>


        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
    <br>
    <?php

    //some values we need to give to javascript
    echo "<input type=hidden id=\"allOffKey\" value=\"$all_off_key\">";
    include('buttons_module.php');
    ?>


    <br>  <br>  <br>
    <!--    <button type="button" class="btn btn-outline-dark btn-sm" id="toggleLog" onClick="toggleLog();">Toggle log</button>-->
    <!--    <button type="button" class="btn btn-outline-dark btn-sm" id="sendData" onClick="sendData();">Send data</button>-->
    <br>
    <div class="card overflow-auto" id="eventCard">
        <div class="card-body">
            <h5 class="card-title">Event log</h5>
            <p class="card-text" id="eventLog"></p>
        </div>
    </div>
</div>
