<?php
/**
 * Fallback template for any Page that doesn't have a dedicated page-{slug}.php.
 * Renders the page's editor content inside the theme chrome.
 *
 * @package Cirova_Studio
 */
get_header();
?>
<main>
	<section class="section" style="padding-top:calc(var(--nav-h) + 3rem)">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<h1 class="h1" style="margin-bottom:1.5rem"><?php the_title(); ?></h1>
				<div class="lead" style="max-width:72ch">
					<?php the_content(); ?>
				</div>
				<?php
			endwhile;
			?>
		</div>
	</section>
</main>
<?php
get_footer();
