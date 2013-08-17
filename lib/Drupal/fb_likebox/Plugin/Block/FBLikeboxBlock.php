<?php
/**
 * @file
 * Contains \Drupal\fb_likebox\Plugin\Block\FBLikeboxBlock.
 */

namespace Drupal\fb_likebox\Plugin\Block;

use Drupal\block\BlockBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * Provides a configurable block with Facebook Likebox's plugin.
 *
 * @Plugin(
 *   id = "fb_likebox_block",
 *   admin_label = @Translation("FB Likebox"),
 *   module = "fb_likebox"
 * )
 */
class FBLikeboxBlock extends BlockBase {

  /**
   * Overrides \Drupal\block\BlockBase::settings().
   */
  public function settings() {
    return array(
        'seconds_online' => 900,
        'max_list_count' => 10
    );
  }
  /**
   * Overrides \Drupal\block\BlockBase::blockForm().
   */
  public function blockForm($form, &$form_state) {
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
      '#required' => TRUE,
    );
    $form['fb_likebox_display_settings']['fb_likebox_colorscheme'] = array(
      '#type' => 'select',
      '#title' => t('Color Scheme'),
      '#default_value' => variable_get('fb_likebox_colorscheme', 'light'),
      '#options' => array(
        'light' => t('Light'),
        'dark' => t('Dark'),
      ),
      '#description' => t("The color scheme for the plugin. Options: 'light', 'dark'."),
      '#required' => TRUE,
    );
    $form['fb_likebox_display_settings']['fb_likebox_header'] = array(
      '#type' => 'select',
      '#title' => t('Header'),
      '#default_value' => variable_get('fb_likebox_header', 'true'),
      '#options' => array(
        'false' => t('No'),
        'true' => t('Yes'),
      ),
      '#description' => t('Specifies whether to display the Facebook header at the top of the plugin.'),
      '#required' => TRUE,
    );
    $form['fb_likebox_display_settings']['fb_likebox_stream'] = array(
      '#type' => 'select',
      '#title' => t('Stream'),
      '#default_value' => variable_get('fb_likebox_stream', 'true'),
      '#options' => array(
        'false' => t('No'),
        'true' => t('Yes'),
      ),
      '#description' => t("Specifies whether to display a stream of the latest posts from the Page's wall."),
      '#required' => TRUE,
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
      '#required' => TRUE,
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
      '#required' => TRUE,
    );
    $form['fb_likebox_display_settings']['fb_likebox_force_wall'] = array(
        '#type' => 'select',
        '#title' => t('Force wall'),
        '#default_value' => variable_get('fb_likebox_force_wall', 'false'),
        '#options' => array(
            'false' => t('No'),
            'true' => t('Yes'),
        ),
        '#description' => t('For Places: specifies whether the stream contains posts from the Places wall or just checkins from friends.'),
        '#required' => TRUE,
    );
    // Theming settings.
    $form['fb_likebox_theming_settings']['fb_likebox_width'] = array(
      '#type' => 'textfield',
      '#title' => t('Width'),
      '#default_value' => variable_get('fb_likebox_width', '292'),
      '#description' => t('The width of the Facebook likebox in pixels.'),
      '#required' => TRUE,
    );
    $form['fb_likebox_theming_settings']['fb_likebox_height'] = array(
      '#type' => 'textfield',
      '#title' => t('Height'),
      '#default_value' => variable_get('fb_likebox_height', '556'),
      '#description' => t('The height of the plugin in pixels. The default height provided by Facebook API varies based on number of faces to display, and whether the stream is displayed. With the stream displayed, and 10 faces the default height is 556px. With no faces, and no stream the default height is 63px. You will need to play with these value if you haved disabled those features and you want the block to be displayed without an empty section.'),
      '#required' => TRUE,
    );
    $form['fb_likebox_theming_settings']['fb_likebox_show_border'] = array(
        '#type' => 'select',
        '#title' => t('Border'),
        '#default_value' => variable_get('fb_likebox_show_border', 'true'),
        '#options' => array(
            'false' => t('No'),
            'true' => t('Yes'),
        ),
        '#description' => t('Specifies whether or not to show a border around the plugin. Set to false to style the iframe with your custom CSS.'),
        '#required' => TRUE,
    );
    return $form;
  }
  
  /**
   * Overrides \Drupal\block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, &$form_state) {
    $this->configuration['seconds_online'] = $form_state['values']['user_block_seconds_online'];
    $this->configuration['max_list_count'] = $form_state['values']['user_block_max_list_count'];
  }
  
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = array(
        //'#theme' => 'item_list__user__online',
        '#prefix' => '<p> This is just a test</p>',
    );
    return $build;
  }
}
?>