<?php
$tids = array_keys($node->taxonomy);
$tid = $tids[0];

switch ($tid) {
case 15: //top home slider
    ?>
    <div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?> slide">
        <a href="<?php echo base_path().$node->field_image[0]['data']['url']; ?>">
            <img src="<?php echo base_path().$node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" />
        </a>
    </div>
    <?php
    break;
case 16: //bottom home slider
    ?>
    <div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?> slide">
        <img src="<?php echo base_path().$node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" class="shadow waffle_bowl"/>
        <p class="rw_medium red"><?php echo $node->content['body']['#value']; ?></p>
    </div>
    <?php
    break;
}
