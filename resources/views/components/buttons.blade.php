<div class="d-flex">
    <div class="pr-1 pb-1">
        <a
            class="btn btn-outline-warning"
            href="{{ route($routeObject . ".edit", [$objectName => $object->id]) }}"
            title="Edit"
        > Edit
            <i class="fas fa-pencil-alt"></i>
        </a>
    </div>
    <div class="pr-1 pb-1">
        <form class="d-inline" method="POST" action="{{ route($routeObject . '.destroy', [$objectName => $object->id]) }}">
            @csrf
            @method('DELETE')
            <input class="btn btn-outline-danger" type="submit" value="Delete!">
        </form>
    </div>
</div>
