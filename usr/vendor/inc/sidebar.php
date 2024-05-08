<?php
            $aid=$_SESSION['u_id'];
            $ret="select * from tms_user where u_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
            <ul class="sidebar navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="user-dashboard.php">
                      <i class="fas fa-fw fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-user"></i>
                      <span>My Profile</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header"><?php echo $row->u_fname;?> <?php echo $row->u_lname;?></h6>
                      <a class="dropdown-item" href="user-view-profile.php">View</a>
                      <a class="dropdown-item" href="user-update-profile.php">Update</a>
                      <a class="dropdown-item" href="user-change-pwd.php">Change Password</a>

                    </div>
                  </li>
                 
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-car"></i>
                      <span>My Vehicle</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Add Vehicles:</h6>
                       <a class="dropdown-item" href="addcar.php">Add</a>
                    </div>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-calendar"></i>
                      <span>Maintenance </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Available Vehicles:</h6>
                      <a class="dropdown-item" href="usr-book-vehicle.php">Book Schedule</a>
                      <a class="dropdown-item" href="user-view-booking.php">View</a>
                      <a class="dropdown-item" href="user-manage-booking.php">Manage</a>
                                                             </div>
                  </li>

                   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-coins"></i>
                      <span>Payment</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Payment:</h6>
                    
                      <a class="dropdown-item" href="">Pay</a>
                      <a class="dropdown-item" href="">Manage</a>
                    </div>
                  </li> 
                
                  <li class="nav-item">
                    <a class="nav-link" href="user-give-feedback.php">
                      <i class="fas fa-fw fa-comments"></i>
                      <span>Feedbacks</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="help.html">
                      <i class="fas fa-fw fa-question"></i>
                      <span>Help</span></a>
                  </li>
                  
                </ul>
<?php }?>