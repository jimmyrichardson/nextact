<?php get_header(); ?>
<main>
    <div id="barba-wrapper">
        <div <?php body_class('barba-container'); ?>>

			<?php if( !is_front_page() ){ ?>
			
			<div id="hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>);">
				<div class="container">
					<h1><?= get_the_title(); ?></h1>
				</div>
			</div>
			
			<?php } ?>
			
			<?php
				if( have_rows('page_content') ):
					while ( have_rows('page_content') ) : the_row();
						
// Home Slider
			
if( get_row_layout() == 'home_slider' ): ?>

<?php if( is_front_page() ){ ?>
	
<section id="slider">
	<div id="slide-loader"></div>

	<?php if( have_rows('slides') ){
	while( have_rows('slides') ){ the_row(); ?>
									 
	<div class="slide">
		<div class="slide-content">
			<h3><?php the_sub_field('date'); ?></h3> <!-- date -->
			<h2><?php the_sub_field('name'); ?></h2> <!-- name -->
			<a class="cta ticket-cta" href="<?php the_sub_field('link'); ?>">Get Tickets</a>
		</div>
		<div class="slide-content-bg" style="background-image:url(<?php the_sub_field('image'); ?>);">
		</div>
	</div>
	
	<?php } } ?>
	
	<div id="slide-paginator">
		<button id="slide-prev">
			<span>&larr;</span>Prev
		</button>
		<button id="slide-next">
			<span>&rarr;</span>
			Next
		</button>
		<div id="slide-counter">
			<span id="counter-current">01</span>
			<span>/</span>
			<span id="counter-total">00</span>
		</div>
	</div>
	<span id="scroll-to-begin">
		Scroll to Begin
		<span>&darr;</span>
	</span>
</section>
		
<?php } else { echo "<p style='background:#fafafa;text-align:center;padding:200px;color:#ddd;'>Sorry! The home slider only works on the front page.</p>"; } ?>
			
<?php
			
// 1 Col
	
	elseif( get_row_layout() == '1_col_section' ): ?>
	
<section class="text-overlay">
	<div class="container">
		<?php the_sub_field('1_col_section_content'); ?>
	</div>
</section>
			
<?php
			
// 2 Col
	
	elseif( get_row_layout() == '2_col_section' ): ?>
	
<section class="text-overlay">
	<div class="container">
		<div class="col-2">
			<?php the_sub_field('2_col_section_content_1'); ?>
		</div>
		<div class="col-2">
			<?php the_sub_field('2_col_section_content_2'); ?>
		</div>
	</div>
</section>
			
<?php
			
// 3 Col
	
	elseif( get_row_layout() == '3_col_section' ): ?>
	
<section class="text-overlay">
	<div class="container">
		<div class="col-3">
			<?php the_sub_field('3_col_section_content_1'); ?>
		</div>
		<div class="col-3">
			<?php the_sub_field('3_col_section_content_2'); ?>
		</div>
		<div class="col-3">
			<?php the_sub_field('3_col_section_content_3'); ?>
		</div>
	</div>
</section>
			
<?php
			
// 4 Col
	
	elseif( get_row_layout() == '4_col_section' ): ?>
	
<section class="text-overlay">
	<div class="container">
		<div class="col-4">
			<?php the_sub_field('4_col_section_content_1'); ?>
		</div>
		<div class="col-4">
			<?php the_sub_field('4_col_section_content_2'); ?>
		</div>
		<div class="col-4">
			<?php the_sub_field('4_col_section_content_3'); ?>
		</div>
		<div class="col-4">
			<?php the_sub_field('4_col_section_content_4'); ?>
		</div>
	</div>
</section>
			
<?php
			
// Email Signup
			
			elseif( get_row_layout() == 'email_signup' ): ?>
			
<section id="stay-updated">
	<div class="col-2 bg-col" style="background-image:url(<?php the_sub_field('image'); ?>);">
		<div class="inner">
			<?php the_sub_field('text'); ?>
		</div>
	</div>
	<div class="col-2">
		<form class="email-signup">
			<input type="email" placeholder="Email Address..." />
			<div>
				<p>Send Me Information About:</p>
				<div class="checkbox-info">
					<label><input type="checkbox">Next Act Theatre Events</label>
					<label><input type="checkbox">Other Events at Next Act Theatre</label>
					<label><input type="checkbox">General Next Act Theatre Updates</label>
				</div>
			</div>
			<button class="akz-cond" type="submit">Sign Me up</button>
		</form>
	</div>
</section>

<?php
			
// Support Logo Banner
			
			elseif( get_row_layout() == 'supporter_logos' ): ?>
			
<section id="sponsors" class="text-overlay">
	
	<?php if( have_rows('logos') ){ while(have_rows('logos')){ the_row(); ?>
	
		<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" />
	
	<?php } } ?>

</section>
			
<?php
			
// What's Happening - Event Loop
			
			elseif( get_row_layout() == 'home_whats_happening' ): ?>

<?php if( have_rows('whats_happening_events') ): ?>
			
	<section class="whats-happening text-overlay">
	<h3 class="amiri">What's Happening</h3>
	<div class="filters">
		<button class="cta filter">Upcoming Shows</button>
		<button class="cta filter">News</button>
	</div>
	<div id="home-events-slider" class="container home-events-slider">
		<button id="home-events-prev" class="carousel-arrow">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88.87 5.33" width="80px" height="20px"><polygon points="16.42 0 16.42 4.37 88.87 4.37 88.87 5.33 16.42 5.33 10.62 5.33 0 5.33 16.42 0" style="opacity:0.34"/></svg>
		</button>
		<div id="home-events-slider-inner" class="home-events-slider-inner">
			
	<?php while( have_rows('whats_happening_events') ) : the_row(); ?>
	<?php $event_obj = get_sub_field('event'); ?>
	<?php if ($event_obj){ ?>
	<?php $post = $event_obj; setup_postdata( $post );?>
		
		<div class="event home-event col-3">
			<div class="event-content">
				<h2><?php the_title(); ?></h2>
				<h4 class="date"><?php the_field('date'); ?></h4>
				<h5 class="time"><?php the_field('time'); ?></h5>
				<a class="cta ticket-cta" href="<?php the_permalink(); ?>">Get Tickets</a>
			</div>
			<div class="event-image home-event-image">
				<div class="home-event-image-inner" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>);"></div>
			</div>
		</div>
		
	<?php wp_reset_postdata(); ?>
	<?php } ?>
		<?php endwhile; ?>
			
			</div>
		<button id="home-events-next" class="carousel-arrow">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88.87 5.33" width="80px" height="20px"><polygon points="72.46 0 72.46 4.37 0 4.37 0 5.33 72.46 5.33 78.25 5.33 88.87 5.33 72.46 0" style="opacity:0.34"/></svg>
		</button>
	</div>
	<svg width="100%" height="40%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave">
		<path class="wave-1" d=""/>
		<path class="wave-2" d=""/>
		<path class="wave-3" d=""/>
		<path class="wave-4" d=""/>
		<path class="wave-5" d=""/>
	</svg>
</section>
			
<?php endif; ?>

						<?php endif;
					endwhile;
				else :
				
					if( have_posts() ){ while(have_posts()){ the_post(); ?>
					<section class="text-overlay">
						<?php the_content(); ?>
					</section>
					<?php } }
			
				endif;
			?>
			
        </div>
    </div>
</main>
<?php get_footer(); ?>