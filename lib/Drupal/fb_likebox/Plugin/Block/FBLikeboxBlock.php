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
      'properties' => array(
        'administrative' => TRUE
      ),
      'fb_likebox_url' => 'http://www.facebook.com/wikisaber.pt',
      'fb_likebox_colorscheme' => 'light',
      'fb_likebox_header' => 'true',
      'fb_likebox_stream' => 'true',
      'fb_likebox_show_faces' => 'true',
      'fb_likebox_scrolling' => 'no',
      'fb_likebox_force_wall' => 'false',
      'fb_likebox_width' => 292,
      'fb_likebox_height' => 556,
      'fb_likebox_show_border' => 'true',
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
      '#default_value' => $this->configuration['fb_likebox_url'],
      '#description' => t('Enter the Facebook Page URL. I.e.: http://www.facebook.com/wikisaber.es'),
      '#required' => TRUE,
    );
    $form['fb_likebox_display_settings']['fb_likebox_colorscheme'] = array(
      '#type' => 'select',
      '#title' => t('Color Scheme'),
      '#default_value' => $this->configuration['fb_likebox_colorscheme'],
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
      '#default_value' => $this->configuration['fb_likebox_header'],
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
      '#default_value' => $this->configuration['fb_likebox_stream'],
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
      '#default_value' => $this->configuration['fb_likebox_show_faces'],
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
      '#default_value' => $this->configuration['fb_likebox_scrolling'],
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
        '#default_value' => $this->configuration['fb_likebox_force_wall'],
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
      '#default_value' => $this->configuration['fb_likebox_width'],
      '#description' => t('The width of the Facebook likebox in pixels.'),
      '#required' => TRUE,
    );
    $form['fb_likebox_theming_settings']['fb_likebox_height'] = array(
      '#type' => 'textfield',
      '#title' => t('Height'),
      '#default_value' => $this->configuration['fb_likebox_height'],
      '#description' => t('The height of the plugin in pixels. The default height provided by Facebook API varies based on number of faces to display, and whether the stream is displayed. With the stream displayed, and 10 faces the default height is 556px. With no faces, and no stream the default height is 63px. You will need to play with these value if you haved disabled those features and you want the block to be displayed without an empty section.'),
      '#required' => TRUE,
    );
    $form['fb_likebox_theming_settings']['fb_likebox_show_border'] = array(
        '#type' => 'select',
        '#title' => t('Border'),
        '#default_value' => $this->configuration['fb_likebox_show_border'],
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
    $this->configuration['fb_likebox_url'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_url'];
    $this->configuration['fb_likebox_colorscheme'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_colorscheme'];
    $this->configuration['fb_likebox_header'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_header'];
    $this->configuration['fb_likebox_stream'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_stream'];
    $this->configuration['fb_likebox_show_faces'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_show_faces'];
    $this->configuration['fb_likebox_scrolling'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_scrolling'];
    $this->configuration['fb_likebox_force_wall'] = $form_state['values']['fb_likebox_display_settings']['fb_likebox_force_wall'];
    $this->configuration['fb_likebox_width'] = $form_state['values']['fb_likebox_theming_settings']['fb_likebox_width'];
    $this->configuration['fb_likebox_height'] = $form_state['values']['fb_likebox_theming_settings']['fb_likebox_height'];
    $this->configuration['fb_likebox_show_border'] = $form_state['values']['fb_likebox_theming_settings']['fb_likebox_show_border'];
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