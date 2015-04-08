<div class="nill-event-shot">
    <div class="nill-event-map">
        <?php 

        $location = get_field('nill_map');

        if( !empty($location) ):
        ?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="nill-event-countdown">
    <?php $date = DateTime::createFromFormat('Ymd', get_field('nill_eventtime')); ?>
    <div id="countdown" class="nill-event-countdown-list"></div>
    <script>
        var target_date = new Date("<?php echo $date->format('m, d, Y'); ?>").getTime();
        var days, hours, minutes, seconds;
        var countdown = document.getElementById("countdown");
        setInterval(function () {
            var current_date = new Date().getTime();
            var seconds_left = (target_date - current_date) / 1000;
            days = parseInt(seconds_left / 86400);
            seconds_left = seconds_left % 86400;
            hours = parseInt(seconds_left / 3600);
            seconds_left = seconds_left % 3600;
            minutes = parseInt(seconds_left / 60);
            seconds = parseInt(seconds_left % 60);
            countdown.innerHTML = 
            "<ul>" + 
            "<li>" + days + "<div class='nill-counttext'>Days</div>" + "</li>" + 
            "<li>" + hours + "<div class='nill-counttext'>Hours</div>" + "</li>" +
            "<li>" + minutes + "<div class='nill-counttext'>Minutes</div>" + "</li>" +
            "<li>" + seconds + "<div class='nill-counttext'>Seconds</div>" + "</li>" + 
            "</ul>";  
        }, 1000);
    </script>
</div>

<div class="clearfix"></div>