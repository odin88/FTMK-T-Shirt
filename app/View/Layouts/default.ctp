<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeDescription = "FTMK T Shirt";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('styles');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>
		</div>
		<div id="navigation">
		<?php 
			//Kalau tak login tunjuk link login
			
			if(!($this->Session->read('Auth.User'))):
		?>
			<?php echo $this->Html->link('Login' , array(
				'controller' => 'users',
				'action' => 'login'
			));
			?>

			<?php echo $this->Html->link('Order' , array(
				'controller' => 'orders',
				'action' => 'order'
			));
			?>
		<?php else :?>
		<?php //kalau dah login tunjukkan nama dan link yang admin boleh tengok ?>
		
		<?php echo $this->Html->link('Logout '.$this->Session->read('Auth.User.username') , array(
				'controller' => 'users',
				'action' => 'logout',

			));
			?>
		
		&nbsp;&nbsp;
		<?php echo $this->Html->link(__('Manage Sizes'), array('controller' => 'sizes', 'action' => 'index')); ?>		
		<?php echo $this->Html->link(__('Manage Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?>
		<?php echo $this->Html->link(__('Manage Orders'), array('controller' => 'orders', 'action' => 'index')); ?> 
		<?php endif; ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>