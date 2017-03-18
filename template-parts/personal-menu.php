<?php global $flexity_options; ?>

<ul class="cont-sections">
    <?php if (isset($flexity_options['compare']['id'])) : ?>
    <li<?php if (get_the_id() == $flexity_options['compare']['id']) echo ' class="active"'; ?>>
        <a href="<?php echo ($flexity_options['compare']['id']) ? get_permalink($flexity_options['compare']['id']) : ''; ?>"><?php echo esc_html__('Compare list', 'flexity'); ?> <span><?php echo count($flexity_options['compare']['list'])?></span></a>
    </li>
    <?php endif; ?>
    <?php if (isset($flexity_options['wishlist']['id'])) : ?>
    <li<?php if (get_the_id() == $flexity_options['wishlist']['id']) echo ' class="active"'; ?>>
        <a href="<?php echo ($flexity_options['wishlist']['id']) ? get_permalink($flexity_options['wishlist']['id']) : ''; ?>"><?php echo esc_html__('Wishlist', 'flexity'); ?> <span><?php echo (!empty($flexity_options['wishlist']['count'])) ? $flexity_options['wishlist']['count'] : '0'; ?></span></a>
    </li>
    <?php endif; ?>
    <?php if ( class_exists( 'WooCommerce' ) && $flexity_options['cart']['url'] ) : ?>
    <li<?php if (get_the_id() == $flexity_options['cart']['id']) echo ' class="active"'; ?>>
        <a href="<?php echo esc_url($flexity_options['cart']['url']); ?>"><?php echo esc_html__('Shopping Cart', 'flexity'); ?> <span><?php echo WC()->cart->get_cart_contents_count()?></span></a>
    </li>
    <?php endif; ?>
    <?php if ( class_exists( 'WooCommerce' ) && $flexity_options['checkout']['url'] ) : ?>
    <li<?php if (get_the_id() == $flexity_options['checkout']['id']) echo ' class="active"'; ?>>
        <a href="<?php echo esc_url($flexity_options['checkout']['url']); ?>"><?php echo esc_html__('Checkout', 'flexity'); ?></a>
    </li>
    <?php endif; ?>
    <li class="cont-sections-more"><span><?php esc_html_e('...', 'flexity'); ?></span><ul class="cont-sections-sub"></ul></li>
</ul>