<ul class="nav nav-pills nav-fill flex-column">
    <li class="nav-item" style="font-size: 1.5rem;">
        <a class="nav-link" data-toggle="collapse" href="#lists" role="button" aria-expanded="false" aria-controls="lists"><i class="fas fa-list mr-2"></i>Lists</a>
    </li>
    @auth
    <li>
        <div id="lists" class="collapse show">
            <ul class="nav nav-pills nav-fill flex-column">
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('lists.create') }}">
                        <i class="fas fa-plus mr-2"></i>New List
                    </a>
                </li>
                @foreach(Auth::user()->lists as $list)
                    <list-card-sm route="{{ route('lists.show', $list) }}" name="{{ $list->name }}" ></list-card-sm>
                @endforeach
            </ul>
        </div>
    </li>
    @endauth
    <li class="nav-item" style="font-size: 1.5rem;">
        <a class="nav-link" data-toggle="collapse" href="#folders" role="button" aria-expanded="false" aria-controls="folders">
            <i class="fas fa-folder mr-2"></i>Folders
        </a>
    </li>
    @auth
    <li>
        <div id="folders" class="collapse">
            <ul class="nav nav-pills nav-fill flex-column">
                <li class="nav-item">
                    <a class="btn btn-primary" href="#new-folder">
                        <i class="fas fa-plus mr-2"></i>New Folder
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @endauth
</ul>
