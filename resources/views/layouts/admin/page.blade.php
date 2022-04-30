@extends('layouts.admin.master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body',
    (config('adminlte.sidebar_mini', true) === true ?
        'sidebar-mini ' :
        (config('adminlte.sidebar_mini', true) == 'md' ?
         'sidebar-mini sidebar-mini-md ' : '')
    ) .
    (config('adminlte.layout_topnav') || View::getSection('layout_topnav') ? 'layout-top-nav ' : '') .
    (config('adminlte.layout_boxed') ? 'layout-boxed ' : '') .
    (!config('adminlte.layout_topnav') && !View::getSection('layout_topnav') ?
        (config('adminlte.layout_fixed_sidebar') ? 'layout-fixed ' : '') .
        (config('adminlte.layout_fixed_navbar') === true ?
            'layout-navbar-fixed ' :
            (isset(config('adminlte.layout_fixed_navbar')['xs']) ? (config('adminlte.layout_fixed_navbar')['xs'] == true ? 'layout-navbar-fixed ' : 'layout-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['sm']) ? (config('adminlte.layout_fixed_navbar')['sm'] == true ? 'layout-sm-navbar-fixed ' : 'layout-sm-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['md']) ? (config('adminlte.layout_fixed_navbar')['md'] == true ? 'layout-md-navbar-fixed ' : 'layout-md-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['lg']) ? (config('adminlte.layout_fixed_navbar')['lg'] == true ? 'layout-lg-navbar-fixed ' : 'layout-lg-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['xl']) ? (config('adminlte.layout_fixed_navbar')['xl'] == true ? 'layout-xl-navbar-fixed ' : 'layout-xl-navbar-not-fixed ') : '')
        ) .
        (config('adminlte.layout_fixed_footer') === true ?
            'layout-footer-fixed ' :
            (isset(config('adminlte.layout_fixed_footer')['xs']) ? (config('adminlte.layout_fixed_footer')['xs'] == true ? 'layout-footer-fixed ' : 'layout-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['sm']) ? (config('adminlte.layout_fixed_footer')['sm'] == true ? 'layout-sm-footer-fixed ' : 'layout-sm-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['md']) ? (config('adminlte.layout_fixed_footer')['md'] == true ? 'layout-md-footer-fixed ' : 'layout-md-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['lg']) ? (config('adminlte.layout_fixed_footer')['lg'] == true ? 'layout-lg-footer-fixed ' : 'layout-lg-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['xl']) ? (config('adminlte.layout_fixed_footer')['xl'] == true ? 'layout-xl-footer-fixed ' : 'layout-xl-footer-not-fixed ') : '')
        )
        : ''
    ) .
    (config('adminlte.sidebar_collapse') || View::getSection('sidebar_collapse') ? 'sidebar-collapse ' : '') .
    (config('adminlte.right_sidebar') && config('adminlte.right_sidebar_push') ? 'control-sidebar-push ' : '') .
    config('adminlte.classes_body')
)

@section('body_data',
(config('adminlte.sidebar_scrollbar_theme', 'os-theme-light') != 'os-theme-light' ? 'data-scrollbar-theme=' . config('adminlte.sidebar_scrollbar_theme')  : '') . ' ' . (config('adminlte.sidebar_scrollbar_auto_hide', 'l') != 'l' ? 'data-scrollbar-auto-hide=' . config('adminlte.sidebar_scrollbar_auto_hide')   : ''))


