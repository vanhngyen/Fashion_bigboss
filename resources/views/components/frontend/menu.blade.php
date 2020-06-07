<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form action="#" id="menu_search_form" class="menu_search_form">
            <input type="text" class="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button"><img src="{{asset("images/search.png")}}" alt=""></button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            @foreach(\App\Category::all() as $cat)
                <li><a href="{{$cat->getCategoryUrl()}}">{{$cat->__get("category_name")}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
            <div>+1 912-252-7350</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
