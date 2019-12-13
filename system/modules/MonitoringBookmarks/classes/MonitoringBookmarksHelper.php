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
 * Run in a custom namespace, so the class can be replaced
 */
namespace Monitoring;

/**
 * Class MonitoringBookmarksHelper
 *
 * Class for handling the colors;
 * @copyright  Cliff Parnitzky 2019-2019
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class MonitoringBookmarksHelper extends \System
{
  /**
   * Render the bookmakrs button and the list of links
   * @return string
   */
  public static function renderBookmarksList($varId)
  {
    $objMonitoringEntry = \MonitoringModel::findByPk($varId);
    
    $strReturn = '';
    $arrBookmarks = deserialize($objMonitoringEntry->bookmarks, true);
    
    foreach ($arrBookmarks as $bookmark)
    {
      if (!empty($bookmark['url']))
      {
        $strReturn .= '<li><a href="' . $bookmark['url'] . '" target="_blank">' . (!empty($bookmark['label']) ? $bookmark['label'] : $bookmark['url']) .'</a></li>';
      }
    }
    
    if (!empty($strReturn))
    {
      return '<span class="popup-menu-items"><ul>' . $strReturn . '</ul></span>';
    }
    
    return '';
  }
}

?>