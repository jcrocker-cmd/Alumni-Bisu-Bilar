@extends('dashboard.layout.master')

@section('title', 'Re-Issueance of ID')

@section('styles')
    @include('dashboard.assets.style')
@endsection

@section('content')
    <div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <!-- <h1 class="fs-4 text-white px-3">   You-Drive</h1> -->
        <img src="/images/LOGO-3.png" class="sidebar-logo px-3 py-3" alt="Comapny Logo">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="far fa-stream"></i></button>
    </div>
    
    
    <ul class ="list-unstyled px-2 ">
      <li class=""><a href="/dashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home" style="margin-right: 10px;"></i>   Dashboard</a></li>
      <li class=""><a href="/alumni-membership" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list" style="margin-right: 12px;"></i>   Alumni Membership <span style="margin-left: 32px;">Report</span></a></li>
      <li class=""><a href="/alumni-id" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-portrait" style="margin-right: 15px;"></i>   Alumni ID Production <span style="margin-left: 32px;">Report</span></a></li>
      <li class=""><a href="/rented" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-book-alt" style="margin-right: 13px;"></i>   Record for the Information <span style="margin-left: 30px;">of Alumni Students</span></a></li>
      <li class="active"><a href="/reissueance" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-portrait" style="margin-right: 15px;"></i>   Reissuance of ID</a></li>
      <li class=""><a href="/announcement" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-bullhorn" style="margin-right: 9px;"></i>   Announcement</a></li>
      <li class=""><a href="/users" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-user" style="margin-right: 14px;"></i>   Users</a></li>
    </ul>

    <hr class="hr-1 mx-2">


    
    <ul class="list-unstyled px-2">

    <li class=""><a href="/settings" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-cog" style="margin-right: 12px;"></i>  Settings</a></li>

      <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
      <span><i class="fal fa-bell" style="margin-right: 13px;"></i>  Notification</span>
      <span class="bg-danger rounded-pill text-white px-2 py-0 d-flex align-items-center message-notif">02</span>
      </a>
      </li>
      
    </ul>

    <hr class="hr-1 mx-2">

    <ul class="list-unstyled px-2">

    <li class=""><a href="/adminlogout" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-sign-out" style="margin-right: 11px;"></i>  Log Out</a></li>
      
    </ul>

  </div> 
  
  <div class="content">
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <div class="d-flex justify-content-between d-md-none d-block">
    <a class="navbar-brand fs-4" href="#">Alumni</a>
    <button class="btn px-1 py-0 open-btn"><i class="far fa-stream"></i></button>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="outline: none; border: none;">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarText">

      <button type="button" class="btn position-relative nav-notif"><a href="/notification" class="text-decoration-none text-dark"><i class="fal fa-bell"></i>
      <span class="nav-notif-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        99+
        <span class="visually-hidden">unread notification</span>
      </span>
    </a>
      </button>

          <div class="dropdown">
          <img src="" alt="image"
            style="height: 35px; width: 35px; object-fit: cover; border: 0.5px solid #000;" 
            class="rounded-circle">

            <button class="btn btn-link dropdown-toggle account-link text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            John Doe
            </button>
            
              <ul class="dropdown-menu dropdown-menu-lg-end account-dropdowns" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Account Settings</a></li>
                <li><a class="dropdown-item" href="/adminlogout">Log-out</a></li>
              </ul>
            </div>
        </li>
      </ul>
    </div>

  </div>
  </nav>
  <div id="dashboard-content">
  
    @include('dashboard.components.reissueance')
</div>

  </div>
</div>
@endsection


@section('scripts')
    @include('dashboard.assets.script')
@endsection

@push('scripts')
    <script src="/js/moment-library.js"></script>
    <script src="/js/chart-library.js"></script>

    <script type="text/javascript">
      var day_labels = {!! json_encode($days) !!}.map(date => new Date(date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }));
      var day_data = {!! json_encode($day_counts) !!};

      var week_labels = {!! json_encode($weeks) !!}.map(date => new Date(date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
      var week_data = {!! json_encode($week_counts) !!};

      var month_labels = {!! json_encode($months) !!}.map(date => new Date(date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' }));
      var month_data = {!! json_encode($month_counts) !!};
      
      var year_labels = {!! json_encode($years ) !!}.map(year => new Date(year + '-01-01').toLocaleDateString('en-US', { year: 'numeric' }));
      var year_data = {!! json_encode($year_counts ) !!};
    </script>
    <script src="/js/chart-reissueance.js"></script>
    <script src="/js/ajax-reissueance-view.js"></script>
@endpush