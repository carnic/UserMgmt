<?php
error_reporting(E_ERROR | E_PARSE);

$node1="NODE1_IP:3306";
$node2="NODE2_IP:3306";

$user="root";
$pass="root";
$datbase = "dbtuts";

# Checking db connections
# Load balancing can be used here
if( !mysql_connect($node1, $user, $pass) ){

#if( !$conn_node1 ){
        #echo "Node 1" . mysql_error();
      $conn_node2 = mysql_connect($node2, $user, $pass);
      if (!$conn_node2){
                echo "Not been able to connect to both nodes " . mysql_error();
      }else{
        echo "Connected node 2";
      }
}else{
        echo "Connected to node1";
}

mysql_select_db($datbase);

?>
