<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Mi Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenido al Blog</h1>
                    <p class="lead mb-0"></p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    @foreach($articles as $article)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ $article->urlToImage }}" alt="..." />
                        <div class="card-header d-flex align-items-center">
                            <div class="me-3">
                                <img src="{{ $article->author->picture->medium }}" class="rounded-circle" alt="Avatar" style="width: 50px;">
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $article->author->name->title }}</h5>
                                <p class="mb-0">{{ $article->author->name->first }} {{ $article->author->name->last }} </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="small text-muted">{{ Carbon\Carbon::parse($article->publishedAt)->isoFormat('D [de] MMMM [de] YYYY') }}</div>
                            <h2 class="card-title">{{$article->title}}</h2>
                            <p class="card-text">{{ $article->content }}</p>
                        </div>
                    </div>
                    @endforeach
                    {{ $articles->links('vendor.bootstrap-4') }}
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{ url('/?q=apple') }}">Apple</a></li>
                                        <li><a href="{{ url('/?q=comida') }}">Comida</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{ url('/?q=magia') }}">Magia</a></li>
                                        <li><a href="{{ url('/?q=android') }}">Android</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
