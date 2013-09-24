<?php get_header(); ?>

<?php if ( in_category('newsletter'))  {
            locate_template('single-newsletter.php', true, false);
        }
       elseif ( in_category('voices')) {
            locate_template('single-voice.php', true, false);
       }
        else {
            locate_template('single-default.php', true, false);
        }

 get_footer(); ?>
