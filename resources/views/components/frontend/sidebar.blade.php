<ul>
    @foreach(\App\Category::all() as $cat)
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
            <li><a href="{{$cat->getCategoryUrl()}}">{{$cat->__get("category_name")}}</a></li>
        </button>
    @endforeach
</ul>
