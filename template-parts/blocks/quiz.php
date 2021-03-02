<?php

/**
 * Quiz Block Template.
 */

$id = 'quiz-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$className = 'quiz-gutenberg-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$quiz_title = get_field('quiz_title');
$quiz_form = get_field('quiz_formidable_shortcode');



?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="quiz-block-content">

        <div class="quiz">

            <h2><?php echo $quiz_title; ?></h2>

            <?php echo do_shortcode('[formidable id='.$quiz_form.']'); ?>

        </div>

    </div>

</div>

<script>
    jQuery(function($) {

        let quizEl = $('.quiz');
        let quiz_radios = quizEl.find('.frm_radio');
        let quiz_questions = quizEl.find('.quiz_options');
        let seq = 0;
        let quiz_form_fields = quizEl.find('.hide-label');
        let quiz_form_btn = quizEl.find('.frm_submit');
        let quiz_answer_msg = quizEl.find('.quiz-answer-title');
        let quiz_answer_score = quizEl.find('.quiz-answer-score');
        let quiz_rignt_answers = 0;
        let quiz_number = 0;
        let quiz_next_btn = quizEl.find('.quiz-next-btn');
        let quiz_result_btn = quizEl.find('.quiz-result-btn');
        let quiz_notice_place = quizEl.find('.quiz-notice-place');
        let quiz_link_place = quizEl.find('.quiz-link-place');


        quiz_radios.each(function (key, value) {
            $(value).find('label').addClass('container-radio').append('<span class="checkmark"></span>');
        });

        quiz_questions.each(function (key, value) {
            if(key !== 0){
                $(value).css('display', 'none');
            }
        });

        quiz_form_fields.css('display', 'none');
        quiz_form_btn.css('display', 'none');
        quiz_answer_msg.css('display', 'none');
        quiz_answer_score.css('display', 'none');
        quiz_next_btn.css('display', 'none');
        quiz_result_btn.css('display', 'none');
        quiz_notice_place.css('display', 'none');
        quiz_link_place.css('display', 'none');


        $('body').on('click', '.quiz_options label input', function () {

            $(this).parents('.quiz_options').append("<div class='quiz-noclickable'></div>");

            quiz_number++;

            let answer_array = $(this).val().split('[notice]');
            let answer = answer_array[0].trim();

            let notices_str = '';
            let notice = '';
            let link = '';

            if(answer_array[1]){
                notices_str = answer_array[1];
                notice = answer_array[1].split('[link]')[0];

                if(answer_array[1].split('[link]')[1]){
                    link = answer_array[1].split('[link]')[1];
                }
            }


            if(answer === 'true'){
                $(this).parent('label').css('color', '#85fe85');
                quiz_rignt_answers++;
            }else{
                $(this).parent('label').css('color', 'black');
            }


            quiz_notice_place.html(notice).fadeIn();
            quiz_link_place.html(link).fadeIn();


            const current_question_block = $(this).parents('.quiz_options');
            const current_question_block_inputs = current_question_block.find('input');

            current_question_block_inputs.each(function (key, value) {
                let correct_answer = $(value).val().split('[notice]')[0].trim();
                if(correct_answer === 'true'){
                    $(current_question_block_inputs[key]).parent().css('color', '#85fe85');
                }
            });

            if(seq < quiz_questions.length - 1) {
                quiz_next_btn.fadeIn();
            }else{
                quiz_next_btn.fadeOut();
                quiz_result_btn.fadeIn();
            }

        });


        quiz_next_btn.on('click', function (e) {
            e.preventDefault();

            quiz_next_btn.fadeOut(300);

            quiz_notice_place.fadeOut(300).html('');
            quiz_link_place.fadeOut(300).html('');

            $(quiz_questions[seq]).fadeOut(300, function() {
                $(quiz_questions[seq + 1]).css('display', 'block');

                seq++;
            });

        });

        quiz_result_btn.on('click', function (e) {
            e.preventDefault();

            quiz_notice_place.fadeOut(300).html('');
            quiz_link_place.fadeOut(300).html('');

            $(quiz_questions[seq]).fadeOut(300);

            quiz_result_btn.fadeOut(300);


            quiz_form_fields.delay(300).fadeIn(300);

            let msg = '';

            msg = quiz_answer_score.html().replace('[X]', quiz_rignt_answers);
            quiz_answer_score.html(msg);

            quiz_answer_msg.delay(300).fadeIn(300);
            quiz_answer_score.delay(300).fadeIn(300);
            quiz_form_btn.delay(300).fadeIn(300);

        });

    });
</script>
