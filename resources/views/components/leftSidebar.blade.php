<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src={{asset("images/user.png")}} width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vanh Nguyễn</div>
            <div class="email">vanhvanh512@gmail.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{"/"}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Fashion</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Category</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{"/list-category"}}">List Category</a>
                            </li>
                            <li>
                                <a href="{{"/new-category"}}">New Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Brands</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{"/list-brand"}}">List Brands</a>
                            </li>
                            <li>
                                <a href="{{"/new-brand"}}">New Brands</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Product</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{"/list-product"}}">List Product</a>
                            </li>
                            <li>
                                <a href="{{"/new-product"}}">New Product</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">List User</a>
                            </li>
                            <li>
                                <a href="#">New User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Order</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">List Order</a>
                            </li>
                            <li>
                                <a href="#">New Order</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Order Product</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">List Order Product</a>
                            </li>
                            <li>
                                <a href="#">New Order Product</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>User Interface (UI)</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#">Alerts</a>
                    </li>
                    <li>
                        <a href="#">Animations</a>
                    </li>
                    <li>
                        <a href="#">Badges</a>
                    </li>

                    <li>
                        <a href="#">Breadcrumbs</a>
                    </li>
                    <li>
                        <a href="#">Buttons</a>
                    </li>
                    <li>
                        <a href="#">Collapse</a>
                    </li>
                    <li>
                        <a href="#">Colors</a>
                    </li>
                    <li>
                        <a href="#">Dialogs</a>
                    </li>
                    <li>
                        <a href="#">Icons</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Forms</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#">Basic Form Elements</a>
                    </li>
                    <li>
                        <a href="#">Advanced Form Elements</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Tables</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#">Normal Tables</a>
                    </li>
                    <li>
                        <a href="#">Jquery Datatables</a>
                    </li>
                    <li>
                        <a href="#">Editable Tables</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">perm_media</i>
                    <span>Medias</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/medias/image-gallery.html">Image Gallery</a>
                    </li>
                    <li>
                        <a href="pages/medias/carousel.html">Carousel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">pie_chart</i>
                    <span>Charts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/charts/morris.html">Morris</a>
                    </li>
                    <li>
                        <a href="pages/charts/flot.html">Flot</a>
                    </li>
                    <li>
                        <a href="pages/charts/chartjs.html">ChartJS</a>
                    </li>
                    <li>
                        <a href="pages/charts/sparkline.html">Sparkline</a>
                    </li>
                    <li>
                        <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">content_copy</i>
                    <span>Example Pages</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/examples/profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="pages/examples/sign-in.html">Sign In</a>
                    </li>
                    <li>
                        <a href="pages/examples/sign-up.html">Sign Up</a>
                    </li>
                    <li>
                        <a href="pages/examples/forgot-password.html">Forgot Password</a>
                    </li>
                    <li>
                        <a href="pages/examples/blank.html">Blank Page</a>
                    </li>
                    <li>
                        <a href="pages/examples/404.html">404 - Not Found</a>
                    </li>
                    <li>
                        <a href="pages/examples/500.html">500 - Server Error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">map</i>
                    <span>Maps</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/maps/google.html">Google Map</a>
                    </li>
                    <li>
                        <a href="pages/maps/yandex.html">YandexMap</a>
                    </li>
                    <li>
                        <a href="pages/maps/jvectormap.html">jVectorMap</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Multi Level Menu</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);">
                            <span>Menu Item</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>Menu Item - 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Level - 2</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 3</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Level - 4</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="pages/changelogs.html">
                    <i class="material-icons">update</i>
                    <span>Changelogs</span>
                </a>
            </li>
            <li class="header">LABELS</li>
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons col-red">donut_large</i>
                    <span>Important</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons col-amber">donut_large</i>
                    <span>Warning</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons col-light-blue">donut_large</i>
                    <span>Information</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>

