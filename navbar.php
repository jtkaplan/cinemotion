<nav class="navbar navbar-expand-lg navbar-dark bg-dark-cinemotion">
    <a class="navbar-brand" href="#"><img src="cinemotion.png" width="30" height="30" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Cinemotion <span class="sr-only">(current)</span></a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Help</a>-->
<!--            </li>-->
        </ul>
        <ul class="navbar-nav navbar-right">
            <?php
            if (basename($_SERVER['PHP_SELF'])=="index.php") {
                echo  "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" onClick='toggleLog();'>Toggle event log</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>