<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/helper/AuthTeacherVerification.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/controllers/teacherAPI.php';
global $courseEdit;
global $relatedCourses;

if(isset($courseEdit)&&!empty($courseEdit)){
// print_r($courseEdit);
// print_r($relatedCourses);
$tagEdit=explode(",",$courseEdit['tag']);
$tagId=explode(",",$courseEdit['tagId']);
$catId=explode(",",$courseEdit['category_id']);

// print_r($catId);
// print_r($tagEdit);
// print_r($tagId);
} else {
    header("Location: /YouDemy/app/views/pages/teacher/courses.php");
    exit();
}
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/TNavBar.php';


?>

<div class="container mx-auto p-6">
    <div class="bg-neutral-bg dark:bg-dark-neutral-bg p-6 rounded-lg mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-1100 dark:text-gray-dark-1100"><?=$courseEdit['title']?></h2>
        <img src="<?=$courseEdit['course_img']?>" alt="Course Thumbnail" class="w-full h-auto max-h-[400px] mb-4 rounded-lg">
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><?= $courseEdit['description']?></p>
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><strong>Teacher:</strong><?=$courseEdit['teacher']?></p>
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><strong>Category:</strong><?=$courseEdit['category']?></p>
        <div class="bg-neutral p-4 rounded-md dark:bg-dark-neutral-border">
            <h3 class="text-lg font-bold text-gray-1100 dark:text-gray-dark-1100 mb-2">Course Content</h3>
            <p class="text-sm text-gray-500 dark:text-gray-dark-500"><?=htmlspecialchars_decode($courseEdit['content'])?></p>
        </div>
    </div>

    <div class="bg-neutral-bg dark:bg-dark-neutral-bg p-6 rounded-lg mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-1100 dark:text-gray-dark-1100">Related Courses</h2>
        <ul class="space-y-4">
<?php if(isset($relatedCourses)&&!empty($relatedCourses)){
        foreach($relatedCourses as $course){
            echo"
             <a href='/YouDemy/app/views/pages/teacher/courseDisplay.php?course=$course[id]'><li class='bg-neutral p-4 rounded-md hover:bg-gray-200 dark:bg-dark-neutral-border dark:hover:bg-gray-700 transition duration-200 flex'>
                 <img src='$course[course_img]' width=200 alt='test'>
                 <div >
                 <h3 class='text-lg font-bold text-gray-1100 dark:text-gray-dark-1100'>$course[title]</h3>
                 <p class='text-xs text-gray-500 dark:text-gray-dark-500'>$course[description]</p>
                 </div>
             </li></a>";
        }
    }
            ?>
        </ul>
    </div>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/footer.php';
?>