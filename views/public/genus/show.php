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
echo pagination_links(
    array(
        'url' => url(
            array(
                'controller' => 'Item', 
                'action' => 'items', 
                'page' => null
            )
        )
    )
);
?>

<?php
foreach ($species as $sp) {
    echo $sp . '<br/>';
}
?>

<div id="item-list">
    <?php echo item_search_filters(); ?>
    <?php if (!has_loop_records('items')): ?>
            <p><?php echo __('There are no items to choose from.'); ?></p>
    <?php endif; ?>
    <?php foreach(loop('items') as $item): ?>
        <?php echo posterItemListing($item); ?>
    <?php endforeach; ?>
</div>

<?php 
function posterItemListing($item){
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

    $html .= '<h4 class="title">'
          . metadata($item, array('Dublin Core', 'Title'))
          . '</h4>'
          . '<button type="button" class="select-item" >' . __('Select Item').'</button>'
          . '</div>';

    return $html;
}
?>