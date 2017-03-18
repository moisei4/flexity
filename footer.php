<?php
global $flexity_options;
?>


</div><!-- #content -->


<!-- Footer - start -->
<footer class="footer">
	<div class="cont footer-top">

		<!-- Footer Menu -->
		<div class="footer-menu">
			<?php
			// print wp_nav_menu with menu title
			flexity_print_nav_menu('rw-footer-menu-1');
			?>
		</div>
		<div class="footer-menu">
			<?php
			// print wp_nav_menu with menu title
			flexity_print_nav_menu('rw-footer-menu-2');
			?>
		</div>
		<div class="footer-menu">
			<?php
			// print wp_nav_menu with menu title
			flexity_print_nav_menu('rw-footer-menu-3');
			?>
		</div>

		<div class="footer-info">
			<?php if (!empty($flexity_options['flexity_footer_form_2'])) : ?>
			<p class="footer-msg"><?php echo esc_html__('Our online support is available', 'flexity') . ' <a class="callback" href="#">' . esc_html__( 'Send us a message', 'flexity' ) . '</a>'; ?></p>
			<?php endif; ?>

			<ul class="footer-social"> 
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
			<?php if (!empty($flexity_options['flexity_footer_form_1'])) : ?>
			<div class="footer-info-form">
			<?php echo do_shortcode($flexity_options['flexity_footer_form_1']); ?>
			</div>
			<?php endif; ?>
		</div>

	</div>
	<div class="copyright">
		<p class="cont"><?php echo esc_attr($flexity_options['flexity_footer_copyright']); ?></p>
	</div>
</footer>
<!-- Footer - end -->

<!-- Modal Form -->
<?php if (!empty($flexity_options['flexity_footer_form_2'])) : ?>
<div id="modal-form" class="modal-form">
	<?php echo do_shortcode($flexity_options['flexity_footer_form_2']); ?>
</div>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>