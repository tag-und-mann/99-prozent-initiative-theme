<div class="komitee-nav-mob">
    <div class="search">
        <input type="text" data-type="additional" placeholder="<?php echo __('Mitglied suchen', 'economiesuisse') ?>" >
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg">
    </div>
</div>

<script>
    new ScrollMagic.Scene({
        triggerElement: ".komitee-nav-mob",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".komitee-nav-mob", "visibleBlock")
        .addTo(controller);
</script>