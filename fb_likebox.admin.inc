<?php

/**
 * @file
 * Administration page callbacks
 */

/**
 * Implements hook_admin_settings().
 */
function fb_likebox_admin_settings() {
  // Facebook Widget settings.
  $form['fb_likebox_display_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Display options'),
    '#collapsible' => FALSE,
  );
  $form['fb_likebox_theming_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theming Settings'),
    '#collapsible' => FALSE,
  );

  // Display settings.
  $form['fb_likebox_display_settings']['fb_likebox_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Page URL'),
    '#default_value' => variable_get('fb_likebox_url', 'http://www.facebook.com/wikisaber.es'),
    '#description' => t('Enter the Facebook Page URL. I.e.: http://www.facebook.com/wikisaber.es'),
  );
  $form['fb_likebox_display_settings']['fb_likebox_colorscheme'] = array(
    '#type' => 'select',
    '#title' => t('Color Scheme'),
    '#default_value' => variable_get('fb_likebox_colorscheme', 'light'),
    '#options' => array(
      'light' => t('Light'),
      'dark' => t('Dark'),
    ),
    '#description' => t("The color scheme for the plugin. Options: 'light', 'dark'"),
  );
  $form['fb_likebox_display_settings']['fb_likebox_header'] = array(
    '#type' => 'select',
    '#title' => t('Header'),
    '#default_value' => variable_get('fb_likebox_header', 'true'),
    '#options' => array(
      'false' => t('No'),
      'true' => t('Yes'),
    ),
    '#description' => t('Specifies whether to display the Facebook header at the top of the plugin'),
  );
  $form['fb_likebox_display_settings']['fb_likebox_stream'] = array(
    '#type' => 'select',
    '#title' => t('Stream'),
    '#default_value' => variable_get('fb_likebox_stream', 'true'),
    '#options' => array(
      'false' => t('No'),
      'true' => t('Yes'),
    ),
    '#description' => t("Specifies whether to display a stream of the latest posts from the Page's wall"),
  );
  $form['fb_likebox_display_settings']['fb_likebox_show_faces'] = array(
    '#type' => 'select',
    '#title' => t('Show Faces'),
    '#default_value' => variable_get('fb_likebox_show_faces', 'true'),
    '#options' => array(
      'false' => t('No'),
      'true' => t('Yes'),
    ),
    '#description' => t('Specifies whether or not to display profile photos in the plugin.'),
  );
  $form['fb_likebox_display_settings']['fb_likebox_scrolling'] = array(
    '#type' => 'select',
    '#title' => t('Scrolling'),
    '#default_value' => variable_get('fb_likebox_scrolling', 'no'),
    '#options' => array(
      'no' => t('Disabled'),
      'yes' => t('Enabled'),
    ),
    '#description' => t('Enables vertical scrolling'),
  );

  // Theming settings.
  $form['fb_likebox_theming_settings']['fb_likebox_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#default_value' => variable_get('fb_likebox_width', '292'),
    '#description' => t('The width of the Facebook likebox in pixels'),
  );
  $form['fb_likebox_theming_settings']['fb_likebox_height'] = array(
    '#type' => 'textfield',
    '#title' => t('Height'),
    '#default_value' => variable_get('fb_likebox_height', '556'),
    '#description' => t('The height of the plugin in pixels. The default height provided by Facebook API varies based on number of faces to display, and whether the stream is displayed. With the stream displayed, and 10 faces the default height is 556px. With no faces, and no stream the default height is 63px. You will need to play with these value if you haved disabled those features and you want the block to be displayed without an empty section.'),
  );
  return system_settings_form($form);
}

/**
 * Validates the Facebook Widget admin configuration form.
 *
 * It will be called automatically by drupal after processing the form.
 */
function fb_likebox_admin_settings_validate($form, $form_state) {
  // Facebook display settings validation.
  $fb_url = $form_state['values']['fb_likebox_url'];
  if (!valid_url($fb_url, TRUE)) {
    form_set_error('fb_likebox_url', t('Please enter a valid url'));
  }

  // Facebook theming settings validation.
  $fb_width = $form_state['values']['fb_likebox_width'];
  if (!is_numeric($fb_width) || intval($fb_width) <= 0) {
    form_set_error('fb_likebox_width', t('Width should be a number bigger than 0'));
  }

  $fb_height = $form_state['values']['fb_likebox_height'];
  if (!is_numeric($fb_height) || intval($fb_height) <= 0) {
    form_set_error('fb_likebox_height', t('Height should be a number bigger than 0'));
  }
}
