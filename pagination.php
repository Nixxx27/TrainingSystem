<?php
	require 'sec_access.php';
    include 'class.php';


//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 15;

// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

//Query
$db = new connection();
$db=$db->hrDbConnect();

$sql = 
	"SELECT SQL_CALC_FOUND_ROWS	
	ID, strpicture, stridnumber, strfullname, strcompany, strdepartment, strposition, strdateofhire
	FROM tms_notify 
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
           background-color:#e1e1e1;
        }
        .control{
        	text-align: center;
        }
        
		.control p > a {
		    font-weight: bold;
		    color:black;
		}
		.control p >a.selected{
		    font-weight: bold;
		    color:#1979ed;
		    border-bottom:1px solid;
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
			<th>ID</th>
			<th>Picture</th>
			<th>ID #</th>
			<th>Name</th>
			<th>Company</th>
			<th>Department</th>
			<th>Position</th>
			<th>Date of Hire</th>
			<th>View</th>


			<?php foreach($employees as $employees):?>
				<tr>
					<td><?php echo $employees->ID; ?>.</td>
					<td><?php echo $employees->strpicture; ?></td>
					<td><?php echo $employees->stridnumber; ?></td>
					<td><?php echo ucfirst($employees->strfullname); ?></td>
					<td><?php echo $employees->strcompany; ?></td>
					<td><?php echo $employees->strdepartment; ?></td>
					<td><?php echo $employees->strposition; ?></td>
					<td><?php echo $employees->strdateofhire; ?></td>
					<td><button id="<?php echo $employees->ID; ?>">View</button> </td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="control">
		<?php $p =$page; ($p > 1)?$previous = $p-1:$previous =1?> <!--previous-->
			<a href="?page=<?php echo $previous?>&per-page=<?php echo $perPage ?>"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
		<?php $n =$page; ($n < $pages)?$next = $n+1:$next =$page;?> <!--next-->
			<a href="?page=<?php echo $next?>&per-page=<?php echo $perPage ?>"> <i class="fa fa-chevron-circle-right fa-2x"></i></a>
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

<?php include('footer.php'); ?>

<script type="text/javascript">
	$('#next').on('click',function(){

	})

</script>

   
