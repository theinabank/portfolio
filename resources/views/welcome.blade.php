@extends('layouts.template')

@section('content')

        <span id="bg-image" class="bg-image"></span>

        <header class="container d-flex justify-content-center flex-column">
            <div class="banner">
                <h1 id="title" class="mb-0">Hello,<br> I am Deina Banka,<br> I'm a Web Designer & Developer</h1>
                <div class="mt-5">
                    <a href="{{ route('about-index') }}" class="btn-about mr-4">About Me</a>
                    <a href="{{ route('contact-index') }}" class="btn-hire">Hire Me</a>
                </div>
            </div>
        </header>

        <section class="home-project-section py-5 glass">
            @include('layouts.subNav')
            <div class="container">
                <h5 class="py-4 mb-0">Latest projects</h5>
                @if($projects->isNotEmpty())
                <div id="carouselIndicators" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselIndicators" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                    <?php $i=0; foreach ($projects as $project): ?>
                        <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?> 
                        <div class="carousel-item <?= $set_; ?>">
                            <div class="latest-box d-flex">
                                <div class="col-md-5 image">
                                    <img class="img-fluid p-4" src="{{ $project->thumbnail }}" alt="{{ $project->title }}">
                                </div>
                                <div class="col-md-7 info">
                                    <h2>{{ $project->title }}</h2>
                                    <p>{{ $project->intro }}</p>
                                    <a href="{{ route('project-show', $project->id) }}" class="button-blue">Read more</a>
                                </div>
                            </div>
                        </div>
                        <?php $i++; endforeach ?>

                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @else
                <h2 class="d-flex justify-content-center">I'm working on some new projects here :)</h2>
                @endif
        </section>

@endsection