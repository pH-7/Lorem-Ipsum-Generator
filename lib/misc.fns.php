<?php
/**
 * @category         Lorem Ipsum Generator
 * @package          String
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @link             http://github.com/pH-7/Lorem-Ipsum-Generator
 * @license          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

defined('PH') or die('Forbidden acces');

/**
 * Get the output format of the LoremIpsum class.
 *
 * @param string  $sFormat 'html', 'plain' or 'text'
 * @return integer LoremIpsum constant.
 */
function getLoremIpsumFormat($sFormat)
{
    switch($sFormat)
    {
        case 'html':
            $iFormat = LoremIpsum::HTML_FORMAT;
        break;

        case 'plain':
            $iFormat = LoremIpsum::PLAIN_FORMAT;
        break;

        default:
            $iFormat = LoremIpsum::TEXT_FORMAT;
    }

    return $iFormat;
}
