<div class="za_section">
    <h2>Category {{ $count }}<button type="button" class="btn btn-danger btn-sm float-right za_delete"><span class="oi oi-trash"></span></button></h2>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="category_name_{{ $count }}" checked disabled>
                <label class="form-check-label" for="category_name_{{ $count }}">Show</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control" placeholder="Example category name">
        </div>
        <div class="col-sm-1">
            <input type="text" class="form-control" placeholder="Length">
        </div>
        <div class="col-sm-3">
            <p>##CATEGORY_NAME_{{ $count }}##</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-1">
            <div class="form-check">
                <input class="form-check-input field_presence" type="checkbox" value="1" id="category_description_{{ $count }}">
                <label class="form-check-label" for="category_description_{{ $count }}">Show</label>
            </div>
        </div>
        <div class="col-sm-5">
            <textarea class="form-control" rows="2" placeholder="Example category description" disabled></textarea>
        </div>
        <div class="col-sm-1">
            <input type="text" class="form-control" placeholder="Length" disabled>
        </div>
        <div class="col-sm-3">
            <p>##CATEGORY_DESCRIPTION_{{ $count }}##</p>
        </div>
    </div>
    <hr>
</div>
