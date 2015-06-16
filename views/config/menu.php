<?php
$newEmployee = New newEmployee(); 
$newEmployee->countAll();
?>
<div id='cssmenu'>
<ul>
  <li  class="active"><a href='<?php echo $views->page('summary.php');?>'><span><i class="fa fa-home"></i> Dashboard</span></a></li>

  
   <li class='has-sub'><a href='<?php echo $views->page('new_employee.php');?>'><span><i class="fa fa-users"></i> Employees</span></a>
      <ul>
         <li  class='has-sub'><a href="<?php echo $views->page('new_employee.php');?>"><span title="Check new hired/resigned employee">New
           <span class="badge">&nbsp;<?php foreach($newEmployee->countAll as $count){echo $count->total;}?>&nbsp;</span> 
         </span></a></li>
      </ul>
   </li>


    <li class='last has-sub'><a href='#'><span><i class="fa fa-user"></i> Training</span></a>
      <ul>
          <li class='has-sub'><a href='<?php echo $views->page('position-training.php');?>'><span>Training per Position <i class="fa fa-chevron-right"></i></span></a>
              <ul>
                <li class='has-sub'><a href="<?php echo $views->page('position-training.php');?>"><span>Add New</span></a></li>
                <li class='has-sub'><a href="<?php echo $views->page('training/pos_train_dblist.php');?>"><span>View All</span></a></li>
              </ul>
          </li>

          <li class='has-sub'><a href='<?php echo $views->page('training/courselist.php');?>'><span>Course / Training Session <i class="fa fa-chevron-right"></i></span></a>
              <ul>
               <li><a href='#'><span>Create New</span></a></li>
               <li class='last'><a href='<?php echo $views->page('training/courselist.php');?>'><span>View All</span></a></li>
            </ul>
          </li>

          <li class='has-sub'><a href='<?php echo $views->page('training/trn_listlist.php');?>'><span>Training List <i class="fa fa-chevron-right"></i></span></a>
             <ul>
               <li><a href='<?php echo $views->page('training/trn_listadd.php');?>'><span>Add New</span></a></li>
               <li class='last'><a href='<?php echo $views->page('training/trn_listlist.php');?>'><span>View All</span></a></li>
            </ul>
         </li>
          
          <li class='has-sub'><a href='#'><span>Trainor</span></a>
            <ul>
              <li class='last'><a href='#'><span>View All Trainors</span></a></li>
            </ul>
          </li>

      </ul>
   </li>


  <li class='last has-sub'><a href='#'><span><i class="fa fa-cog fa-spin"></i> Settings</span></a>
      <ul>
          <li class='has-sub'><a href='<?php echo $views->page('part-num.php');?>'><span><i class="fa fa-user-plus"></i> Participant No</span></a></li>
          <li class='has-sub'><a href='<?php echo $views->page('change-color.php');?>'><span><i class="fa fa-eyedropper"></i> Change Name Color</span></a></li>
      </ul>
   </li>


    <li><a href='#' id="about"><span><i class="fa fa-question-circle"></i> About</span></a></li>

   <li class='last has-sub'><a href='#'><span><i class="fa fa-user"></i> Account</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span><i class="fa fa-unlock-alt"></i> Change Password</span></a></li>
         <li class='has-sub'><a href='#'><span><i class="fa fa-power-off"></i> Log-Out</span></a></li>
      </ul>
   </li>

</ul>
</div>  