@section('body')

    <div class="wrapper">
        <nav class="main-header navbar {{config('adminlte.classes_topnav_nav', 'navbar-expand-md')}} {{config('adminlte.classes_topnav', 'navbar-white navbar-light')}}">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"
                       @if(config('adminlte.sidebar_collapse_remember')) data-enable-remember="true"
                       @endif @if(!config('adminlte.sidebar_collapse_remember_no_transition')) data-no-transition-after-reload="false"
                       @endif @if(config('adminlte.sidebar_collapse_auto_size')) data-auto-collapse-size="{{config('adminlte.sidebar_collapse_auto_size')}}" @endif>
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">{{ trans('adminlte.toggle_navigation') }}</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))order-1 order-md-3 navbar-no-expand @endif">
                @yield('content_top_nav_right')
                @each('partials.admin.menu-item-top-nav-right', $adminlte->menu(), 'item')
                @if(config('adminlte.right_sidebar'))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-widget="control-sidebar"
                           @if(!config('adminlte.right_sidebar_slide')) data-controlsidebar-slide="false"
                           @endif @if(config('adminlte.right_sidebar_scrollbar_theme', 'os-theme-light') != 'os-theme-light') data-scrollbar-theme="{{config('adminlte.right_sidebar_scrollbar_theme')}}"
                           @endif @if(config('adminlte.right_sidebar_scrollbar_auto_hide', 'l') != 'l') data-scrollbar-auto-hide="{{config('adminlte.right_sidebar_scrollbar_auto_hide')}}" @endif>
                            <i class="{{config('adminlte.right_sidebar_icon')}}"></i>
                        </a>
                    </li>
                @endif
            </ul>
            <a href="{{ route('admin.users.show', auth()->id()) }}" class="btn btn-success mr-2"><i class="fas fa-user"></i> Профиль</a>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">
                    <i class="fas fa-sign-out-alt"></i>
                    Чиқиш
                </button>
            </form>
        </nav>
        @if(!config('adminlte.layout_topnav') && !View::getSection('layout_topnav'))
            <aside class="main-sidebar {{config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')}}">
                <a href="{{route('admin.home')}}" class="brand-link {{ config('adminlte.classes_brand') }}">
                    <img src="/logo.png" width="30px" height="25px"
                         alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}"
                         class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </span>
                </a>
                <div class="sidebar">
                    <nav class="mt-2 mb-4 border-bottom">
                        <ul class="nav nav-pills nav-sidebar flex-column {{config('adminlte.classes_sidebar_nav', '')}}"
                            data-widget="treeview" role="menu"
                            @if(config('adminlte.sidebar_nav_animation_speed') != 300) data-animation-speed="{{config('adminlte.sidebar_nav_animation_speed')}}"
                            @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                            @each('partials.admin.menu-item', $adminlte->menu(), 'item')
                        </ul>
                    </nav>

                    @if(isset($cardRequests))
                        @cannot('admin-panel')
                            <ul class="nav nav-pills nav-sidebar flex-column px-2">
                                @foreach($cardRequests as $requests)
                                    <h3 class="px-2 nav-header font-weight-bold">{{$requests['title']}}</h3>
                                    @forelse($requests['requests'] as $i => $cardRequest)
                                        <li class="p-2 card" style="font-size: 14px;">
                                            <h4 class="card-title text-sm text-bold">{{$i + 1}}
                                                . {{ $cardRequest->template->name }}</h4>
                                            <div class="card-text"><b>Сони:</b> {{ $cardRequest->template_count }}</div>
                                            <div class="card-text mb-2"><b>Сўров
                                                    вақти:</b> {{ $cardRequest->created_at }}</div>
                                            @if($cardRequest->statusLabel())
                                                <div class="card-text mb-2">{!! $cardRequest->statusLabel() !!}</div>
                                            @endif
                                            <a href="{{ route('admin.showRequest' , $cardRequest) }}"
                                               class="stretched-link"></a>
                                        </li>
                                    @empty
                                        <p class="px-2" style="font-size: 14px;">
                                            Сизда ҳеч қандай сўров йўқ
                                        </p>
                                    @endforelse
                                @endforeach
                            </ul>
                        @endcannot
                    @endif

                    @if(isset($orders))
                        @cannot('admin-panel')
                            <ul class="nav nav-pills nav-sidebar flex-column px-2">
                                @foreach($orders as $requests)
                                    <h3 class="px-2 nav-header font-weight-bold">{{$requests['title']}}</h3>
                                    @forelse($requests['requests'] as $i => $order)
                                        <li class="p-2 card" style="font-size: 14px;">
                                            <h4 class="card-title text-sm text-bold">{{$i + 1}}. {{ $order->orderedBy->full_name }}</h4>
                                            <div class="card-text"><b>Тўлов тури:</b> {{ $order->payment_type ? $order->paymentName() : '--' }}
                                            </div>
                                            <div class="card-text"><b>Жами нарх:</b> {{ $order->total }}</div>
                                            <div class="card-text mb-2">{!! $order->statusLabel() !!}</div>
                                            <a href="{{ route('admin.cabinet.order.show' , $order) }}" class="stretched-link"></a>
                                        </li>
                                    @empty
                                    <p class="px-2" style="font-size: 14px;">
                                        Сизда ҳеч қандай буюртма йўқ
                                    </p>
                                    @endforelse
                                @endforeach
                            </ul>
                        @endcannot
                    @endif
                </div>
            </aside>
        @endif

        <div class="content-wrapper">
            @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
                <div class="container">
                    @endif

                    <div class="content-header">
                        <div class="{{config('adminlte.classes_content_header', 'container-fluid')}}">
                            @yield('content_header')

                        </div>
                    </div>
                    <div class="content px-4">
                        @include('admin.layout.errorSummary')
                        <div class="{{config('adminlte.classes_content', 'container-fluid')}}">
                            @section('breadcrumbs', Breadcrumbs::render())
                            @yield('breadcrumbs')
                            @yield('content')
                        </div>
                    </div>
                    @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
                </div>
            @endif
        </div>

        @hasSection('footer')
            <footer class="main-footer">
                @yield('footer')
            </footer>
        @endif
    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
