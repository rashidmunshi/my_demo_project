<div>
    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('list') }}">
                            <i class="fas fa-object-ungroup"></i>
                            <span>Vendor</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fab fa-product-hunt"></i>
                            <span>product</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.addproduct') }}">Admin Product</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
