<?php /**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header header-main header-main--collapse">
		<div class="l-main-header-inner">
			<div class="container l-container">
				<div class="l-row">

					<div class="l-column l-column-left">
						<div class="header-main__site-logo">
							<a href="<?php echo get_site_url() ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/site-logo.png" alt="" class="header-main__site-logo-img">
							</a>
						</div>
					</div>

					<div class="l-column l-column-right">
						<nav class="header-main__navigation navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'navigation__menu navigation__menu--align-right' ) ); ?>
						</nav>
					</div>

				</div>
			</div>
		</div>
	</header>