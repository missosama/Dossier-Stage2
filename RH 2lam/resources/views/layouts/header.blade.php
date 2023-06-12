
   <div class="topbar">


<div class="topbar-left">
    <a href="/" class="logo">
        <span>
                <h1 style="color: white; ">2alam</h1>
            </span>
        <i>
            <h1>A</h1>
            </i>
    </a>
</div>

<nav class="navbar-custom">
    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
    <ul class="navbar-right d-flex list-inline float-left mb-0">
        <li class="dropdown notification-list">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="https://th.bing.com/th/id/R.36a637acd327c76357628dca25f838de?rik=KEv28AfFiyqYjA&pid=ImgRaw&r=0" alt="user" class="rounded-circle"> 2allam
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                    <a class="dropdown-item" href="{{route('FaceId.index')}}"><i class="mdi mdi-lock-open-outline m-r-5"></i> FaceID</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>
        </li>





    </ul>



</nav>

</div>

