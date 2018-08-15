<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?> cf">
  <h3 class="rw_ultra_bold red"><?php echo $node->field_name[0]['value']; ?></h3>

  <p class="store_address rw_medium">
    <?php echo $node->field_address1[0]['value']; ?>
    <br />
    <?php echo $node->field_address2[0]['value']; if (!empty($node->field_address2[0]['value'])) { echo '<br />'; } ?>
    <?php echo $node->field_city[0]['value']; ?>,
    <?php echo $node->field_state[0]['value']; ?>
    <?php echo str_pad($node->field_zip[0]['value'], 5, '0', STR_PAD_LEFT); ?>
    <br />
    <?php if (!empty($node->distance)) { printf('%.2f mi ', $node->distance); } ?>
    <?php echo $node->field_phone[0]['value']; ?>
  </p>
  
  <div class="store-products-list">
    <h4>Products</h4>
    <ul>
    <?php for($i = 0; $i < count($node->field_products); $i++) { ?>
      <li><?php print $node->field_products[$i]['view']; ?></li>
    <?php } ?>
    </ul>
  </div>

  <p class="rfloat">
    <a href="javascript:void(0)" class="show_map_link rw_bold" data-nid="<?php echo $node->nid; ?>">Show Map</a>
    <a href="https://maps.google.com/maps?saddr=&amp;daddr=<?php echo urlencode(sprintf('%s, %s, %s %s', $node->field_address1[0]['value'], $node->field_city[0]['value'], $node->field_state[0]['value'], $node->field_zip[0]['value'])); ?>" class="directions_link rw_bold" target="_blank">Directions</a>
  </p>
</div>
