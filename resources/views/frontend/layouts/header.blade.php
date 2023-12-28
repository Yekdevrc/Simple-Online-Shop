<header id="header" class="header">
    <div class="header-top-section">
        <div class="container">
            <div class="header-top">
                <div class="header-profile">
                    <a href="#"><span>Track Order</span></a>
                    <a href="{{route('contact')}}"><span>Support</span></a>
                </div>
                <div class="header-contact d-none d-lg-block">
                    <a href="#">
                        <span>Need help? Call us:</span>
                        <span class="contact-number">+9779874563210</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center-section d-none d-lg-block">
        <div class="container">
            <div class="header-center">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{$officeSetting->logo_url}}" width="120" height="80" alt="logo">
                    </a>
                </div>
                @if(!auth()->guard('guest')->user())
                <div class="header-center">
                    <span class="text-center">Please Login for Order the product !! </span>
                </div>
                @endif
                <div class="header-cart-items">
                    <div class="header-search">
                        <button class="header-search-btn" onclick="modalAction('.search')">
<span>
<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M13.9708 16.4151C12.5227 17.4021 10.9758 17.9723 9.27353 18.0062C5.58462 18.0802 2.75802 16.483 1.05056 13.1945C-1.76315 7.77253 1.33485 1.37571 7.25086 0.167548C12.2281 -0.848249 17.2053 2.87895 17.7198 7.98579C17.9182 9.95558 17.5566 11.7939 16.5852 13.5061C16.4512 13.742 16.483 13.8725 16.6651 14.0553C18.2412 15.6386 19.8112 17.2272 21.3735 18.8244C22.1826 19.6513 22.2058 20.7559 21.456 21.4932C20.7697 22.1678 19.7047 22.1747 18.9764 21.4793C18.3623 20.8917 17.7774 20.2737 17.1796 19.6688C16.118 18.5929 15.0564 17.5153 13.9708 16.4151ZM2.89545 9.0364C2.91692 12.4172 5.59664 15.1164 8.91967 15.1042C12.2384 15.092 14.9138 12.3493 14.8889 8.98505C14.864 5.63213 12.1826 2.92508 8.89047 2.92857C5.58204 2.93118 2.87397 5.68958 2.89545 9.0364Z"
    fill="black"/>
</svg>
</span>
                        </button>
                        <div class="modal-wrapper search">
                            <div onclick="modalAction('.search')" class="anywhere-away"></div>

                            <div class="modal-main">
                                <div class="wrapper-close-btn" onclick="modalAction('.search')">
<span>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
</svg>
</span>
                                </div>
                                <div class="wrapper-main">
                                    <div class="search-section">
                                        <input type="text" placeholder="Search Products.........">
                                        <div class="divider"></div>
                                        <button type="button">All Categories</button>
                                        <a href="#" class="shop-btn">Search</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="header-favourite">
                        <a href="{{route('wishlist')}}" class="cart-item">
<span>
<svg width="35" height="27" viewBox="0 0 35 27" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z"
    fill="#6E6D79"/>
    @if(session()->get('item_id'))
        <circle cx="26.7662" cy="8" r="8" fill="#AE1C9A"/>
        <path d="" fill="#F9FFFB"/>
    @endif
</svg>
</span>
                            <span class="cart-text">
Wishlist
</span>
                        </a>
                    </div>
                    @if(auth()->guard('guest')->user())
                    <div class="header-cart">
                        <a href="{{route('order.index')}}" class="cart-item">
