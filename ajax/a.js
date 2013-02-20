/*
 * Author:           Pierre-Henry Soria <ph7software@gmail.com>
 * Copyright:        (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * Link:             http://github.com/pH-7/Lorem-Ipsum-Generator
 * License:          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

$('#submit').click( function() {
    var sFormName = 'form[name=loremipsum] ';
    var oData = {count : $(sFormName + '#number').val(), format : $(sFormName + '#format').val()};
    $.post('ajax/b.php', oData, function(sOutput) {$('#output').text(sOutput)});
});
