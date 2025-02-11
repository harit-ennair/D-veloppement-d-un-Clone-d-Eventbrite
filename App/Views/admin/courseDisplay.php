<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/helper/AuthAdmin.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/Controllers/AdmincourseAPI.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/admin/layout/sideBar.php';



global $course;

if(isset($course)&&!empty($course)){
// print_r($course);
// print_r($relatedCourses);
$tagEdit=explode(",",$course['tag']);
// $tagId=explode(",",$course['tagId']);
// $catId=explode(",",$course['category_id']);

// print_r($catId);
// print_r($tagEdit);
// print_r($tagId);
} else {
    header("Location: /YouDemy/app/views/pages/admin/courseManager.php");
    exit();
}
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/admin/layout/header.php';
// print_r($_SESSION);



include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/admin/layout/TNavBar.php';


?>

<div class="container mx-auto p-6">
    <div class="bg-neutral-bg dark:bg-dark-neutral-bg p-6 rounded-lg mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-1100 dark:text-gray-dark-1100"><?=$course['title']?></h2>
        <img src="<?=$course['course_img']?>" alt="Course Thumbnail" class="w-full h-auto max-h-[400px] mb-4 rounded-lg">
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><?= $course['description']?></p>
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><strong>Teacher:</strong><?=$course['teacher']?></p>
        <p class="text-sm text-gray-500 dark:text-gray-dark-500 mb-4"><strong>Category:</strong><?=$course['category']?></p>
        <div class="bg-neutral p-4 rounded-md dark:bg-dark-neutral-border">
            <h3 class="text-lg font-bold text-gray-1100 dark:text-gray-dark-1100 mb-2">Course Content</h3>
            <p class="text-sm text-gray-500 dark:text-gray-dark-500"><?=htmlspecialchars_decode($course['content'])?></p>
        </div>
    </div>

    
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/footer.php';
?>