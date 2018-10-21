<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="/assets/img/iami-logo-icon.png">
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/index-page.css">
    <link rel="stylesheet" href="/assets/css/w3.css">
    <link rel="stylesheet" href="/assets/css/share.css">
    <link rel="stylesheet" href="/assets/css/self-page.css">
    <link rel="stylesheet" href="/assets/css/reg-page.css">
    <link rel="stylesheet" href="/assets/css/hot-video.css">
    <script src="/assets/js/common.js"></script>
<!--    <script src="/assets/js/jquery-1.8.3.min.js"></script>-->
<!--    <script src="/assets/js/textarea-resize.js"></script>-->
    <script src="/assets/jquery-ui-1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/assets/jquery-ui-1.12.1/jquery-ui.css">
    <?php $this->load->view('includes/getlanguage'); ?>
    <?php
    function date2before($diff)
    {
        // $diff = time() - $val;

        if ($diff < 0) {
            return '不久的將來';
        } elseif ($diff < 60) {
            return $diff . '秒前';
        } elseif ($diff < 3600) {
            return floor($diff / 60) . '分鐘前';
        } elseif ($diff < 86400) {
            return floor($diff / 3600) . '小時前';
        } elseif ($diff < 604800) {
            return floor($diff / 86400) . '天前';
        } else {
            return floor($diff / 604800) . '週前';
        }
    }

    ?>
