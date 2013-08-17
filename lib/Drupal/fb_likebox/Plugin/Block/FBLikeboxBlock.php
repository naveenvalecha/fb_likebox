<?php
/**
 * @file
 * Contains \Drupal\user\Plugin\Block\FBLikeboxBlock.
 */

namespace Drupal\user\Plugin\Block;

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
class UserOnlineBlock extends BlockBase {

  /**
   * Overrides \Drupal\block\BlockBase::settings().
   */
  public function settings() {
    return array(
        'properties' => array(
            'administrative' => TRUE
        ),
        'seconds_online' => 900,
        'max_list_count' => 10
    );
  }
}
?>