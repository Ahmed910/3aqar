<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
      </ul>

      <ul class="nav navbar-nav">
          <div class="bookmark-input search-input">
            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
            <ul class="search-list search-list-bookmark"></ul>
          </div>
        </li>
      </ul>
    </div>
    <ul class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-language">
            <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-{{ app()->getLocale() == 'en' ? 'us' : 'sa' }}"></i><span class="selected-language">{{ LaravelLocalization::getCurrentLocaleName() }}</span></a>

            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @continue($localeCode == LaravelLocalization::getCurrentLocale())

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" data-language="{{ $localeCode }}">
                        <i class="flag-icon flag-icon-{{ $localeCode == 'en' ? 'us' : 'sa' }}"></i> {{ $properties['native'] }}
                    </a>
                </div>

            @endforeach
        </li>
          <form method="get" action="{!! LaravelLocalization::localizeUrl('dashboard/search') !!}">
          <div class="search-input">
              <div class="search-input-icon"><i data-feather="search"></i></div>
              <input class="form-control input autocomplete_general" name="search" type="text" placeholder="{!! trans('dashboard.general.search') !!}" tabindex="-1" data-search="search" autocomplete="off">
              <div class="search-input-close"><i data-feather="x"></i></div>
              <ul class="search-list search-list-main"></ul>
          </div>
          </form>
      </li>

 

      <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none">
                  <span class="user-name font-weight-bolder">{{ auth()->user()->fullname }}</span>
                  <span class="user-status">{{ optional(auth()->user()->role)->name ?? null }}</span>
              </div>
              <span class="avatar">
                  <img class="round" src="{{ auth()->user()->avatar }}" alt="avatar" height="40" width="40">
                  <span class="avatar-status-online"></span>
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
              <a class="dropdown-item" href="{{ LaravelLocalization::localizeUrl('dashboard/get_profile') }}">
                  <i class="mr-50" data-feather="user"></i> {!! trans('dashboard.user.profile') !!}
              </a>
              @if (auth()->user()->hasPermissions('setting','store'))
              <a class="dropdown-item" href="{{ route('dashboard.setting.index') }}"><i class="mr-50" data-feather="settings"></i> {!! trans('dashboard.setting.setting') !!}</a>
              @endif
              <div class="dropdown-divider"></div>
              {!! Form::open(['route' => 'logout' , 'method' => 'POST' , 'id' => 'logout_form']) !!}
              <a class="dropdown-item" onclick="document.getElementById('logout_form').submit();"><i class="mr-50" data-feather="power"></i> {!! trans('dashboard.auth.logout') !!}</a>
              {!! Form::close() !!}
          </div>
      </li>
    </ul>
  </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Files</h6></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
        </div>
      </div></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div></a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
        </div>
      </div></a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div></a></li>
</ul>
<!-- END: Header-->
