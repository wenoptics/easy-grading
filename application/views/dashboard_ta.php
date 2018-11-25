<?php
/**
 * Created by PhpStorm.
 * User: wenop
 * Date: 11/19/2018
 * Time: 9:20 PM
 */
?>
	<h1>Dashboard</h1>
<?php
	echo 'hello ' . $ta_firstname;
?>

	<h3>My Instructors</h3>

	<ul>
	<?php foreach ($instructor_list as $item):?>

		<li><?php echo $item;?></li>

	<?php endforeach;?>
	</ul>


