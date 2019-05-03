@if(ENV('APP_ENV') !== 'prod')
    {{-- Jquery --}}
    <script preload src="./js/vendor/jquery-slim.min.js"></script>

    <button hidden style="display: none" id='show-grid'></button>
    <button hidden style="display: none" id='show-transition'></button>
    <button hidden style="display: none" id='show-outline'></button>
    <button hidden style="display: none" id='show-legend'></button>
    <button hidden style="display: none" id='show-invisibles'></button>

    <style>
        .debug-square {
            color: #fff;
            font-size: 9px;
            text-align: center;
            font-family: sans-serif;
            user-select: none;
            letter-spacing: -1px;
            text-indent: -2px;
        }

        .debug-square-item {
            background-color: rgba(126, 126, 126, 1);
            transition: background-color .5s ease-in-out;
            position: fixed;
            z-index: 1000;
            cursor: pointer;
            left: 10px;
        }

        .debug-square-item.selected {
            background-color: rgba(126, 126, 126, 0.4);
        }

        .debug-outline-legend {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 280px;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
            user-select: none;
            letter-spacing: -1px;
            text-indent: -2px;
            background: rgba(255, 255, 255, .9);
            z-index: 1000;
            transition: transform ease-in-out .5s;
            transform: translateX(-100%);
            padding-top: 200px;
        }

        .debug-legend-item {
            margin: 5px;
            padding: 5px;
        }

        .debug-true .debug-outline-legend {
            transform: translateX(0);
        }

        .grid-container {
            font-family: monospace;
            font-size: 10px;
            color: rgba(0,0,0, .5);
            text-align: center;
            width: 100vw;
            min-height: 100vh;
            height: inherit;
            position: fixed;
            display: -ms-flexbox;
            display: flex;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 35;
            pointer-events: none;
            box-sizing: border-box;
            max-width: 2560px;
        }

        .grid-columns {
            min-height: inherit;
            height: inherit;
            position: relative;
            background-color: rgba(218, 71, 140, 0.3);
        }

        .grid-gutter {
            min-height: inherit;
            height: inherit;
            position: relative;
            background-color: rgba(213, 218, 71, 0.15);
        }
    </style>

    <script>
        var debug_view_width = window.screen.width,
            debug_view_height = window.screen.height,
            debug_body = $('body'),
            debug_doc = $(document),
            debug_win = $(window);
            debug_HTML = $('html');

        function getURLParameter(param, split) {
            var pageurl = window.location.search.substring(1),
                urlvariables = pageurl.split('&'),
                t = urlvariables.length,
                i,
                parametername;

            for (i = 0; i < t; i += 1) {
                parametername = urlvariables[i].split(split);

                if (parametername[0] === param) {
                    return parametername[1];
                }
            }
        }

        function grid() {
            if (getURLParameter('grid', '=')) {
                var columns, i, append, visible, width, vw;

                // 4K
                width = 2560;
                // FHD
                if (debug_view_width <= 1920) {
                    width = 1920;
                }

                // HD -> 1366 up/downscale
                if (debug_view_width <= 1440) {
                    width = 1366;
                }

                // Tablet Landscape -> 1024 up/downscale
                if (debug_view_width <= 1170) {
                    width = 1024;
                }

                // Tablet Portrait -> 768 up/downscale
                if (debug_view_width <= 960) {
                    width = 768;
                }

                // Mobile 320 -> up/downscale
                if (debug_view_width <= 414) {
                    width = 375;
                }

                columns = Math.round(width / 1.618 / 100);
                col = Math.round(width / columns);
                gap = Math.round(col / 0.618 / 10);

                append = "<div class='grid-container' style='padding: 0 "+ Math.round((gap / width * 100), 3) +"vw'>";
                for (i = 0; i < columns; i += 1) {
                    append += "<div class='grid-columns' style='width: "+ Math.round((col / width * 100), 3) +"vw'><sup>C("+ (i + 1) +")</sup> " + col + "px</div>";

                    if (i < columns - 1) {
                        append += "<div class='grid-gutter' style='width: "+ Math.round((gap / width * 100), 3) +"vw'>" + gap + "px</div>";
                    }
                }

                visible = true;
                debug_body.append(append) + '</div>';

                debug_body.on('click', "#show-grid", function () {
                    if (visible) {
                        visible = false;

                        $('.grid-container').remove();
                    } else {
                        visible = true;

                        debug_body.append(append);
                    }
                });

                console.info('GRID: >>>>>>>>>>>>>>>>>>>>>>>>>>>>');
                console.info('Screen Width:             ', width);
                console.info('Col. Max:                 ', columns);
                console.info('Col. Width:               ', col);
                console.info('Col. Gap:                 ', gap);
                console.info('Col. Offset:              ', gap);
                console.info('END: <<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
            }
        }

        function debug() {
            if (getURLParameter('debug', '=')) {
                var $div, $item, $move, over, position, x, y, shift, sizes, html;

                html = debug_HTML;
                $div = $('<div class="debug-square"></div>');
                $item = $('<div class="debug-square-item"></div>');
                over = false;
                shift = false;

                // --

                function square(size) {
                    return $item.clone()
                            .text(size)
                            .data('size', size)
                            .css({
                                'width': size,
                                'height': size,
                                'line-height': (size + 1) + 'px'
                            });
                }

                function move(pageX, pageY) {
                    var size, scroll, top, left;

                    size = $move.data('size');
                    scroll = {
                        top: debug_win.scrollTop(),
                        viewport: debug_win.height(),
                        width: html.width()
                    };

                    top = (pageY - scroll.top) - y;
                    left = pageX - x;

                    $move.css({
                        'top': Math.min(scroll.viewport - size, Math.max(0, top)),
                        'left': Math.min(scroll.width - size, Math.max(0, left))
                    });
                }

                // --

                debug_doc.on({
                    'mousemove.debug': function (ev) {
                        if ($move && over) {
                            move(ev.pageX, ev.pageY);
                            ev.preventDefault();
                        }
                    },
                    'mouseup.debug': function () {
                        if ($move) {
                            $move.removeClass('selected');
                            $move = null;
                        }
                    }
                });

                debug_doc.on('keyup.debug', function (ev) {
                    if (ev.keyCode === 16) {
                        shift = false;
                    }
                });

                debug_doc.on('keydown.debug', function (ev) {
                    var prop, coef;

                    if (ev.keyCode === 16) {
                        shift = true;
                    }

                    if ($move) {
                        switch (ev.keyCode) {
                        case 37:
                            prop = 'left';
                            coef = shift ? '-=10px' : '-=1px';
                            break;
                        case 38:
                            prop = 'top';
                            coef = shift ? '-=10px' : '-=1px';
                            break;
                        case 39:
                            prop = 'left';
                            coef = shift ? '+=10px' : '+=1px';
                            break;
                        case 40:
                            prop = 'top';
                            coef = shift ? '+=10px' : '+=1px';
                            break;
                        }

                        if (prop) {
                            $move.css(prop, coef);
                            ev.preventDefault();
                        }
                    }
                });

                $div.prependTo(debug_body)
                    .on('mousedown', '.debug-square-item', function (ev) {
                        if ($move) {
                            $move.removeClass('selected');
                        }

                        $move = $(this).addClass('selected');
                        x = ev.offsetX;
                        y = ev.offsetY;

                        over = true;
                    })
                    .on('mouseup', '.debug-square-item', function (ev) {
                        over = false;
                        ev.stopPropagation();
                    });

                // ---

                position = 130;
                sizes = [144, 89, 55, 34, 21, 13, 8, 5];

                sizes.forEach(function (i) {
                    i = parseInt(i, 10);

                    square(i).css('top', position).appendTo($div);
                    position = position + i + 1;
                });
            }
        }

        function transition () {
            if (getURLParameter('transition', '=')) {
                var visible, append;
                visible = true;
                append = '<style id="debug-transition"> * { transition: none !important; animation: none !important; }</style>';

                debug_body.append(append);
                debug_body.on('click', "#show-transition", function () {
                    if (visible) {
                        visible = false;

                        $('#debug-transition').remove();
                    } else {
                        visible = true;

                        debug_body.append(append);
                    }
                });
            }
        }

        function stopAutoplay () {
            if (getURLParameter('stopAutoplay', '=')) {
                var videos = $('video');

                $.each(videos, function(key, video) {
                    video.pause();
                });

                debug_win.on('scroll', function() {
                    videos = $('video');
                    videos.removeAttr('autoplay');

                    $.each(videos, function(key, video) {
                        video.pause();
                    });
                });
            }
        }

        function outline () {
            if (getURLParameter('outline', '=')) {
                var article, section, header, footer, aside, div, text, media, visible;

                article = debug_body.find('article');
                section = debug_body.find('section');
                header = debug_body.find('header');
                footer = debug_body.find('footer');
                aside = debug_body.find('aside');
                div = debug_body.find('div');
                form = debug_body.find('form');
                input = debug_body.find('input');
                button = debug_body.find('button');
                link = debug_body.find('a');
                text = debug_body.find('span, h1, h2, h3, h4, h5, p, ul, ol, li, strong, b, em, i, quote');
                media = debug_body.find('svg, img, video, iframe, figure, canvas');

                debug_body.css('outline', '3px solid cyan');
                article.css('outline', '2px solid red');
                section.css('outline', '1px solid pink');
                header.css('outline', '2px solid blue');
                footer.css('outline', '2px solid purple');
                aside.css('outline', '2px solid green');
                div.css('outline', '1px solid black');
                form.css('outline', '2px dashed darkcyan');
                input.css('outline', '1px dotted lightcoral');
                button.css('outline', '2px inset darkturquoise');
                link.css('outline', '2px groove yellow');
                text.css('outline', '1px dotted blue');
                media.css('outline', '1px dashed red');

                visible = true;

                debug_body.on('click', "#show-outline", function () {
                    if (visible) {
                        visible = false;

                        debug_body.css('outline', 'none');
                        article.css('outline', 'none');
                        section.css('outline', 'none');
                        header.css('outline', 'none');
                        footer.css('outline', 'none');
                        div.css('outline', 'none');
                        form.css('outline', 'none');
                        input.css('outline', 'none');
                        button.css('outline', 'none');
                        link.css('outline', 'none');
                        text.css('outline', 'none');
                        media.css('outline', 'none');
                    } else {
                        visible = true;

                        debug_body.css('outline', '3px solid cyan');
                        article.css('outline', '2px solid red');
                        section.css('outline', '1px solid pink');
                        header.css('outline', '2px solid blue');
                        footer.css('outline', '2px solid purple');
                        aside.css('outline', '2px solid purple');
                        div.css('outline', '1px solid black');
                        form.css('outline', '2px dashed darkcyan');
                        input.css('outline', '1px dotted lightcoral');
                        button.css('outline', '2px inset darkturquoise');
                        link.css('outline', '2px groove yellow');
                        text.css('outline', '1px dotted blue');
                        media.css('outline', '1px dashed red');
                    }
                });

                // Legend
                debug_body.append(
                    '<div class="debug-outline-legend">' +
                    '   <div class="debug-legend-item" style="background-color: cyan; border-bottom: 3px solid cyan;">' + ' body'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: red; border-bottom: 2px solid cyan;">' + ' article'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: pink; border-bottom: 1px solid cyan;">' + ' section'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: blue; border-bottom: 2px solid cyan; color: white;">' + ' header'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: purple; border-bottom: 2px solid cyan; color: white;">' + ' footer'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: green; border-bottom: 2px solid cyan;">' + ' aside'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: black; border-bottom: 1px solid cyan; color: white;">' + ' div'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: darkcyan; border-bottom: 2px dashed cyan;">' + ' form'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: lightcoral; border-bottom: 1px dotted cyan;">' + ' input'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: darkturquoise; border-bottom: 2px inset cyan;">' + ' button'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: yellow; border-bottom: 2px groove cyan;">' + ' a'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: blue; border-bottom: 1px dotted cyan; color: white;">' + ' span, h1, h2, h3, h4, h5, p, ul, ol, li, strong, b, em, i, quote'+
                    '   </div>' +
                    '   <div class="debug-legend-item" style="background-color: red; border-bottom: 1px dashed cyan;">' + ' svg, img, video, iframe, figure, canvas'+
                    '   </div>' +
                    '</div>');

                debug_body.on('click', "#show-legend", function () {
                    debug_body.toggleClass('debug-true');
                });
            }
        }

        function invisibles () {
            if (getURLParameter('invisibles', '=')) {
                var html, visible;

                html = debug_HTML;
                html.addClass('show-invisibles');
                visible = true;

                debug_body.on('click', "#show-invisibles", function () {
                    if (visible) {
                        visible = false;
                        html.removeClass('show-invisibles');
                    } else {
                        visible = true;
                        html.addClass('show-invisibles');
                    }
                });
            }
        }

        debug_win.on('load', grid);
        debug_win.on('load', debug);
        debug_win.on('load', transition);
        debug_win.on('load', stopAutoplay);
        debug_win.on('load', outline);
        debug_win.on('load', invisibles);
    </script>
@endif
