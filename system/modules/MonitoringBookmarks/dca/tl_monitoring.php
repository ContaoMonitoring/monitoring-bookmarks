<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2019 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2019-2019
 * @author     Cliff Parnitzky
 * @package    MonitoringBookmarks
 * @license    LGPL
 */

/**
 * Add css for styling global operations button
 */
$GLOBALS['TL_CSS'][] = 'system/modules/MonitoringBookmarks/assets/styles.css';

/**
 * Add operations
 */
$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['bookmarks'] = array
(
  'icon'                => 'system/modules/MonitoringBookmarks/assets/icon_bookmarks.png',
  'button_callback'     => array('tl_monitoring_MonitoringBookmarks', 'renderBookmarksButton')
);

/**
 * Add to palette
 */
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['default'] .= ";{bookmarks_legend},bookmarks";

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['bookmarks'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_monitoring']['bookmarks'],
  'exclude'                 => true,
  'inputType'               => 'multiColumnWizard',
  'eval'                    => array
  (
    'tl_class'     => 'clr',
    'mandatory'    => false,
    'columnFields' => array
    (
      'url' => array
      (
        'label'         => &$GLOBALS['TL_LANG']['tl_monitoring']['bookmark_url'],
        'inputType'     => 'text',
        'eval'          => array('rgxp' => 'url', 'style'=>'width: 22rem')
      ),
      'label' => array
      (
        'label'         => &$GLOBALS['TL_LANG']['tl_monitoring']['bookmark_label'],
        'inputType'     => 'text',
        'eval'          => array('style'=>'width: 22rem')
      )
    ) 
  ),
  'sql'                     => "blob NULL"
);

/**
 * Class tl_monitoring_MonitoringBookmarks
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2019-2019
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_monitoring_MonitoringBookmarks
{
  /**
   * Generate the bookmarks button
   *
   * @param array  $row
   * @param string $href
   * @param string $label
   * @param string $title
   * @param string $icon
   *
   * @return string
   */
  public function renderBookmarksButton($row, $href, $label, $title, $icon)
  {
    $strBookmarksList = MonitoringBookmarksHelper::renderBookmarksList($row['id']);
    return (!empty($strBookmarksList)) ? '<div class="popup-menu">'.\Image::getHtml($icon).$strBookmarksList.'</div> ' : \Image::getHtml(preg_replace('/\.png$/i', '_.png', $icon)).' ';
  }
}

?>