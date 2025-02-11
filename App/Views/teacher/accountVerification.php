<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/layout/header.php';
?>

<div id="root">
    <main>
        <section class="pt-3 pl-14 pr-14" style="background-image: url('./assets/hero-bg-BeeOawcW.png'); background-position: center center; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="fixed top-3 left-0 w-full z-[999999]">
                    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/layout/navBar.php'; ?>
                </div>

                <div class="flex flex-col items-center justify-center min-h-screen py-20">
                    <h1 class="text-3xl md:text-5xl font-bold text-blue-600">Your Account Is Under Verification</h1>
                    <p class="mt-4 text-lg text-gray-200 max-w-xl text-center">
                        Thank you for signing up! Your account is currently under verification. This process helps us maintain a safe community. You will receive an email confirmation once your account is activated.
                    </p>
                    <div class="mt-8 contents">
                        <p class="text-sm text-gray-300">If you have any questions, feel free to <a href="/YouDemy/app/views/pages/support.php" class="text-blue-400 underline">contact our support team</a>.</p>
                        <a href="/YouDemy/app/views/pages/logIn.php" class="contents"><button class="bg-blue-600 text-white px-8 py-2 rounded-full font-bold mt-4">Return to Login</button></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/layout/footer.php'; ?>
