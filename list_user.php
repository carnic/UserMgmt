
<?php
include_once 'dbconfig.php';
include_once 'user_dao.php';

// delete condition
if(isset($_GET['delete_id']))
{
	$user_operations = new UserOperations();
	$user_operations->delete_user(false);
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Management System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)
{
 if(confirm('Sure to edit ?'))
 {
  window.location.href='edit_users.php?edit_id='+id;
 }
}
function delete_id(id)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='list_user.php?delete_id='+id;
 }
}
</script>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>User Management System</label>
    </div>
</div>

<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th colspan="5"><a href="user_signup.php">add data here.</a></th>
    </tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City Name</th>
    <th colspan="2">Operations</th>
    </tr>
    <?php
 $sql_query="SELECT * FROM users";
 $result_set=mysql_query($sql_query);
 while($row=mysql_fetch_row($result_set))
 {
  ?>
        <tr>
		<td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
  <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img height="20px" width="20px" src="b_edit.png" align="EDIT" /></a></td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img height="20px" width="20px" src="b_delete.png" align="DELETE" /></a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    </div>
</div>

</center>
</body>
</html>
