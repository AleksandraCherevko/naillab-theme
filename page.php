<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_page('o-nas') ) {
  get_template_part('page', 'about');
  return;
}


if ( is_page('kontakty') ) {
  get_template_part('page', 'contact');
  return;
}

if ( is_page('obchodni-podminky') ) {
  get_template_part('page', 'terms');
  return;
}

if ( is_page('reklamacni-rad') ) {
  get_template_part('page', 'complaints');
  return;
}

if ( is_page('doprava-a-platba') ) {
  get_template_part('page', 'shipping');
  return;
}

if ( is_page('ochrana-osobnich-udaju') ) {
  get_template_part('page', 'privacy');
  return;
}
if ( is_page('odstoupeni-od-smlouvy') ) {
  get_template_part('page', 'withdrawal');
  return;
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>
