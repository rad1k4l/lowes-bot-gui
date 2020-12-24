@section('header')
<!DOCTYPE html>

<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>

</head>
<!-- END: Head-->


<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    <div class="navbar navbar-fixed"> 
      <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">

        <div class="nav-wrapper">

          <ul class="navbar-list right">

            <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="/user/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>


          </ul>
          <!-- translation-button-->

          <!-- notifications-dropdown-->



          <!-- profile-dropdown-->
          <ul class="dropdown-content" id="profile-dropdown">
            <li>
                <a class="grey-text text-darken-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">keyboard_tab</i> Logout
                </a>
            </li>
          </ul>


        </div>

      </nav>
    </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </header>
  <!-- END: Header-->
  @show
