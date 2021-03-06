<?php
$view = get_view();
echo js_tag('vendor/tiny_mce/tiny_mce');
?>
<script type="text/javascript">
jQuery(window).load(function () {
    Omeka.wysiwyg({
        mode: 'specific_textareas',
        editor_selector: 'wysiwyg'
    });
});
</script>
<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart Page Title'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <p class='explanation'><?php echo __("Replace default Cart page title."); ?></p>
        <input name="poster_page_title" value="<?php echo get_option('poster_page_title'); ?>" type="text" />
    </div>
</div>

<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart Page Path'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <p class='explanation'><?php echo __("Replace default Cart page path."); ?>
        </p>
        <input name="poster_page_path" value="<?php echo get_option('poster_page_path'); ?>" type="text" />
    </div>
</div>

<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart Page Disclaimer'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <p class='explanation'><?php echo __("Replace default Cart Disclaimer."); ?>
        </p>
        <textarea name="poster_disclaimer" rows="8" cols="40"><?php echo get_option('poster_disclaimer'); ?></textarea>
    </div>
<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart Page Help'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <p class='explanation'><?php echo __("Replace default Cart Help."); ?>
        </p>
        <textarea name="poster_help" rows="8" cols="40" class="wysiwyg"><?php echo get_option('poster_help'); ?></textarea>
    </div>
</div>
<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart File Size'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <p class='explanation'><?php echo __("Select image size for item show page."); ?>
        </p>

        <select name="poster_default_file_type" >
        <?php foreach(array('fullsize','thumbnail') as $ftype): ?>
                <?php if($ftype == get_option('poster_default_file_type')): ?>
                    <option  value="<?php echo $ftype; ?>" selected ><?php echo $ftype; ?></option>
                <?php else: ?>
                    <option  value="<?php echo $ftype; ?>"><?php echo $ftype; ?></option>
                <?php endif; ?>
        <?php endforeach; ?>
        </select>
  
        <p class='explanation'><?php echo __("Select image size for print page."); ?>
        </p>
        <select name="poster_default_file_type_print">
        <?php foreach(array('fullsize','thumbnail') as $ftype): ?>
                <?php if($ftype == get_option('poster_default_file_type_print')): ?>
                    <option  value="<?php echo $ftype; ?>" selected ><?php echo $ftype; ?></option>
                <?php else: ?>
                    <option  value="<?php echo $ftype; ?>"><?php echo $ftype; ?></option>
                <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="field">
    <div class="two columns alpha">
        <label><?php echo __('Cart Display Show Page'); ?></label>    
    </div>
    <div class="inputs five columns omega" >
        <?php 
        $layout = get_option('poster_show_option');
        $carousel = ($layout == 'carousel') ? 'selected' : '';
        $static = ($layout == 'static') ? 'selected' : '';
        ?>
        <select name="poster_show_option">
            <option value="carousel" <?php echo $carousel; ?>>Carousel</option>
            <option value="static" <?php echo $static; ?>>Static</option>
        </select>
    </div>
</div>

