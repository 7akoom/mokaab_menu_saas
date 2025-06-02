<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
        <li class="text-sm ps-2"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
        <li class="text-sm text-dark active" aria-current="page"></li>
      </ol>
    </nav>
    <form method="POST" action="{{ route('company.logout', ['company' => request()->route('company') ?? app('currentCompany')->domain]) }}">
        @csrf
        <button type="submit" class="btn btn-link nav-link text-body font-weight-bold px-0">
            <span class="d-sm-inline d-none">تسجيل خروج</span>
        </button>
    </form>
    <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </a>
    </li>
  </div>
</nav>