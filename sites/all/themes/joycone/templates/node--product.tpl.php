<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?> ac_block">
    <!-- Single product details when clicked -->
    <?php die(print_r($node)); ?>
    <?php if (isset($node->taxonomy_parent)) { ?>
        <?php if ($node->taxonomy_parent == JOYCONE_PRODUCTS_TAXONOMY_FS) { ?>
            <a href="<?php echo url('node/'.$node->nid); ?>" class="product_details">
        <?php } else { ?>
            <div class="product_details">
        <?php } ?>

            <?php
            if (!empty($node->field_puck[0]['nid'])) {
                $puck = node_load($node->field_puck[0]['nid']);
                ?>
                <img src="<?php echo base_path(), $puck->field_image[0]['filepath']; ?>" class="puck_img" />
                <?php
            }
            ?>
            <div class="inactive_overlay"></div>

            <div class="details_type blue_border <?php echo $node->taxonomy_parent == JOYCONE_PRODUCTS_TAXONOMY_FS ? '' : 'ac_handle'; ?>">
                <div class="r_img"><div>
                    <?php
                        // $thumb_image = base_path().preg_replace('#sites/default/files#', 'sites/default/files/imagecache/product_list_thumbs', $node->field_image_cache[0]['filepath']);
                    ?>
                    <img src="<?php echo base_path(), $node->field_image_cache[0]['filepath']; ?>" alt="<?php echo $node->title; ?>" class="detail_main"/>
                    <img src="<?php echo base_path(), empty($node->field_pkg_image[0]['filepath'])?$node->field_image_cache[0]['filepath']:$node->field_pkg_image[0]['filepath']; ?>" alt="<?php echo $node->title; ?> Packaging" class="detail_hover"/>
                </div></div>

                <?php if ($node->taxonomy_parent == JOYCONE_PRODUCTS_TAXONOMY_FS) { ?>
                    <div class="atb cf">
                        <span><?php printf('$%.2f', $node->sell_price); ?></span>
                        <button type="button" class=" __sibling_atb">Add to Cart</button>
                        <?php echo $node->content['add_to_cart']['#value']; ?>
                    </div>
                <?php } ?>

                <h2 class="rw_extra_bold"><span><?php echo $title; ?></span></h2>
            </div>

        <?php if ($node->taxonomy_parent == JOYCONE_PRODUCTS_TAXONOMY_FS) { ?>
            </a>
        <?php } else { ?>
            </div>
        <?php } ?>
    <?php } ?>

    <?php if (!isset($node->taxonomy_parent) || $node->taxonomy_parent != JOYCONE_PRODUCTS_TAXONOMY_FS) { ?>
        <div class="details_copy shadow ac_content" <?php echo isset($node->taxonomy_parent) ? 'style="display:none;"' : ''; ?>>
            <span class="close ac_handle">X</span>
            <div class="r_img">
                <img src="<?php echo base_path(), empty($node->field_hero_image[0]['filepath'])?$node->field_image_cache[0]['filepath']:$node->field_hero_image[0]['filepath']; ?>" alt="<?php echo $node->title; ?>" class="detail_main"/>
                <?php if (!empty($node->field_pkg_image[0]['filepath'])) { ?>
                    <img src="<?php echo base_path(), $node->field_pkg_image[0]['filepath']; ?>" alt="<?php echo $node->title; ?> Packaging" class="detail_pkg" />
                <?php } ?>

                <?php if (!empty($node->shippable)) { ?>
                    <br /><strong class="product_price"><?php printf('$%.2f', $node->sell_price); ?></strong>
                <?php } ?>
            </div>
            <div class="copy_container">
                <h2 class="rw_extra_bold"><?php echo $title; ?></h2>
                <span class="product_sku">Item #: <?php echo $node->model; ?></span>

                <?php echo $node->content['body']['#value']; ?>

                <?php if (!empty($node->field_pkg_image[0]['filepath'])) { ?>
                    <a href="javascript:void(0)" class="see_packaging rw_bold" onclick="$(this).closest('.details_copy').children('.r_img').toggleClass('pkg_img');">See Packaging ></a>
                <?php } ?>

                <?php if (!empty($node->field_nutr_image[0]['filepath'])) { ?>
                    <a href="javascript:void(0)" class="nutrition_facts rw_bold" data-nutrition="<?php echo base_path(), $node->field_nutr_image[0]['filepath']; ?>">Nutrition Facts ></a>
                <?php } ?>

                <ul class="details_buttons rw_extra_bold">
                    <?php if (!empty($node->shippable)) { ?>
                        <li class="add_to_cart_button">
                        	<?php if (!empty($node->taxonomy_parent)) { ?>
                          	<a href="/<?php print $node->path; ?>" class="button_copy __sibling_atb">Shop Now &#9654;</a>
                          <?php } else { ?>
                            <a href="javascript:void(0)" class="button_copy __sibling_atb">Add to Cart &#9654;</a>
                            <?php echo $node->content['add_to_cart']['#value']; ?>
                          <?php } ?>
                        </li>
                    <?php } ?>

                    <?php if (!empty($node->field_instore[0]['value'])) { ?>
                        <li class="store_button"><a href="<?php echo base_path(); ?>store-locator?pid=<?php echo $node->nid; ?>" class="button_copy">Store Locator &#9654;</a></li>
                    <?php } ?>

                    <?php if (!empty($node->field_recipes[0]['value'])) { ?>
                        <li class="recipe_button"><a href="<?php echo base_path(); ?>recipes" class="button_copy">Find Recipes &#9654;</a></li>
                    <?php } ?>
                </ul>

                <h3>Recipes Using This Product</h3>
                <?php foreach ($node->field_recipe_image as $img) { ?>
                    <?php if (empty($img['filepath'])) { continue; }
										$blank = ($img['data']['url'] != '/recipes') ? ' target="_blank"' : ''; ?>
                    <a href="<?php echo $img['data']['url']; ?>"<?php print $blank; ?>>
                        <img src="<?php echo base_path().$img['filepath']; ?>" class="white_border shadow02 recipe_image" width="154" height="111" alt="<?php echo $node->title; ?> Recipe" />
                    </a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($node->extra_category_image)) { ?>
        <img src="<?php echo base_path(), $node->extra_category_image; ?>" />
    <?php } ?>

    <div class="ac_spacer"></div>

</div>
