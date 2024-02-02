@props(['type']) <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<div class="alert alert-{{ $type }} alert-dismissible fade show my-2" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    {{ $slot }}
</div>