<span>
<svg width="35" height="28" viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M16.4444 21.897C14.8444 21.897 13.2441 21.8999 11.6441 21.8963C9.79233 21.892 8.65086 21.0273 8.12595 19.2489C7.04294 15.5794 5.95756 11.9107 4.87166 8.24203C4.6362 7.4468 4.37783 7.25412 3.55241 7.25175C2.7786 7.24964 2.00507 7.25754 1.23127 7.24911C0.512247 7.24148 0.0157813 6.79109 0.000242059 6.15064C-0.0160873 5.48281 0.475637 5.01689 1.23232 5.00873C2.11121 4.99952 2.99089 4.99214 3.86951 5.01268C5.36154 5.04769 6.52014 5.93215 6.96393 7.35415C7.14171 7.92378 7.34055 8.49026 7.46382 9.07201C7.54968 9.47713 7.77881 9.49661 8.10566 9.49582C11.8335 9.48897 15.5611 9.49134 19.2889 9.49134C21.0825 9.49134 22.8761 9.48108 24.6694 9.49503C26.0848 9.50608 27.0907 10.4906 27.0156 11.7778C27.0006 12.0363 26.925 12.2958 26.8473 12.5457C26.1317 14.8411 25.4124 17.1351 24.6879 19.4279C24.1851 21.0186 23.0223 21.8826 21.3504 21.8944C19.7151 21.906 18.0797 21.897 16.4444 21.897Z"
    fill="#6E6D79"/>
<path
    d="M12.4012 27.5161C11.167 27.5227 10.1488 26.524 10.1345 25.2928C10.1201 24.0419 11.1528 22.9982 12.3967 23.0066C13.6209 23.0151 14.6422 24.0404 14.6436 25.2623C14.6451 26.4855 13.6261 27.5095 12.4012 27.5161Z"
    fill="#6E6D79"/>
<path
    d="M22.509 25.2393C22.5193 26.4842 21.5393 27.4971 20.3064 27.5155C19.048 27.5342 18.0272 26.525 18.0277 25.2622C18.0279 24.0208 19.0214 23.0161 20.2572 23.0074C21.4877 22.9984 22.4988 24.0006 22.509 25.2393Z"
    fill="#6E6D79"/>
    @if(!$order)
<circle cx="26.9523" cy="8" r="8" fill="#AE1C9A"/></svg>
    @endif
</span>
                            <span class="cart-text">
Order
</span>
                        </a>


                    </div>
                    @endif
                </div>
            </div>
        </div>
        <nav class="mobile-menu d-block d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                        aria-controls="offcanvasWithBothOptions">
<span>
<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="14" height="1" fill="#1D1D1D"/>
<rect y="8" width="14" height="1" fill="#1D1D1D"/>
<rect y="4" width="10" height="1" fill="#1D1D1D"/>
</svg>
</span>
                </button>
                <a href="{{url('/')}}" class="mobile-header-logo">
                    <img src="{{$officeSetting->logo_url}}" alt="logo">
                </a>
                <a href="{{route('product')}}" class="header-cart cart-item">
<span>
<svg width="35" height="28" viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M16.4444 21.897C14.8444 21.897 13.2441 21.8999 11.6441 21.8963C9.79233 21.892 8.65086 21.0273 8.12595 19.2489C7.04294 15.5794 5.95756 11.9107 4.87166 8.24203C4.6362 7.4468 4.37783 7.25412 3.55241 7.25175C2.7786 7.24964 2.00507 7.25754 1.23127 7.24911C0.512247 7.24148 0.0157813 6.79109 0.000242059 6.15064C-0.0160873 5.48281 0.475637 5.01689 1.23232 5.00873C2.11121 4.99952 2.99089 4.99214 3.86951 5.01268C5.36154 5.04769 6.52014 5.93215 6.96393 7.35415C7.14171 7.92378 7.34055 8.49026 7.46382 9.07201C7.54968 9.47713 7.77881 9.49661 8.10566 9.49582C11.8335 9.48897 15.5611 9.49134 19.2889 9.49134C21.0825 9.49134 22.8761 9.48108 24.6694 9.49503C26.0848 9.50608 27.0907 10.4906 27.0156 11.7778C27.0006 12.0363 26.925 12.2958 26.8473 12.5457C26.1317 14.8411 25.4124 17.1351 24.6879 19.4279C24.1851 21.0186 23.0223 21.8826 21.3504 21.8944C19.7151 21.906 18.0797 21.897 16.4444 21.897Z"
    fill="#6E6D79"/>
