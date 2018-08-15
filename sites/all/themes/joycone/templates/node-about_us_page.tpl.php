<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?> cf">
    <div id="about_frames" class="lfloat tcenter">
    </div>

    <div id="about_copy">
        <h2 class="rw_ultra_bold"><?php echo $title; ?></h2>

        <div class="content clear-block">
            <?php echo $node->content['body']['#value']; ?>
        </div>
    </div>
</div>
