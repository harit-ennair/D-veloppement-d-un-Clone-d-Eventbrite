<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/organizer/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/organizer/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/organizer/layout/TNavBar.php';
// print_r($events);

?>
<main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">
        <div>
          <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]">All Events</h2>
          <div class="flex justify-between flex-col gap-y-2 sm:flex-row mb-[43px]"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Check out latest updates</span>
          </div>
          <section>
            <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl pt-6 flex-1 pb-[28px]">
              <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[33px] pb-[19px] px-[25px]">
                <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Recent Events</div>
              </div>
              <div class="px-[25px]">
                <div class="grid grid-cols-1 gap-6 mb-[23px] lg:grid-cols-2 xl:grid-cols-3">
                <?php foreach($events as $Event){
                      echo"
                  <div class='border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border pb-7 cursor-pointer rounded-[9px] px-[18px] pt-[26px]'>
                  <a href='/YouDemy/app/views/pages/teacher/EventDisplay.php?Event=$Event[id]'>
                    <div class='flex items-center gap-x-[17px] mb-[17px]'>
                      <h2 class='font-semibold text-gray-1100 text-[14px] leading-[18px] dark:text-gray-dark-1100'>$Event[title]</h2>
                    </div>
                    <div class='flex items-center mb-5 flex-col gap-3 sm:flex-row'>
                      <div class='flex items-center gap-3'>
                      </div>
                      
                    </div>
                    <div class='overflow-hidden rounded-lg w-full mb-[17px]'><img class='w-full h-full object-cover min-h-44 max-h-[200px]' src='$Event[thumbnail]' alt='bootstrap Event'></div>
                    <div class='flex justify-between border-b border-neutral flex-col gap-3 pb-[18px] dark:border-dark-neutral-border mb-[18px] sm:flex-row'>
                      <p class='text-gray-500 text-[11px] leading-[15px] dark:text-gray-dark-500 max-w-[206px]'>$Event[description]</p>
                      <div class='flex flex-col gap-y-[5px]'>
                        <div class='flex items-center gap-x-1'> 
                          <div class='flex items-center gap-x-1'><div class='rounded-full w-[6px] h-[6px] bg-[#96DE95]'></div><span class='text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[15px]'></span></div>
                          <span class='text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[15px]'>$Event[status]</span>
                        </div>
                      </div>
                    </div>
                  <div class='flex justify-between flex-col gap-3 sm:flex-row'>
                    <div class='flex items-center gap-x-[10px]'>";
                    
                    echo "</div>
                      <div class='flex items-center gap-x-[11px]'><a href='/addEvent?Event=$Event[id]'><i class='fa-regular fa-pen-to-square' style='color: #7e7e8f;'></i></a><button onclick='deleteEvent($Event[id])'><i class='fa-solid fa-trash' style='color: #ff0000;'></i></button></div>
                    </div>
                  </a></div>";
                  }?>
                  
            </div>
          </section>
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>  
 async function deleteEvent(id){
    
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
}).then(async (result) => {
    if (result.isConfirmed) {
      await fetch(`/deleteEvent?delete=${id}`);
      Swal.fire({
        title: "Deleted!",
        text: "Your course has been deleted.",
        icon: "success"
      }).then(() => {
        window.location.reload();
      });
    }
});
        }
      </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/app/views/organizer/layout/footer.php';
?>