</head>
<body class="<?php echo $this->session->userdata('language_id'); ?>">
<input type="hidden" name="member_id" value="<?= $member_id ?>"/>
<input type="hidden" id="selfid" value="<?= $this->session->userdata("member_id") ?>"/>
<div class="wrapper">
    <!--pop-->
    <?php require_once(dirname(__FILE__) . "/includes/include.php"); ?>

    <!--header-->
    <?php require_once(dirname(__FILE__) . "/includes/top.php"); ?>

    <!--main-->
    <div id="index-page" class="main-content">
        <div class="container-mid-c">
            <div class="content-area">
                <div class="ctn-wrap">
                    <!--cnt-left-->
                    <div class="ctn-left">
                        <div class="cnt-left-cnt">
                            <!--self-info-area-->
                            <div class="self-info">
                                <!--完善個人資料-->
                                <div class="self-info-btn"><a href="#" class="tooltip-p"><span
                                                class="tooltip-p-text">完善個人資料</span><img
                                                src="<?php echo base_url(); ?>assets/img/svg_icon-73.svg"></a></div>
                                <!--******-->
                                <div class="self-info-cover"><img src="<?= $banner ?>"
                                                                  onerror="this.src='<?php echo base_url(); ?>assets/img/friend2-cover.jpg'">
                                </div>
                                <div class="self-info-cnt-wrap">
                                    <div class="self-info-cnt">
                                        <div class="user-pic-l"><a href="/page/info"><img src="<?= $avatar ?>"
                                                                                          onerror="this.src='/assets/img/self-user-pic.jpg'"></a>
                                        </div>
                                        <div class="info-cnt">
                                            <ul>
                                                <li>
                                                    <span class="h5"><?= $nickname ?></span>

                                                </li>
                                                <li>
                                                    <ul class="info-cnt-inner">
                                                        <li><span class="icon-m award"></span></li>
                                                        <li><a class="lev-btn">Lv.<?= $level ?></a></li>
                                                        <li class="i-money h6">
                                                            <a class="tooltip-p"><span class="tooltip-p-text">i盾</span></a>:<span><?= number_format($money) ?></span>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="self-info-list">
                                        <ul class="clearfix">
                                            <li class="edit-post ">
                                                <a href="/page/info"><h6><?= $this->lang->line('post') ?></h6>
                                                    <h4><?= $postCount ?></h4></a>
                                            </li>
                                            <li class="edit-fans">
                                                <a href="/page/info/fans"><h6><?= $this->lang->line('fans') ?></h6>
                                                    <h4><?= $fansCount ?></h4></a>
                                            </li>
                                            <li class="edit-follower">
                                                <a href="/page/info/follower"><h6><?= $this->lang->line('trace') ?></h6>
                                                    <h4><?= $traceCount ?></h4></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--人氣貼文btn-->
                            <a href="<?php echo base_url(); ?>hot/post">
                                <div class="h-tag-side box-wrap">
                                    <div>
                                        <article class="tag-hot-post">
                                            <ul>
                                                <li class="tag-hot-post"><span><img
                                                                src="<?php echo base_url(); ?>assets/img/svg_icon-67.svg"></span>
                                                </li>
                                                <li>
                                                    <h4><?php echo $this->lang->line('hot_posts') ?></h4>
                                                </li>
                                            </ul>
                                        </article>
                                    </div>
                                </div>
                            </a>

                            <!--人氣視頻btn-->
                            <a href="<?php echo base_url(); ?>hot/video">
                                <div class="h-tag-side box-wrap">
                                    <div>
                                        <article class="tag-hot-video">
                                            <ul>
                                                <li class="tag-hot-video"><span><img
                                                                src="<?php echo base_url(); ?>assets/img/svg_icon-70.svg"></span>
                                                </li>
                                                <li>
                                                    <h4><?php echo $this->lang->line('hot_videos') ?></h4>
                                                </li>
                                            </ul>
                                        </article>
                                    </div>
                                </div>
                            </a>

                            <!--活動專區btn-->
                            <!--              <div class="h-tag-side box-wrap">-->
                            <!--                <div>-->
                            <!--                  <article class="tag-events">-->
                            <!--                    <ul>-->
                            <!--                      <li class="tag-events"><span><img src="-->
                            <?php //echo base_url();?><!--assets/img/svg_icon-65.svg"></span></li>-->
                            <!--                      <li>-->
                            <!--                        <h4>活動專區</h4>-->
                            <!--                      </li>-->
                            <!--                    </ul>-->
                            <!--                  </article>-->
                            <!--                </div>-->
                            <!--              </div>-->
                            <!--社團專區btn-->
                            <!--              <div class="h-tag-side box-wrap">-->
                            <!--                <div>-->
                            <!--                  <article class="tag-clubs">-->
                            <!--                    <ul>-->
                            <!--                      <li class="tag-clubs"><span><img src="-->
                            <?php //echo base_url();?><!--assets/img/svg_icon-68.svg"></span></li>-->
                            <!--                      <li>-->
                            <!--                        <h4>社團專區</h4>-->
                            <!--                      </li>-->
                            <!--                    </ul>-->
                            <!--                  </article>-->
                            <!--                </div>-->
                            <!--              </div>-->
                        </div>
                    </div>

                    <!--cnt-middle-->
                    <div class="ctn-middle">
                        <div class="cnt-mid-cnt">
                            <div class="active" id="post">
                                <!--人氣視頻title-->
                                <div class="hot-video-title">
                                    <h4><?= $this->lang->line('hot_videos') ?></h4>
                                </div>
                                <!--人氣視頻 1-->


                                <!--人氣視頻 2-->
                            </div>

                        </div>
                    </div>

                    <!--cnt-right-->
                    <div class="ctn-right">
                        <div class="cnt-right-cnt">
                            <!--follow-area-->
                            <div class="follow box-wrap">
                                <div class="cog-icon-wrap">
                                    <div class="cog-icon"><a href="#"><img
                                                    src="<?php echo base_url(); ?>assets/img/svg_icon-18.svg"></a></div>
                                </div>
                                <div>
                                    <article class="cog-title">
                                        <h5><?= $this->lang->line('friend_recommend') ?></h5>
                                    </article>
                                </div>
                                <div class="follow-list">
                                    <ul>

                                    </ul>
                                </div>
                            </div>

                            <!--footer-->
                            <?php require_once(dirname(__FILE__) . "/includes/footer.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--mobile nav-->
    <?php require_once(dirname(__FILE__) . "/includes/m_nav.php"); ?>
</div>

<!--<script src="--><?php //echo base_url(); ?><!--assets/js/mMenu.js"></script>-->

<!--<link rel="stylesheet" href="/assets/js/colorbox/colorbox.css">-->
<!--<script src="/assets/js/colorbox/jquery.colorbox-min.js"></script>-->
<!--<script>-->
<!--    //textarea用-->
<!--    autoTextarea(document.getElementById("include-textarea"));-->
<!--</script>-->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!---->
<!--      $(".items-like-txt a").click(function(event){-->
<!--          // event.preventDefault();-->
<!--          $.colorbox({-->
<!--              inline: true,-->
<!--              width: "auto",-->
<!--              height: "auto",-->
<!--              overlayClose: true,-->
<!--              closeButton: false,-->
<!--              escKey:false,-->
<!--              href: '#like-list'-->
<!--              //scalePhotos: true-->
<!--          });-->
<!--      });-->
<!--      $(".tool-share").click(function(event){-->
<!--          // event.preventDefault();-->
<!--          $.colorbox({-->
<!--              inline: true,-->
<!--              width: "auto",-->
<!--              height: "auto",-->
<!--              overlayClose: true,-->
<!--              closeButton: false,-->
<!--              escKey:false,-->
<!--              href: '#share-post'-->
<!--              //scalePhotos: true-->
<!--          });-->
<!--      });-->
<!--      $(".modify-ps").click(function(event){-->
<!--          // event.preventDefault();-->
<!--          $.colorbox({-->
<!--              inline: true,-->
<!--              width: "auto",-->
<!--              height: "auto",-->
<!--              overlayClose: true,-->
<!--              closeButton: false,-->
<!--              escKey:false,-->
<!--              href: '#modify-form'-->
<!--              //scalePhotos: true-->
<!--          });-->
<!--      });-->
<!--        $(".picture_group").colorbox({rel:'picture_group'});-->
<!--    });-->
<!--    $(".pop-btn").click(function(){-->
<!--$.colorbox.close();-->
<!--});-->
<!--</script>-->
<!--<script>-->
<!--//視窗捲動 貼文框縮小-->
<!--$(function() {-->
<!--  $(window).scroll(function() {-->
<!--    if ($(this).scrollTop() > 1)  {-->
<!--       $('.top-cnt .textbox-type1').addClass('narrow');-->
<!--    } else {-->
<!--      $('.textbox-type1.narrow').removeClass('narrow');-->
<!--    }-->
<!--  });-->
<!--});-->
<!--</script> -->


