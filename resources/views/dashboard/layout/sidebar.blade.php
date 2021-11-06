<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{!! route('dashboard.home') !!}">
                    <span class="brand-logo">
                        <img src="{{ asset('dashboardAssets') }}/images/icons/logo_sm.png" alt="">
                    </span>
                    <h2 class="brand-text">{{ setting('project_name') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->route()->getName() == 'dashboard.home' ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="{!! route('dashboard.home') !!}">
                    <i data-feather='home'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.general.home') !!}">
                        {!! trans('dashboard.general.home') !!}
                    </span>
                </a>
            </li>

            @if (auth()->user()->hasPermissions('setting','store'))
               <li class="{{ request()->route()->getName() == 'dashboard.setting.index' ? 'active' : '' }} nav-item">
                   <a class="d-flex align-items-center" href="{{ route('dashboard.setting.index') }}">
                       <i data-feather='settings'></i>
                       <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.setting.setting') !!}">
                           {!! trans('dashboard.setting.setting') !!}
                       </span>
                   </a>
               </li>
             @endif

            {{-- Clients --}}
            @if (auth()->user()->hasPermissions('client'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.client.clients') !!}">
                        {!! trans('dashboard.client.clients') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.client.index' || request()->route()->getName() == 'dashboard.client.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.client.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.client.clients') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('client','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.client.create' || request()->route()->getName() == 'dashboard.client.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.client.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.client.add_client') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            {{-- Drivers --}}
            @if (auth()->user()->hasPermissions('driver'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.driver.drivers') !!}">
                        {!! trans('dashboard.driver.drivers') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.driver.index' || request()->route()->getName() == 'dashboard.driver.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.driver.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.driver.drivers') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('driver','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.driver.create' || request()->route()->getName() == 'dashboard.driver.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.driver.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.driver.add_driver') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            {{-- Admins --}}
            @if (auth()->user()->hasPermissions('manager'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.manager.managers') !!}">
                        {!! trans('dashboard.manager.managers') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.manager.index' || request()->route()->getName() == 'dashboard.manager.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.manager.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.manager.managers') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('manager','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.manager.create' || request()->route()->getName() == 'dashboard.manager.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.manager.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.manager.add_manager') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Roles --}}
            @if (auth()->user()->hasPermissions('role'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.role.roles') !!}">
                        {!! trans('dashboard.role.roles') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.role.index' || request()->route()->getName() == 'dashboard.role.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.role.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.role.roles') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('role','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.role.create' || request()->route()->getName() == 'dashboard.role.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.role.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.role.add_role') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif


            {{-- Country --}}
            @if (auth()->user()->hasPermissions('country'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.country.countries') !!}">
                        {!! trans('dashboard.country.countries') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.country.index' || request()->route()->getName() == 'dashboard.country.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.country.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.country.countries') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('country','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.country.create' || request()->route()->getName() == 'dashboard.country.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.country.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.country.add_country') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            {{-- City --}}
            @if (auth()->user()->hasPermissions('city'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.city.cities') !!}">
                        {!! trans('dashboard.city.cities') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.city.index' || request()->route()->getName() == 'dashboard.city.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.city.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.city.cities') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('city','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.city.create' || request()->route()->getName() == 'dashboard.city.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.city.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.city.add_city') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

               {{-- feature --}}
            @if (auth()->user()->hasPermissions('feature'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.feature.features') !!}">
                        {!! trans('dashboard.feature.feature') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.feature.index' || request()->route()->getName() == 'dashboard.feature.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.feature.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.feature.feature') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('feature','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.feature.create' || request()->route()->getName() == 'dashboard.feature.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.feature.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.feature.add_feature') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

                 {{-- frontage --}}
            @if (auth()->user()->hasPermissions('frontage'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.frontage.frontages') !!}">
                        {!! trans('dashboard.frontage.frontage') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.frontage.index' || request()->route()->getName() == 'dashboard.frontage.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.frontage.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.frontage.frontage') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('frontage','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.frontage.create' || request()->route()->getName() == 'dashboard.frontage.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.frontage.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.frontage.add_frontage') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
                {{-- category --}}
              @if (auth()->user()->hasPermissions('category'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.category.categories') !!}">
                        {!! trans('dashboard.category.category') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.category.index' || request()->route()->getName() == 'dashboard.category.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.category.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.category.category') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('category','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.category.create' || request()->route()->getName() == 'dashboard.category.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.category.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.category.add_category') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif


      {{-- ad --}}
              @if (auth()->user()->hasPermissions('ad'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.ad.ads') !!}">
                        {!! trans('dashboard.ad.ad') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.ad.index' || request()->route()->getName() == 'dashboard.ad.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.ad.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.ad.ad') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
           
                </ul>
            </li>
            @endif

            {{-- mowthq --}}
        @if (auth()->user()->hasPermissions('mowthq'))
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='package'></i>
                    <span class="menu-title text-truncate" data-i18n="{!! trans('dashboard.mowthq.mowthqs') !!}">
                        {!! trans('dashboard.mowthq.mowthq') !!}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->route()->getName() == 'dashboard.mowthq.index' || request()->route()->getName() == 'dashboard.mowthq.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.mowthq.index') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.mowthq.mowthq') !!}">
                                {!! trans('dashboard.general.show_all') !!}
                            </span>
                        </a>
                    </li>
                    @if (auth()->user()->hasPermissions('mowthq','store'))
                    <li class="{{ request()->route()->getName() == 'dashboard.mowthq.create' || request()->route()->getName() == 'dashboard.mowthq.edit' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{!! route('dashboard.mowthq.create') !!}">
                            <i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="{!! trans('dashboard.mowthq.add_mowthq') !!}">
                                {!! trans('dashboard.general.add_new') !!}
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
