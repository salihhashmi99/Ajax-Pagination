<?php
include("./db_connect.php");

$per_page = 20;
if(isset($_GET['page'])) {
$page=$_GET['page'];
}
else{
    $page=1;
}
$start = ($page-1)*$per_page;
$query=$conn->prepare("SELECT * FROM students ORDER BY students_id LIMIT $start,$per_page ");
$query->execute();
$resultset = $query->get_result();
?>

<table width="100%">
<thead>
<tr>
<th>Students_ID</th>
<th>Students Name</th>
</tr>
</thead>
<?php
while($rows =$resultset->fetch_assoc()){?>
<tr bgcolor="#DDEBF5">
<td><?php echo $rows['students_id']; ?></td>
<td><?php echo $rows['students_name']; ?></td>
</tr>
<?php
}
?>