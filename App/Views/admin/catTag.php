<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/sideBar.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/TNavBar.php';
?>

<div class="flex items-center justify-center flex-col p-14">
    <div class="w-full flex items-center justify-between">

    <div class="w-full flex flex-col max-w-[531px] gap-[30px] mb-[60px] lg:mb-[166px]">
        <div class="w-full">
            <form id="catForm" action="/router/web.php" method="POST">
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Category Name</p>
            <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
                <input type="hidden" name="url" value="addCatTag">
                <input type="hidden" name="tableName" value="categories">
                <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" id="catName" name="name" type="text" placeholder="Type category name here">
            </div>
        </div>
        <button name="submit" class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg w-fit dark:border-dark-neutral-bg py-[7px] px-[16.5px]">Save Category</button>
        </form>
    </div>
    <div class="w-full flex flex-col max-w-[531px] gap-[30px] mb-[60px] lg:mb-[166px]">
        <div class="w-full">
            <form id="tagForm" action="/router/web.php" method="POST">
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Tag Name</p>
            <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
            <input type="hidden" name="url" value="addCatTag">
            <input type="hidden" name="tableName" value="tags">
                <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" id="tagName" name="name" type="text" placeholder="Type tag name here">
            </div>
        </div>
        <button name="submit" class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg w-fit dark:border-dark-neutral-bg py-[7px] px-[16.5px]">Save Tag</button>
        </form>
    </div>
    </div>
    <div class="flex justify-around w-full">
    <div>
    <h6 class="text-header-6 font-semibold text-gray-500 text-center dark:text-gray-dark-500 mb-[50px]">Categories</h6>
    <table class="w-full min-w-[300px]">
              <thead>
                <tr class="border-b border-neutral dark:border-dark-neutral-border pb-[15px]"> 
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Name</th>
                  <th class="font-normal text-normal text-gray-400 text-center pb-[15px] dark:text-gray-dark-400">Actions</th>
                </tr>
              </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    </div>

    <div>
    <h6 class="text-header-6 font-semibold text-gray-500 text-center dark:text-gray-dark-500 mb-[50px]">Tags</h6>
    <table class="w-full min-w-[300px]">
              <thead>
                <tr class="border-b border-neutral dark:border-dark-neutral-border pb-[15px]"> 
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Name</th>
                  <th class="font-normal text-normal text-gray-400 text-center pb-[15px] dark:text-gray-dark-400">Actions</th>
                </tr>
              </thead>
        <tbody id="Tagtbody">
            
        </tbody>
    </table>
    </div>
    </div>
    </div>

    <script src="/public/js/admin/catTags.js"></script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/footer.php';
?>