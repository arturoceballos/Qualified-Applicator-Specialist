<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="cmsms_tabs tabs_mode_tab cmsms_woo_tabs">
		<ul class="cmsms_tabs_list">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab cmsms_tabs_list_item">
					<a href="#tab-<?php echo $key ?>">
						<span><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></span>
					</a>
				</li>

			<?php endforeach; ?>
		</ul>
		<div class="cmsms_tabs_wrap">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<div class="entry-content cmsms_tab" id="tab-<?php echo $key ?>">
					<div class="cmsms_tab_inner">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>