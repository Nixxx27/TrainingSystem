<?php
$newEmployee = New newEmployee(); 
$newEmployee->countAll();
?>
<div id='cssmenu'>
<ul>
  <li  class="active"><a href='<?php echo $views->page('dashboard.php');?>'><span class="textShadow"><i class="fa fa-home"></i> Dashboard</span></a></li>

  
   <li class='has-sub'><a href='#'><span class="textShadow"><i class="fa fa-users"></i> Employees <i style="font-size:12px" class="fa fa-caret-down"></i></span> </a>
      <ul>
         <li  class='has-sub'><a href="<?php echo $views->page('emp_NewEmployee.php');?>"><span title="Check new hired/resigned employee">New
           <span class="badge">&nbsp;<?php foreach($newEmployee->countAll as $count){echo $count->total;}?>&nbsp;</span> 
         </span></a></li>
      </ul>
   </li>


    <li class='last has-sub'><a href='#'><span class="textShadow"><i class="fa fa-user"></i> Training <i style="font-size:12px" class="fa fa-caret-down"></i></span></a>
      <ul>
        <li class='has-sub'><a href='<?php echo $views->page('tr_TrainingPerPosition.php');?>'><span>Training per Position <i class="fa fa-chevron-right"></i></span></a></li>
        <li class='has-sub'><a href='<?php echo $views->page('training/trn_listlist.php');?>'><span>Training List <i class="fa fa-chevron-right"></i></span></a></li>
        <li class='has-sub'><a href='<?php echo $views->page('training/courselist.php');?>'><span>Course / Training Session <i class="fa fa-chevron-right"></i></span></a></li>
        <li class='has-sub'><a href='#'><span>Trainor</span></a></li>
      </ul>
   </li>


  <li class='last has-sub'><a href='#'><span class="textShadow"><i class="fa fa-cog fa-spin"></i> Settings <i style="font-size:12px" class="fa fa-caret-down"></i></span></a>
      <ul>
          <li class='has-sub'><a href='<?php echo $views->page('part-num.php');?>'><span><i class="fa fa-user-plus"></i> Participant No</span></a></li>
          <li class='has-sub'><a href='<?php echo $views->page('change-color.php');?>'><span><i class="fa fa-eyedropper"></i> Change Name Color</span></a></li>
      </ul>
   </li>


    <li><a href='#' id="about"><span class="textShadow"><i class="fa fa-question-circle"></i> About</span></a></li>

   <li class='last has-sub'><a href='#'><span class="textShadow"><i class="fa fa-user"></i> Account</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span><i class="fa fa-unlock-alt"></i> Change Password</span></a></li>
         <li class='has-sub'><a href='#'><span><i class="fa fa-power-off"></i> Log-Out</span></a></li>
      </ul>
   </li>

</ul>
</div>  

