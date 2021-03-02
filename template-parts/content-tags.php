<?php

if($type == 'quiz'){
    $tags = get_the_terms($post_id, 'quiz_tag');
}else{
    $tags = get_the_terms($post_id, 'post_tag');
}

?>

<?php if ($tags):  ?>
    <?php foreach ($tags as $tag):  ?>
        <span class="tag"><?php echo $tag->name; ?></span>
    <?php endforeach;  ?>
<?php endif;  ?>