<?php require_once("header.php"); ?>
    <div class="header">
        <h1>Select parts and create your own Avatar!</h1>
    </div>
    <ul id="navi">
    <?php foreach($Main->GetPartNames() as $Name): ?>
        <li><a href="#<?php echo $Name; ?>" title="<?php echo $Name; ?>"><img src="assets/navi/<?php echo $Name; ?>.png" alt="<?php echo $Name; ?>" /></a></li>
    <?php endforeach; ?>
    </ul>
    <?php foreach($Main->GetPartNames() as $Name): ?>
    <div class="clear"></div>
    <div class="content" id="<?php echo $Name; ?>">
        <ul id="previews">
            <?php foreach($Main->GetPreviews($Name) as $previews): ?>
            <?php echo '<li><img class="'.$Name.'" data="'.$previews.'" src="assets/preview/'.$Name.'/'.$previews.'" /></li>'; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endforeach; ?>
    <div id="character">
    	 <div id="RealAvatar">
                <img class="body" src="assets/parts/body/body_01.png" />
            <?php foreach($Main->GetPartNames() as $Name): ?>
                <img class="<?php echo $Name; ?>" src="assets/parts/<?php echo $Name; ?>/<?php echo $Name; ?>_01.png" />
            <?php endforeach; ?>
    	 </div>
        <form id="AvatarInputs">
            <input class="background" name="background" value="background/background_01" />
            <input class="body" name="body" value="body/body_01" />
            <?php foreach($Main->GetPartNames() as $Name): ?>
                <input class="<?php echo $Name; ?>" name="<?php echo $Name; ?>" value="<?php echo $Name; ?>/<?php echo $Name; ?>_01" />
            <?php endforeach ;?>
        </form>
         <a id="generate" class="btn btn-info btn-large">Generate Your Avatar!</a>
    </div>
<?php require_once('footer.php'); ?>