<path
    d="M12.4012 27.5161C11.167 27.5227 10.1488 26.524 10.1345 25.2928C10.1201 24.0419 11.1528 22.9982 12.3967 23.0066C13.6209 23.0151 14.6422 24.0404 14.6436 25.2623C14.6451 26.4855 13.6261 27.5095 12.4012 27.5161Z"
    fill="#6E6D79"/>
<path
    d="M22.509 25.2393C22.5193 26.4842 21.5393 27.4971 20.3064 27.5155C19.048 27.5342 18.0272 26.525 18.0277 25.2622C18.0279 24.0208 19.0214 23.0161 20.2572 23.0074C21.4877 22.9984 22.4988 24.0006 22.509 25.2393Z"
    fill="#6E6D79"/>
<circle cx="26.9523" cy="8" r="8" fill="#AE1C9A"/>
<path
    d="M23.7061 13V11.8864L27.1514 8.31676C27.5193 7.92898 27.8226 7.58925 28.0612 7.29759C28.3032 7.0026 28.4838 6.72254 28.6031 6.45739C28.7225 6.19223 28.7821 5.91051 28.7821 5.61222C28.7821 5.27415 28.7026 4.98248 28.5435 4.73722C28.3844 4.48864 28.1673 4.29806 27.8922 4.16548C27.6171 4.02959 27.3072 3.96165 26.9625 3.96165C26.5979 3.96165 26.2797 4.03622 26.008 4.18537C25.7362 4.33452 25.5274 4.54498 25.3815 4.81676C25.2357 5.08854 25.1628 5.40672 25.1628 5.77131H23.6962C23.6962 5.15151 23.8387 4.60961 24.1237 4.1456C24.4088 3.68158 24.7999 3.32197 25.297 3.06676C25.7942 2.80824 26.3593 2.67898 26.9923 2.67898C27.632 2.67898 28.1955 2.80658 28.6827 3.06179C29.1732 3.31368 29.556 3.65838 29.8311 4.09588C30.1062 4.53007 30.2438 5.0206 30.2438 5.56747C30.2438 5.94531 30.1725 6.31487 30.03 6.67614C29.8908 7.0374 29.6472 7.4401 29.2992 7.88423C28.9511 8.32505 28.4672 8.86032 27.8475 9.49006L25.824 11.608V11.6825H30.4078V13H23.7061Z"
    fill="#F9FFFB"/>
</svg>
</span>
                </a>
            </div>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
                <div class="offcanvas-body">
                    <div class="header-top">
                        <div class="header-cart ">
                            <div class="header-favourite">
                                <a href="{{route('wishlist')}}" class="cart-item">
<span>
<svg width="35" height="27" viewBox="0 0 35 27" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z"
    fill="#6E6D79"/>
