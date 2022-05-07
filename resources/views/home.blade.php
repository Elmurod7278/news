@extends('partials.main')

@section('content')
    <div class="container-scroller">
        <div class="main-panel">
            <div class="flash-news-banner">

                <ul class="nav nav-tabs">
                    @foreach($region as $regions)
                        {{--                        @php(dd(app()->getLocale()))--}}
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                               href="">{!! $regions->{'name_'.App::getLocale()} !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="content-wrapper">

            <div class="container">

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="storage/images/{{$reklama->image}}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <br><br>


                <div class="row" data-aos="fade-up">

                    <div class="col-lg-9 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">

                                @foreach($last3News as $new)
                                    <div class="row">
                                        <div class="col-sm-4 grid-margin">
                                            <div class="position-relative">
                                                <div class="rotate-img">
                                                    <img
                                                        src="storage/images/{{$new->image}}"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-8  grid-margin">


                                            <a href="{{route('news.view',['news'=>$new])}}" class="mb-2 font-weight-600">
                                                {!! $new->{'title_'.App::getLocale()}!!}
                                            </a>

                                            <div class="fs-13 mb-2">
                                                <span class="mr-2">Photo </span>10 Minutes ago
                                            </div>
                                            <p class="mb-0">
                                                {!!substr($new->{'desc_'.App::getLocale()},0,150) .'...' !!}
                                            </p>

                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 stretch-card grid-margin">
                        <div class="card bg-white text-black">
                            <div class="card-body">
                                <h4 class="text-primary">{{__('lang.latestnews')}}</h4>
                                @foreach($latestNews as $latestNew)
                                <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                    <div class="pr-3">
                                        <a href=""> {!!substr($latestNew->{'title_'.App::getLocale()},0,80) .'...' !!}</a>

                                        <div class="fs-12">
                                            <span class="mr-2">Photo </span>10 Minutes ago
                                        </div>
                                    </div>
                                    <div class="rotate-img">
                                        <img
                                            src="storage/images/{{$latestNew->image}}"
                                            alt="thumb"
                                            class="img-fluid img-lg"
                                        />
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-title text-primary">
                                            {!! __('lang.video') !!}
                                        </div>
                                        <div class="row">
                                            @foreach($video3News as $new)
                                                <div class="col-sm-4 grid-margin">
                                                    <div class="position-relative">
                                                        <div class="rotate-img">
                                                            <iframe width="320" height="215"
                                                                    src="https://www.youtube.com/embed/{{$new->url}}"
                                                                    title="YouTube video player" frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        </div>
                                                        <div class="badge-positioned w-90">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 stretch-card grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title ">
                                                    <h2 class="text text-primary">{!! __('lang.muharrirtanlovi') !!}</h2>
                                                </div>

                                                @foreach($tanlov as $item)
                                                    <div class="row">
                                                        <div class="col-sm-4 grid-margin">
                                                            <div class="position-relative">
                                                                <div class="rotate-img">
                                                                    <img
                                                                        src="storage/images/{{$item->news->image}}"
                                                                        alt="thumb"
                                                                        class="img-fluid"
                                                                    />
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8  grid-margin">


                                                            <a href="{{route('news.view',['news'=>$item->news])}}" class="mb-2 font-weight-600">
                                                                {!! $item->news->{'title_'.App::getLocale()}!!}
                                                            </a>

                                                            <div class="fs-13 mb-2">
                                                                <span class="mr-2">Photo </span>10 Minutes ago
                                                            </div>
                                                            <p class="mb-0">
                                                                {!!substr($item->news->{'desc_'.App::getLocale()},0,150) .'...' !!}
                                                            </p>

                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->


        <!-- partial -->
    </div>
    </div>
@endsection
