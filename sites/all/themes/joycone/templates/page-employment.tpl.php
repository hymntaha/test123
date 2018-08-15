<?php include 'page__header.tpl.php'; ?>

<div id="employ_frames" class="lfloat tcenter">
  <?php echo taxonomy_render_nodes(nodeorder_select_nodes(array(JOYCONE_SIDEBAR_TAXONOMY_EMPLOYMENT), 'or', 0, false, 'n.sticky DESC, tn.weight_in_tid')); ?>
</div>

<div id="employ_body" class="accordion">

  <div class="ac_block ac_open">
    <h2 class="ac_handle">Current Job Opportunities</h2>
    <div class="accordion ac_content">

    <?php echo $content; ?>
    </div>
  </div>

  <div class="ac_block ac_open">
    <h2 class="ac_handle">How to Apply</h2>
    <div class="accordion ac_content">
      <h3 class="red">Are you interested in becoming a part of the Joy Cone family?</h3>

      <h3 class="red">Apply here!</h3>
      <ul>
      	<li><a href="/sites/default/files/uploads/joy-cone-job-application.pdf" target="_blank">Application Form</a></li>
        <li><a href="/sites/default/files/uploads/joy-cone-driver-application.pdf" target="_blank">Driver&rsquo;s Application Form</a></li>
      </ul>

      <ul>
        <li><h3>Eastern Facility</h3></li>
        <li>3435 Lamor Road</li>
        <li>Hermitage, PA 16148</li>
        <li>(724) 962-5747</li>
      </ul>

      <ul>
        <li><h3>Western Facility</h3></li>
        <li>2843 W. Shamrell Blvd. </li>
        <li>Flagstaff, AZ 86001</li>
        <li>(928) 774-0225</li>
      </ul>
    </div>
  </div>

  <div class="ac_block">
    <h2 class="ac_handle">Company Philosophy</h2>
    <div class="accordion ac_content">
      <p>Our philosophy is to make our product better than any other company does. Cones are that product. First of all, we have developed our own cone ovens, which are built right here in our plant. We use a time-tested family recipe that has been passed from one generation to the next. We pay close attention to every detail of mixing the batter, baking the cones, and then packaging them. Even in the fast-paced, automated world of today, we rely on personal attention to ensure quality.</p>
      <p>Getting our cones to market quickly and efficiently is important. That´s why we own and operate our own fleet of trucks. It ensures that our cones are handled properly from the time they leave the plant until they arrive at their destination. Yes, it costs us a little more to do this, but the results are worth it. We have a reliable delivery system and almost no breakage.</p>
      <p>Family ties, attention to detail, and old-fashioned quality are the ingredients that make our cones the best cones in the world.</p>
    </div>
  </div>

</div>

<?php include 'page__footer.tpl.php'; ?>
