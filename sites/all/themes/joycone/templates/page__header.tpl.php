<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" /> 
    <meta name="format-detection" content="telephone=no" />

    <?php print render($head); ?>
    <title><?php print render($page['head_title']); ?></title>
    <?php if(isset($styles)): ?>
        <?php print $styles; ?>
    <?php endif; ?>
    <?php if(isset($scripts)): ?>
        <?php print $scripts; ?>
    <?php endif; ?>
    <!--[if lt IE 7]>
      <?php echo phptemplate_get_ie_styles(); ?>
    <![endif]-->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MHM477M');</script>
<!-- End Google Tag Manager -->

  </head>
  <body class="<?php if(!empty($body_classes)): print $body_classes; endif;?>">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHM477M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="sidenote bg_responsive sn_image01"></div>
    <div class="sidenote bg_responsive sn_image02"></div>
    <div class="sidenote bg_responsive sn_image03"></div>
    <div class="sidenote bg_responsive sn_image04"></div>
    <div class="sidenote bg_responsive sn_image05"></div>
    <header id="header" class="container">
      <a href="<?php echo base_path(); ?>">
        <img class="joy_logo" src="<?php echo base_path(); ?>sites/all/themes/joycone/images/joy_logo.png" alt="Joy Cone - since 1918">
      </a>

      <?php print render($page['header_right']); ?>
      
      <nav id="header_menu" class="rw_extra_bold">
          <?php print render($page['header']); ?>
      </nav>
      <img src="<?php echo base_path(); ?>sites/all/themes/joycone/images/header_bottom<?php echo empty($header_drop) ? '_idealess' : ''; ?>.png" class="header_bottom" />
      <?php if (!empty($header_drop)) { ?>
        <span id="promo_dropdown_handle" class="rw_extra_bold white"></span>
      <?php } ?>
    </header>
    <div id="promo_header" class="container">
      <?php if (!empty($header_drop)) { ?>
        <div class="promo_content yellow_gradient03 shadow">
          <?php echo $header_drop; ?>
        </div>
      <?php } ?>
    </div>
    <div id="hook_social" class="container">
      <div id="hook-region" class="<?php echo empty($social) ? 'no-social' : ''; ?> <?php echo empty($header_drop) ? '' : 'dropdown'; ?>"><?php print render($page['hook']); ?></div>
      <?php if (!empty($social)) { ?>
        <div id="social-region" class="<?php echo empty($header_drop) ? 'no-dropdown' : ''; ?>"><?php echo $social; ?></div>
      <?php } ?>
    </div>
  
    <div id="content" class="container cf">
    	<?php print $messages; ?>
      <?php if ($tabs = render($tabs)): print '<div id="tabs-wrapper" class="clear-block"><ul class="tabs primary"><?php print $tabs; ?></ul></div>'; endif; ?>
    
