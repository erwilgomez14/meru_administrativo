  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              @can('isAdmin')
              <li class="nav-heading">Pandel de Administrador</li>
          @endcan
          @can('isPrensa')
              <li class="nav-heading">Pandel de Prensa</li>
          @endcan
          @can('isAdmin')
              <a class="nav-link" href="{{ route('admin.index') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          @endcan
          @can('isPrensa')
              <a class="nav-link" href="{{ route('prensa.index') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          @endcan
          </li><!-- End Dashboard Nav -->

          @can('isAdmin')
              <li class="nav-heading">Aplicaciones</li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="{{ route('aplicaciones.index') }}">
                      <i class="bi bi-grid-3x3-gap"></i> <span>Aplicaciones</span>
                  </a>
              </li><!-- End Components Nav -->
          @endcan
          <li class="nav-heading">Prensa</li>
          @can('isAdmin')
              <li class="nav-item">
                  <a class="nav-link collapsed" href="{{ route('noticias.index') }}">
                      <i class="bi bi-file-text-fill"></i><span>Noticias HidroBolívar</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('boletines.index') }}">
                      <i class="bi bi-file-image-fill"></i><span>Boletines Informativos</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('grabaciones.index') }}">
                      <i class="bi bi-camera-reels-fill"></i><span>Grabaciones Programa de Radio</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('rostros.index') }}">
                      <i class="bi bi-megaphone-fill"></i><span>Rostros del Agua</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('estructuras.index') }}">
                      <i class="bi bi-diagram-3-fill"></i><span>Estructuras Organizativas</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('directorio.index') }}">
                      <i class="bi bi-telephone-fill"></i><span>Directorio Telefonico</span>
                  </a>
              @endcan
              @can('isPrensa')
              <li class="nav-item">
                  <a class="nav-link collapsed" href="{{ route('noticia.index') }}">
                      <i class="bi bi-file-text-fill"></i><span>Noticias HidroBolívar</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('boletin.index') }}">
                      <i class="bi bi-file-image-fill"></i><span>Boletines Informativos</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('grabacion.index') }}">
                      <i class="bi bi-camera-reels-fill"></i><span>Grabaciones Programa de Radio</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('rostro.index') }}">
                      <i class="bi bi-megaphone-fill"></i><span>Rostros del Agua</span>
                  </a>
              </li><!-- End Components Nav -->
          @endcan
          @can('isAdmin')
              <li class="nav-heading">Users</li>

              <li class="nav-item">
                  <a class="nav-link collapsed" href="{{ route('usuarios.index') }}">
                      <i class="bi bi-person-plus-fill"></i><span>Usuarios</span>
                  </a>
                  <a class="nav-link collapsed" href="{{ route('roles.index') }}">
                      <i class="bi bi-people-fill"></i><span>Roles</span>
                  </a>
              </li><!-- End Components Nav -->

              <li class="nav-heading">Paneles</li>

              <li class="nav-item">
                  <a class="nav-link collapsed" href="{{ route('reportes.index') }}">
                      <i class="bi bi-file-earmark-bar-graph-fill"></i><span>Panel de Reportes</span>
                  </a>
              </li><!-- End Components Nav -->
          @endcan
      </ul>
  </aside><!-- End Sidebar-->
