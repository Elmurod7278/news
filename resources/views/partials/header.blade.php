<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                        {{--                       //tursin bu soha--}}
                    </ul>
                    <ul class="navbar-top-right-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Sign in</a>
                        </li>
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
                                    {{--                                    @php($lang  = Lang::getLocale())--}}
                                    {{--                                    @php(dd('name_'.Lang::getLocale()))--}}
                                    {{--                                    @php(dd($item->{'name_'.Lang::getLocale()}))--}}
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.html">{!! $item->{'name_oz'} !!}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                           Tillar
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">O'zbekcha</a></li>
                            <li><a class="dropdown-item" href="#">Ўзбекча</a></li>
                            <li><a class="dropdown-item" href="#">Русский</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </nav>
    </div>

</header>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- CSS only -->
