<?php $w = 1; while($persons->have_posts()): $persons->the_post(); $counter = uniqid(); ?>

    <?php if($w < 5): ?>

    <div class="person-block-container <?php echo $w % 2 == 0 ? 'person-block-container-grey' : 'person-block-container-white'; ?>" data-counter="<?php echo $counter; ?>" data-id="<?php echo get_the_ID(); ?>">
        <div class="container-main">
            <div class="person-info">

                <div class="person-info-row">
                    <div><?php echo __('Vorname', 'economiesuisse'); ?></div>
                    <div><?php echo get_field('person_vorname', get_the_ID()); ?></div>
                </div>

                <div class="person-info-row">
                    <div><?php echo __('Nachname', 'economiesuisse'); ?></div>
                    <div><?php echo get_field('person_nachname', get_the_ID()); ?></div>
                </div>

                <div class="person-info-row">
                    <div><?php echo __('Funktion', 'economiesuisse'); ?></div>
                    <div><?php echo get_field('person_funktion', get_the_ID()); ?></div>
                </div>

                <div class="person-info-row">
                    <div><?php echo __('Unternehmen / Partei', 'economiesuisse'); ?></div>
                    <div><?php echo get_field('person_partei', get_the_ID()); ?></div>
                </div>

                <div class="person-info-row">
                    <div><?php echo __('Kanton', 'economiesuisse'); ?></div>
                    <div><?php echo get_field('person_ort', get_the_ID()); ?></div>
                </div>

            </div>
        </div>
    </div>

    <script>
        new ScrollMagic.Scene({
            triggerElement: ".komitee-mitglieders-container-mob .person-block-container[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".komitee-mitglieders-container-mob .person-block-container[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);
    </script>

    <?php endif; ?>

<?php $w++; endwhile; ?>