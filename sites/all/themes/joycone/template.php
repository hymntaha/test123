<?php

drupal_add_html_head('<link href="//fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100" rel="stylesheet" type="text/css" />');
drupal_add_css(drupal_get_path('theme', 'joycone') . '/css/style.css', 'theme');
drupal_add_js(drupal_get_path('theme', 'joycone') . '/js/scripts.js', 'theme');
drupal_add_js(drupal_get_path('theme', 'joycone') . '/js/html5shiv.js', 'theme');
drupal_add_js(drupal_get_path('theme', 'joycone') . '/js/jquery.ba-hashchange.min.js', 'theme');

/**
 * Override or insert variables into the html templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function joycone_preprocess_page(&$vars,$hook) {
    $vars['theme_root'] = drupal_get_path('theme', 'joycone');

  if ($vars['is_front'] || (arg(0) === 'nodeorder' || arg(0) === 'taxonomy') && arg(1) == 'term' && arg(2) == JOYCONE_KIDS_TAXONOMY) {
    drupal_add_css(drupal_get_path('theme', 'joycone') . '/css/jquery.bxslider.css', 'theme');
    drupal_add_js(drupal_get_path('theme', 'joycone') . '/js/jquery.1.9.1.min.js', 'theme');
    drupal_add_js(drupal_get_path('theme', 'joycone') . '/js/jquery.bxslider.min.js', 'theme');
    drupal_add_js('window.jq191 = jQuery.noConflict(true);', 'inline');
      $vars['styles'] = drupal_get_css();
      $vars['scripts'] = drupal_get_js();
  }

  if (isset($vars['node'])) {
      $vars['theme_hook_suggestions'][] = 'page__type__'. $vars['node']->type;
      $vars['theme_hook_suggestions'][] = "page__node__" . $vars['node']->nid;
  }

    // Page template suggestions based off URL alias
  if (module_exists('path')) {
      $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
      if ($alias != $_GET['q']) {
          $template_filename = 'page';
          foreach (explode('/', $alias) as $path_part) {
              $template_filename = $template_filename . '__' . $path_part;
              $vars['theme_hook_suggestions'][] = $template_filename;
          }
      }
  }
    $node = node_load(arg(2));
    die(print_r($node));
  //    $nodes = node_load_multiple(array(), array('type' => 'faq'));
//
//    die(print_r($nodes));
//  if ((arg(0) === 'nodeorder' || arg(0) === 'taxonomy') && arg(1) == 'term' && is_numeric(arg(2))) {
//    $tid = arg(2);
//    $sql = "SELECT vid FROM {taxonomy_term_data} WHERE tid = '%d'";
//    $vid = db_query($sql,array(':nid' =>$tid))->fetch();
//    if (in_array($vid, array('1'))) {
//        $vars['template_file'] = 'page-products';
//      if ($tid == JOYCONE_PRODUCTS_TAXONOMY_RETAIL){
//          $vars['head_title'] = 'Products | Joy Cone';
//      }
//      if ($tid == JOYCONE_PRODUCTS_TAXONOMY_FS) {
//          $vars['head_title'] = 'Food Service Products | Joy Cone';
//      }
//    } else if (in_array($vid, array('2'))) {
//        $vars['template_file'] = 'page-faq';
//    } else if (in_array($vid, array('5'))) {
//        $vars['template_file'] = 'page-employment';
//    }
//  }
//
//  if (arg(0) === 'node' && is_numeric(arg(1))) {
//    $nid = arg(1);
//    if ($nid == JOYCONE_NODE_LOCATOR) {
//      $_REQUEST['r'] = empty($_REQUEST['r']) ? 15 : $_REQUEST['r'];
//      $_REQUEST['pid'] = empty($_REQUEST['pid']) ? null : $_REQUEST['pid'];
//        $vars['template_file'] = 'page-stores';
//    }
//  }
//    $vars['body_classes'] .= ' '.joycone_body_classes(drupal_get_path_alias(request_path()));
}


//function joycone_taxonomy_term_page($tids, $result) {
//  $out = '';
//    die(print_r($tids));
//  if (count($tids) === 1 && ($tids[0] == JOYCONE_PRODUCTS_TAXONOMY_RETAIL || $tids[0] == JOYCONE_PRODUCTS_TAXONOMY_FS)) {
//    $result = db_query(db_rewrite_sql('SELECT t.tid, t.name, ti.filepath FROM {term_hierarchy} th LEFT JOIN {term_data} t ON th.tid = t.tid LEFT JOIN {uc_catalog_images} ti ON t.tid = ti.tid WHERE th.parent = '.$tids[0].' ORDER BY t.weight ASC', 't', 'tid'));
//    $terms = array();
//    while ($term = db_fetch_object($result)) {
//      $terms[] = $term;
//    }
//
//    $out .= '<div id="taxonomy-term-'.$tids[0].'" class="node-taxonomies taxonomy-terms accordion" data-ac-single-open="true">';
//    foreach ($terms as $term) {
//      $result = nodeorder_select_nodes(array($term->tid), 'or', 0, false, 'n.sticky DESC, tn.weight_in_tid', 9999);
//
//      $nodes = array();
//      while ($node = db_fetch_object($result)) {
//        $nodes[] = node_load($node->nid);
//      }
//
//      if (!empty($nodes)) {
//        $out .= '<div id="taxonomy-term-'.$term->tid.'" class="node-taxonomy taxonomy-term cf">';
//        $out .= '<a name="'.slugify($term->name).'"></a><h2 class="taxonomy-title rw_ultra_bold">'.$term->name.'</h2>';
//        $out .= '<div class="taxonomy-nodes cf">';
//
//        foreach ($nodes as $idx => $node) {
//          $node->taxonomy_parent = $tids[0];
//          if ($idx == count($nodes) - 1) {
//            $node->extra_category_image = $term->filepath;
//          } else {
//            $node->extra_category_image = '';
//          }
//          $out .= node_view($node);
//        }
//
//        $out .= '</div></div>';
//      }
//    }
//    // if ($tids[0] == JOYCONE_PRODUCTS_TAXONOMY_FS) {
//    //     $out .= '<p class="equipment_brochure"><a href="/sites/default/files/Equipment 2013 layout for web(1).pdf" target="_blank"><span>Equipment Brochure</span><br /><img src="/sites/default/files/images/equipment_catalog_cover.jpg" /></a></p>';
//    // }
//    $out .= '</div>';
//  } else if (count($tids) === 1 && $tids[0] == JOYCONE_KIDS_TAXONOMY) {
//    $result = nodeorder_select_nodes(array(JOYCONE_KIDS_TAXONOMY), 'or', 0, false, 'n.sticky DESC, tn.weight_in_tid');
//
//    $contest_result = db_query(db_rewrite_sql('SELECT n.nid FROM {node} n WHERE n.status=1 AND n.type=\'kids_contest_image\' ORDER BY n.created DESC LIMIT 1'));
//    $winner_result = db_query(db_rewrite_sql('SELECT n.nid FROM {node} n WHERE n.status=1 AND n.type=\'kids_winner_image\' ORDER BY n.created DESC LIMIT 1'));
//
//    $out .= node_view(node_load(db_fetch_object($contest_result)->nid), 1);
//
//    $out .= '<div id="node-kids-images-slider" class="node-taxonomy taxonomy-term shadow">';
//    $out .= '<img src="'.base_path().'sites/all/themes/joycone/images/keep_coloring.png" alt="Keep coloring! We have plenty of pictures!" class="keep_coloring sidenote" />';
//    $out .= '<p class="rw_extra_bold red">More Pictures to Color!</p>';
//    //$out .= '<div class="kids-arrow left"></div><div class="kids-arrow right"></div>';
//    $out .= '<div class="slider_root"><div>';
//    while ($node = db_fetch_object($result)) {
//      $out .= node_view(node_load($node->nid), 1);
//    }
//    $out .= '</div></div></div>';
//
//    $out .= node_view(node_load(db_fetch_object($winner_result)->nid), 1);
//  } else if (count($tids) === 1 && $tids[0] == JOYCONE_EMPLOYMENT_TAXONOMY) {
//    $result = db_query(db_rewrite_sql('SELECT t.tid, t.name FROM {term_hierarchy} th LEFT JOIN {term_data} t ON th.tid = t.tid WHERE th.parent = '.JOYCONE_EMPLOYMENT_TAXONOMY.' ORDER BY t.weight ASC', 't', 'tid'));
//    $names = array();
//    while ($term = db_fetch_object($result)) {
//      $names[$term->tid] = $term->name;
//    }
//
//    $first = true;
//    foreach ($names as $tid => $name) {
//      $out .= '<div id="taxonomy-term-'.$tid.'" class="node-taxonomy taxonomy-term ac_block">';
//      $out .= '<h3 class="tax_title ac_handle">'.$name.'</h3>';
//
//      $result = nodeorder_select_nodes(array($tid), 'or', 0, false, 'n.sticky DESC, tn.weight_in_tid', 9999);
//      $nodes_out = '';
//      while ($node = db_fetch_object($result)) {
//        $nodes_out .= node_view(node_load($node->nid));
//      }
//
//      $open = empty($nodes_out) || $first ? 'ac_open' : '';
//
//      $out .= '<div class="taxonomy-nodes ac_content '.$open.'">';
//      $out .= empty($nodes_out) ? 'No current positions open at this time.' : $nodes_out;
//      $out .= '</div></div>';
//
//      $first = false;
//    }
//  } else if (count($tids) === 1 && $tids[0] == 39) {
//      die(print_r('hello'));
//    $result = db_query(db_rewrite_sql('SELECT t.tid, t.name FROM {taxonomy_term_hierarchy} th LEFT JOIN {taxonomy_term_data} t ON th.tid = t.tid WHERE th.parent = '.$tids[0].' ORDER BY t.weight ASC', 't', 'tid'));
//    $terms = array();
//    while ($term = db_fetch_object($result)) {
//      $terms[] = $term;
//    }
//
//    $out .= '<div id="taxonomy-term-'.$tids[0].'" class="node-taxonomies taxonomy-terms">';
//    foreach ($terms as $term) {
//      $result = nodeorder_select_nodes(array($term->tid), 'or', 0, false, 'n.sticky DESC, tn.weight_in_tid', 9999);
//
//      $nodes = array();
//      while ($node = db_fetch_object($result)) {
//        $nodes[] = node_load($node->nid);
//      }
//
//      if (!empty($nodes)) {
//        $out .= '<div id="taxonomy-term-'.$term->tid.'" class="node-taxonomy taxonomy-term cf">';
//        $out .= '<a name="'.slugify($term->name).'"></a><h2 class="taxonomy-title rw_ultra_bold">'.$term->name.'</h2>';
//        $out .= '<div class="taxonomy-nodes cf accordion">';
//
//        foreach ($nodes as $idx => $node) {
//          $out .= node_view($node);
//        }
//
//        $out .= '</div></div>';
//      }
//    }
//    $out .= '</div>';
//  } else {
//    if (count($tids) == 1) {
//      $term = taxonomy_get_term($tids[0]);
//      $description = $term->description;
//
//      if (!empty($description)) {
//        $out .= '<div class="taxonomy-term-description">';
//        $out .= filter_xss_admin($description);
//        $out .= '</div>';
//      }
//    }
//
//    while ($node = db_fetch_object($result)) {
//      $out .= node_view(node_load($node->nid));
//    }
//  }
//
//  return $out;
//}

function joycone_uc_ups_option_label($service, $packages) {
  // Start with logo as required by the UPS terms of service.
  $output  = theme('image',
    drupal_get_path('module', 'uc_ups') . '/uc_ups_logo.gif',
    t('UPS logo'),
    '',
    array('class' => 'ups-logo')
  );

  // Add the UPS service name.
  $output .= t('@service Rate', array('@service' => $service));

  // Add package information
  //$output .= ' ('. format_plural(count($packages), '1 package', '@count packages') .')';

  return $output;
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}

/** FROM DRUPAL 7 */
if (!function_exists('request_path')) {
  function request_path() {
    static $path;

    if (isset($path)) {
      return $path;
    }

    if (isset($_GET['q']) && is_string($_GET['q'])) {
      $path = $_GET['q'];
    }
    elseif (isset($_SERVER['REQUEST_URI'])) {
      $request_path = strtok($_SERVER['REQUEST_URI'], '?');
      $base_path_len = strlen(rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
      $path = substr(urldecode($request_path), $base_path_len + 1);
      if ($path == basename($_SERVER['PHP_SELF'])) {
        $path = '';
      }
    }
    else {
      $path = '';
    }

    $path = trim($path, '/');

    return $path;
  }
}

if (!function_exists('slugify')) {
  function slugify($str) {
    return strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $str));
  }
}

function joycone_body_classes($path) {
  $parts = explode('/', $path);
  $classes = array();
  $last_class = 'page';
  foreach ($parts as $part) {
    $last_class .= '-'.slugify($part);
    $classes[] = $last_class;
  }
  $last_class .= '-end';
  $classes[] = $last_class;
  return join(' ', $classes);
}