<circle cx="26.7662" cy="8" r="8" fill="#AE1C9A"/>
<path
    d="M26.846 13.1392C26.1632 13.1392 25.5534 13.0215 25.0164 12.7862C24.4828 12.5509 24.0602 12.2244 23.7487 11.8068C23.4404 11.3859 23.2747 10.8987 23.2515 10.3452H24.8126C24.8325 10.6468 24.9336 10.9086 25.1159 11.1307C25.3015 11.3494 25.5434 11.5185 25.8417 11.6378C26.14 11.7571 26.4715 11.8168 26.836 11.8168C27.2371 11.8168 27.5917 11.7472 27.9 11.608C28.2115 11.4687 28.4551 11.2749 28.6308 11.0263C28.8065 10.7744 28.8943 10.4844 28.8943 10.1562C28.8943 9.81487 28.8065 9.51491 28.6308 9.25639C28.4584 8.99455 28.2049 8.78906 27.8701 8.63991C27.5387 8.49077 27.1377 8.41619 26.667 8.41619H25.8069V7.16335H26.667C27.0448 7.16335 27.3763 7.09541 27.6613 6.95952C27.9497 6.82363 28.1751 6.63471 28.3375 6.39276C28.4999 6.14749 28.5811 5.8608 28.5811 5.53267C28.5811 5.2178 28.5098 4.94437 28.3673 4.71236C28.2281 4.47704 28.0292 4.29309 27.7707 4.16051C27.5155 4.02794 27.2139 3.96165 26.8659 3.96165C26.5344 3.96165 26.2245 4.02296 25.9362 4.1456C25.6511 4.26491 25.4191 4.43726 25.2402 4.66264C25.0612 4.88471 24.9651 5.15151 24.9518 5.46307H23.4653C23.4819 4.91288 23.6443 4.42898 23.9525 4.01136C24.2641 3.59375 24.6751 3.26728 25.1855 3.03196C25.6959 2.79664 26.2627 2.67898 26.8858 2.67898C27.5387 2.67898 28.1021 2.80658 28.5761 3.06179C29.0534 3.31368 29.4213 3.65009 29.6798 4.07102C29.9416 4.49195 30.0709 4.95265 30.0676 5.45312C30.0709 6.0232 29.9118 6.5071 29.5903 6.90483C29.2721 7.30256 28.8479 7.56937 28.3176 7.70526V7.7848C28.9937 7.88755 29.5174 8.15601 29.8886 8.5902C30.2631 9.02438 30.4487 9.56297 30.4454 10.206C30.4487 10.7661 30.293 11.2682 29.9781 11.7124C29.6665 12.1565 29.2406 12.5062 28.7004 12.7614C28.1601 13.0133 27.542 13.1392 26.846 13.1392Z"
    fill="#F9FFFB"/>
</svg>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="shop-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    <div class="header-input">
                        <input type="text" placeholder="Search....">
                        <span>
<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M13.9708 16.4151C12.5227 17.4021 10.9758 17.9723 9.27353 18.0062C5.58462 18.0802 2.75802 16.483 1.05056 13.1945C-1.76315 7.77253 1.33485 1.37571 7.25086 0.167548C12.2281 -0.848249 17.2053 2.87895 17.7198 7.98579C17.9182 9.95558 17.5566 11.7939 16.5852 13.5061C16.4512 13.742 16.483 13.8725 16.6651 14.0553C18.2412 15.6386 19.8112 17.2272 21.3735 18.8244C22.1826 19.6513 22.2058 20.7559 21.456 21.4932C20.7697 22.1678 19.7047 22.1747 18.9764 21.4793C18.3623 20.8917 17.7774 20.2737 17.1796 19.6688C16.118 18.5929 15.0564 17.5153 13.9708 16.4151ZM2.89545 9.0364C2.91692 12.4172 5.59664 15.1164 8.91967 15.1042C12.2384 15.092 14.9138 12.3493 14.8889 8.98505C14.864 5.63213 12.1826 2.92508 8.89047 2.92857C5.58204 2.93118 2.87397 5.68958 2.89545 9.0364Z"
    fill="black"></path>
</svg>
</span>
                    </div>
                    <div class="category-dropdown">
                        <ul class="category-list">
                            @foreach($allCategories as $category)
                                <li class="category-list-item">
                                    <a href="#">
                                        <div class="dropdown-item d-flex justify-content-between align-items-center">
                                            <div class="dropdown-list-item d-flex">
<span class="dropdown-img">
<img src="{{$category->logo_url}}" alt="{{$category->title}}">
</span>
                                                <span class="dropdown-text">
{{$category->title}}
</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="header-bottom d-lg-block d-none">
            <div class="container">
                <div class="header-nav">
                    <div class="category-menu-section position-relative">
                        <div class="empty position-fixed" onclick="tooglmenu()"></div>
                        <button class="dropdown-btn" onclick="tooglmenu()">
<span class="dropdown-icon">
<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="14" height="1"/>
<rect y="8" width="14" height="1"/>
<rect y="4" width="10" height="1"/>
</svg>
</span>
                            <span class="list-text">
