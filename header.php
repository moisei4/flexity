<?php
global $flexity_options;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if (!empty($flexity_options['flexity_favicon'])) : ?>
<link rel="shortcut icon" href="<?php echo esc_attr($flexity_options['flexity_favicon']); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo esc_attr($flexity_options['flexity_favicon']); ?>" type="image/x-icon">
<?php endif; ?>
	
<?php wp_head(); ?>
</head>
<body <?php
$sticky_header = '';
if (!empty($flexity_options['flexity_header_sticky']) && $flexity_options['flexity_header_sticky']) {
	$sticky_header = 'header-sticky';
}
body_class($sticky_header);
?>>

<div id="page" class="site">

<?php if (!empty($flexity_options['flexity_header_topbar']) && $flexity_options['flexity_header_topbar']) : ?>
<!-- TopBar - start -->
<div class="topbar">
	<?php
	if (
		!empty($flexity_options['flexity_header_address_ttl']) ||
		!empty($flexity_options['flexity_header_address']) ||
		!empty($flexity_options['flexity_header_contacts_ttl']) ||
		!empty($flexity_options['flexity_header_contacts']) ||
		!empty($flexity_options['flexity_header_phone_ttl']) ||
		!empty($flexity_options['flexity_header_phone'])
	) :
	?>
	<ul class="topbar-address">
		<?php if (!empty($flexity_options['flexity_header_address_ttl']) || !empty($flexity_options['flexity_header_address'])) : ?>
		<li>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ico1.png" alt="">
			<span>
			<?php if (!empty($flexity_options['flexity_header_address_ttl'])) : ?><span><?php echo esc_attr($flexity_options['flexity_header_address_ttl']); ?></span><?php endif; ?> <?php if (!empty($flexity_options['flexity_header_address'])) echo esc_attr($flexity_options['flexity_header_address']); ?>
			</span>
		</li>
		<?php endif; ?>
		<?php if (!empty($flexity_options['flexity_header_contacts_ttl']) || !empty($flexity_options['flexity_header_contacts'])) : ?>
		<li>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ico2.png" alt="">
			<span>
				<?php if (!empty($flexity_options['flexity_header_contacts_ttl'])) : ?><span><?php echo esc_attr($flexity_options['flexity_header_contacts_ttl']); ?></span><?php endif; ?> <?php if (!empty($flexity_options['flexity_header_contacts'])) echo esc_attr($flexity_options['flexity_header_contacts']); ?>
			</span>
		</li>
		<?php endif; ?>
		<?php if (!empty($flexity_options['flexity_header_phone_ttl']) || !empty($flexity_options['flexity_header_phone'])) : ?>
		<li>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ico3.png" alt="">
			<span>
				<?php if (!empty($flexity_options['flexity_header_phone_ttl'])) : ?><span><?php echo esc_attr($flexity_options['flexity_header_phone_ttl']); ?></span><?php endif; ?> <?php if (!empty($flexity_options['flexity_header_phone'])) echo esc_attr($flexity_options['flexity_header_phone']); ?>
			</span>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	<ul class="topbar-social">
		<?php for ($i = 1; $i <= 10; $i++) : ?>
			<?php if (!empty($flexity_options['flexity_footer_link_'.$i]) && !empty($flexity_options['flexity_footer_icon_'.$i])) : ?>
				<li>
					<a rel="nofollow" target="_blank" href="<?php echo esc_url($flexity_options['flexity_footer_link_'.$i]); ?>">
						<?php echo wp_kses_post($flexity_options['flexity_footer_icon_'.$i]); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endfor; ?>
	</ul>
</div>
<!-- TopBar - end -->
<?php endif; ?>

