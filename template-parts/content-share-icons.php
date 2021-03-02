<?php
$share_url = get_the_permalink(get_the_ID());
$share_image = get_field('header_bild', get_the_ID())['sizes']['medium'];
?>

<a href="http://www.facebook.com/sharer.php?u=<?php echo $share_url; ?>&p[images][0]=<?php echo $share_image; ?>" target="_blank" class="share-facebook" style="color: <?php echo $color; ?>">
    <div class="circle circle-single"><i class="fa fa-facebook" aria-hidden="true"></i></div>
</a>
<a href="https://twitter.com/intent/tweet?text=<?php echo $share_url; ?>" target="_blank" style="color: <?php echo $color; ?>">
    <div class="circle circle-single"><i class="fa fa-twitter" aria-hidden="true"></i></div>
</a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>" target="_blank" class="share-linkedin" style="color: <?php echo $color; ?>">
    <div class="circle circle-single"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
</a>
<a href="https://api.whatsapp.com/send?text=<?php echo $share_url?>" target="_blank" style="color: <?php echo $color; ?>">
    <div class="circle circle-single"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
</a>
