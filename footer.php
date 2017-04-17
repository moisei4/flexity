<?php
global $flexity_options;
?>


</div><!-- #content -->


<!-- Footer - start -->
<footer class="footer">
	<div class="footer_social">
		<ul class="footer_social_list"> 
			<?php for ($i = 1; $i <= 10; $i++) : ?>
				<?php if (!empty($flexity_options['flexity_footer_color_'.$i]) && !empty($flexity_options['flexity_footer_link_'.$i]) && !empty($flexity_options['flexity_footer_icon_'.$i])) : ?>
				<li>
					<a style="background-color:<?php echo esc_attr($flexity_options['flexity_footer_color_'.$i]); ?>;" rel="nofollow" target="_blank" href="<?php echo esc_url($flexity_options['flexity_footer_link_'.$i]); ?>">
						<?php echo wp_kses_post($flexity_options['flexity_footer_icon_'.$i]); ?>
					</a>
				</li>
				<?php endif; ?>
			<?php endfor; ?>
		</ul>
	</div>
	<div class="footer_inner">
		<div class="footer_content">
			<div class="footer_content_inner">
				<!-- Footer Menu -->
				<div class="footer_menu">
					<?php
					// print wp_nav_menu with menu title
					flexity_print_nav_menu('rw-footer-menu-1');
					?>
				</div>
				<div class="footer_menu">
					<?php
					// print wp_nav_menu with menu title
					flexity_print_nav_menu('rw-footer-menu-2');
					?>
				</div>
				<div class="footer_menu">
					<?php
					// print wp_nav_menu with menu title
					flexity_print_nav_menu('rw-footer-menu-3');
					?>
				</div>
				<div class="footer_menu">
					<?php
					// print wp_nav_menu with menu title
					flexity_print_nav_menu('rw-footer-menu-4');
					?>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="copyright_inner">
				<?php echo stripslashes($flexity_options['flexity_footer_copyright']); ?>
			</div>
		</div>
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