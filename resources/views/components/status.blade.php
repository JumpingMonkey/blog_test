@if($object->status == 1)
    <p class="badge bg-success badge-lg">
    {{ $object->status ? 'Active' : 'Inactive' }}
    </p>
@else
    <p class="badge bg-danger badge-lg">
        {{ $object->status ? 'Active' : 'Inactive' }}
    </p>
@endif

