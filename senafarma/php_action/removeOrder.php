<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

//$orderId = $_POST['orderId'];
$orderId= $_GET['id'];
if($orderId) { 

 $sql = "UPDATE orders SET delete_status = 2 WHERE id = {$orderId}";

 $orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  id = {$orderId}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../Order.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST