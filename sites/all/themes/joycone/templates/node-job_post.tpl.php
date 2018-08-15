<div id="node-<?php echo $node->nid; ?>" class="node-<?php echo $node->type; ?>">
    <h4><?php echo $title; ?></h4>
    <?php echo $node->content['body']['#value']; ?>
    <a class="button-round" target="_blank" href="<?php echo base_path().$node->field_application[0]['filepath']; ?>">Get Application &#9654;</a>
    <?php foreach ($node->field_files as $file) { ?>
        <?php if (empty($file['filepath'])) continue; ?>
        <a class="button-round" target="_blank" href="<?php echo base_path().$file['filepath']; ?>"><?php echo $file['data']['description']; ?> &#9654;</a>
    <?php } ?>
</div>

<?php if (isset($_GET['vdev'])) { echo '<pre>';var_dump($node);die(); }