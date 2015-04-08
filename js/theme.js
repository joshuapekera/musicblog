$(document).ready(function() {
   $('.parent').click(function(e) {
     e.preventDefault();
  });
});

(function ($) {

    /*
     *  render_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function render_map($el) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            zoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // create map	        	
        var map = new google.maps.Map($el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function () {

            add_marker($(this), map);

        });

        // center map
        center_map(map);

    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker($marker, map) {

        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($marker.html()) {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {

                infowindow.open(map, marker);

            });
        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map(map) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {

            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

            bounds.extend(latlng);

        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
            // fit to bounds
            map.fitBounds(bounds);
        }

    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */

    $(document).ready(function () {

        $('.acf-map').each(function () {

            render_map($(this));

        });

    });

})(jQuery);

// Music Player List
$('.content').on('click', 'li a', function () {
    $('.content li a.active').removeClass('active');
    $(this).addClass('active');
});

// Video Pause
function vidplay() {
    var video = document.getElementById("videostop");
    var button = document.getElementById("videoplay");
    if (video.paused) {

    } else {
        video.pause();
    }
}

function restart() {
    var video = document.getElementById("Video1");
    video.currentTime = 0;
}

function skip(value) {
    var video = document.getElementById("Video1");
    video.currentTime += value;
}


(function ($) {
    $.fn.countdown = function (c, f) {
        var b = {
            skin: 'countdown_default', //Set Skin
            fallbackSkin: 'countdown_default', //Skin for the older browser that doesn't support canvas; Default: countdown_default
            option: {
                day: {
                    max: null,
                    eClass: 'days'
                },
                hour: {
                    max: 23,
                    eClass: 'hours'
                },
                minute: {
                    max: 59,
                    eClass: 'minutes'
                },
                second: {
                    max: 59,
                    eClass: 'seconds'
                }
            }, //Skin Options, like Knob setting or different classes for the timer component
            dateStart: null, //Date in this format: 'mm/dd/yyyy hh:mm:ss'
            dateEnd: null, //Date in this format: 'mm/dd/yyyy hh:mm:ss'
            format: true, //One digit number transformde to: 01 02...
            callback: null //Callback on countdown finish, Example: redirect
        };
        var g = {
            timezone: false, //Activate the worldwide sync
            offset: 0 //The UTC offset, you can find your UTC from UTC.txt, just copy and paste
        };

        c && $.extend(true, b, c);
        f && $.extend(true, g, f);

        var eventDateEnd = (new Date(b.dateEnd).getTime()) / 1E3,
            eventDateStart = (new Date(b.dateStart).getTime()) / 1E3,
            now = new Date().getTime();

        if (isNaN(eventDateEnd)) {
            alert("Invalid or null dateEnd mm/dd/yyyy. Example: 12/25/2013 17:30:00"),
            $(this).append("Invalid or null date mm/dd/yyyy. Example: 12/25/2013 17:30:00");
            return;
        }
        if ('knob' == b.skin && (null == eventDateStart || isNaN(eventDateStart))) {
            alert("Invalid or null dateStart mm/dd/yyyy. Example: 12/25/2013 17:30:00"),
            $(this).append("Invalid or null dateStart mm/dd/yyyy. Example: 12/25/2013 17:30:00");
            return
        } else if (eventDateStart > now) {
            alert("Starting date is greater than the current date"),
            $(this).append("Starting date is greater than the current date");
            return
        }

        if (g.timezone == true)
            g.offset = (parseInt(g.offset) * 60 * 60 * 1000) + new Date().getTimezoneOffset() * 60 * 1000;

        var thisEl = $(this);

        if ("undefined" != typeof c.option && "undefined" == typeof c.option.global)
            c.option.global = {};

        b.option.day = $.extend(true, {}, b.option.global, b.option.day);
        b.option.hour = $.extend(true, {}, b.option.global, b.option.hour);
        b.option.minute = $.extend(true, {}, b.option.global, b.option.minute);
        b.option.second = $.extend(true, {}, b.option.global, b.option.second);

        if ('knob' == b.skin.toLowerCase() && isCanvasSupported) {
            b.skin = b.skin.toLowerCase();
            thisEl.append('<input class="' + b.option.day.eClass + '" type="text" value="0" data-readonly="true" /><input class="' + b.option.hour.eClass + '" type="text" value="0" data-readonly="true"  /><input class="' + b.option.minute.eClass + '" type="text" value="0" data-readonly="true" /><input class="' + b.option.second.eClass + '" type="text" value="0" data-readonly="true" />');

            b.option.day.eClass = '.' + (b.option.day.eClass.split(' ')).join('.'),
            b.option.hour.eClass = '.' + (b.option.hour.eClass.split(' ')).join('.'),
            b.option.minute.eClass = '.' + (b.option.minute.eClass.split(' ')).join('.'),
            b.option.second.eClass = '.' + (b.option.second.eClass.split(' ')).join('.');

            b.option.day.max = Math.floor((eventDateEnd - eventDateStart) / 86400);
            thisEl.find(b.option.day.eClass).knob(b.option.day),
            thisEl.find(b.option.hour.eClass).knob(b.option.hour),
            thisEl.find(b.option.minute.eClass).knob(b.option.minute),
            thisEl.find(b.option.second.eClass).knob(b.option.second)
        } else if ('knob' != b.skin.toLowerCase() && !isCanvasSupported) {
            b.skin = b.fallbackSkin;

            thisEl.html('<ul class="' + b.skin + '"><li><span class="' + b.option.day.eClass + '">00</span><p class="timeRefDays">Days</p></li><li><span class="' + b.option.hour.eClass + '">00</span><p class="timeRefHours">Hours</p></li><li><span class="' + b.option.minute.eClass + '">00</span><p class="timeRefMinutes">Minutes</p></li><li><span class="' + b.option.second.eClass + '">00</span><p class="timeRefSeconds">Seconds</p></li></ul>');

            b.option.day.eClass = '.' + (b.option.day.eClass.split(' ')).join('.'),
            b.option.hour.eClass = '.' + (b.option.hour.eClass.split(' ')).join('.'),
            b.option.minute.eClass = '.' + (b.option.minute.eClass.split(' ')).join('.'),
            b.option.second.eClass = '.' + (b.option.second.eClass.split(' ')).join('.');
        } else {
            thisEl.append('<ul class="' + b.skin + '" ><li><span class="' + b.option.day.eClass + '">00</span><p class="timeRefDays">Days</p></li><li><span class="' + b.option.hour.eClass + '">00</span><p class="timeRefHours">Hours</p></li><li><span class="' + b.option.minute.eClass + '">00</span><p class="timeRefMinutes">Minutes</p></li><li><span class="' + b.option.second.eClass + '">00</span><p class="timeRefSeconds">Seconds</p></li></ul>');

            b.option.day.eClass = '.' + (b.option.day.eClass.split(' ')).join('.'),
            b.option.hour.eClass = '.' + (b.option.hour.eClass.split(' ')).join('.'),
            b.option.minute.eClass = '.' + (b.option.minute.eClass.split(' ')).join('.'),
            b.option.second.eClass = '.' + (b.option.second.eClass.split(' ')).join('.');

        }

        var input_day = thisEl.find(b.option.day.eClass),
            input_hour = thisEl.find(b.option.hour.eClass),
            input_minute = thisEl.find(b.option.minute.eClass),
            input_second = thisEl.find(b.option.second.eClass);

        e();
        if (eventDateEnd > new Date().getTime() / 1E3)
            var interval = setInterval(function () {
                e()
            }, 1E3);

        //Countdown Function
        function e() {
            currentDate = Math.floor((new Date().getTime() - g.offset) / 1E3);
            if (eventDateEnd < currentDate) {
                null != b.callback && (b.callback).call(this),
                    "undefined" != typeof interval && clearInterval(interval)
            } else {
                seconds = (eventDateEnd - currentDate),
                days = Math.floor(seconds / 86400),
                seconds -= 86400 * days,
                hours = Math.floor(seconds / 3600),
                seconds -= 3600 * hours,
                minutes = Math.floor(seconds / 60),
                seconds -= 60 * minutes;

                if ('knob' != b.skin) {
                    if (0 != b.format) {
                        days = 2 <= String(days).length ? days : "0" + days,
                        hours = 2 <= String(hours).length ? hours : "0" + hours,
                        minutes = 2 <= String(minutes).length ? minutes : "0" + minutes,
                        seconds = 2 <= String(seconds).length ? seconds : "0" + seconds
                    }
                    input_day.text(days),
                    input_hour.text(hours),
                    input_minute.text(minutes),
                    input_second.text(seconds);

                    1 == days ? input_day.parent().children(".timeRefDays").text('Day') : input_day.parent().children(".timeRefDays").text('Days'),
                    1 == hours ? input_hour.parent().children(".timeRefHours").text('Hour') : input_hour.parent().children(".timeRefHours").text('Hours'),
                    1 == minutes ? input_minute.parent().children(".timeRefMinutes").text('Minute') : input_minute.parent().children(".timeRefMinutes").text('Minutes'),
                    1 == seconds ? input_second.parent().children(".timeRefSeconds").text('Second') : input_second.parent().children(".timeRefSeconds").text('Seconds')

                } else {
                    input_day.val(days).trigger('change'),
                    input_hour.val(hours).trigger('change'),
                    input_minute.val(minutes).trigger('change'),
                    input_second.val(seconds).trigger('change')
                }
            }
        }
    }

    function isCanvasSupported() {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    }
})(jQuery);

