<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="#">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div><img src="images/logo_1.png" alt=""></div>
                    <div>Little Closet</div>
                </div>
            </a>
        </div>
        <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li class="active"><a href="#">Women</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Home Deco</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="#" id="header_search_form">
                    <input type="text" class="search_input" placeholder="Search Item" required="required">
                    <button class="header_search_button"><img src="images/search.png" alt=""></button>
                </form>
            </div>
            <!-- User -->
            <div class="user">
{{--                <a href="#">--}}
                <div class="btn-group user-helper-dropdown">
                    <img src="images/user.svg" style="height: 50px ; width: 50px" alt="https://www.flaticon.com/authors/freepik">
{{--                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>--}}
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="separator" class="divider"></li>
                        {{--                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>--}}
                        <li>
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                            </li>
                    </ul>
                </div>
            </div>
            <!-- Cart -->
            <div class="cart"><a href="cart.html"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
                <div>+1 912-252-7350</div>
            </div>
        </div>
    </div>
</header>
