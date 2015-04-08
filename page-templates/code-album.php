<?php if (get_field('nill_audiostyle') == "soundcloud"): ?>
<!-- Nill Soundcloud -->
<div class="nill-soundcloud">
    <?php echo esc_html(the_field('nill_addsoundcloud')); ?>
</div>
<?php endif; ?>

<?php if (get_field('nill_audiostyle') == "custom"): ?>
<!-- Nill Custom Iframe -->
<div class="nill-soundcloud">
    <?php echo esc_html(the_field('nill_addcustomframe')); ?>
</div>
<?php endif; ?>

<?php if (get_field('nill_audiostyle') == "track"): ?>
<!-- Nill Track Player -->
<div class="nill-audioplayer">
    <audio id="music" preload="preload"></audio>
    <div class="btnt-player">
        <div class="btnt-player-inner nano">
            <div class="content">
                <ol>
                    <?php if( have_rows('nill_postaudio') ): $i = 0; ?>
                    <?php while ( have_rows('nill_postaudio') ) : the_row($i++); ?>

                    <li>
                        <!-- Nill Track Name & Link -->
                        <span>
                            <?php if (get_sub_field('nill_selecttrack') == "upload"): ?>
                            <a data-src="<?php echo esc_url(the_sub_field('nill_uploadmp')); ?>" href="#">
                                <?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?>
                            </a>
                            <?php elseif (get_sub_field('nill_selecttrack') == "link"): ?>
                            <a data-src="<?php echo esc_url(the_sub_field('nill_uploadtracklink')); ?>" href="#">
                                <?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?>
                            </a>
                            <?php endif; ?>
                        </span>

                        <!-- Nill Track Buttons -->
                        <div class="nill-track-button">

                            <?php if (get_sub_field('nill_addlyrics') == "true"): ?>
                            <button class="md-trigger" data-modal="modal-lyrics-<?php echo $i; ?>">
                                <i class="fa fa-microphone"></i>
                                <i class="tooltip"><?php _e( 'Lyrics', 'nill' ); ?></i>
                            </button>
                            <?php endif; ?>

                            <?php if (get_sub_field('nill_trackaddvideo') == "true"): ?>
                            <!-- Nill Track Buttons Video-->
                            <button class="md-trigger" data-modal="modal-video-<?php echo $i; ?>">
                                <i class="fa fa-video-camera"></i>
                                <i class="tooltip"><?php _e( 'Video', 'nill' ); ?></i>
                            </button>
                            <?php endif; ?>

                            <?php if (get_sub_field('nill_trackbuynow') == "true"): ?>
                            <!-- Nill Track Buttons Buy Now-->
                            <button class="md-trigger" data-modal="modal-buy-<?php echo $i; ?>">
                                <i class="fa fa-usd"></i>
                                <i class="tooltip"><?php echo esc_html(the_sub_field('nill_trackprice')); ?></i>
                            </button>
                            <?php endif; ?>

                            <!-- Nill Track Buttons Download-->
                            <?php if (get_sub_field('nill_trackdwonload') == "true"): ?>
                            <button class="md-trigger" data-modal="modal-download-<?php echo $i; ?>">
                                <i class="fa fa-download"></i>
                                <i class="tooltip"><?php _e( 'Download', 'nill' ); ?></i>
                            </button>
                            <?php endif; ?>

                        </div>

                        <!-- Nill Track Modal Lyrics-->
                        <?php if (get_sub_field('nill_addlyrics') == "true"): ?>
                        <div class="md-modal md-effect-<?php echo esc_html (the_field('nill_modalbox' , 'option')); ?>" id="modal-lyrics-<?php echo $i; ?>">
                            <div class="md-content">
                                <h3><?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?></h3>
                                <button class="md-close"><i class="fa fa-power-off"></i></button>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="nill-tracklyrics">
                                                <?php echo esc_html(the_sub_field('nill_tracklyrics')); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <?php endif; ?>

                        <!-- Nill Track Modal Video-->
                        <?php if (get_sub_field('nill_trackaddvideo') == "true"): ?>
                        <div class="md-modal md-effect-<?php echo esc_html (the_field('nill_modalbox' , 'option')); ?>" id="modal-video-<?php echo $i; ?>">
                            <div class="md-content">
                                <h3><?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?></h3>
                                <button id="videoplay" class="md-close" onclick="vidplay()"><i class="fa fa-power-off"></i></button>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php if (get_sub_field('nill_trackvideochannell') == "upload"): ?>
                                            <div class="nill-videobutton">
                                                <video id="videostop" controls>
                                                  <source src="<?php echo esc_url(the_sub_field('nill_trackyouruploadvid')); ?>" type="video/mp4">
                                                  <source src="<?php echo esc_url(the_sub_field('nill_trackyouruploadogg')); ?>" type="video/ogg">
                                                    <?php _e( 'Your browser does not support the video tag.', 'nill' ); ?>
                                                </video>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('nill_trackvideochannell') == "youtube"): ?>
                                            <div class="nill-videobutton">
                                                <iframe src="http://www.youtube.com/embed/<?php esc_html(the_sub_field('nill_youtube')); ?>" class="nill-video"></iframe>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('nill_trackvideochannell') == "vimeo"): ?>
                                                <iframe src="http://player.vimeo.com/video/<?php esc_html(the_sub_field('nill_vimeo')); ?>?title=0&amp;byline=0&amp;portrait=0" class="nill-video-two"></iframe>
                                            <?php endif; ?>

                                            <?php if (get_sub_field('nill_trackvideochannell') == "custom"): ?>
                                            <div class="nill-videobutton">
                                            <?php echo esc_html(the_sub_field('nill_custom')); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <?php endif; ?>


                        <!-- Nill Track Modal Buy Now-->
                        <?php if (get_sub_field('nill_trackbuynow') == "true"): ?>
                        <div class="md-modal md-effect-<?php echo esc_html (the_field('nill_modalbox' , 'option')); ?>" id="modal-buy-<?php echo $i; ?>">
                            <div class="md-content">
                                <h3><?php _e( 'Buy Track', 'nill' ); ?></h3>
                                <button class="md-close"><i class="fa fa-power-off"></i></button>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="nill-downloadicon">
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <div class="nill-downloadinfo">
                                                <h6><?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?></h6>
                                                <p><?php echo esc_html(the_sub_field('nill_trackprice')); ?></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <div class="nill-downloadbutton">
                                                <a href="<?php echo esc_url(the_sub_field('nill_trackpricelink')); ?>" class="btn-primary btn-lg btn-block text-center">
                                                    <?php _e( 'Buy Now', 'nill' ); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <?php endif; ?>

                        <!-- Nill Track Modal Download-->
                        <?php if (get_sub_field('nill_trackdwonload') == "true"): ?>
                        <div class="md-modal md-effect-<?php echo esc_html (the_field('nill_modalbox' , 'option')); ?>" id="modal-download-<?php echo $i; ?>">
                            <div class="md-content">
                                <h3><?php _e( 'Download', 'nill' ); ?></h3>
                                <button class="md-close"><i class="fa fa-power-off"></i></button>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="nill-downloadicon">
                                                <i class="fa fa-download"></i>
                                            </div>
                                            <div class="nill-downloadinfo">
                                                <h6><?php echo esc_html(the_sub_field('nill_uploadtracktitle')); ?></h6>
                                                <?php if (get_sub_field('nill_selecttrack') == "upload"): ?>
                                                <p><?php echo esc_url(the_sub_field('nill_uploadmp')); ?></p>
                                                <?php elseif (get_sub_field('nill_selecttrack') == "link"): ?>
                                                <p><?php echo esc_url(the_sub_field('nill_uploadtracklink')); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <div class="nill-downloadbutton">
                                                <?php if (get_sub_field('nill_selecttrack') == "upload"): ?>
                                                <a href="<?php echo esc_url(the_sub_field('nill_uploadmp')); ?>" class="btn-primary btn-lg btn-block text-center">
                                                    <?php _e( 'Download Now', 'nill' ); ?>
                                                </a>
                                                <?php elseif (get_sub_field('nill_selecttrack') == "link"): ?>
                                                <a href="<?php echo esc_url(the_sub_field('nill_uploadtracklink')); ?>" class="btn-primary btn-lg btn-block text-center">
                                                    <?php _e( 'Download Now', 'nill' ); ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <?php endif; ?>

                    </li>


                    <?php endwhile; ?>
                    <?php endif; ?>


                </ol>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php endif; ?>

<div class="clearfix"></div>
            
<!-- Nill Track Buttons -->
<?php if (get_field('nill_trackbtnone') == "true"): ?>
<div class="col-md-6">
    <div class="row">
        <div class="nill-trackbuttons">
            <a href="<?php echo esc_url(the_field('nill_trackonebtnlink')); ?>" class="btn btn-primary btn-lg btn-block">
                <?php echo esc_html(the_field('nill_trackonebtnname')); ?>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (get_field('nill_trackbtntwo') == "true"): ?>
<div class="col-md-6">
    <div class="row">
        <div class="nill-trackbuttons">
            <a href="<?php echo esc_url(the_field('nill_tracktwobtnlink')); ?>" class="btn btn-default btn-lg btn-block">
                <?php echo esc_html(the_field('nill_tracktwobtnname')); ?>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="clearfix"></div>