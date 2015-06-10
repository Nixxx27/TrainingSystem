<?php
	include '../init/config.php';
    include '../init/securityAccess.php';
    include $model->page('connection.php');
    include $model->page('pagination/pagination.php');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include $views->page('head.php');
        pageTitle("Notification"); 
    ?>
    <style type="text/css">
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
            <div class="col-sm-6 col-md-6"><img src="<?php echo $libs->page('img/tmslogotop.png')?>" class="img-responsive"></div>
            <div class="col-sm-5  col-md-5">
                <label>Date:</label>    <br / >
                <label>Time:</label>    <br / >
            </div>
        </div><!-- row -->
        <?php include $views->page('menu.php');?>
 	<div class="tableview">
		<form action="" id='searchByForm' method="GET">
 			<table class="pull-right">
 				<tr>
 					<td style="padding-right:5px;padding-bottom:3px">
 						<input type="hidden" class="form-control" name="search" id="searchInputBox">
 					</td>
 					<td style="padding-right:5px;padding-bottom:3px"><button class="btn btn-primary btn-sm" id="resetButton">Reset</button> </td>
 				</tr>
 			</table>
 		</form>

 		
 		<form action="" id='searchByForm' method="GET">
 			<table class="pull-right">
 				<tr>
 					<td style="padding-right:5px;padding-bottom:3px">
 						<input type="text" class="form-control" name="search" id="searchInputBox">
 					</td>
 					<td style="padding-right:5px;padding-bottom:3px"><button class="btn btn-primary btn-sm" id="searchButton">Search</button> </td>
 					</tr>
 			</table>
 		</form>
 		
		<table class="table">
			<th>Picture</th>
			<th title='Order by ID'>
				<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>&orderById=set">
					ID # <i class="fa fa-caret-down"></i>
				</a>
			</th>
			
			<th title='Order by Name'>
				<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>&orderByName=set">
					Name <i class="fa fa-caret-down"></i>
				</a>
			</th>
			
			<th>Company</th>
			<th id="thDept" <?php echo $_SESSION['orderByColorDept']; ?> title='Order by Department'>Department <i class="fa fa-caret-down"></i></th>
			<th>Position</th>
			<th>Date of Hire</th>
			<th></th>
			<?php foreach($employees as $employees):?>
				<tr>
					<td align='center'><a href="<?php echo $libs->page('img').'/'.$employees->strpicture ?>" target="_blank" title='click to enlarge'><img src="<?php echo $libs->page('img').'/'.$employees->strpicture ?>" height='35px' width='auto'></a></td>
					<td><?php echo $employees->stridnumber; ?></td>
					<td><?php echo strtoupper($employees->strfullname); ?></td>
					<td><?php echo $employees->strcompany; ?></td>
					<td><?php echo $employees->strdepartment; ?></td>
					<td><?php echo $employees->strposition; ?></td>
					<td><?php echo $employees->strdateofhire; ?></td>
					<td align='center'><button id="<?php echo $employees->ID; ?>">Details</button> </td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
		<div class="control">
			<?php include $model->page('pagination/controller.php'); ?>
		</div>


    <?php include $views->page('about.php');?>
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

<?php include $views->page('footer.php'); ?>
