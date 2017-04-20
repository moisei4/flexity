<div class="post_share_wrap">
	<ul class="post_share">
		<?php
		foreach ($flexity_options['flexity_other_share'] as $share) {
			switch ($share) {
				case 'facebook':
					?>
					<li>
						<a class="post_share_facebook" onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo esc_url( get_permalink() ); ?>','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Facebook', 'flexity' ); ?>" href="javascript:">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<?php
					break;
				case 'twitter':
					?>
					<li>
						<a class="post_share_twitter" onclick="popUp=window.open('http://twitter.com/home?status=<?php echo esc_attr( get_the_title() ); ?> <?php echo esc_url( get_permalink() ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Twitter', 'flexity' ); ?>" href="javascript:;">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<?php
					break;
				case 'vk':
					?>
					<li>
						<a class="post_share_vk" onclick="popUp=window.open('http://vk.com/share.php?url=<?php echo esc_url( get_permalink() ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on VK', 'flexity' ); ?>" href="javascript:;">
							<i class="fa fa-vk"></i>
						</a>
					</li>
					<?php
					break;
				case 'pinterest':
					?>
					<li>
						<a class="post_share_pinterest" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Pinterest', 'flexity' ); ?>" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ); ?>&amp;description=<?php echo esc_attr( get_the_title() ); ?>&amp;media=<?php $arrImages = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						echo has_post_thumbnail() ? esc_attr( $arrImages[0] ) : ""; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
							<i class="fa fa-pinterest"></i>
						</a>
					</li>
					<?php
					break;
				case 'gplus':
					?>
					<li>
						<a class="post_share_gplus" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Google +1', 'flexity' ); ?>" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
					<?php
					break;
				case 'linkedin':
					?>
					<li>
						<a class="post_share_linkedin" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Linkedin', 'flexity' ); ?>" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( get_permalink() ); ?>&amp;title=<?php echo esc_attr( get_the_title() ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
							<i class="fa fa-linkedin"></i>
						</a>
					</li>
					<?php
					break;
				case 'tumblr':
					?>
					<li>
						<a class="post_share_tumblr" data-toggle="tooltip" title="<?php echo esc_html__( 'Share on Tumblr', 'flexity' ); ?>" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=<?php echo esc_url( get_permalink() ); ?>&amp;name=<?php echo esc_attr(  get_the_title() ); ?>&amp;description=<?php echo esc_attr( urlencode( get_the_excerpt() ) ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
							<i class="fa fa-tumblr"></i>
						</a>
					</li>
					<?php
					break;
			}
		}
		?>
	</ul>
</div>