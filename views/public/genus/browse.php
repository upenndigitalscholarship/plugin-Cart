<?php
$pageTitle = __('Browse Genus');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>


<?php
echo '<br/>';
$family =  htmlspecialchars($_GET['family']);
htmlspecialchars($_POST['family']);
?>

<input type="hidden" name="family" value="<?php //echo $family; ?>">

<?php
echo '<h2>Family: ' . $family . ' </h2>';
echo '<br/>';

if (!empty($genera)) {
    foreach ($genera as $genus) {  
    $genus_item = get_record('Item', array('advanced' =>
        array(
            array(
                'element_id' => 93,
                'type' => 'is exactly',
                'terms' => $genus
            )
        )
    ));        
        echo '<div class="big-family-box">';
            echo '<div class="family-guy">';
                echo "<h3><a id=\"genus_link\" href = \"http://pennds.org/archaebot_database/genus/show?genus=" . $genus . "\">" . ucfirst($genus) . "</a></h3>";
                htmlspecialchars($_POST[$genus]);
                echo item_image('square_thumbnail', null, null, $genus_item);
            echo '</div>';
        echo '</div>';    
    }
}
else { echo '<h3>There are no items in this family.</h3>'; }
?>
<?php echo foot(); ?>
