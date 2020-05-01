<html>
<head>
<title>Player</title>
<style type="text/css">
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #000000;
}
video {
    width: 100%;
    height: 100%;
}
div.player_section {
    height: 100%;
    z-index: 1;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(function() {
    APP.player.init();
});

var APP = APP || {};

APP.player = {
    init: function() {
        this.play();
    },

    play: function() {
        var self = this;
        $.getJSON("{{ route('getMenu') }}", function(json){
            var scalingFactor = self.createLayout(json.imagePath);
            var regionInfo = self.createRegion(scalingFactor);
            self.createMedia(regionInfo, json.videoPath);
        });
    },

    createLayout: function(backgroundImage) {
        var screen = $('#screen');
        screen.append('<div id="layout"></div>');

        var layout = $('#layout');
        /* Calculate the screen size */
        var screenWidth = screen.width();
        var screenHeight = screen.height();

        /* Get Layout Size of menu*/
        var layoutWidth = 1920;
        var layoutHeight = 1080;
        var zIndex = 0;

        /* Calculate Layout Scale factor */
        var scalingFactor = Math.min((screenWidth/layoutWidth), (screenHeight/layoutHeight));
        var sWidth = Math.round(layoutWidth * scalingFactor);
        var sHeight = Math.round(layoutHeight * scalingFactor);
        var offsetX = Math.abs(screenWidth - sWidth) / 2;
        var offsetY = Math.abs(screenHeight - sHeight) / 2;

        /* Scale the Layout Container */
        layout.css({
            width: sWidth + 'px',
            height: sHeight + 'px',
            position: 'absolute',
            left: offsetX + 'px',
            top: offsetY + 'px',
            border: '1px solid white',
        });

        if (backgroundImage) {
            layout.css({
                background: 'url(' + backgroundImage + ')',
                'background-repeat': 'no-repeat',
                'background-size': sWidth + 'px ' + sHeight + 'px',
                'background-position': '0px 0px',
            });
        }

        if (zIndex) {
            layout.css('z-index', zIndex);
        }

        return scalingFactor;
    },

    createRegion: function(scalingFactor) {
        /* Calculate Region Scale factor */
        var sWidth = 581 * scalingFactor;
        var sHeight = 417 * scalingFactor;
        var offsetX = 1332 * scalingFactor;
        var offsetY = 160 * scalingFactor;
        var zIndex = 0;

        $("#layout").append('<div id="region"></div>');
        var region = $('#region');
        /* Scale the Region container */
        region.css({
            width: sWidth + 'px',
            height: sHeight + 'px',
            position: 'absolute',
            left: offsetX + 'px',
            top: offsetY + 'px',
        });

        if (zIndex) {
            region.css('z-index', zIndex);
        }

        return {
            region: region,
            width: sWidth,
            height: sHeight,
        };
    },

    createMedia: function(regionInfo, videoPath) {
        var video = $('<video />', {
            id: 'video',
            src: videoPath,
            type: 'video/mp4',
            controls: false,
            autoplay: true,
        });

        // video.prop('muted', true);
        video.css({
            width: regionInfo.width + 'px',
            height: regionInfo.height + 'px',
            position: 'absolute',
        });
        video.appendTo(regionInfo.region);
    },
};
</script>
</head>
<body>
    <div id="screen" class="player_section"></div>
</body>
</html>