All Categories
</span>
                        </button>
                        <div class="category-dropdown position-absolute" id="subMenu">
                            <ul class="category-list">
                                @foreach($allCategories as $category)
                                    <li class="category-list-item">
                                        <a href="#">
                                            <div class="dropdown-item">
                                                <div class="dropdown-list-item">
                                                    <span class="dropdown-text">{{$category->title}}</span>
                                                </div>
                                                <div class="drop-down-list-icon">
<span>
<svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="1.5" y="0.818359" width="5.78538" height="1.28564" transform="rotate(45 1.5 0.818359)" fill="#1D1D1D"/>
<rect x="5.58984" y="4.90918" width="5.78538" height="1.28564" transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D"/>
</svg>
</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav-menu">
                        <ul class="menu-list">
                            <li>
                                <a href="{{url('/')}}">
                                    <span class="list-text">Home</span>
                                </a>
                            </li>
                            <li class="mega-menu">
                                <a href="#">
                                    <span class="list-text">Shop</span>
                                    <span>
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_1_183)">
<path
    d="M2.37811 5.89491C1.88356 5.89491 1.38862 5.90351 0.894066 5.89218C0.443267 5.88202 0.108098 5.59451 0.0178597 5.17027C-0.0641747 4.7851 0.137786 4.36204 0.508895 4.20305C0.659291 4.13859 0.83586 4.11008 1.00071 4.10851C1.93786 4.09992 2.87539 4.10461 3.81254 4.10422C4.07075 4.10422 4.10357 4.07062 4.10396 3.80889C4.10474 2.85847 4.102 1.90843 4.10513 0.958001C4.10669 0.513061 4.336 0.177111 4.71218 0.0501527C5.30752 -0.151027 5.88567 0.278287 5.89387 0.937687C5.90168 1.56232 5.89582 2.18735 5.89582 2.81237C5.89582 3.14441 5.89504 3.47646 5.89621 3.80811C5.897 4.07023 5.92942 4.10422 6.18685 4.10422C7.13728 4.105 8.08732 4.10265 9.03774 4.10539C9.48503 4.10656 9.81941 4.33235 9.94872 4.70776C10.1534 5.30192 9.72605 5.88437 9.06782 5.89413C8.50803 5.90233 7.94825 5.89608 7.38846 5.89608C6.97829 5.89608 6.56851 5.89491 6.15833 5.89687C5.93918 5.89804 5.897 5.94023 5.8966 6.1625C5.89543 7.11918 5.89778 8.07625 5.89543 9.03293C5.89426 9.48216 5.67238 9.81577 5.29736 9.94741C4.70437 10.1552 4.11841 9.72983 4.10669 9.07316C4.09771 8.57861 4.10474 8.08367 4.10474 7.58912C4.10474 7.12035 4.10552 6.65197 4.10435 6.1832C4.10396 5.93398 4.06841 5.89726 3.82387 5.89687C3.34221 5.89569 2.86055 5.89647 2.37889 5.89647C2.37811 5.8953 2.37811 5.8953 2.37811 5.89491Z"
    fill="white"/>
</g>
<defs>
<clipPath id="clip0_1_185">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
</span>
                                </a>
                                <div class="shop-menu">
                                    <div class="menu-wrapper">
                                        <div class="menu-list">
                                            <h5 class="menu-title">Brands</h5>
                                            <ul>
                                                @foreach($allBrands as $brand)
                                                    <li><a href="#">{{$brand->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="shop-menu-img">
                                        <img src="{{asset('frontend/assets/images/homepage-one/empty-wishlist.webp')}}"
                                             alt="img">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('about')}}">
                                    <span class="list-text">About</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('product')}}">
                                    <span class="list-text">Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">
                                    <span class="list-text">Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-vendor-btn">
                        @if(!auth()->guard('guest')->user())
                        <a href="{{route('user.login')}}" class="shop-btn">
                            <span class="list-text shop-text">Login</span>
                        </a>
                        @else
                            <a href="#" class="shop-btn">
                                <span class="list-text shop-text">{{auth()->guard('guest')->user()->name ?? 'LoggedIn'}}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</header>
