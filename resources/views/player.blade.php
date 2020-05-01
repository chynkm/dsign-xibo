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
div.preview-screen {
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
        // this.play();
        this.createLayout();
    },

    play: function() {
        $.getJSON("{{ route('getMenu') }}", function(json){
            console.log(json);/*
            $('.preview-player').css({
                'background-image': 'url(' + json.image + ')',
                // 'backgroundRepeat': 'no-repeat',
                // 'backgroundPosition': 'top left'
            });*/
            // $('#image').attr('src', json.image).removeClass('d-none');
            /*var video = $('<video />', {
                id: 'video',
                src: json.video,
                type: 'video/mp4',
                controls: false,
                // autoplay: true,
            });*/
            // video.appendTo($('#video-viewport'));
        });
    },

    createLayout: function() {
        this.id = 6;
        var self = this;
        // playLog(10, "debug", "Parsing Layout " + self.id, false);
        // self.containerName = "L" + self.id + "-" + nextId();
        self.containerName = "L01";

        /* Create a hidden div to show the layout in */
        // var screen = $('#screen_' + self.id);
        var screen = $('#screen');
        screen.append('<div id="' + self.containerName  + '"></div>');
        /*if (layoutPreview === false){
          screen.append('<a style="position:absolute;top:0;left:0;width:100%;height:100%;" target="_blank" href="'+ screen.parent().parent().attr('data-url') + '"></a>');
        }*/

        var layout = $("#" + self.containerName);
        layout.css("outline", "red solid thin");

        /* Calculate the screen size */
        self.sw = screen.width();
        self.sh = screen.height();
        // playLog(7, "debug", "Screen is (" + self.sw + "x" + self.sh + ") pixels");

        /* Find the Layout node in the XLF */
        // self.layoutNode = data;

        /* Get Layout Size *//*
        self.xw = $(self.layoutNode).filter(":first").attr('width');
        self.xh = $(self.layoutNode).filter(":first").attr('height');
        self.zIndex = $(self.layoutNode).filter(":first").attr('zindex');*/
        self.xw = 1920;
        self.xh = 1080;
        self.zIndex = 0;
        // playLog(7, "debug", "Layout is (" + self.xw + "x" + self.xh + ") pixels");

        /* Calculate Scale Factor */
        self.scaleFactor = Math.min((self.sw/self.xw), (self.sh/self.xh));
        self.sWidth = Math.round(self.xw * self.scaleFactor);
        self.sHeight = Math.round(self.xh * self.scaleFactor);
        self.offsetX = Math.abs(self.sw - self.sWidth) / 2;
        self.offsetY = Math.abs(self.sh - self.sHeight) / 2;
        // playLog(7, "debug", "Scale Factor is " + self.scaleFactor);
        // playLog(7, "debug", "Render will be (" + self.sWidth + "x" + self.sHeight + ") pixels");
        // playLog(7, "debug", "Offset will be (" + self.offsetX + "," + self.offsetY + ") pixels");

        /* Scale the Layout Container */
        layout.css("width", self.sWidth + "px");
        layout.css("height", self.sHeight + "px");
        layout.css("position", "absolute");
        layout.css("left", self.offsetX + "px");
        layout.css("top", self.offsetY + "px");

        if (self.zIndex != null)
            layout.css("z-index", self.zIndex);

        /* Set the layout background *//*
        self.bgColour = $(self.layoutNode).filter(":first").attr('bgcolor');
        self.bgImage = $(self.layoutNode).filter(":first").attr('background');*/
        self.bgColour = '';
        self.bgImage = 'img/bg_screen01_default.png';

        if (!(self.bgImage == "" || self.bgImage == undefined)) {
            /* Extract the image ID from the filename */
            self.bgId = self.bgImage.substring(0, self.bgImage.indexOf('.'));

            // var tmpUrl = options.layoutBackgroundDownloadUrl.replace(":id", self.id) + '?preview=1';

            // preload.addFiles(tmpUrl + "&width=" + self.sWidth + "&height=" + self.sHeight + "&dynamic&proportional=0");
            // layout.css("background", "url('" + self.bgImage + "&width=" + self.sWidth + "&height=" + self.sHeight + "&dynamic&proportional=0')");
            layout.css("background", "url('" + self.bgImage + "')");
            layout.css("background-repeat", "no-repeat");
            layout.css("background-size", self.sWidth + "px " + self.sHeight + "px");
            layout.css("background-position", "0px 0px");
        }

        // Set the background color
        layout.css("background-color", self.bgColour);

        /*$(self.layoutNode).find("region").each(function() {
            // playLog(4, "debug", "Creating region " + $(this).attr('id'), false);

            self.regionObjects.push(new Region(self, $(this).attr('id'), this, options, preload));
        });*/

        // playLog(4, "debug", "Layout " + self.id + " has " + self.regionObjects.length + " regions");
        /*self.ready = true;
        preload.addFiles(options.loaderUrl);
        if (layoutPreview){
            // previewing only one layout in the layout preview page
            preload.on('finish', self.run);
        } else {
            // previewing a set of layouts in the campaign preview page
            self.run();
        }*/

        self.createRegion(self.scaleFactor)
    },

    createRegion: function(scaleFactor) {

        var self = this;
        self.containerName = "R-01" ;

        /*self.sWidth = $(xml).attr("width") * self.layout.scaleFactor;
        self.sHeight = $(xml).attr("height") * self.layout.scaleFactor;
        self.offsetX = $(xml).attr("left") * self.layout.scaleFactor;
        self.offsetY = $(xml).attr("top") * self.layout.scaleFactor;*/
        self.sWidth = 665 * scaleFactor;
        self.sHeight = 486 * scaleFactor;
        self.offsetX = 18 * scaleFactor;
        self.offsetY = 160 * scaleFactor;
        self.zIndex = null;

        // $("#" + self.layout.containerName).append('<div id="' + self.containerName + '"></div>');
        $("#" + "L01").append('<div id="' + self.containerName + '"></div>');

        /* Scale the Layout Container */
        $("#" + self.containerName).css("width", self.sWidth + "px");
        $("#" + self.containerName).css("height", self.sHeight + "px");
        $("#" + self.containerName).css("position", "absolute");
        $("#" + self.containerName).css("left", self.offsetX + "px");
        $("#" + self.containerName).css("top", self.offsetY + "px");
        $("#" + self.containerName).css("border", '1px solid white');

        if (self.zIndex != null)
            $("#" + self.containerName).css("z-index", self.zIndex);

        self.createMedia(self.containerName, self.sWidth, self.sHeight)
    },

    createMedia: function(regionName, width, height) {
        var self = this;
        self.containerName = "M-01";

        var video = $('<video />', {
            id: 'video',
            // src: json.video,
            src: 'video/ch.mp4',
            type: 'video/mp4',
            controls: false,
            autoplay: true,
        });

        video.css({
            width: width + 'px',
            height: width + 'px',
            position: 'absolute',
            background-size: 'contain',
            background-repeat: 'no-repeat',
            background-position: 'center',
        });


        console.log(video);

        video.appendTo($("#" + regionName));

        // $("#" + regionName).append('<div id="' + self.containerName + '"></div>');

        /* Scale the Content Container */
        var media = $("#" + self.containerName);
        media.css("width", );
        media.css("height", height + "px");
        media.css("position", "absolute");
        media.css("background-size", "contain");
        media.css("background-repeat", "no-repeat");
        media.css("background-position", "center");

        self.mute =1;

        var tmpUrl = 'video/ch.mp4';
        media.append('<video id="' + self.containerName + '-vid" preload="auto" ' + ((self.mute == 1) ? 'muted' : '') + '><source src="' + tmpUrl + '">Unsupported Video</video>');
    },
};
</script>
</head>
<body>
    <div id="screen" class="preview-screen"></div>
</body>
</html>

