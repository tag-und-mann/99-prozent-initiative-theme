
<div class="card-container card-testimonial delay-<?php echo $counter_class; ?>" data-counter="<?php echo $counter; ?>">

    <div class="card-content-wrapper">

        <?php if ($testimonial_id): ?>
            <div class="divider"></div>
        <?php endif; ?>

        <div class="content">
            <p class="text text-white"><?php echo get_field('person_testimonial_text', $testimonial_id); ?></p>

            <p class="name text-white margin-bottom-0">
                <?php echo get_field('person_vorname', $testimonial_id); ?>
                <?php echo get_field('person_nachname', $testimonial_id); ?>
            </p>
            <p class="function text-white margin-bottom-0">
                <?php echo get_field('person_funktion', $testimonial_id); ?>
            </p>
        </div>

    </div>

</div>

<?php wp_reset_postdata(); ?>