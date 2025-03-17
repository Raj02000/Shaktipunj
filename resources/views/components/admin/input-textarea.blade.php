@props(['name', 'oldvalue' => null, 'label' => null, 'ckeditor' => true, 'required' => false])
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" class="{{ $ckeditor ? 'ckeditor-here' : '' }}" cols="30" rows="10"
        @required($required)>{{ old($name, $oldvalue) }}</textarea>
    @if ($errors->has($name))
        <div id="defaultFormControlHelp" class="form-text text-danger">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
