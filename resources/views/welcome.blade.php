@extends('layouts.app')

@php
$images = ['img_burritos_rough.png', 'img_desert_brownie.png', 'img_desert_churros.png', 'img_desert_cookie.png', 'img_fajitas_rough.png', 'img_nachos_rough.png',];
$videos = ['sunrise.mp4', 'water.mp4',];
@endphp

@section('content')
<style type="text/css">
.product_table tr td{
  padding: 0 2px;
}
.product_table .oi.oi-move{
  padding-bottom: 0;
  padding-left: 15px;
  padding-top: 5px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin section
                    <div class="float-right">
                        <button type="button" class="btn btn-primary"><span class="oi oi-plus"></span> Category</button>
                        <button type="button" class="btn btn-primary ml-1"><span class="oi oi-plus"></span> Image</button>
                        <button type="button" class="btn btn-primary ml-1"><span class="oi oi-plus"></span> Product group</button>
                        <button type="button" class="btn btn-primary ml-1"><span class="oi oi-plus"></span> Video</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Zone 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Zone 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Zone 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="oi oi-plus"></span></a>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="min-height: 100px;">
                                    <form>
                                        <h2>Category 1</h2>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="Example category name">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Length">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control-plaintext" value="##CATEGORY_1_NAME##">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" rows="2" placeholder="Example category description"></textarea>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Length">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control-plaintext" value="##CATEGORY_1_DESCRIPTION##">
                                            </div>
                                        </div>
                                        <hr>
                                        <h2>Image 1</h2>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Placeholder</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" value="##IMAGE_1##">
                                            </div>
                                        </div>
                                        @for ($i = 0; $i < 2; $i++)
                                        @foreach ($images as $key => $image)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="image-{{ $key }}">
                                            <label class="form-check-label" for="image-{{ $key }}">
                                                <img src="img/{{ $image }}" alt="{{ $image }}" width="100px" class="img-thumbnail float-left">
                                            </label>
                                        </div>
                                        @endforeach
                                        @endfor
                                        <hr>
                                        <h2>Video 1</h2>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Placeholder</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" value="##VIDEO_1##">
                                            </div>
                                        </div>
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
                                        <h2>Product group 1</h2>
                                        <h4>Product 1</h4>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="Example name">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Length">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control-plaintext" value="##PRODUCT_1_NAME##">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="Example price">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Length">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control-plaintext" value="##PRODUCT_1_PRICE##">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" rows="2" placeholder="Example description"></textarea>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Length">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control-plaintext" value="##PRODUCT_1_DESCRIPTION##">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                            </div>
                        </div>
                        <div class="col-md-2 border-left d-none">
                            <button type="button" class="btn btn-primary btn-block">Add Category</button>
                            <button type="button" class="btn btn-primary btn-block mt-1">Add Product</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="save_menu_content">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    APP.design.init();
});

var APP = APP || {};

APP.design = {
    init: function() {
        this.saveContent();
    },

    saveContent: function() {
        $('#save_menu_content').click(function() {
            $('#placeholder_div').removeClass('d-none');
        });
    },
};
</script>
@endsection
