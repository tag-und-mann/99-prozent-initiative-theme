<?php $w = 1; while($persons->have_posts()): $persons->the_post(); ?>

    <?php if($w == 1): ?>
        <div class="persons-portion">
    <?php endif; ?>

    <div class="simple-row <?php echo $w % 2 == 0 ? 'simple-row-grey' : 'simple-row-white'; ?>">
        <div class="container-main">
            <div class="person-row-content">
                <div class="vorname"><?php echo get_field('person_vorname', get_the_ID()); ?></div>
                <div class="nachname"><?php echo get_field('person_nachname', get_the_ID()); ?></div>
                <div class="funktion"><?php echo get_field('person_funktion', get_the_ID()); ?></div>
                <div class="partei"><?php echo get_field('person_partei', get_the_ID()); ?></div>
                <div class="ort"><?php echo get_field('person_ort', get_the_ID()); ?></div>
            </div>
        </div>
    </div>


    <?php if($w == 50): $w = 0;?>
        </div>
    <?php endif; ?>

<?php $w++; endwhile; ?>