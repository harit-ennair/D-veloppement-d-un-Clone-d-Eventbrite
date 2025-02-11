<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/helper/AuthTeacherVerification.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/controllers/teacherAPI.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/header.php';
?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/TNavBar.php';
global $categories;
global $tags;
global $courseEdit;
// print_r($_SESSION['error']);
$error=isset($_SESSION['error'])?$_SESSION['error']:'';
unset($_SESSION['error']);
if(isset($courseEdit)&&!empty($courseEdit)){
// print_r($courseEdit);
$tagEdit=explode(",",$courseEdit['tag']);
$tagId=explode(",",$courseEdit['tagId']);
$catId=explode(",",$courseEdit['category_id']);
// print_r($catId);
// print_r($tagEdit);
// print_r($tagId);
}

?>
<main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">
    <form action="/YouDemy/router/web.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="url" value="addCourse">
        <input type="hidden" name="course" value="<?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['id']:'' ?>">

        <div>
          <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]"><?=isset($courseEdit)&&!empty($courseEdit)?'Edit course':'Add new course' ?></h2>
          <div class="flex justify-between flex-col gap-y-2 sm:flex-row mb-[43px]"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Check out latest updates</span>
            </div>  
          </div>
          <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl px-[30px] pt-[45px] pb-[37px]">
            <div class="flex justify-between gap-x-5 flex-col xl:flex-row">
              <div class="xl:w-[70%]">
                <div class="mb-12">
                  <h1 class="text-red-600"><?=$error ?></h1>
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Course title</p>
                  <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
                    <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" name="title" type="text" value="<?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['title']:'' ?>" placeholder="Add title">
                  </div>
                </div>
                <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Course description</p>
                <div class="rounded-lg border border-neutral dark:border-dark-neutral-border p-[13px]">
                    <textarea class="textarea w-full p-0 text-gray-400 resize-none rounded-none bg-transparent focus:outline-none" name="description" placeholder="Description here"><?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['description']:'' ?></textarea>
                  </div>
                <div class="mb-12">
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Course content</p>
                  <textarea id="summernote" name="content" class="bg-black "><?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['content']:'' ?></textarea> 
                  </div>
                <div class="mb-12"> 
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Thumbnail / Gallery</p>
                  <label for="drop-zone" class="cursor-pointer">
    <div class="border-dashed border-2 text-center border-neutral py-[26px] dark:border-dark-neutral-border">
        <img class="mx-auto inline-block mb-[15px]" src="/YouDemy/public/assets/images/icons/icon-image.svg" alt="image icon">
        <p class="text-sm leading-6 text-gray-500 font-normal mb-[5px]">Drop your image here, or browse</p>
        <p class="leading-6 text-gray-400 text-[13px]">JPG, PNG, and GIF files are allowed</p>
        <input type="file" id="drop-zone" name="image" value="<?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['course_img']:'' ?>" class="hidden" accept="image/jpeg, image/png, image/gif, image/webp" />
    </div>
