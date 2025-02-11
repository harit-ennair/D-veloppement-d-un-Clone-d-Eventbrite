<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/Controllers/Statistics.php';
include_once $_SERVER['DOCUMENT_ROOT']."/YouDemy/app/helper/AuthVerification.php";
$user=isset($_SESSION['user'])?$_SESSION['user']:[];
if(isset($user['status'])&&$user['status']==="suspended"){
    header("location:/YouDemy/app/views/pages/suspendedPage.php");
}
if(isset($user['role'])&&$user['role']==="Teacher"){
    if($user['status']==="verification"){
    header("location:/YouDemy/app/views/pages/teacher/accountVerification.php");
    }
}else{
    header("location:/YouDemy/public/index.php");
}
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/sideBar.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/TNavBar.php';
$user=isset($_SESSION['user'])?$_SESSION['user']:[];
// print_r($user);
global $teacherStudents;
global $courseCount;
?>
<main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">
        <div>
          <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]"><?=isset($user['name'])?$user['name']:''?>!</h2>
          <div class="flex justify-between flex-col gap-y-2 sm:flex-row mb-[44px]"><span class="text-gray-500 text-xs dark:text-gray-dark-500">Check out latest updates</span>
            </div>
          </div>
          <section>
            <div class="flex flex-col justify-between gap-5 mb-[26px] xl:flex-row">
              <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl flex-1 pb-[33px]"> 
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[25px] pb-[19px] px-6 pt-6">
                  <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Earnings</div>
                  
                </div>
                <div class="px-6">
                  <div> 
                    <div>
                      <canvas class="max-h-[300px]" width="400" height="400" id="myChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-2xl pb-[19px] xl:w-1/3"> 
                <div class="flex items-center justify-between border-b border-neutral dark:border-dark-neutral-border mb-[21px] pb-[16px] px-6 pt-[19px]">
                  <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">Student Count:<?=isset($teacherStudents)?$teacherStudents:""?> </div>
                  <div class="text-base leading-5 text-gray-1100 font-semibold dark:text-gray-dark-1100">course Count: <?=isset($courseCount)?$courseCount:""?></div>
                  
                </div>
                
              </div>
            </div>
            <div class="flex flex-col justify-between gap-5 xl:flex-row">
              
          </section>
          
          
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Define labels for the last 7 months
    const Slabels = [];
    const SdataValues = [];  // Array to store data values

    async function getTauxEngagements() {
      await fetch('/YouDemy/app/Controllers/statistics.php?tauxEngagements=true')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        data.forEach(element => {
          Slabels.push(element.title);   
          SdataValues.push(element.taux_engagements); 
        });
      });
    }

    const Sdata = {
      labels: Slabels,
      datasets: [{
        label: 'Engagement Rate',
        data: SdataValues, // Use the dynamic values
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };

    // Configuration du graphique
    const Sconfig = {
      type: 'bar',
      data: Sdata,
      options: {
        responsive: true,
        scales: {
          x: {
            beginAtZero: true
          },
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    };

    document.addEventListener('DOMContentLoaded', async function() {
      await getTauxEngagements();
      
      const sctx = document.getElementById('myChart');
      new Chart(sctx, Sconfig);
    });
</script>
    
    <?php
include_once $_SERVER['DOCUMENT_ROOT'].'/YouDemy/app/views/pages/teacher/layout/footer.php';
?>