<script>
    //切換貼文、粉絲、追蹤
    // $(document).ready(function() {
    //     $('.edit-post').click(function() {
    //         $('.edit-cnt li.active').removeClass('active');
    //         $('.edit-post').addClass('active');
    //         $('#post').addClass('active');
    //         $('#fans.active').removeClass('active');
    //         $('#follower.active').removeClass('active');
    //     });
    // });
    // $(document).ready(function() {
    //     $('.edit-fans').click(function() {
    //         $('.edit-cnt li.active').removeClass('active');
    //         $('.edit-fans').addClass('active');
    //         $('#fans').addClass('active');
    //         $('#post.active').removeClass('active');
    //         $('#follower.active').removeClass('active');
    //     });
    // });
    // $(document).ready(function() {
    //     $('.edit-follower').click(function() {
    //         $('.edit-cnt li.active').removeClass('active');
    //         $('.edit-follower').addClass('active');
    //         $('#follower').addClass('active');
    //         $('#post.active').removeClass('active');
    //         $('#fans.active').removeClass('active');
    //     });
    // });

    // //貼文預覽圖片
    // $(document).ready(function() {
    //     $('.post-pic').hide();
    //     $('.photo').click(function() {
    //         $('.post-pic').slideToggle(300);
    //         return false;
    //     });
    //
    // //開關貼文訊息
    //     $('.items-dropdown-wrap#mes1').hide();
    //     $('.tool-message#mes1').click(function() {
    //         $('.items-dropdown-wrap#mes1').slideToggle(500);
    //         return false;
    //     });
    //
    //     $('.items-dropdown-wrap#mes2').hide();
    //     $('.tool-message#mes2').click(function() {
    //         $('.items-dropdown-wrap#mes2').slideToggle(500);
    //         return false;
    //     });
    // });

    // $(document).click(function () {
    //     $('.flyout-box').hide();
    //     $('.flyout-box2').hide();
    //     $('.m-search-area').hide();
    //     $(".edit-post-drop").slideUp(500);
    //     if ($(".box-wrap.top-cnt .btn-gray").length > 0) {
    //         $(".box-wrap.top-cnt .btn-gray").closest(".box-wrap.top-cnt").addClass("disable");
    //         $(".box-wrap.top-cnt .post-edit-publish").removeClass("post-edit-publish").addClass("post-publish").siblings().remove();
    //         $(".edit-post-text").val("");
    //         $(".tool-icon-g").css({'visibility': 'visible'});
    //
    //         $(".post-edit-publish").closest(".box-wrap.top-cnt").addClass("disable");
    //     }
    // });
    // $("body").on("click", "#cboxWrapper", function (event) {
    //     event.stopPropagation();
    // })
    // $(document).ready(function() {
    //     $('.m-search-area').hide();
    //     $('.search').click(function() {
    //         // $('.m-search-area').slideToggle(500);
    //         $('.m-search-area').slideDown();
    //         return false;
    //     });
    // });
</script>
<!--<script type="text/javascript">-->
<!--    //Chat Popup-->
<!--  $(function() {-->
<!--    $("#addClass").click(function() {-->
<!--      $('#qnimate').addClass('popup-box-on');-->
<!--    });-->
<!---->
<!--    $("#removeClass").click(function() {-->
<!--      $('#qnimate').removeClass('popup-box-on');-->
<!--    });-->
<!--  })-->
<!--</script>-->
<script src="/assets/js/wei_common.js?v=<?= uniqid() ?>"></script>
<!--<script src="https://ichord.github.io/Caret.js/src/jquery.caret.js"></script>-->
<!--<script src="/assets/js/at/jquery.atwho.js"></script>-->
<!--<link rel="stylesheet" href="/assets/js/at/jquery.atwho.min.css">-->
<script src="<?php echo base_url(); ?>assets/js/include.js"></script>
<script src="<?php echo base_url(); ?>assets/js/column_fixed.js"></script>
<div><?php require_once "includes/include-js.php"; ?></div>

</body>
</html>