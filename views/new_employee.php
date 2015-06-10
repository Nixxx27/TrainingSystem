<?php
	require 'sec_access.php';
    include 'class.php';

//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 15;

//Order by ID Number
if(isset($_GET['orderById'])){
	$_SESSION['sortby'] = 'stridnumber';
		$_SESSION['orderByColorId']= "style='color:#1d1d1d'";
		$_SESSION['orderByColorName']= "";
		$_SESSION['orderByColorDept']= "";
}elseif(isset($_GET['orderByName'])){
	$_SESSION['sortby'] = 'strfullname';
		$_SESSION['orderByColorId']= "";
		$_SESSION['orderByColorName']= "style='color:#1d1d1d'";
		$_SESSION['orderByColorDept']= "";
}elseif(isset($_GET['orderByDept'])){
	$_SESSION['sortby'] = 'strdepartment';
		$_SESSION['orderByColorId']= "";
		$_SESSION['orderByColorName']= "";
		$_SESSION['orderByColorDept']= "style='color:#1d1d1d'";
}

//echo $orderBy =$_SESSION['sortby'];
$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'strfullname';

// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

//Query
$db = new connection();
$db=$db->hrDbConnect();

$sql = 
	"SELECT SQL_CALC_FOUND_ROWS	
	ID, strpicture, stridnumber, strfullname, strcompany, strdepartment, strposition, strdateofhire
	FROM tms_notify 
	WHERE stridnumber LIKE '1111%'
	ORDER BY {$orderBy}
	LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5

$stmt = $db->prepare($sql);
$stmt->execute();
$employees =$stmt->fetchAll(PDO::FETCH_OBJ);

//Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages =ceil($total / $perPage) //rounding up
     
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include 'head.php';
        echo pageTitle("Notification"); 
    ?>

    <style>
        .table>tbody>tr>td{
           border-top:none;
           font-size: 12px;
           font-family:arial;
           border:1px solid;
           background-color:#eff0f0;
           padding:6px;
        }
        th{
        	font-size:0.9em;
         }

	</style>
</head>

<body> 
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-1  col-md-1"><i class="fa fa-cube fa-spin fa-5x"></i> </div>
            <div class="col-sm-6 col-md-6"><img src='img/tmslogotop.png' class="img-responsive"></div>
            <div class="col-sm-5  col-md-5">
                <label>Date:</label>    <br / >
                <label>Time:</label>    <br / >
            </div>
        </div><!-- row -->
        <?php include('menu.php');?>
 	<div class="article">
		<table class="table">
			<th>Picture</th>
			<th id="thId" <?php echo $_SESSION['orderByColorId']; ?> title='Order by ID'>ID # <i class="fa fa-caret-down"></i></th>
			<th id="thName" <?php echo $_SESSION['orderByColorName']; ?> title='Order by Name'>Name <i class="fa fa-caret-down"></i></th>
			<th>Company</th>
			<th id="thDept" <?php echo $_SESSION['orderByColorDept']; ?> title='Order by Department'>Department <i class="fa fa-caret-down"></i></th>
			<th>Position</th>
			<th>Date of Hire</th>
			<th></th>


			<?php foreach($employees as $employees):?>
				<tr>
					<td align='center'><a href="<?php echo systemUrl('img').'/'.$employees->strpicture ?>" target="_blank" title='click to enlarge'><img src="<?php echo systemUrl('img').'/'.$employees->strpicture ?>" height='35px' width='auto'></a></td>
					<td><?php echo $employees->stridnumber; ?></td>
					<td><?php echo strtoupper($employees->strfullname); ?></td>
					<td><?php echo $employees->strcompany; ?></td>
					<td><?php echo $employees->strdepartment; ?></td>
					<td><?php echo $employees->strposition; ?></td>
					<td><?php echo $employees->strdateofhire; ?></td>
					<td><button id="<?php echo $employees->ID; ?>">Details</button> </td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="control">
		<!--previous-->
			<?php $p =$page; ($p > 1)?$previous = $p-1:$previous =1?> 
			<a href="?page=<?php echo $previous?>&per-page=<?php echo $perPage ?>"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
		<!--next-->
		<?php $n =$page; ($n < $pages)?$next = $n+1:$next =$page;?> 
			<a href="?page=<?php echo $next?>&per-page=<?php echo $perPage ?>"> <i id="next" class="fa fa-chevron-circle-right fa-2x"></i></a>
		<!--Pagination number-->
		<p>
			<?php for($x = 1; $x <= $pages; $x++): ?>
			<a href="?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>"
				<?php echo($page===$x)? "class='selected'" : "";?>
				><?php echo $x ?></a>
			<?php endfor; ?>
		</p>
	</div>


    <?php include('about.php');?>
    </div> <!-- /.container -->

</body>
</html>

<form id='orderByIdForm' method='GET' action=''>
	<input type="hidden" name="orderById" value='stridnumber'>
</form>

<form id='orderByNameForm' method='GET' action=''>
	<input type="hidden" name="orderByName" value='strfullname'>
</form>

<form id='orderByDeptForm' method='GET' action=''>
	<input type="hidden" name="orderByDept" value='strdepartment'>
</form>

<?php include('footer.php'); ?>
