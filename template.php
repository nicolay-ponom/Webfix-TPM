<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function webfix_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * HTML preprocessing
 */
function webfix_preprocess_html(&$vars) {
  // Add body classes for custom design options
  $colors = theme_get_setting('color_scheme', 'webfix');
  $classes = explode(" ", $colors);
  if (!theme_get_setting('backgroundimg', 'webfix')){
    $vars['classes_array'][] = 'nobkimg';
  }
  for($i=0; $i<count($classes); $i++){
    $vars['classes_array'][] = $classes[$i];
  }
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function webfix_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
    $breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

/**
 * Override or insert variables into the page template.
 */
function webfix_preprocess_page(&$vars) {
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function webfix_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function webfix_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Add css for color style.
 */
if (theme_get_setting('color_scheme', 'webfix') == 'dark') {
  drupal_add_css(drupal_get_path('theme', 'webfix') . '/css/color-schemes.css');
}

/**
 * Add css for background image.
 */
if (!theme_get_setting('backgroundimg', 'webfix')) {
  drupal_add_css(drupal_get_path('theme', 'webfix') . '/css/background.css');
}

/**
 * Add javascript files for front-page jquery slideshow.

if (drupal_is_front_page()) {
  if (theme_get_setting('slideshow_display', 'webfix')){
    drupal_add_js(drupal_get_path('theme', 'webfix') . '/js/slides.min.jquery.js');
    drupal_add_js(drupal_get_path('theme', 'webfix') . '/js/slider.js');
  }
}
 */

/*$element = array(
'#tag' => 'link', // The #tag is the html tag -
'#attributes' => array( // Set up an array of attributes inside the tag
'href' => 'http://fonts.googleapis.com/css?family=Chela+One',
'rel' => 'stylesheet',
'type' => 'text/css',
),
);
drupal_add_html_head($element, 'Chela One');
*/

function theme_preprocess_page(&$variables, $hook) {
    $fid = theme_get_setting('slide_file_1');
    $variables['slide_url'] = file_create_url(file_load($fid)->uri);
}
