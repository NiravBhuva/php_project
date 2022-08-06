

<?php
include "Header.php";
$cartId=$_REQUEST['cartId'];
$cardId=$_REQUEST['cardId'];

$array = $_SESSION['cart'];

for ($i = 0; $i < count($array); $i++) {
	$item = $array[$i];
	
	if($item['id'] == $cardId && $i+1 == $cartId){
		\array_splice($array, $i, 1);
		$_SESSION['cart'] = $array;
	}
}

?>
<script>
	window.location="checkout.php";
</script>