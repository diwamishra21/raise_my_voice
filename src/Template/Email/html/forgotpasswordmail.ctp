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
 <p>Please use the below credentials to login   </p>
 <p>    <b>Email Id</b>&nbsp; - <?php echo $user_email ?> </p>
 <p>   <b> Password </b>- <?php echo $pass ?></p>
  <?php $base_url=  $this->Url->build('/', true);?>
 <p>Click here to login-  <a href="<?php echo $base_url ?>"><?php echo $base_url ?></a></p><br><br>
 
 <p><b>Regards,</b></p>
<p>MyVoice Team</p>

 






