<div id="page">
   <header class="header menu_fixed">
      <!-- <div id="preloader"><div data-loader="circle-side"></div></div>/Page Preload -->
      <div id="logo">
         <a href="../">
            @php
            $logo_id = setting_item("logo_id");
            if(!empty($row->custom_logo)){
            $logo_id = $row->custom_logo;
            }
            @endphp
            @if($logo_id)
            <?php $logo = get_file_url($logo_id,'full') ?>
            <img src="{{$logo}}" alt="" class="logo_normal">
            <img src="{{$logo}}" alt="" class="logo_sticky">
            @endif
         </a>
      </div>
      <ul id="top_menu">

         @if(!Auth::id())
         <li class="login-item">
            <a href="#sign-in-dialog" id="sign-in" data-target="#login" class="login">{{__('Login')}}</a>
         </li>
         <!-- data-toggle="modal" data-target="#login" -->
         @else
         <li class="login-item dropdown">
            <a href="#" class="is_login nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
               @if($avatar_url = Auth::user()->getAvatarUrl())
               <img class="avatar rounded-circle shadow-4" src="{{$avatar_url}}" width="40"
                  alt="{{ Auth::user()->getDisplayName()}}">
               @else
               <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
               @endif
               {{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
               <i class="fa fa-angle-down">
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

               @if(Auth::user()->hasPermissionTo('dashboard_vendor_access'))
               <li><a href="{{route('vendor.dashboard')}}"><i class="icon ion-md-analytics"></i>
                     {{__("Vendor Dashboard")}}</a></li>
               @endif
               <li class="@if(Auth::user()->hasPermissionTo('dashboard_vendor_access')) menu-hr @endif">
                  <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i>
                     {{__("My profile")}}</a>
               </li>
               @if(setting_item('inbox_enable'))
               <li class="menu-hr"><a href="{{route('user.chat')}}"><i class="fa fa-comments"></i>
                     {{__("Messages")}}</a></li>
               @endif
               <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i>
                     {{__("Booking History")}}</a></li>
               <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i>
                     {{__("Change password")}}</a></li>
               @if(Auth::user()->hasPermissionTo('dashboard_access'))
               <li class="menu-hr"><a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i>
                     {{__("Admin Dashboard")}}</a></li>
               @endif
               <li class="menu-hr">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out"></i> {{__('Logout')}}</a>
               </li>
            </ul>
               </i>
            </a>
            
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>
         </li>
         @endif
         <li><a href="cart-1.html" class="cart-menu-btn" title="Cart"><strong>4</strong></a></li>
         <li><a href="user/wishlist" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
      </ul>
      <!-- /top_menu -->
      <a href="#menu" class="btn_mobile">
         <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
               <div class="hamburger-inner"></div>
            </div>
         </div>
      </a>
      <nav id="menu" class="main-menu">
         <?php generate_menu('primary') ?>
      </nav>
   </header>
   <!-- /header -->
</div>