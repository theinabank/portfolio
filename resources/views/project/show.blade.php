@extends('layouts.template')

@section('content')

        <section class="project-item-section">
            @include('layouts.subNav')

            <div class="bg-gray pb-5">
                <div class="sub-title mt-5">
                    <div class="container d-flex">
                        <h3>{{ $project->title }}</h3>
                        <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
                    </div>
                </div>

                    <div class="d-flex intro mt-5 container">
                        <div class="image">
                            <img class="img-fluid" src="<?= asset($project->thumbnail); ?>" alt="{{ $project->title }}">
                        </div>
                        <div class="text">
                            <p>{{ $project->intro }}</p>
                        </div>
                    </div>

                    <div class="description mt-5">

                        @if ($images->isNotEmpty())
                        <div class="gallery d-flex my-5">

                            @foreach($images as $image)
                                <img class="img-fluid" src="<?= asset($image->url); ?>" alt="image">
                            @endforeach

                        </div>

                        <div class="text-center">
                            <a href="#" class="button-blue" data-toggle="modal" data-target="#galleryModal">View Gallery</a>
                        </div>
                        @endif

                        <div class="text mt-5 container">
                            {!! $project->text !!}  
                        </div>
                    </div>
            </div>

                <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach($images as $image)
                        <div class="modal-image">
                            <img class="img-fluid" src="<?= asset($image->url); ?>" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </section>

        

@endsection