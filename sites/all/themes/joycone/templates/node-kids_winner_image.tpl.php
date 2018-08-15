<div id="node-<?php echo $node->nid; ?>" class="node-kids-images node-kids-image-winners shadow cf">

    <img src="<?php echo base_path(); ?>sites/all/themes/joycone/images/check_out_sidenote.png" id="check_master" class="sidenote" />

    <div id="color_win_image" class="r_img_container">
        <div><div class="slider_root">
        	<?php //echo $node->field_winner_img1[0]['data']['url']; ?>
            <?php if (!empty($node->field_winner_img1[0]['filepath'])) { ?>
                <a href="<?php echo $node->field_winner_img1[0]['data']['url'] ?: $node->field_album_link[0]['value']; ?>" target="_blank">
                    <img src="<?php echo base_path().$node->field_winner_img1[0]['filepath']; ?>" id="kids-image-winner" class="r_img" alt="Kids Coloring Contest Winner - 5 and under" />
                </a>
            <?php } ?>
            <?php if (!empty($node->field_winner_img2[0]['filepath'])) { ?>
                <a href="<?php echo $node->field_winner_img2[0]['data']['url'] ?: $node->field_album_link[0]['value']; ?>" target="_blank">
                    <img src="<?php echo base_path().$node->field_winner_img2[0]['filepath']; ?>" id="kids-image-winner" class="r_img" alt="Kids Coloring Contest Winner - 6-8" />
                </a>
            <?php } ?>
            <?php if (!empty($node->field_winner_img3[0]['filepath'])) { ?>
                <a href="<?php echo $node->field_winner_img3[0]['data']['url'] ?: $node->field_album_link[0]['value']; ?>" target="_blank">
                    <img src="<?php echo base_path().$node->field_winner_img3[0]['filepath']; ?>" id="kids-image-winner" class="r_img" alt="Kids Coloring Contest Winner - 9-12" />
                </a>
            <?php } ?>
        </div></div>
    </div>

    <div id="color_win_copy">
        <h2 class="rw_ultra_bold yellow">The Month's Winners!</h2>
        <p class="rw_ultra_bold white">
            <?php if (!empty($node->field_winner_age1[0]['value'])) { ?>
                5 and Under:
                <span class="winner-name yellow"><?php echo $node->field_winner_age1[0]['value']; ?></span>
                <?php echo empty($node->field_winner_loc1[0]['value']) ? '' : 'of'; ?>
                <strong><?php echo $node->field_winner_loc1[0]['value']; ?>!</strong>
                <br />
            <?php } ?>
            <?php if (!empty($node->field_winner_age2[0]['value'])) { ?>
                6-8:
                <span class="winner-name yellow"><?php echo $node->field_winner_age2[0]['value']; ?></span>
                <?php echo empty($node->field_winner_loc2[0]['value']) ? '' : 'of'; ?>
                <strong><?php echo $node->field_winner_loc2[0]['value']; ?>!</strong>
                <br />
            <?php } ?>
            <?php if (!empty($node->field_winner_age3[0]['value'])) { ?>
                9-12:
                <span class="winner-name yellow"><?php echo $node->field_winner_age3[0]['value']; ?></span>
                <?php echo empty($node->field_winner_loc3[0]['value']) ? '' : 'of'; ?>
                <strong><?php echo $node->field_winner_loc3[0]['value']; ?>!</strong>
                <br />
            <?php } ?>
        </p>
    </div>

    <?php /*if (!empty($node->field_album_link[0]['value'])) { ?>
        <a href="<?php echo $node->field_album_link[0]['value']; ?>" target="_blank" class="rw_extra_bold shadow02">See More &#9654;</a>
    <?php }*/ ?>
    
	<a href="<?php echo $node->field_album_link[0]['value']; ?>" target="_blank" class="rw_extra_bold shadow02">See More &#9654;</a>

</div>
