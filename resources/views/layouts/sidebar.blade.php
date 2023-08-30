 <nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
            @if (Route::has('login'))
                    <a class="btn-lg text-light pt-3" href="{{ url('/dashboard') }}">
                        Security Scheduling System
                    </a>
                @else
                    <a class="btn-lg text-light pt-3" href="{{ url('/') }}">
                        Security Scheduling System
                    </a>
                @endif
        <ul class="sidebar-nav">
            @can('admin')
                <li class="sidebar-header pb-4">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newshift">
                        <i class="" data-feather="plus"></i> Assign
                    </button>
                </li>
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('dashboard')}}">
                      <i class="align-middle" data-feather="sliders" ></i> <span class="align-middle">Admin Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('shifts') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('shifts')}}">
                      <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Shifts</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('officers') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('officers')}}">
                      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Officers</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('locations') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('locations')}}">
                      <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Locations</span>
                    </a>
                </li>
            @endcan
            
            @cannot('admin')                
            
            <li class="sidebar-item {{ Request::is('user/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('user.dashboard')}}">                    
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Your Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item {{ Request::is('user/usershift') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('user.usershift')}}">
                  <i class="align-middle" data-feather="shield"></i> <span class="align-middle">My Shift</span>
                </a>
            </li>     
            @endcannot
            
        </ul>
    </div>
</nav>

@include('pages.modal')