// Tab Menu
$(document).ready(function () {
    $('#nill-container').easyTabs({
        defaultContent: 1
    });
});
(function ($) {
    $.fn.easyTabs = function (option) {
        var param = jQuery.extend({
            fadeSpeed: "fast",
            defaultContent: 1,
            activeClass: 'active'
        }, option);
        $(this).each(function () {
            var thisId = "#" + this.id;
            if (param.defaultContent == '') {
                param.defaultContent = 1;
            }
            if (typeof param.defaultContent == "number") {
                var defaultTab = $(thisId + " .nillsidetabs li:eq(" + (param.defaultContent - 1) + ") a").attr('href').substr(1);
            } else {
                var defaultTab = param.defaultContent;
            }
            $(thisId + " .nillsidetabs li a").each(function () {
                var tabToHide = $(this).attr('href').substr(1);
                $("#" + tabToHide).addClass('easytabs-tab-content');
            });
            hideAll();
            changeContent(defaultTab);

            function hideAll() {
                $(thisId + " .easytabs-tab-content").hide();
            }

            function changeContent(tabId) {
                hideAll();
                $(thisId + " .nillsidetabs li").removeClass(param.activeClass);
                $(thisId + " .nillsidetabs li a[href=#" + tabId + "]").closest('li').addClass(param.activeClass);
                if (param.fadeSpeed != "none") {
                    $(thisId + " #" + tabId).fadeIn(param.fadeSpeed);
                } else {
                    $(thisId + " #" + tabId).show();
                }
            }
            $(thisId + " .nillsidetabs li").click(function () {
                var tabId = $(this).find('a').attr('href').substr(1);
                changeContent(tabId);
                return false;
            });
        });
    }
})(jQuery);