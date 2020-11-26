<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4" id="lslidingDiv">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ URL::asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MIRAGE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->fullname }}</a>
        </div>
      </div>


 <!-- Sidebar Menu Utilisateurs   -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
      <a href="" class="nav-link active">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
          Reservations
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('booking.index') }} " class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p> Reservations </p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Suivi reservation</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Reclamation</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Avis</p>
          </a>
        </li>
      </ul>

    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->

<nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Categories
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('category.index') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Categories </p>
                    </a>
                  </li>
               
                </ul>
              </li>
            </ul>
          </nav>
      <!-- Sidebar Menu Utilisateurs   -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('client.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clients</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->


       <!-- Sidebar Menu  Etat reservation -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('hotel.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Hotels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hotel.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hotels</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

       <!-- Sidebar Menu  Etat centre -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href=" " class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Countries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('country.index') }} " class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Countries</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
       <!-- Sidebar Menu Centres -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href=" " class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Cities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('city.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cities</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

       <!-- Sidebar Menu villes -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href=" " class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Mode Paiement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mode.index') }} " class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mode Paiement</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

         <!-- Sidebar Menu Saison -->
         <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href=" " class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Saisons
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href=" {{ route('saison.index') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Saisons</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->

          <!-- Sidebar Menu Tarif -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Rooms
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('room.index') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rooms</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->

          
          <!-- Sidebar Menu Tarif -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Service
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('service.index') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Service</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Services
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('services.index') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Services</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>


          
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Find Room
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('find_rooms.index') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Find Room</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Graphics
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('laravel_google_chart') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pie Graphe</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('bar-chart') }} " class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bar Graphe</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href=" " class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Import Export
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href=" {{ url('csv_file') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Import Export</p>
                    </a>
                  </li>
               
                </ul>
              </li>
            </ul>
          </nav>

    </div>
    <!-- /.sidebar -->
  </aside>
