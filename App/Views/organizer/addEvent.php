<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/organizer/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/organizer/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/organizer/layout/TNavBar.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
use App\Repository\CategoryManager;
$categories=CategoryManager::getAllCategories();
$error=$this->session->get("error")?? "";
$this->session->remove('error');
?>
<main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="url" value="addEvent">
    <input type="hidden" name="Event" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['id'] : '' ?>">

    <div>
      <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]">
        <?= isset($EventEdit) && !empty($EventEdit) ? 'Edit Event' : 'Add new Event' ?></h2>
      <div class="flex justify-between flex-col gap-y-2 sm:flex-row mb-[43px]"><span
          class="text-gray-500 text-xs dark:text-gray-dark-500">Check out latest updates</span>
      </div>
    </div>
    <div
      class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl px-[30px] pt-[45px] pb-[37px]">
      <div class="flex justify-between gap-x-5 flex-col xl:flex-row">
        <div class="xl:w-[70%]">
          <div class="mb-12">
            <h1 class="text-red-600"><?= $error?? "" ?></h1>
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">
              Event title</p>
            <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
              <input
                class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
                name="title" type="text" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['title'] : '' ?>"
                placeholder="Add title">
            </div>
          </div>
          <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Event
            description</p>
          <div class="rounded-lg border border-neutral dark:border-dark-neutral-border p-[13px]">
            <textarea
              class="textarea w-full p-0 text-gray-400 resize-none rounded-none bg-transparent focus:outline-none"
              name="description"
              placeholder="Description here"><?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['description'] : '' ?></textarea>
          </div>
          <div class="mb-12">
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">
              Event content</p>
            <textarea id="summernote" name="content"
              class="bg-black "><?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['content'] : '' ?></textarea>
          </div>
          <div class="mb-12">
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">
              Thumbnail / Gallery</p>
            <label for="drop-zone-image" class="cursor-pointer">
              <div class="border-dashed border-2 text-center border-neutral py-[26px] dark:border-dark-neutral-border">
                <img class="mx-auto inline-block mb-[15px]" src="/public/assets/images/icons/icon-image.svg"
                  alt="image icon">
                <p class="text-sm leading-6 text-gray-500 font-normal mb-[5px]">Drop your image here, or browse</p>
                <p class="leading-6 text-gray-400 text-[13px]">JPG, PNG, and GIF files are allowed</p>
                <input type="file" id="drop-zone-image" name="image"
                  value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['Event_img'] : '' ?>" class="hidden"
                  accept="image/jpeg, image/png, image/gif, image/webp" />
              </div>
            </label>
          </div>
          <div class="mb-12">
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">
              Video</p>
            <label for="drop-zone-video" class="cursor-pointer">
              <div class="border-dashed border-2 text-center border-neutral py-[26px] dark:border-dark-neutral-border">
                <img class="mx-auto inline-block mb-[15px]" src="/public/assets/images/icons/icon-video.svg"
                  alt="video icon">
                <p class="text-sm leading-6 text-gray-500 font-normal mb-[5px]">Drop your video here, or browse</p>
                <p class="leading-6 text-gray-400 text-[13px]">MP4, AVI, and MOV files are allowed</p>
                <input type="file" id="drop-zone-video" name="video"
                  value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['Event_video'] : '' ?>" class="hidden"
                  accept="video/mp4, video/avi, video/mov" />
              </div>
            </label>
          </div>
          <div class="mb-12">
            <h1 class="text-red-600"><?= $error ?? "" ?></h1>
            <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">
              Localisation</p>
            <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
              <input
                class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
                name="localisation" type="text" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['localisation'] : '' ?>"
                placeholder="Add localisation">
            </div>
          </div>
        </div>
        <div class="flex-1 flex flex-col gap-y-[15px] mt-[25px]">
          <div class="border border-neutral rounded-lg dark:border-dark-neutral-border pb-[31px]">
            <div class="bg-neutral rounded-t-lg py-[15px] pl-[18px] mb-[27px] dark:bg-dark-neutral-border">
              <p class="text-gray-1100 leading-4 font-semibold dark:text-gray-dark-1100 text-[14px]">Categories</p>
            </div>
            <div class="flex flex-col gap-y-[22px] px-[18px] mb-[25px]">
              <select
                class="bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] border rounded-lg border-[#E8EDF2] dark:border-[#313442] dark:text-gray-dark-400"
                name="categories" id="cat">
                <option value="">select a Category</option>
                <?php
                foreach ($categories as $category) {
                  if (isset($EventEdit) && !empty($EventEdit)) {
                    foreach ($catId as $cat) {
                      $selected = $cat == $category['id'] ? 'selected' : '';
                    }
                  }
                  echo "<option value='$category[id]' $selected>$category[name]</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="border border-neutral rounded-lg dark:border-dark-neutral-border">
  <div class="bg-neutral rounded-t-lg py-[15px] pl-[18px] mb-[27px] dark:bg-dark-neutral-border">
    <p class="text-gray-1100 leading-4 font-semibold dark:text-gray-dark-1100 text-[14px]">Contact</p>
  </div>
  <div class="flex flex-col gap-y-[22px] px-[18px] mb-[25px]">
    <label for="contact-email" class="cursor-pointer text-white mb-2">Contact Email <br/>
      <input
        class="input w-full bg-transparent text-sm leading-4 border-2 border-gray-500 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
        name="contact-email" type="email" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['title'] : '' ?>"
        placeholder="Add Contact Email">
    </label>
    <label for="contact-phone" class="cursor-pointer text-white mb-2">Contact Phone <br/>
      <input
        class="input w-full bg-transparent text-sm leading-4 border-2 border-gray-500 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
        name="contact-phone" type="text" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['title'] : '' ?>"
        placeholder="Add Contact Phone">
    </label>
    <label for="Price" class="cursor-pointer text-white mb-2">Price <br/>
      <input
        class="input w-full bg-transparent text-sm leading-4 border-2 border-gray-500 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
        name="Price" id="Price" type="text" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['title'] : '' ?>"
        placeholder="Add Contact Phone">
    </label>
    <label for="Capacity" class="cursor-pointer text-white mb-2">Capacity <br/>
      <input
      class="input w-full bg-transparent text-sm leading-4 border-2 border-gray-500 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
      name="Capacity" id="Capacity" type="text" value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['title'] : '' ?>"
      placeholder="Add Contact Phone">
    </label>
    <label for="event_date" class="cursor-pointer text-white mb-2">Event Date <br/>
      <input
      class="input w-full bg-transparent text-sm leading-4 border-2 border-gray-500 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit"
      name="event_date" id="event_date" type="date" 
      value="<?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['event_date'] : '' ?>">
    </label>
  </div>
</div>

          <div
            class="border border-neutral rounded-lg bg-neutral-bg dark:border-dark-neutral-border pb-[31px] dark:bg-dark-neutral-bg">
            <div class="bg-neutral rounded-t-lg py-[15px] pl-[18px] mb-[27px] dark:bg-dark-neutral-border">
              <p class="text-gray-1100 leading-4 font-semibold dark:text-gray-dark-1100 text-[14px]">Publish</p>
            </div>
            <div class="flex flex-col pl-[18px] gap-y-[15px] mb-[25px]">
              <div class="flex items-center gap-x-[6px]"><img src="/public/assets/images/icons/icon-tree.svg"
                  alt="tree icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Status:</span><span
                  class="text-gray-1100 text-xs dark:text-gray-dark-1100">Draft</span></div>
              <div class="flex items-center gap-x-[6px]"><img src="/public/assets/images/icons/icon-eye.svg"
                  alt="eye icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Visibility:</span><span
                  class="text-gray-1100 text-xs dark:text-gray-dark-1100"><?= isset($EventEdit) && !empty($EventEdit) ? $EventEdit['STATUS'] : 'pending' ?></span>
              </div>
              <div class="flex items-center gap-x-[6px]"><img src="/public/assets/images/icons/icon-calendar-1.svg"
                  alt="calendar icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Schedule:</span><span
                  class="text-gray-1100 text-xs dark:text-gray-dark-1100">Immediately</span></div>
            </div>
            <div class="px-[18px] mb-[25px]">
              <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border"></div>
            </div>
            <div class="flex justify-between px-[18px]">
              <button name="submit"
                class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg font-medium dark:border-dark-neutral-bg py-[7px] px-[14px] text-[12px] leading-[18px]">Publish</button>
            </div>
          </div>
  </form>

  </div>
  </div>
  </div>

  <footer class="mt-[37px]">
    <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border mb-[25px]"></div>
    <div class="flex items-center justify-between text-desc text-gray-400 flex-wrap gap-5 dark:text-gray-dark-400">
      <div class="flex items-center gap-2 flex-wrap">
        <p> <span>© 2022 -</span><span class="text-color-brands">&nbsp;Frox</span><span>&nbsp;Dashboard</span></p>
        <div class="bg-color-brands rounded-full hidden w-[2px] h-[2px] md:block"></div>
        <p> <span>Made by</span><a class="text-color-brands" href="https://alithemes.com"
            target="_blank">&nbsp;AliThemes</a></p>
      </div>
      <div class="flex items-center gap-[15px]"><a class="transition-colors duration-300 hover:text-color-brands"
          href="#">About</a><a class="transition-colors duration-300 hover:text-color-brands" href="#">Careers</a><a
          class="transition-colors duration-300 hover:text-color-brands" href="#">Policy</a><a
          class="transition-colors duration-300 hover:text-color-brands" href="#">Contact</a></div>
    </div>
  </footer>
</main>

<script>
  $('#summernote').summernote({
    placeholder: 'Content',
    tabsize: 2,
    // height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $('.note-toolbar').css('background-color', '#1f2128');


</script>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/organizer/layout/footer.php';
?>