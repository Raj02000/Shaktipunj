@props(['route', 'data', 'column' => 'publish'])

<div class="form-check form-switch">
    <input class="form-check-input pointer" type="checkbox" @checked($data[$column])
        onclick="window.location.href='{{ $route }}'">
</div>
