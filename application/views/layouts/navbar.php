<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="material-icons">view_headline</i></a>
              </div>
              <?php
             
                $CI =& get_instance();
                $CI->load->model('User_model');
                $user = $CI->User_model->get_user($_SESSION['user']->id);
              
            ?>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>public/assets/images/user.png" alt=""><?= $user['firstName'].' '.$user['lastName']?>
                    <i class="material-icons">arrow_drop_down</i>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="<?=base_url()?>staff/profile/<?=$_SESSION['user']->id?>"> <i class="material-icons">face</i> Profile </a></li> -->
                    
                   
                    <li><a href="<?=base_url()?>auth/logout"><i class="material-icons">exit_to_app</i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
 </div>