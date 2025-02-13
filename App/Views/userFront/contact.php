<?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layout/header.php"?>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(../assets1/images/backgrounds/page-header-bg.jpg);">
            </div>
            <div class="page-header__shape-1 float-bob-y">
                <img src="/Public/assets1/images/shapes/page-header-shape-1.png" alt="">
            </div>
            <div class="page-header__shape-2 float-bob-x">
                <img src="/Public/assets1/images/shapes/page-header-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Contact</h2>
                    <div class="thm-breadcrumb__box">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="/">Home</a></li>
                            <li><span class="icon-angle-right"></span></li>
                            <li>Contact US</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact One Start-->
        <section class="contact-one">
            <div class="container">
                <div class="contact-one__inner">
                    <h3 class="contact-one__title">write here below? </h3>
                    <p class="contact-one__text">For your car we will do everything advice, repairs and they can<br>
                        maintenance. We are the some preferred choice </p>
                    <form class="contact-form-validated contact-one__form" action="../assets1/inc/sendemail.php"
                        method="post" novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-one__input-box">
                                    <input type="text" name="name" placeholder="Your Name" required="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-one__input-box">
                                    <input type="email" name="email" placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-one__input-box">
                                    <input type="text" name="Phone" placeholder="Phone Number" required="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-one__input-box">
                                    <div class="select-box">
                                        <select class="selectmenu wide">
                                            <option selected="selected">Chose Optaion</option>
                                            <option>Type Of Service 01</option>
                                            <option>Type Of Service 02</option>
                                            <option>Type Of Service 03</option>
                                            <option>Type Of Service 04</option>
                                            <option>Type Of Service 05</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-one__input-box text-message-box">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                                <div class="contact-one__btn-box">
                                    <button type="submit" class="thm-btn contact-one__btn">Submit Now<span
                                            class="icon-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="result"></div>
                </div>
            </div>
        </section>
        <!--Contact One End-->

        <!--Contact Two Start-->
        <section class="contact-two">
            <div class="container">
                <div class="row">
                    <!--Contact Two Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="contact-two__single">
                            <div class="contact-two__icon">
                                <span class="icon-pin"></span>
                            </div>
                            <h3 class="contact-two__title">Location</h3>
                            <p class="contact-two__text">2972 Westheimer Rd. Santa Ana, <br>Illinois 85486 </p>
                        </div>
                    </div>
                    <!--Contact Two Single End-->
                    <!--Contact Two Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="contact-two__single">
                            <div class="contact-two__icon">
                                <span class="icon-paper-plan"></span>
                            </div>
                            <h3 class="contact-two__title">E-mail</h3>
                            <p class="contact-two__text"><a
                                    href="mailto:tim.jennings@example.com">tim.jennings@example.com</a></p>
                            <p class="contact-two__text"><a
                                    href="mailto:debra.holt@example.com">debra.holt@example.com</a></p>
                        </div>
                    </div>
                    <!--Contact Two Single End-->
                    <!--Contact Two Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="contact-two__single">
                            <div class="contact-two__icon">
                                <span class="icon-call"></span>
                            </div>
                            <h3 class="contact-two__title">Contact</h3>
                            <p class="contact-two__text"><a href="tel:019457896332">019457896332,</a> <a
                                    href="tel:017485962546">017485962546</a></p>
                            <p class="contact-two__text"><a href="tel:016457896333">016457896333</a></p>
                        </div>
                    </div>
                    <!--Contact Two Single End-->
                </div>
            </div>
        </section>
        <!--Contact Two End-->

    

        <?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layout/footer.php"?>