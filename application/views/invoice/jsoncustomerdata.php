<?php

if(!empty($customer)){
	foreach($customer as $row){
	     $json[] = ['id'=>$row['customer_code'], 'text'=>$row['customer_name']];
	}

	echo json_encode($json);

}



?>