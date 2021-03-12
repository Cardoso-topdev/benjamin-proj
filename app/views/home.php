<?php
use Prismic\Dom\RichText;
 
$document = $WPGLOBAL['document'];
?>
 
<?php include_once 'header.php'; ?>
    
<div class="welcome">
    <img src="<?= $document->data->image->url ?>" class="star"/>
    <h1><?= RichText::asText($document->data->title) ?></h1>
    <div>
        <?= RichText::asHtml($document->data->description) ?>
    </div>
</div>
 
<?php include_once 'footer.php'; ?>