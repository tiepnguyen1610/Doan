<div class="header_bottom">
    <div class="row">
        <div class="col-12">
            <div class="main_menu_inner">
                <div class="main_menu d-none d-lg-block">
                    <nav>
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Trang Chủ</a></li>
                            {{-- <li><a href="#">Sản Phẩm</a></li> --}}
                            @foreach($categories as $categoryParent)
                                <li>
                                    <a href="#">{{ $categoryParent->cat_name }}</a>
                                    <div class="mega_menu jewelry">
                                        <div class="mega_items jewelry">
                                        @if($categoryParent->categoryChild->count())
                                            <ul>
                                                @foreach($categoryParent->categoryChild as $categoryChild)
                                                    <li>
                                                        <a href="{{ route('category.product', ['slug'=>$categoryChild->slug, 'id'=>$categoryChild->id]) }}">{{ $categoryChild->cat_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        </div>
                                    </div>  
                                </li>
                            @endforeach
                            <li><a href="#">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-menu d-lg-none">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            {{-- <li><a href="#">Sản phẩm</a></li> --}}
                            @foreach($categories as $categoryParent)
                                <li><a href="">{{ $categoryParent->cat_name }}</a>
                                    <div>
                                        <div>
                                            <div>
                                                <ul>
                                                    @foreach($categoryParent->categoryChild as $categoryChild)
                                                        <li><a href="{{ route('category.product', ['slug'=>$categoryChild->slug, 'id'=>$categoryChild->id]) }}">{{ $categoryChild->cat_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>