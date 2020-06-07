<div class="za_section">
    <h2>Image {{ $count }}<button type="button" class="btn btn-danger btn-sm float-right za_delete"><span class="oi oi-trash"></span></button></h2>
    <p>Placeholder: ##IMAGE_{{ $count }}##</p>
    @foreach ($images as $key => $image)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="" id="image-{{ $key }}">
        <label class="form-check-label" for="image-{{ $key }}">
            <img src="img/{{ $image }}" alt="{{ $image }}" width="100px" class="img-thumbnail float-left">
        </label>
    </div>
    @endforeach
    <hr>
</div>
