<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$content = explode("\n", $content);

foreach ($content as $line) :
    //echo '<p> ' . $line . "</p>\n";
endforeach;?>
<p style="text-align:center"><?php echo $this->Html->image("logo.png", ['fullBase' => true]); ?></p>
<p style="">Dear <?php echo $name ?>,</p>
<p>your complaint   <b><?php echo  $complaint_id ?> is  Closed</b></p>
<br><br>
<p><b>Regards,</b></p>
<p>MyVoice Team</p>





