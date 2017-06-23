<?php
$pageTitle = __('Browse Families');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>

<?php 
//list of families linking to genus browse
echo '<br/>';

foreach ($families as $family) {    
    echo '<div class="big-family-box">';
        echo '<div class="family-guy">';
            echo "<h3><a id=\"family_link\" href = \"http://pennds.org/archaebot_database/genus/browse?family=". $family . "\">" . ucfirst($family) . "</a></h3>";
            echo '<br/><br/>';
        echo '</div>';
   echo '</div>';
}
?>


<?php
fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this));
echo foot(); 
?>