<?php
/*
Template Name: Contact
*/
get_header();
$post_id = 17;

?>

    <!-- contacts -->
    <div class="contacts">

        <!-- contacts__form -->
        <form method="get" action="/" class="contacts__form validation-form">

            <input type="text" name="name" placeholder="שם" data-required />
            <input type="email" name="email" placeholder="דואר אלקטרוני " data-required />
            <input type="tel" name="phone" placeholder="טלפון " data-required />

            <button name="send"><span>שלח</span></button>

            <div class="contacts__message-wrap">

                <div class="contacts__message contacts__message_error">אנא מלאו את כל השדות בצורה תקינה</div>
                <div class="contacts__message contacts__message_success">תודה! נהיה בקשר בקרוב </div>

            </div>

        </form>
        <!-- contacts__form -->

    </div>
    <!-- /contacts -->
        
<?php get_footer(); ?>