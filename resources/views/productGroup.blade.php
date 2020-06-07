<div class="za_section">
    <h2>
        Product group {{ $count }}
        <div class="float-right">
            <button type="button" class="btn btn-primary btn-sm add_product" data-product-group="{{ $count }}"><span class="oi oi-plus"></span></button>
            <button type="button" class="btn btn-danger btn-sm za_delete"><span class="oi oi-trash"></span></button>
        </div>
    </h2>
    <div id="product_{{ $count }}">
    </div>
</div>
