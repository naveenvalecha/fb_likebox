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
    $period = drupal_map_assoc(array(30, 60, 120, 180, 300, 600, 900, 1800, 2700, 3600, 5400, 7200, 10800, 21600, 43200, 86400), 'format_interval');
    $form['user_block_seconds_online'] = array(
        '#type' => 'select',
        '#title' => t('User activity'),
        '#default_value' => $this->configuration['seconds_online'],
        '#options' => $period,
        '#description' => t('A user is considered online for this long after they have last viewed a page.')
    );
    $form['user_block_max_list_count'] = array(
        '#type' => 'select',
        '#title' => t('User list length'),
        '#default_value' => $this->configuration['max_list_count'],
        '#options' => drupal_map_assoc(array(0, 5, 10, 15, 20, 25, 30, 40, 50, 75, 100)),
        '#description' => t('Maximum number of currently online users to display.')
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