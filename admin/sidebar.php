<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <!-- <div class="sidebar-brand-icon">
          <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">Claim Covid-19</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php
        if($_SESSION['menu']=='dashboard'){
          echo('active');
        }
      ?>">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php
        if($_SESSION['level']==0){
      ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Bagian
        </div>

        <li class="nav-item <?php
          if(($_SESSION['menu']=='pemberkasan')OR($_SESSION['menu']=='referensi')){
            echo('active');
          }
        ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pemberkasan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sub Menu:</h6>
              <a class="collapse-item <?php
          if($_SESSION['menu']=='referensi'){
            echo('active');
          }
        ?>" href="referensi.php">Referensi</a>

              <a class="collapse-item <?php
          if($_SESSION['menu']=='pemberkasan'){
            echo('active');
          }
        ?>" href="pemberkasan.php">Update Data</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Verifikasi -->
        <li class="nav-item <?php
          if($_SESSION['menu']=='verifikasi'){
            echo('active');
          }
        ?>">
          <a class="nav-link" href="verifikasi.php">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Verifikasi</span></a>
        </li>

        <!-- Nav Item - Entry -->
        <li class="nav-item <?php
          if($_SESSION['menu']=='entry'){
            echo('active');
          }
        ?>">
          <a class="nav-link" href="entry.php">
            <i class="fas fa-fw fa-upload"></i>
            <span>Entry</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
      <?php
      }
      ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <!-- Nav Item - Entry -->
      <li class="nav-item <?php
        if($_SESSION['menu']=='user'){
          echo('active');
        }
      ?>">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->