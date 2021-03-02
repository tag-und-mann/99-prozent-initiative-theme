<header class="page-header">
    <div class="container-main">
        <div class="container-header-text page-header-content">
            <h1>
                <span>
                    <?php echo is_404() ? get_field('page_404_header_long_title', 'option') : get_field('page_header_long_title'); ?>
                </span>
            </h1>

            <div class="text">
                <?php echo apply_filters('the_content', is_404() ? get_field('page_404_header_text', 'option') : get_field('page_header_text')); ?>
            </div>
        </div>
    </div>
</header>