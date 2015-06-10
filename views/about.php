<?php include 'class.php' ?>
        <footer>
            <div class="row">
                <div class="col-lg-9 col-md-9">
                     <h5><small data-toggle="popover" data-content="Developed by: nikko.zabala@gmail.com">&copy; SLPI & SKPI | Information & Communication Tech Dept.| Human Resources Training Department 2015</small></h5>
                </div>
        </footer>

        <!-- About -->
         <div class="row">
            <div class="pull-right">
                <a data-toggle="modal" data-target="#myModal"  href="#" >
                    <i class="fa fa-question-circle fa-2x" data-toggle="popover" data-content="About"></i>
                </a>
            </div>
		</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <div class="pull-left">
              <i class="fa fa-question-circle fa-lg"></i></h2>
          </div>
          <div class="pull-right">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
        <hr>
        <div class="row">
          <div class="col-sm-10 pull-left">
              <img class="img-responsive" src="<?php echo systemUrl('img')?>/tmslogo.png" title="Training Management System" >
          </div> 
        </div>
      </div>
      
      <div class="modal-body">
        <h5>Developed & Designed by:</br></h5>
        <h4>
            <strong>
              Nikko F. Zabala
            </strong></br>
            <small>
                Systems Developer / Programmer </br>
                SkyKitchen Philippines Inc | SkyLogistics Philippines Inc </br>
                nikko.zabala@gmail.com / nikko.zabala@skygroup.com.ph / local: 8702
            </small>
        </h4>
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/nixxkoh" target="_new" title="visit me on Facebook"><i class="fa fa-2x fa-facebook-square"></i></a></li>
              <li><a onclick="javascript:alert('Coming Soon!')" href="#"  title="check my Linked In"><i class="fa fa-2x fa-linkedin-square"></i></a></li>
              <li><a onclick="javascript:alert('Coming Soon!')" href="#"  title="visit me on Twitter"><i class="fa fa-2x fa-twitter-square"></i></a></li>
            </ul>
           <!-- <ul class="list-inline">
              <li><img class="img-responsive" id="footerlogo" src="img/system/skylogtrans.png"></li>
               <li><img class="img-responsive" id="footerlogo"  src="img/system/skykittrans.png"></li>
          </ul>-->
        <hr>   
        <h5>
            <p>
                Info & Comm Tech Contact Details:
            </p>    
            <p>
                <i class="fa fa-phone"></i> 
                <abbr title="Phone">P</abbr>: (02) 851-1049 local 8700-03
            </p>

            <p>
                <i class="fa fa-envelope-o"></i> 
                <abbr title="Email">E</abbr>:<a href="mailto:ict@skygroup.com.ph"> ict@skygroup.com.ph</a>
            </p>
        </h5>
      
      </div>
      <div class="modal-footer">
      	<span class="pull-left">
          </span>
     	<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
       </div>
    </div>
  </div>
</div>