<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                    <h5 class="font-weight-normal mt-4 mb-5">
                       {!! __('lang.newspaper') !!}
                    </h5> <br> <br>
                    <ul class="social-media mb-3">
                        <li>
                            <a href="#">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3 text-danger">{!! __('lang.OxirgiPost') !!}</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer-border-bottom pb-2">
                                @foreach($last3News as $item)
                                <div class="row">
                                    <div class="col-3">
                                        <img
                                            src="../storage/images/{{$item->image}}"
                                            alt="thumb"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="col-9">
                                        <h5 class="font-weight-600">
                                            {!! $item->{'title_'.App::getLocale()}!!}
                                        </h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3 text-danger">{!! __('lang.category') !!}</h3>

                    @foreach($category as $item)
                    <div class="footer-border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 font-weight-600">
                                {!! $item->{'name_'.App::getLocale()}!!}
                            </h5>

                        </div>
                    </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="fs-14 font-weight-600">
                            © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                        </div>
                        <div class="fs-14 font-weight-600">
                            Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
