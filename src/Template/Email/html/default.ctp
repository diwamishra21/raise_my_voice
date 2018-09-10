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
echo $this->Html->image("logo.png", ['fullBase' => true]);
foreach ($content as $line) :
    //echo '<p> ' . $line . "</p>\n";
endforeach;?>


<p style="text-align:center;">Hi <?php echo $name ?>, Your ComplaintId <?php echo  $complaint_id ?> is successfully genrate <br> our team reply as soon as. </p>






