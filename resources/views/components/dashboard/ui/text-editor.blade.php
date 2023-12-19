@props(['label', 'name', 'id', 'class', 'style','subtext'])
<div class="mb-3" style="{{ $style ?? '' }}">


    @isset($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

    @endisset
    @isset($subtext)
        <p>
            {{$subtext}}
        </p>
    @endisset

    @isset($name)
        <textarea name="{{ $name }}" class="{{ $class ?? 'form-control' }}" id="{{ $id }}"></textarea>
    @else
        <p class="text-danger">Error:Please provide name as prop for TextEditor Component</p>
    @endisset

</div>
