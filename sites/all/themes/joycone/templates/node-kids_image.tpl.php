<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?>">
    <div class="shadow">
        <a href="<?php echo base_path(), $node->field_print_image[0]['filepath']; ?>" target="_blank">
            <img src="<?php echo base_path(), $node->field_image[0]['filepath']; ?>" alt="Kids Coloring Image" />
        </a>
    </div>
</div>