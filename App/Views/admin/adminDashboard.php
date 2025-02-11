<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/admin/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/admin/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/admin/layout/TNavBar.php';

?>

<main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">
    <div>
        <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]">!</h2>
        <div class="flex justify-between flex-col gap-y-2 sm:flex-row mb-[44px]">
            <span class="text-gray-500 text-xs dark:text-gray-dark-500">Check out latest updates</span>
        </div>
    </div>
    <section>
        <div class="flex flex-col justify-between gap-5 mb-[26px] xl:flex-row">
            <!-- Total Number of Courses -->
            <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl flex-1 pb-[33px]">
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[25px] pb-[19px] px-6 pt-6">
                    <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Nombre total de cours</div>
                </div>
                <div class="px-6">
                    <p class="text-4xl font-bold text-gray-1100 dark:text-gray-dark-1100"></p>
                </div>
            </div>

            <!-- Distribution by Category -->
            <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl flex-1 pb-[33px]">
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[25px] pb-[19px] px-6 pt-6">
                    <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Répartition par catégorie</div>
                </div>
                <div class="px-6">
                    <ul class="list-disc list-inside">
                         <!-- Add more categories as needed -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-between gap-5 mb-[26px] xl:flex-row">
            <!-- Course with the Most Students -->
            <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl flex-1 pb-[33px]">
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[25px] pb-[19px] px-6 pt-6">
                    <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Le cour avec le plus d'étudiants</div>
                </div>
                <div class="px-6">
                    <p class="text-xl font-semibold text-gray-1100 dark:text-gray-dark-1100"></p>
                    <p class="text-normal text-gray-500 dark:text-gray-dark-500">Nombre d'étudiants: </p>
                </div>
            </div>

            <!-- Top 3 Teachers -->
            <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl flex-1 pb-[33px]">
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[25px] pb-[19px] px-6 pt-6">
                    <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Les Top 3 enseignants</div>
                </div>
                <div class="px-6">
                    <ol class="list-decimal list-inside">
                         
                    </ol>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/admin/layout/footer.php';
?>