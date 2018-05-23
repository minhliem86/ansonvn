<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard </a>
            </li>
            <li class="divider"></li>

            <li class="nav-title">
                Quản lý Website
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.category.index') !!}" class="nav-link {!! LP_lib::setActive(2,'category') !!}"><i class="icon-drop"></i> Danh Mục Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.product.index') !!}" class="nav-link {!! LP_lib::setActive(2,'product') !!}"><i class="icon-drop"></i> Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.service.index') !!}" class="nav-link {!! LP_lib::setActive(2,'service') !!}"><i class="icon-drop"></i> Dịch Vụ</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.branch.index') !!}" class="nav-link {!! LP_lib::setActive(2,'branch') !!}"><i class="icon-drop"></i> Chi Nhánh</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.gallery.index') !!}" class="nav-link {!! LP_lib::setActive(2,'gallery') !!}"><i class="icon-drop"></i> Thư Viện</a>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Thông tin chung
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.company.index') !!}" class="nav-link {!! LP_lib::setActive(2,'company') !!}"><i class="icon-drop"></i> Thông tin Công ty</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.contact.index') !!}" class="nav-link {!! LP_lib::setActive(2,'contact') !!}"><i class="icon-drop"></i> Khách liên hệ</a>
            </li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>