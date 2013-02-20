<?php
/**
 * @category         Lorem Ipsum Generator
 * @package          String
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @link             http://github.com/pH-7/Lorem-Ipsum-Generator
 * @license          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

define('PH', 1);

require dirname(dirname(__FILE__)) . '/lib/LoremIpsum.class.php';
require dirname(dirname(__FILE__)) . '/lib/misc.fns.php';

$sNumWords = (!empty($_POST['count'])) ? $_POST['count'] : 300;
$sFormat = (!empty($_POST['format'])) ? $_POST['format'] : '';

$iFormat = getLoremIpsumFormat($sFormat);

try
{
    // Create LoremIpsum object
    $oLoremIpsum = new LoremIpsum($sNumWords, $iFormat);

    // Output LoremIpsum's contents
    echo $oLoremIpsum;
}
catch(Exception $oE)
{
    echo $oE->getMessage();
}
