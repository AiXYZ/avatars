<?php require_once("header.php"); ?>
    <div class="header">
        <h1><a href="index.php">Let me create again!</a></h1>
    </div>
    <div class="clear"></div>
    <div id="Show">
        <div id="ShowAvatars">
            <img id="bording" src="avatars/<?php echo $_GET['avatar']; ?>.png" />
            <img id="bording" src="avatars/s_<?php echo $_GET['avatar']; ?>.png" />
        </div>
        <div id="ShowButtons">
            <a class="btn btn-info btn-large" target="_TOP" href="avatars/<?php echo $_GET['avatar']; ?>.zip">Download images »</a>
            <div class="clear" style="margin-top: 10px;"></div>
            <a class="btn btn-group btn-large" target="_TOP" href="fb.php?avatar=<?php echo $_GET['avatar']; ?>">Set as Facebook Profile Picture  »</a>
        </div>
    </div>
<?php require_once('footer.php'); ?>
