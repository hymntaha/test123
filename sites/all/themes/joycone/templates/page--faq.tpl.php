<?php include 'page__header.tpl.php'; ?>
<div id="faqs">
    <div id="faq_frames" class="lfloat tcenter">
    </div>
    <div id="faq_body" class="accordion">
        <?php print render($page['content']); ?>
    </div>
    <div id="faq_contact" class="tright ">
        <span>Still have a question?</span>
        <a href="/contact-us" class="button-round">Contact Us &#9654;</a>
    </div>
</div>
<?php include 'page__footer.tpl.php'; ?>
