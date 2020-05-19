@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modify content</div>
                <div class="card-body">
                    <form id="menu_content_form" action="" onsubmit="return false;">
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
