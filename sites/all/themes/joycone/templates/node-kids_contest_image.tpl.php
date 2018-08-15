<div id="node-<?php echo $node->nid; ?>" class="node-kids-images node-kids-image-primary shadow">
    <h2 class="rw_ultra_bold">Enter the Coloring Contest!</h2>
    <p class="rw_medium">Decorate this month's picture with crayons, markers, paint, pencils, even electronic devices... any method you prefer. 3 winners will be selected to receive the Joy fun pack!</p>
    <span class="tright"><a href="<?php echo base_path().$node->field_contest_rules[0]['filepath']; ?>" target="_blank">Contest Rules</a></span>

    <div class="kids-image-container">
        <div><img src="<?php echo base_path().$node->field_image[0]['filepath']; ?>" id="kids-image-main" alt="Kids Coloring Contest Image" /></div>
    </div>

    <a href="<?php echo base_path().$node->field_print_image[0]['filepath']; ?>" target="_blank" class="print-picture"><span class="rw_ultra_bold">Print Picture</span></a>
    <a href="<?php echo base_path().$node->field_entry_form[0]['filepath']; ?>" target="_blank" class="kids-entry"><span class="rw_ultra_bold">Get Entry Form</span></a>
</div>
