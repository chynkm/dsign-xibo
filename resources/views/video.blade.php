<div class="za_section">
    <h2>Video {{ $count }}<button type="button" class="btn btn-danger btn-sm float-right za_delete"><span class="oi oi-trash"></span></button></h2>
    <p>Placeholder: ##VIDEO_{{ $count }}##</p>
    @foreach ($videos as $key => $video)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="" id="video-{{ $key }}">
        <label class="form-check-label" for="video-{{ $key }}">
            <video width="150" controls>
                <source src="video/{{ $video }}" type="video/mp4">
            </video>
        </label>
    </div>
    @endforeach
    <hr>
</div>
