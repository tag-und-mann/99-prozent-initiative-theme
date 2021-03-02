<div class="komitee-nav">

    <div class="vorname">
        <input type="text" data-type="main" placeholder="<?php echo __('Vorname', 'economiesuisse') ?>" >
    </div>

    <div class="nachname">
        <input type="text" data-type="main" placeholder="<?php echo __('Nachname', 'economiesuisse') ?>" >
    </div>

    <div class="funktion">
        <input type="text" data-type="main" placeholder="<?php echo __('Funktion', 'economiesuisse') ?>" >
    </div>

    <div class="partei">
        <input type="text" data-type="main" placeholder="<?php echo __('Unternehmen / Partei', 'economiesuisse') ?>" >
    </div>

    <div class="ort">
        <input type="text" data-type="main" placeholder="<?php echo __('Kanton', 'economiesuisse') ?>" >
    </div>

    <div class="search">
        <input type="text" data-type="additional" placeholder="<?php echo __('Mitglied suchen', 'economiesuisse') ?>" >
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg">
    </div>
</div>

<script>
    new ScrollMagic.Scene({
        triggerElement: ".komitee-nav",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".komitee-nav", "visibleBlock")
        .addTo(controller);
</script>