<!-- Header - start -->
<header id="masthead" class="header">

	<!-- Navmenu Mobile Toggle Button -->
	<a href="#" class="header-menutoggle" id="header-menutoggle"><?php echo esc_html__('Menu', 'flexity'); ?></a>
	
	<!-- Logotype -->
	<?php if ($flexity_options['flexity_header_logo']) : ?>
	<div class="header_logo">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr($flexity_options['flexity_header_logo']); ?>" alt="<?php bloginfo('sitename'); ?>"></a>
	</div>
	<?php endif; ?>
	
	<div class="header_middle">
		<div class="header-info">

			<!-- Search Form -->
			<div class="header_search_wrap">
				<a href="#" class="header_search_btn stockware_theme_icon_header_search" id="header-searchbtn"></a>
				<div class="header_search">
					<a href="#" class="header_search_close"></a>
					<?php get_search_form(); ?>
				</div>
			</div>
			
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>

			<!-- Personal Menu -->
			<div class="header-personal">
				<?php if (is_user_logged_in()) : ?>
				<a class="header-gopersonal" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"></a>
				<ul>
					<?php if (!empty($flexity_options['compare']['id'])) : ?>
					<li>
						<a href="<?php echo ($flexity_options['compare']['id']) ? get_permalink($flexity_options['compare']['id']) : ''; ?>"><?php echo esc_html__('Compare list', 'flexity'); ?> <span><?php echo count($flexity_options['compare']['list'])?></span></a>
					</li>
					<?php endif; ?>
					<?php if (!empty($flexity_options['wishlist']['id'])) : ?>
					<li>
						<a href="<?php echo ($flexity_options['wishlist']['id']) ? get_permalink($flexity_options['wishlist']['id']) : ''; ?>"><?php echo esc_html__('Wishlist', 'flexity'); ?> <span><?php echo esc_attr($flexity_options['wishlist']['count']); ?></span></a>
					</li>
					<?php endif; ?>
					<li class="header-personal-cart">
						<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"><?php echo esc_html__('Shopping Cart', 'flexity'); ?> <span><?php echo WC()->cart->get_cart_contents_count()?></span></a>
					</li>
					<li class="header-order">
						<a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>"><?php echo esc_html__('Checkout', 'flexity'); ?></a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html__('My Account', 'flexity'); ?></a>
					</li>
					<li>
						<a href="<?php echo esc_url(wc_customer_edit_account_url()); ?>"><?php echo esc_html__('Settings', 'flexity'); ?></a>
					</li>
					<li>
						<a href="<?php echo esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>"><?php echo esc_html__('Log out', 'flexity'); ?></a>
					</li>
				</ul>
				<?php else : ?>
				<a class="header-gopersonal" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"></a>
				<ul>
					<li>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('Login / Register','flexity'); ?></a>
					</li>
				</ul>
				<?php endif; ?>
			</div>

			<!-- Small Cart -->
			<div class="header_cart_wrap">
				<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="header-cart">
					<div class="header-cart-inner">
						<span class="header-cart-count">
							<i class="stockware_theme_icon_header_cart"></i>
							<span><?php echo WC()->cart->get_cart_contents_count()?></span>
						</span>
						<span class="header-cart-summ"><?php echo WC()->cart->get_cart_total(); ?></span>
					</div>
				</a>
			</div>
			
			<?php endif; ?>

			<?php if (!empty($flexity_options['compare']['id'])) : ?>
			<a href="<?php echo (!empty($flexity_options['compare']['id'])) ? get_permalink($flexity_options['compare']['id']) : ''; ?>" class="header-compare"><?php if (count($flexity_options['compare']['list'])) : ?><span><?php echo count($flexity_options['compare']['list'])?></span><?php endif; ?></a>
			<?php endif; ?>
			<?php if (!empty($flexity_options['wishlist']['id'])) : ?>
			<a href="<?php echo (!empty($flexity_options['wishlist']['id'])) ? get_permalink($flexity_options['wishlist']['id']) : ''; ?>" class="header-favorites"><?php if (!empty($flexity_options['wishlist']['count'])) : ?><span><?php echo esc_attr($flexity_options['wishlist']['count']); ?></span><?php endif; ?></a>
			<?php endif; ?>

		</div>

		<!-- Navmenu - start -->
		<?php
		wp_nav_menu( array(
			'theme_location' => 'rw-top-menu',
			'container' => 'nav',
			'container_class' => '',
			'container_id' => 'top-menu',
			'items_wrap' => '<ul id="navigation">%3$s</ul>',
		) );
		?>
		<!-- Navmenu - end -->
	</div>
	
	<div class="header_right">
		<a href="#" class="button">Purchase</a>
	</div>

</header>
<!-- Header - end -->

<div id="content" class="site-content">