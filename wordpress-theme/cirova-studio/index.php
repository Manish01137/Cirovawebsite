<?php
/**
 * Main fallback template (required by WordPress).
 * Renders posts/archives inside the theme chrome.
 *
 * @package Cirova_Studio
 */
get_header();
?>
<main>
	<section class="section" style="padding-top:calc(var(--nav-h) + 3rem)">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="grid grid--3">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article class="card">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="muted"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
						</article>
						<?php
					endwhile;
					?>
				</div>
				<div style="margin-top:2rem"><?php the_posts_pagination(); ?></div>
			<?php else : ?>
				<h1 class="h1">Nothing here yet</h1>
				<p class="lead">No content found. Head back <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a>.</p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
