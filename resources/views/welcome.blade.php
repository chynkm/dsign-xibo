@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modify content</div>
                <div class="card-body">
                    <form id="menu_content_form" action="{{ route('saveMenu') }}" onsubmit="return false;">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" value="FAJITAS" name="left_title" class="text-uppercase form-control" placeholder="first-title">
                            </div>
                            <div class="col-md-4">
                                <input type="text" value="BURRITOS" name="center_title" class="text-uppercase form-control" placeholder="center-title">
                            </div>
                            <div class="col-md-4">
                                <input type="text" value="TACOS" name="right_title" class="text-uppercase form-control" placeholder="right-title">
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="image" value="img/burritos.png" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">
                                        <img src="img/burritos.png" class="img-fluid" alt="background" width="50%">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="image" value="img/fajitas.png" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadioInline2">
                                        <img src="img/fajitas.png" class="img-fluid" alt="background" width="50%">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <button type="button"
                        class="btn btn-primary"
                        id="save_menu_content"
                        data-loading-text="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing your request">
                        Save</button>
                    <span class="text-success" id="success_message"></span>
                    <a class="btn btn-primary float-right" target="_blank" href="{{ route('player') }}" role="button">Player preview</a>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">Layout preview</div>
                <div class="card-body">
                    <img src="img/bg_screen01_output.png" class="img-fluid" id="menu_layout_preview" alt="background">
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
        $('#save_menu_content').click(function(e) {
            e.preventDefault();
            $('#save_menu_content').data('original-text', $('#save_menu_content').html());
            $('#save_menu_content').html($('#save_menu_content').data('loading-text')).prop('disabled', true);

            $.post($('#menu_content_form').attr('action'), $('#menu_content_form').serialize())
                .done(function(data) {
                    if(data.status) {
                        $('#save_menu_content').html($('#save_menu_content').data('original-text'))
                            .prop('disabled', false);
                        $('#success_message').html('Changes saved successfully');
                        setTimeout(function(){ $('#success_message').empty(); }, 5000);
                        $('#menu_layout_preview').attr('src', 'img/bg_screen01_output.png?'+(new Date()).getTime());
                    }
                });
        });
    },
};
</script>
@endsection
