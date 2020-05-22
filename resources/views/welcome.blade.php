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
                <div class="card-header">Admin section</div>
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
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" placeholder="Category name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="2" placeholder="Category description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Length</label>
                                                    <input type="text" class="form-control" placeholder="Length">
                                                </div>
                                                <div class="form-group">
                                                    <label>Length</label>
                                                    <input type="text" class="form-control" placeholder="Length">
                                                </div>
                                            </div>
                                        </div>
                                        Images<br/>
                                        @foreach ($images as $key => $image)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="image-{{ $key }}">
                                            <label class="form-check-label" for="image-{{ $key }}">
                                                <img src="img/{{ $image }}" alt="{{ $image }}" width="100px" class="img-thumbnail float-left">
                                            </label>
                                        </div>
                                        @endforeach
                                        <br/>
                                        Videos<br/>
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
                                        <h2>Product items 1</h2>
                                        <table class="table product_table">
                                            <thead>
                                                <tr>
                                                    <th width="2%">Order</th>
                                                    <th width="25%">Name</th>
                                                    <th width="6%">Length</th>
                                                    <th width="10%">Price</th>
                                                    <th width="6%">Length</th>
                                                    <th width="45%">Description</th>
                                                    <th width="6%">Length</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="oi oi-move"></span></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Name"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Price"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Description"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="oi oi-move"></span></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Name"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Price"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Description"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="oi oi-move"></span></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Name"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Price"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Description"></td>
                                                    <td class="form_td"><input type="text" class="form-control" placeholder="Length"></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                    <button type="button" class="btn btn-primary" id="save_menu_content">Generate placeholders</button>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2 d-none" id="placeholder_div">
            <div class="card">
                <div class="card-header">Placeholders</div>
                <div class="card-body">
                    <strong>Please find the placeholders:</strong>
<pre>
##CATEGORY_1_NAME##
##CATEGORY_1_DESCRIPTION##
##CATEGORY_1_IMAGE##
##CATEGORY_1_VIDEO##
##PRODUCT_ITEMS_1_NAME_1##
##PRODUCT_ITEMS_1_PRICE_1##
##PRODUCT_ITEMS_1_DESCRIPTION_1##
##PRODUCT_ITEMS_1_NAME_2##
##PRODUCT_ITEMS_1_PRICE_2##
##PRODUCT_ITEMS_1_DESCRIPTION_2##
##PRODUCT_ITEMS_1_NAME_3##
##PRODUCT_ITEMS_1_PRICE_3##
##PRODUCT_ITEMS_1_DESCRIPTION_3##
</pre>
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
