<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link align-middle px-0" target="_blank">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline small">Site Home</span>
                        </a>
                    </li>
                    <li class="@if(Request::path()== 'admin/dashboard/*') active @endif">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-file-earmark"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="@if(Request::is('admin/pages/*')) active @endif">
                        <a href="{{ url('admin/pages') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Páginas</span>
                        </a>
                    </li>
                    <li class="@if(Request::path()== 'admin/products/*') active @endif">
                        <a href="{{url('admin/products')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                        {{-- <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li class="@if(Request::path()== 'admin/categories/*') active @endif" >
                        <a href="{{url('admin/categories')}}"  >
                            <i class="fs-4 bi-clipboard2-data-fill"></i><span class="ms-1 d-none d-sm-inline">Categories</span>
                        </a>
                        <div aria-labelledby="navbarDropdown">
                            <ul class="submenu">
                                <!-- Add more subs -->
                                <li class="dropdown-item">
                                    <a href="{{ url('admin/subcategories') }}">
                                        <i class="bi bi-clipboard2-data"></i><span class="ms-1 d-none d-sm-inline">Subcategories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="@if(Request::path() == 'admin/customers/*') active @endif">
                        <a href="{{url('#')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person-circle"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <div class="d-flex">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
