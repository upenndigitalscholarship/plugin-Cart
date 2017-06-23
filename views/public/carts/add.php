<?php
echo queue_css_file('poster');

$pageTitle = html_escape(get_option('poster_page_title'));
echo head(array('title' => $pageTitle, 'bodyclass' => 'posters add'));
?>
<div id="primary">
<h1><?php echo __('Add to a Cart'); ?></h1>
<?php $posters = $this->posters; ?>
<?php if(current_user()): ?>
    <?php if(count($posters) == 0): ?>
        <?php echo __("There are no carts yet."); ?>
    <?php endif; ?>
    <a href="<?php echo public_url(array('controller'=> 'posters', 'action' => 'new')); ?>" class="btn btn-success">Add a Cart</a>
<?php else: ?>
    <a href="<?php echo url('users/login'); ?>">Login</a>
<?php endif; ?>
<br>
<table id="posters">
    <thead>
        <div class="jSplitter">
      <h3><th id="poster-titles"><?php echo __('Title'); ?></th></h3>
        <th id="poster-dates"><?php echo __('Date Added'); ?></th>
        <th id="poster-descriptions"><?php echo __('Description'); ?></th>
    </thead>
    </div>
    
   <?php  $poster = 3 ?> <!--test-->
    
<?php foreach($posters as $poster): ?>

    <tr class="poster">
        
        <td class="poster-title">
            
            <h3><a href="<?php echo html_escape(url(array('action' => 'show','id'=>$poster->id), get_option('poster_page_path'))); ?>"
            
            class="view-poster-link"><?php echo html_escape($poster->title); ?></a></h3>
            
            <ul class="poster-actions">
                
            <?php if($this->user) : ?>
                <li><a class="btn btn-warning" href="<?php echo html_escape(url(array('action'=>'edit','id' => $poster->id), get_option('poster_page_path'))); ?>">Add</a></li>
                
            <?php endif; ?>
                  
            </ul>
            <br>
        </td>
        <td class="poster-date"><?php echo html_escape(format_date($poster->date_created)); ?></td>
        <td><?php echo html_escape(snippet($poster->description,0, 200)); ?></td>
        </ul>
    </tr>
<?php endforeach; ?>
</table>
</div>
<?php echo foot(); ?>
