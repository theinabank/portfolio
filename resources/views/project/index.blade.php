@extends('layouts.template')

@section('content')


        <section class="project-section">
            @include('layouts.subNav')

            <div class=" grid my-5 p-3">
                @if($projects->isNotEmpty())
                <div class="gallery-image">
                @foreach ($projects as $project)
                <?php $href = route('project-show', $project->id); ?>
                    <div class="img-box" onclick='window.location.href="{{$href}}"'>
                        <img src="<?= asset($project->thumbnail); ?>" alt="{{ $project->title }}" />
                        <div class="transparent-box">
                            <div class="caption">
                                <p>{{ $project->title }}</p>
                                <p class="opacity-low">{{ $project->category->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                @else
                <h2 class="d-flex justify-content-center">I'm working on some new projects here :)</h2>
                @endif

            </div>
        </section>

@endsection