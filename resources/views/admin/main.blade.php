@extends('layouts.adminTemplate')

@section('content')

<div class="error-container">
    @if ($message = Session::get('success'))
        <div class="error-msgs alert alert-success text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
    
    

    
    <div class="sub-title">
        <div class="container d-flex">
            <h3>Projects</h3>
            <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>

    <div class="d-flex admin-section">
        <div class="admin-menu">
            <h2>MENU</h2>
            <!-- <a href="#">Preview</a> -->
            <div class="mb-3">{{ Auth::user()->name }}</div>
            <a href="#">Projects</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                this.closest('form').submit();">Log Out</a>
            </form>
        </div>
        <div class="admin-content">

            <div class="mini-info">
                <p>{{ $count }} projects found</p>
                <p>{{ $hiddenCount }} hidden projects</p>
                <a href="{{ route('admin-add') }}" class="button-add">Add New Project</a>
            </div>

            <table class="styled-table">
                <tr>
                    <th>#</th>
                    <th class="t-title">Title</th>
                    <th>Thumbnail</th>
                    <th>Category</th>
                    <th>Intro</th>
                    <th>Text</th>
                    <th>Images</th>
                    <th class="t-date">Date</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach($projects as $project)
                <?php $href = route('admin-show', $project->id); ?>
                <tr onclick='window.location.href="{{ $href }}"'>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td class="image"><img src="<?= asset($project->thumbnail); ?>" alt="{{ $project->title }}" /></td>
                    <td>{{$project->category->name}}</td>
                    <td>{{ \Illuminate\Support\Str::limit($project->intro, 120, '...') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($project->text, 120, '...') }}</td>
                    <td>{{ $project->images->count() }}</td>
                    <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                        @if ($project->status === 'hidden')
                        <td class="hidden">{{ $project->status }}</td> 
                        @else
                        <td class="public">{{ $project->status }}</td> 
                        @endif
                    <td>
                        <a href="{{ route('admin-edit', $project->id) }}" class="button-edit">Edit</a>
                    </td>
                    <td>
                        <button type="button" class="button-del" style="z-index: 1;" data-toggle="modal" data-target="#deleteModal" onclick="openModal(event)">Delete</button>
                    </td>
                </tr>
                @endforeach
            </table>
<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Warning!</h5>
                        <button type="button" class="close" onclick="closeModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You are about to delete an entry from database. Do you really want to proceed?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>

                      <form action="{{ route('admin-delete', $project->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" class="button-del" value="Delete" />
                        </form>

                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
        <script>
            function openModal(event) {
                const modal = document.querySelector('#deleteModal');
                modal.style.display = 'block';
                modal.className += ' show';
                event.stopPropagation();
            }

            function closeModal() {
                const modal = document.querySelector('#deleteModal');
                modal.style.display = 'none';
                modal.classList.remove('show');
            }
        </script>


@endsection