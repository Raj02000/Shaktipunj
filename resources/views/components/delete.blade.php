@props(['route', 'method' => 'POST', 'values' => null])

<form action="{{ $route }}" method="{{ $method }}">
    @csrf
    @isset($values)
        @foreach ($values as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    @endisset
    <button type="submit" class="btn btn-danger btn-sm mb-sm-1">
        <span class="mdi mdi-trash-can-outline"></span>
    </button>
</form>
