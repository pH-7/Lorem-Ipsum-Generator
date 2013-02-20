<?php
/**
 * @package          Lorem Ipsum Generator
 * @category         String
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @link             http://github.com/pH-7/Lorem-Ipsum-Generator
 * @license          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

defined('PH') or die('Forbidden acces');

class LoremIpsum
{

    const
    PLAIN_FORMAT = 1,
    TEXT_FORMAT = 2,
    HTML_FORMAT = 3;

    private
    $_iTotalWords = 0,
    $_sContents = '';

    /**
     * Constructor.
     *
     * @param integer $iTotalWords Total characters.
     * @param integer $iFormat Constant: PLAIN_FORMAT, TEXT_FORMAT, HTML_FORMAT
     */
    public function __construct($iTotalWords, $iFormat)
    {
        $this->_iTotalWords = (int) $iTotalWords;

        switch($iFormat)
        {
            case self::PLAIN_FORMAT:
                $this->_sContents = $this->getPlain();
            break;

            case self::TEXT_FORMAT:
                $this->_sContents = $this->getText();
            break;

            case self::HTML_FORMAT:
                $this->_sContents = $this->getHtml();
            break;

            default:
                throw new Exception('Output Format for "Lorem Ipsum" is invalid!');
        }
    }

    /**
     * Output.
     *
     * @return string The contents.
     */
    public function __toString()
    {
        return $this->_sContents;
    }

    protected function getPlain()
    {
        $sText = $this->_getPlain();
        return str_replace(array("\n", "r", "\t"), '', $sText);
    }

    protected function getText()
    {
        return $this->_getPlain();
    }

    protected function getHtml()
    {
        $sText = $this->_getPlain();
        $sText = str_replace("\n", "</p>\n<p>", $sText);
        return '<p>' . $sText . '</p>';
    }

    private function _getWords()
    {
        $aWords = array();
        $sDictPath = __DIR__ . '/loremipsum.txt';
        $aDoctWords = file($sDictPath);

        for ($i = 0; $i < $this->_iTotalWords; $i++)
        {
            $iIndex = array_rand($aDoctWords);
            $sWord = str_replace(array("\n", "\r"), '', $aDoctWords[$iIndex]);

            if ($i > 0 && $aWords[$i-1] == $sWord)
                $i--;
            else
                $aWords[$i] = $sWord;
        }

        return $aWords;
    }

    private function _getPlain()
    {
        $sOutputText = '';
        $aWords = $this->_getWords();

        for ($i = 0, $iN = count($aWords); $i < $iN; $i++)
        {
            $sDelimiter =  ($i%12==4 ? ', ' : ($i%12==8 ? '. ' : ($i%12==1 ? "\n" : ' ')));
            $sOutputText .= ($i%12==9 ? ucfirst($aWords[$i]) : $aWords[$i]) . $sDelimiter;
        }

        return $sOutputText;
    }

}
