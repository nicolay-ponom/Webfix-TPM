<?php

function webfix_form_system_theme_settings_alter(&$form, &$form_state) {

/* COLOR */
  $form['webfix_color_settings'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Color Scheme'),
    '#weight' => -2,
    '#description'   => t("Select a predesigned color scheme for the site."),
  );

  $form['webfix_color_settings']['color_scheme'] = array(
    '#type'          => 'select',
    '#title'         => t('Color Scheme'),
    '#default_value' => theme_get_setting('color_scheme', 'webfix'),
    '#description'   => t('Select a predesigned color scheme.'),
    '#options'       => array(
      'white' => t('White'),
      'dark' => t('Dark'),
     ),
  );

/* SETTINGS */
  $form['webfix_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Webfix Theme Settings'),
    '#weight' => -1,
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['webfix_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs', 'webfix'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['webfix_settings']['backgroundimg'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Body Background Image'),
    '#default_value' => theme_get_setting('backgroundimg', 'webfix'),
    '#description'   => t("Check this option to show Body Background Image. Uncheck to hide."),
  );

/* SOCIAL */
  $form['webfix_settings']['top_social_link'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['webfix_settings']['top_social_link']['social_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show social icons (Facebook, Twitter and RSS) in header'),
    '#default_value' => theme_get_setting('social_links', 'webfix'),
    '#description'   => t("Check this option to show twitter, facebook, rss icons in header. Uncheck to hide."),
  );
  $form['webfix_settings']['top_social_link']['twitter_username'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Username'),
    '#default_value' => theme_get_setting('twitter_username', 'webfix'),
    '#description'   => t("Enter your Twitter username."),
  );
  $form['webfix_settings']['top_social_link']['facebook_username'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Username'),
    '#default_value' => theme_get_setting('facebook_username', 'webfix'),
    '#description'   => t("Enter your Facebook username."),
  );

/* SLIDESHOW */
  $form['webfix_settings']['tabs']['slideshow'] = array(
    '#type' => 'fieldset',
    '#title' => t('slideshow links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['webfix_settings']['tabs']['slideshow']['slideshow_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show slideshow'),
    '#default_value' => theme_get_setting('slideshow_display','webfix'),
    '#description'   => t("Check this option to show Slideshow in front page. Uncheck to hide."),
  );
  $form['webfix_settings']['tabs']['slideshow']['slideimage'] = array(
    '#markup' => t('To change the Slide Images, Replace the slide1.jpg, slide2.jpg, slide3.jpg and slide4.jpg in the slider_img folder  of the farside theme folder.'),
  );
  $form['webfix_settings']['tabs']['slideshow']['subsiler_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show four nice blocks under slider'),
    '#default_value' => theme_get_setting('subsiler_display', 'webfix'),
    '#description'   => t("Check this option to show underslider blocks. Uncheck to hide."),
  );
$form['webfix_settings']['tabs']['slideshow']['slide_file_1'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Slide 1'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/slides/',
    '#default_value' => theme_get_setting('slide_file_1'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
$form['webfix_settings']['tabs']['slideshow']['slide_file_2'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Slide 2'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/slides/',
    '#default_value' => theme_get_setting('slide_file_2'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
$form['webfix_settings']['tabs']['slideshow']['slide_file_3'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Slide 3'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/slides/',
    '#default_value' => theme_get_setting('slide_file_3'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
$form['webfix_settings']['tabs']['slideshow']['slide_file_4'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Slide 4'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/slides/',
    '#default_value' => theme_get_setting('slide_file_4'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
$form['webfix_settings']['tabs']['slideshow']['slide_file_5'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Slide 5'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/slides/',
    '#default_value' => theme_get_setting('slide_file_1'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
  $form['webfix_settings']['tabs']['slideshow']['slideshow_block1'] = array(
    '#type' => 'textfield',
    '#title' => t('Link slideshow block 1'),
    '#default_value' => theme_get_setting('slideshow_block1', 'webfix'),
    '#description'   => t("The path for this menu link. This can be an internal Drupal path such as node/1 or an external URL such as http://drupal.org. "),
  );
  $form['webfix_settings']['tabs']['slideshow']['slideshow_block2'] = array(
    '#type' => 'textfield',
    '#title' => t('Link slideshow block 2'),
    '#default_value' => theme_get_setting('slideshow_block2', 'webfix'),
    '#description'   => t("The path for this menu link. This can be an internal Drupal path such as node/1 or an external URL such as http://drupal.org. "),
  );
  $form['webfix_settings']['tabs']['slideshow']['slideshow_block3'] = array(
    '#type' => 'textfield',
    '#title' => t('Link slideshow block 3'),
    '#default_value' => theme_get_setting('slideshow_block3', 'webfix'),
    '#description'   => t("The path for this menu link. This can be an internal Drupal path such as node/1 or an external URL such as http://drupal.org. "),
  );
  $form['webfix_settings']['tabs']['slideshow']['slideshow_block4'] = array(
    '#type' => 'textfield',
    '#title' => t('Link slideshow block 4'),
    '#default_value' => theme_get_setting('slideshow_block4', 'webfix'),
    '#description'   => t("The path for this menu link. This can be an internal Drupal path such as node/1 or an external URL such as http://drupal.org. "),
  );

/* FOOTER */
  $form['webfix_settings']['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['webfix_settings']['footer']['footer_copyright'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show copyright text in footer'),
    '#default_value' => theme_get_setting('footer_copyright','webfix'),
    '#description'   => t("Check this option to show copyright text in footer. Uncheck to hide."),
  );

/* UPLOAD */
$form['webfix_settings']['background_file'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Background'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/backgrounds/',
    '#default_value' => theme_get_setting('background_file'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
}

?>
