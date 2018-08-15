<?php
$layout           = $node->field_layout[0]['value'];
$background_class = $node->field_back_style[0]['value'];
$border_class     = $node->field_border[0]['value'];
$title_class      = $node->field_title_color[0]['value'];
$button_class     = $node->field_btn_color[0]['value'];

$new_tab = (strpos($node->field_link[0]['value'],'coupon') !== false || strpos($node->field_link[0]['value'],'.pdf') !== false || strpos($node->field_link[0]['value'],'.jpg') !== false) ? ' target="_blank"' : '';

list($layout_width, $text_pos) = explode('-', $layout);
?>

<div id="node-<?php echo $node->nid; ?>" class="promo-block width-<?php echo $layout_width; ?> text-pos-<?php echo $text_pos; ?> background-<?php echo $background_class; ?> border-<?php echo $border_class; ?> title-<?php echo $title_class; ?> button-<?php echo $button_class; ?>">
    <div class="promo-block-body">
        <?php if ($layout_width === 'small' || $layout_width === 'large') { ?>
            <?php if ($text_pos === 'top') { ?>
                <h3><?php echo $title; ?></h3>
                <?php echo $node->content['body']['#value']; ?>
            
                <img src="<?php echo base_path(), $node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" />
            <?php } else { ?>
                <img src="<?php echo base_path(), $node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" />
            
                <h3><?php echo $title; ?></h3>
                <?php echo $node->content['body']['#value']; ?>
            <?php } ?>

            <a<?php print $new_tab; ?> class="button" href="<?php echo $node->field_link[0]['value']; ?>"><?php echo $node->field_cta[0]['value']; ?> &#9654;</a>
        <?php } else { ?>
            <?php if ($text_pos === 'left') { ?>
                <div class="copy">
                    <h3><?php echo $title; ?></h3>
                    <?php echo $node->content['body']['#value']; ?>
                    <a<?php print $new_tab; ?> class="button" href="<?php echo $node->field_link[0]['value']; ?>"><?php echo $node->field_cta[0]['value']; ?> &#9654;</a>
                </div>

                <div class="image">
                    <img src="<?php echo base_path(), $node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" />
                </div>
            <?php } else { ?>
                <div class="image">
                    <img src="<?php echo base_path(), $node->field_image[0]['filepath']; ?>" alt="<?php echo $title; ?>" />
                </div>
            
                <div class="copy">
                    <h3><?php echo $title; ?></h3>
                    <?php echo $node->content['body']['#value']; ?>
                    <a<?php print $new_tab; ?> class="button" href="<?php echo $node->field_link[0]['value']; ?>"><?php echo $node->field_cta[0]['value']; ?> &#9654;</a>
                </div>
            <?php } ?>
            
        <?php } ?>
    </div>
</div>