</label>
                </div>
                
                
                <div>
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Tag</p>
                  <select id="select-tools" name="tags[]" placeholder="Pick a tag" multiple>
                  <?php
                  if(isset($courseEdit)&&!empty($courseEdit)){
                    for ($i=0; $i <count($tagEdit) ; $i++) { 
                      echo "<option value='$tagId[$i]' selected>$tagEdit[$i]</option>";
                    }
                  }
                    ?>
                  </select>
                </div>
              </div>
              <div class="flex-1 flex flex-col gap-y-[15px] mt-[25px]">
              <div class="border border-neutral rounded-lg dark:border-dark-neutral-border pb-[31px]">
                  <div class="bg-neutral rounded-t-lg py-[15px] pl-[18px] mb-[27px] dark:bg-dark-neutral-border">
                    <p class="text-gray-1100 leading-4 font-semibold dark:text-gray-dark-1100 text-[14px]">Categories</p>
                  </div>
                  <div class="flex flex-col gap-y-[22px] px-[18px] mb-[25px]">
                  <select class="bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] border rounded-lg border-[#E8EDF2] dark:border-[#313442] dark:text-gray-dark-400" name="categories" id="cat">
                    <?php
                    foreach($categories as $category){
                      if(isset($courseEdit)&&!empty($courseEdit)){
                        foreach($catId as $cat){
                          $selected=$cat==$category['id']?'selected':'';
                        }
                      }
                      echo "<option value='$category[id]' $selected>$category[name]</option>";
                  }
                    ?>
                  </select>
                  </div>
                  <div class="mt-3 md:flex md:items-center md:-mx-2 flex justify-center">
                            <label class="flex items-center">
                                <input type="radio" name="coursType" value="doc" class="hidden peer" id="student" <?=isset($courseEdit)&& !empty($courseEdit) && $courseEdit['type'] == 'document' ? 'checked' : ''?>/>
                                <span class="flex items-center justify-center w-full px-6 py-3 text-[#494282] border border-[#494282] rounded-lg cursor-pointer md:w-auto md:mx-2 dark:border-red-400 dark:text-red-400 hover:bg-[#494282] hover:text-white transition duration-200 peer-checked:bg-[#494282] peer-checked:text-white">
                                    <span class="mx-2">Document</span>
                                </span>
                            </label>
                            
                            <label class="flex items-center mt-4 md:mt-0">
                                <input type="radio" name="coursType" value="video" class="hidden peer" id="teacher" <?=isset($courseEdit)&& !empty($courseEdit) && $courseEdit['type'] == 'video' ? 'checked' : ''?> />
                                <span class="flex items-center justify-center w-full px-6 py-3 text-[#494282] border border-[#494282] rounded-lg cursor-pointer md:w-auto md:mx-2 dark:border-red-400 dark:text-red-400 hover:bg-[#494282] hover:text-white transition duration-200 peer-checked:bg-[#494282] peer-checked:text-white">
                                    <span class="mx-2">video</span>
                                </span>
                            </label>
                        </div>
                </div>
                <div class="border border-neutral rounded-lg bg-neutral-bg dark:border-dark-neutral-border pb-[31px] dark:bg-dark-neutral-bg">
                  <div class="bg-neutral rounded-t-lg py-[15px] pl-[18px] mb-[27px] dark:bg-dark-neutral-border">
                    <p class="text-gray-1100 leading-4 font-semibold dark:text-gray-dark-1100 text-[14px]">Publish</p>
                  </div>
                  <div class="flex flex-col pl-[18px] gap-y-[15px] mb-[25px]">
                    <div class="flex items-center gap-x-[6px]"><img src="/YouDemy/public/assets/images/icons/icon-tree.svg" alt="tree icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Status:</span><span class="text-gray-1100 text-xs dark:text-gray-dark-1100">Draft</span></div>
                    <div class="flex items-center gap-x-[6px]"><img src="/YouDemy/public/assets/images/icons/icon-eye.svg" alt="eye icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Visibility:</span><span class="text-gray-1100 text-xs dark:text-gray-dark-1100"><?=isset($courseEdit)&&!empty($courseEdit)?$courseEdit['STATUS']:'pending' ?></span></div>
                    <div class="flex items-center gap-x-[6px]"><img src="/YouDemy/public/assets/images/icons/icon-calendar-1.svg" alt="calendar icon"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Schedule:</span><span class="text-gray-1100 text-xs dark:text-gray-dark-1100">Immediately</span></div>
                  </div>
                  <div class="px-[18px] mb-[25px]">
                    <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border"></div>
                  </div>
                  <div class="flex justify-between px-[18px]">
                    <button name="submit" class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg font-medium dark:border-dark-neutral-bg py-[7px] px-[14px] text-[12px] leading-[18px]">Publish</button>
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
              <p> <span>Made by</span><a class="text-color-brands" href="https://alithemes.com" target="_blank">&nbsp;AliThemes</a></p>
            </div>
            <div class="flex items-center gap-[15px]"><a class="transition-colors duration-300 hover:text-color-brands" href="#">About</a><a class="transition-colors duration-300 hover:text-color-brands" href="#">Careers</a><a class="transition-colors duration-300 hover:text-color-brands" href="#">Policy</a><a class="transition-colors duration-300 hover:text-color-brands" href="#">Contact</a></div>
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

      new TomSelect('#select-tools',{
        maxItems: null,
	    valueField: 'id',
	    labelField: 'title',
        searchField: 'name',
        persist: false,
        createOnBlur: true,
        create: false,
        maxItems: null,
        plugins: ['remove_button'], 
        options: <?=json_encode($tags) ?>,
    render: {
        option: function (data, escape) {
            return `<div>${data.name}</div>`;
        },
        item: function (item, escape) {
			      return `<div>${item.name}</div>`;
        }
    }
});
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/footer.php';
?>

