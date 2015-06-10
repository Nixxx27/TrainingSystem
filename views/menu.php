


<?php

$con = mysql_connect("localhost","root","nikkoz06");
    if (!$con){
    die("Can not connect: " . mysql_error());
    }
    mysql_select_db("slpi",$con);


        $query = "SELECT COUNT(*) AS total FROM tms_notify";
        $result = mysql_query($query); 
        $values = mysql_fetch_assoc($result); 
        $num_total = $values['total'];  
  
?>

<div id='cssmenu'>
<ul>


  <li  class="active"><a href='<?php echo systemUrl('notification.php');?>'><span><i class="fa fa-home"></i> Home</span></a></li>

  
   <li class='has-sub'><a href='#'><span><i class="fa fa-users"></i> Employees</span></a>
      <ul>
         <li  class='has-sub'><a href="<?php echo systemUrl('new_employee.php');?>"><span title="Check new hired/resigned employee">Notification <span class="badge">&nbsp;<?php echo $num_total; ?>&nbsp;</span> 
         </span></a></li>
      </ul>
   </li>


    <li class='last has-sub'><a href='#'><span><i class="fa fa-user"></i> Training</span></a>
      <ul>
          <li class='has-sub'><a href='<?php echo systemUrl('position-training.php');?>'><span>Training per Position <i class="fa fa-chevron-right"></i></span></a>
              <ul>
                <li class='has-sub'><a href="<?php echo systemUrl('position-training.php');?>"><span>Add New</span></a></li>
                <li class='has-sub'><a href="<?php echo systemUrl('training/pos_train_dblist.php');?>"><span>View All</span></a></li>
              </ul>
          </li>

          <li class='has-sub'><a href='<?php echo systemUrl('training/courselist.php');?>'><span>Course / Training Session <i class="fa fa-chevron-right"></i></span></a>
              <ul>
               <li><a href='#'><span>Create New</span></a></li>
               <li class='last'><a href='<?php echo systemUrl('training/courselist.php');?>'><span>View All</span></a></li>
            </ul>
          </li>

          <li class='has-sub'><a href='<?php echo systemUrl('training/trn_listlist.php');?>'><span>Training List <i class="fa fa-chevron-right"></i></span></a>
             <ul>
               <li><a href='<?php echo systemUrl('training/trn_listadd.php');?>'><span>Add New</span></a></li>
               <li class='last'><a href='<?php echo systemUrl('training/trn_listlist.php');?>'><span>View All</span></a></li>
            </ul>
         </li>
          
          <li class='has-sub'><a href='#'><span>Trainor</span></a>
            <ul>
              <li class='last'><a href='#'><span>View All Trainors</span></a></li>
            </ul>
          </li>

      </ul>
   </li>


  <li class='last has-sub'><a href='#'><span><i class="fa fa-cog"></i> Settings</span></a>
      <ul>
          <li class='has-sub'><a href='<?php echo systemUrl('part-num.php');?>'><span><i class="fa fa-user-plus"></i> Participant No</span></a></li>
          <li class='has-sub'><a href='<?php echo systemUrl('change-color.php');?>'><span><i class="fa fa-eyedropper"></i> Change Name Color</span></a></li>
      </ul>
   </li>


    <li><a href='#'><span><i class="fa fa-question-circle"></i> About</span></a></li>

   <li class='last has-sub'><a href='#'><span><i class="fa fa-user"></i> Account</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span><i class="fa fa-unlock-alt"></i> Change Password</span></a></li>
         <li class='has-sub'><a href='#'><span><i class="fa fa-power-off"></i> Log-Out</span></a></li>
      </ul>
   </li>

</ul>
</div>







