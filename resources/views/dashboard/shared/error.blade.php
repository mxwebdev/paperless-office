@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach

    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>

@endif