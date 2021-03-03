<?php get_header(); ?>

<article class="content px-3 py-5 p-md-5">

    <p>this is inside the single.php file. </p>

    <?php
    if (have_posts()) {
        while (have_posts()) {

            the_post();

            // printing the featured image
            the_post_thumbnail();

            // using template-parts to show the content for module approach 
            get_template_part('template-parts/content', 'article');
        }
    }
    ?>

</article>

<?php get_footer(); ?>

log