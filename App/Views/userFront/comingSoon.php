<?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/layout/header.php"?>


    <div class="page-wrapper">
        <!--Start Coming Soon page-->
        <section class="coming-soon-page full-height">
            <div class="coming-soon-page__bg"
                style="background-image: url(../assets1/images/backgrounds/coming-soon-page-bg.jpg);"></div>
            <div class="coming-soon-page__content">
                <div class="inner">
                    <div class="big-title">We're Coming Soon...</div>
                    <div class="timer-box clearfix">
                        <div class="countdown-timer">
                            <div class="default-coundown">
                                <div class="box">
                                    <div class="countdown coming-soon-countdown" data-countdown-time="2024/08/28"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text">
                        <p>
                            Website is under construction. We'll be here soon with new<br>
                            awesome site, Subscribe to be notified.
                        </p>
                    </div>
                    <div class="coming-soon-page__subscribe-box">
                        <form class="subscribe-form" action="#">
                            <input placeholder="Enter your email address" type="email">
                            <button type="submit" class="thm-btn coming-soon-page__btn">send massage<span
                                    class="icon-arrow-right"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End Coming Soon page-->




    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="../assets1/images/resources/logo-1.png" width="150"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@eventflow.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/layout/footer.php"?>