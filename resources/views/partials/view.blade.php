@extends('partials.main')
    @section('content')
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href=".././assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="../assets/vendors/aos/dist/aos.css/aos.css" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->
</head>

<body>
<div class="container-scroller">
    <div class="main-panel">


        <div class="content-wrapper">
            <div class="container">
                <div class="col-sm-12">
                    <div class="card" data-aos="fade-up">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <h1 class="font-weight-600 mb-1 text-center text-primary text-bold">
                                            {!! $new->{'title_'.App::getLocale()}!!}
                                        </h1>
                                        <h3 class="font-weight-600 mb-1">
                                            {!! $new->{'desc_'.App::getLocale()}!!}
                                        </h3>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">Photo </span>10 Minutes ago
                                        </p>

                                        <div class="">
                                            <img
                                                src="../storage/images/{{$new->image}}"
                                                alt="banner"
                                                class="img-fluid mt-4 mb-4"
                                            />
                                        </div>
                                        <p style="font-size: 20px">
                                            {!! $new->{'body_'.App::getLocale()}!!}

                                        </p>
                                    </div>
                                    <div>

                                        <div class="rotate-img">
                                            <iframe width="660" height="415" src="https://www.youtube.com/embed/{{$new->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                        </div>
                                        <p class="mb-4 fs-15">
                                        </p>
                                    </div>

                                    <div class="d-lg-flex">
                        <span class="fs-16 font-weight-600 mr-2 mb-1"  >Tags</span>


                                        <span class="badge badge-outline-dark mr-2 mb-1"
                                        >Trending</span
                                        >
                                        <span class="badge badge-outline-dark mr-2 mb-1"
                                        >Trending</span
                                        ><span class="badge badge-outline-dark mr-2 mb-1"
                                        >Trending</span
                                        ><span class="badge badge-outline-dark mr-2 mb-1"
                                        >Trending</span
                                        ><span class="badge badge-outline-dark mb-1"
                                        >Trending</span
                                        >
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <h2 class="mb-4 text-primary font-weight-600">
                                        Latest news
                                    </h2>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="border-bottom pb-4 pt-4">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h5 class="font-weight-600 mb-1">
                                                            {!! $new->{'title_'.App::getLocale()}!!}
                                                        </h5>
                                                        <p class="fs-13 text-muted mb-0">
                                                            <span class="mr-2">Photo </span>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="rotate-img">
                                                            <img
                                                                src="storage/images/inner/inner_7.jpg"
                                                                alt="banner"
                                                                class="img-fluid"
                                                            />
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
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:../partials/_footer.html -->


        <!-- partial -->
    </div>
</div>
<!-- inject:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->

<script src="../assets/vendors/aos/dist/aos.js/aos.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="../assets/js/demo.js"></script>
<script src="../assets/js/jquery.easeScroll.js"></script>
<!-- End custom js for this page-->
</body>
</html>
@endsection
