@extends('layouts.app')

@php
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
.tab_content {
  min-height: 100px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin section
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" id="insert_category"><span class="oi oi-plus"></span> Category</button>
                        <button type="button" class="btn btn-primary ml-1" id="insert_image"><span class="oi oi-plus"></span> Image</button>
                        <button type="button" class="btn btn-primary ml-1" id="insert_product_group"><span class="oi oi-plus"></span> Product group</button>
                        <button type="button" class="btn btn-primary ml-1" id="insert_video"><span class="oi oi-plus"></span> Video</button>
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
                                <div class="tab_content tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form id="zone_1">
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
    categoryCount: 1,
    imageCount: 1,
    videoCount: 1,
    productGroupCount: 1,
    productCount: 1,
    init: function() {
        // this.saveContent();
        this.insertCategory();
        this.insertImage();
        this.insertVideo();
        this.insertProductGroup();
        this.insertProduct();
        this.fieldPresence();
        this.delete();
    },

    saveContent: function() {
        $('#save_menu_content').click(function() {
            $('#placeholder_div').removeClass('d-none');
        });
    },

    insertCategory: function() {
        var self = this;
        $('#insert_category').click(function() {
            $.getJSON("{{ route('category') }}", { count: self.categoryCount })
                .done(function(json) {
                    $('#zone_1').append(json.html);
                    self.categoryCount++;
                });
        });
    },

    insertImage: function() {
        var self = this;
        $('#insert_image').click(function() {
            $.getJSON("{{ route('image') }}", { count: self.imageCount })
                .done(function(json) {
                    $('#zone_1').append(json.html);
                    self.imageCount++;
                });
        });
    },

    insertVideo: function() {
        var self = this;
        $('#insert_video').click(function() {
            $.getJSON("{{ route('video') }}", { count: self.videoCount })
                .done(function(json) {
                    $('#zone_1').append(json.html);
                    self.videoCount++;
                });
        });
    },

    insertProductGroup: function() {
        var self = this;
        $('#insert_product_group').click(function() {
            $.getJSON("{{ route('productGroup') }}", { count: self.productGroupCount })
                .done(function(json) {
                    $('#zone_1').append(json.html);
                    $('#zone_1').find(`[data-product-group='${self.productGroupCount}']`).click();
                    self.productGroupCount++;
                });
        });
    },

    insertProduct: function() {
        var self = this;
        $.ajaxSetup({async:false});
        $(document).on('click', '.add_product', function() {
            var productGroup = $(this).data('product-group');
            $.getJSON("{{ route('product') }}", {
                    product_group: productGroup,
                    count: self.productCount
                })
                .done(function(json) {
                    $('#product_'+productGroup).append(json.html);
                    self.productCount++;
                });
        });
    },

    fieldPresence: function() {
        var self = this;
        $(document).on('click', '.field_presence', function() {
            if ($(this).is(':checked')) {
                $(this).closest('.row')
                    .find('input, textarea')
                    .val('')
                    .prop('disabled', false);
            } else {
                $(this).closest('.row')
                    .find('input, textarea')
                    .not(this)
                    .val('')
                    .prop('disabled', true);
            }
        });
    },

    delete: function() {
        $(document).on('click', '.za_delete', function() {
            $(this).closest('.za_section').remove();
        });
    },
};
</script>
@endsection
