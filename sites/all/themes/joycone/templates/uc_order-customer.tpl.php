<?php
// $Id: uc_order-customer.tpl.php,v 1.1.2.1 2010/07/16 15:45:09 islandusurper Exp $

/**
 * @file
 * This file is the default customer invoice template for Ubercart.
 */
?>

<table width="600px" border="0" cellspacing="0" cellpadding="1" align="center" bgcolor="#006699" style="font-family: verdana, arial, helvetica; font-size: small;">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bgcolor="#FFFFFF" style="font-family: verdana, arial, helvetica; font-size: small;">
        <?php if ($business_header) { ?>
        <tr valign="top">
          <td>
            <table width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">
              <tr>
                <td>
                  <?php echo $site_logo; ?>
                </td>
                <td width="98%">
                  <div style="padding-left: 1em;">
                  <span style="font-size: large;"><?php echo $store_name; ?></span><br />
                  <?php echo $site_slogan; ?>
                  </div>
                </td>
                <td nowrap="nowrap">
                  <?php echo $store_address; ?><br /><?php echo $store_phone; ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <?php } ?>

        <tr valign="top">
          <td>

            <?php if ($thank_you_message) { ?>
            <p><b><?php echo t('Thanks for your order, !order_first_name!', array('!order_first_name' => $order_first_name)); ?></b></p>

            <?php if (isset($_SESSION['new_user'])) { ?>
            <p><b><?php echo t('An account has been created for you with the following details:'); ?></b></p>
            <p><b><?php echo t('Username:'); ?></b> <?php echo $new_username; ?><br />
            <b><?php echo t('Password:'); ?></b> <?php echo $new_password; ?></p>
            <?php } ?>

            <p><b><?php echo t('Want to manage your order online?'); ?></b><br />
            <?php echo t('If you need to check the status of your order, please login with the following link:', array('!store_link' => $store_link)); ?>
            <br /><br /><?php echo $site_login; ?></p>
            <?php } ?>

            <table cellpadding="4" cellspacing="0" border="0" width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">
              <tr>
                <td nowrap="nowrap" align="right">
                  <b><?php echo t('Order #:'); ?></b>
                </td>
                <td width="98%">
                  <?php echo $order_id; ?>
                </td>              
              <tr>          
                <td nowrap="nowrap" align="right">
                  <b><?php echo t('E-mail Address:'); ?></b>
                </td>
                <td width="98%">
                  <?php echo $order_email; ?>
                </td>
              </tr>                
              <tr><td colspan="2"><br /></td></tr>
              <tr>
                <td colspan="2">
                  <table width="100%" cellspacing="0" cellpadding="0" style="font-family: verdana, arial, helvetica; font-size: small;">
                    <tr>
                      <td valign="top" width="50%">
                        <b><?php echo t('Billing Address:'); ?></b><br />
                        <?php echo $order_billing_address; ?><br />
                      </td>
                      <?php if (uc_order_is_shippable($order)) { ?>
                      <td valign="top" width="50%">
                        <b><?php echo t('Shipping Address:'); ?></b><br />
                        <?php echo $order_shipping_address; ?><br />
                      </td>
                      <?php } ?>
                    </tr>
                  </table>

                </td>
              </tr>

			  <tr><td colspan="2"><br /></td></tr>
              
              <tr>
              	<td colspan="2">
            		<table cellpadding="4" cellspacing="0" border="0" width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">
              		<tr style="font-weight:bold;">
                		<td>Qty</td>
                		<td>Item</td>
                		<td align="right">Price</td>
                		<td align="right">Total</td>                                                
              		</tr>
              
              		<?php
              		//die(print_r($order));
					foreach ($order->products as $product) {
               			$price_info = array(
                 							'price' => $product->price,
                               				'qty' => $product->qty,
                             				);
              			$context['subject']['order_product'] = $product;
             			$context['subject']['node'] = node_load($product->nid);
              			?>
              			<tr>
              				<td>
                				<?php echo $product->qty; ?>
                			</td>               
                			<td>
                 				<?php echo $product->title; ?>
                			</td>
                			<td align="right">
                				<?php echo uc_price($product->price, $context) ?>
                			</td>                       
                			<td align="right">
								<?php echo uc_price($product->price*$product->qty, $context) ?>
                			</td>
              			</tr>
              			<tr>
              			    <td>&nbsp;</td>
                			<td>
                 				<?php
              					$query = 'SELECT * FROM {uc_packaged_products} upp ';
              					$query .= 'JOIN `uc_packages` up ON up.package_id = upp.package_id ';
              					$query .= 'WHERE order_product_id = %d';

								$result = db_query($query, $product->order_product_id);
								if ($data = db_fetch_object($result)) {
									echo '<i>- Shipping from ' . $data->warehouse . '</i>';
								}
								else { 
									echo '&nbsp;';
								}
								?>
								</i>
                			</td>
                			<td colspan="2">&nbsp;</td>                       
              			</tr>              			
              		<?php } ?>
              		
              		<tr><td colspan="5">
              			<br />
              		</td></tr>
              		            		
              		<?php
              		//print_r($line_items);
              		foreach ($line_items as $item) {
                    if ($item['type'] != 'tax_subtotal') {
										?>
                    <tr>
                      <td colspan="5" align="right">
                      	<?php 
                      		 if ($item['type'] == 'shipping') {
                      			echo 'Shipping & Handling'; 
                      			echo ' (' . $order_shipping_method . ')';
													}
													else {
														echo $item['title']; 
													}
                      	?>
                      	:
                      	<?php echo uc_price($item['amount'], $context) ?>
                      </td>
                    </tr>
                  	<?php } ?>
                  <?php } ?>
                                                           
									</table>                  		              	
              	</td>
              </tr>
              

              <?php if ($help_text || $email_text || $store_footer) { ?>
              <tr>
                <td colspan="2">
                  <hr noshade="noshade" size="1" /><br />

                  <?php if ($email_text) { ?>
                  <p><?php echo t('Please note: This e-mail message is an automated notification. Please do not reply to this message.'); ?></p>

                  <p><?php echo t('Thanks again for shopping with us.'); ?></p>
                  <?php } ?>

                  <?php if ($store_footer) { ?>
                  <p><b><?php echo $store_link; ?></b><br /><b><?php echo $site_slogan; ?></b></p>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>

            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>