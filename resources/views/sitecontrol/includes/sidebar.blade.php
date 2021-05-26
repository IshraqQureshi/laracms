<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <div class="d-flex justify-content-between">
              <div class="logo">
                  <a href="index.html"><img src="{{ config('constants.__SITECONTROL_ASSETS') }}images/logo/logo.png" alt="Logo" srcset=""></a>
              </div>
              <div class="toggler">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
              
              {{-- Dashboard Item --}}
              @php
                $currentRouteName = Route::current()->getName();
              @endphp
              <li class="sidebar-item {{ $currentRouteName == 'dashboard' ? 'active' : '' }}">
                  <a href="{{ route('dashboard') }}" class='sidebar-link'>
                      <i class="bi bi-grid-fill"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              {{-- Dashboard Item --}}

              {{-- Pages Item --}}
              <li class="sidebar-item {{ $currentRouteName == 'pages' ? 'active' : '' }}">
                <a href="{{ route('pages') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Pages</span>
                </a>
              </li>
              {{-- Pages Item --}}

              {{-- Posts Item --}}
              <li class="sidebar-item {{ $currentRouteName == 'posts' ? 'active' : '' }}">
                <a href="{{ route('posts') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Posts</span>
                </a>
              </li>
              {{-- Posts Item --}}

              {{-- Posts Item --}}
              <li class="sidebar-item {{ $currentRouteName == 'categories' ? 'active' : '' }}">
                <a href="{{ route('categories') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Categories</span>
                </a>
              </li>
              {{-- Posts Item --}}

              {{-- Settings Item --}}
              <li class="sidebar-item {{ $currentRouteName == 'settings' ? 'active' : '' }}">
                <a href="{{ route('settings') }}" class='sidebar-link'>
                    <i class="bi bi-gear-fill"></i>
                    <span>Settings</span>
                </a>
              </li>
              {{-- Setting Item --}}

          </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>