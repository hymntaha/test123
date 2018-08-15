<div id="node_<?php echo $node->nid; ?>" class="ac_block" <?php echo empty($node->field_slug[0]['value']) ? '' : 'data-ac-block-name="'.$node->field_slug[0]['value'].'"'; ?>>
    <?php echo empty($node->field_slug[0]['value']) ? '' : '<a name="'.$node->field_slug[0]['value'].'"></a>'; ?>
    <h3 class="ac_handle"><?php echo $title; ?></h3>
    <div class="ac_content">
        <?php echo $node->content['body']['#value']; ?>
    </div>
</div>