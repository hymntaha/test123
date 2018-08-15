<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?>">
    <img src="<?php echo base_path().$node->field_image[0]['filepath']; ?>" alt="<?php echo $node->field_image[0]['data']['title']; ?>" title="<?php echo $node->field_image[0]['data']['title']; ?>" />
    
    <?php if (!empty($node->field_image[0]['data']['url'])) { ?>
        <a class="button-round" href="<?php echo $node->field_image[0]['data']['url']; ?>"><?php echo $node->field_image[0]['data']['title']; ?> &#9654;</a>
    <?php } else if (!empty($node->field_image[0]['data']['title'])) { ?>
        <small><?php echo $node->field_image[0]['data']['title']; ?></small>
    <?php } ?>
</div>
