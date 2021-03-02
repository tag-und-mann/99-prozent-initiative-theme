<?php if(get_field('socials_facebook', 'options')): ?>
    <a href="<?php the_field('socials_facebook', 'options'); ?>" target="_blank">
        <div class="circle"><i class="fa fa-facebook" aria-hidden="true"></i></div>
    </a>
<?php endif; ?>

<?php if(get_field('socials_twitter', 'options')): ?>
    <a href="<?php the_field('socials_twitter', 'options'); ?>" class="socials-twitter" target="_blank">
        <div class="circle"><i class="fa fa-twitter" aria-hidden="true"></i></div>
    </a>
<?php endif; ?>

<?php if(get_field('socials_linkedin', 'options')): ?>
    <a href="<?php the_field('socials_linkedin', 'options'); ?>" class="socials-twitter" target="_blank">
        <div class="circle"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
    </a>
<?php endif; ?>

<?php if(get_field('socials_youtube', 'options')): ?>
    <a href="<?php the_field('socials_youtube', 'options'); ?>" class="socials-youtube" target="_blank">
        <div class="circle"><i class="fa fa-youtube-play" aria-hidden="true"></i></div>
    </a>
<?php endif; ?>


