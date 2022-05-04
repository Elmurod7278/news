<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                        {{--                       //tursin bu soha--}}
                    </ul>
                    <ul class="navbar-top-right-menu">
                        @auth
                            <li class="nav-item">
                                <a href="#" class="nav-link">{{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-danger">
                                        <span class="mdi mdi-arrow-left-circle-outline"></span>
                                        &nbsp;
                                        {{ __('lang.logout') }}
                                    </button>
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a href="{{route('register')}}" class="nav-link">{{__('lang.register')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('login')}}" class="nav-link">{{__('lang.login')}}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a class="navbar-brand" href="#"
                        ><img style="width: 50px" src="assets/images/logo.png" alt=""
                            /></a>
                    </div>
                    <div>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="navbar-collapse justify-content-center collapse"
                            id="navbarSupportedContent"
                        >
                            <ul
                                class="navbar-nav d-lg-flex justify-content-between align-items-center"
                            >
                                <li>
                                    <button class="navbar-close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </li>
                                @foreach($category as $item)
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                           href="index.html">{!! $item->{'name_'.app()->getLocale()} !!}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </nav>
    </div>

</header>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<!-- CSS only -->
