<?php
$pageTitle = __('Browse Species');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php
echo pagination_links();
?>

<?php
if (empty($species)) {
    echo "There are no items in this genus.";
}
?>

<div id="item-list">
    <?php echo item_search_filters(); ?>
    <?php if (!has_loop_records('items')): ?>
            <p><?php echo __('There are no items to choose from.'); ?></p>
    <?php endif; ?>
    <?php 
    $i = 0;
    foreach(loop('items') as $item): ?>
        <?php 
      //  echo 'id: ' . metadata($item,'id');
        echo posterItemListing($item, $species[$i]);
        $i = $i + 1;
        ?>
    <?php endforeach; ?>
</div>

<?php 
function posterItemListing($item, $sp) {
    $html = '<div class="item-listing" data-item-id="'. $item->id .'">';
    if (metadata($item, 'has files')) {
        foreach($item->Files as $displayFile) {
            if($displayFile->hasThumbnail()) {
                $html .= '<div class="item-file">'
                      . file_image('square_thumbnail', array(), $displayFile)
                      . '</div>';
                break;
            }
        }
    }

    //$html .= '<a href="http://pennds.org/archaebot_database/items/show/278"><h3 class="title">'
    $html .= '<a href="http://pennds.org/archaebot_database/items/show/' . /*$item->id*/ 270 . '"><h4 class="title">'
          //. metadata($item, array('Dublin Core', 'Title'))
          . $sp
          . '</h4></a>'
          . '<button type="button" class="select-item" >' . __('Select Item').'</button>'
          . '</div>';

    return $html;
}
?>