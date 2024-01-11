<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.order.getAllOrder')}}">
                <i class="bi bi-grid"></i>
                <span>Orders</span>
            </a>
        </li><!-- End order Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.product.item.index')}}">
                        <i class="bi bi-circle"></i><span>Item</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.product.category.index')}}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.product.brand.index')}}">
                        <i class="bi bi-circle"></i><span>Brand</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.product.discount.index')}}">
                        <i class="bi bi-circle"></i><span>Discount</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.setting.officeSetting.index')}}">
                        <i class="bi bi-circle"></i><span>Business Setting</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.tax.index')}}">
                        <i class="bi bi-circle"></i><span>Tax</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-users"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.userManagement.user.index')}}">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.userManagement.role.index')}}">
                        <i class="bi bi-circle"></i><span>Role</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Website Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.website.slider.index')}}">
                        <i class="bi bi-circle"></i><span>Slider</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.promotion.index')}}">
                <i class="bi bi-grid"></i>
                <span>Promotion</span>
            </a>
        </li><!-- End order Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.testimonial.index')}}">
                <i class="bi bi-grid"></i>
                <span>Testimonial</span>
            </a>
        </li><!-- End order Nav -->



    </ul>

</aside><!-- End Sidebar-->
