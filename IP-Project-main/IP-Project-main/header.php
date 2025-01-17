<?php 
  include('server.php');

  $sql = mysqli_query($conn,"SELECT * FROM member WHERE member_id = '".$_SESSION['id']."'");
  $row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
<!-- <style>
    body {
        /* background-color: #e09129 !important; */
        background-image:url("images/back3.jpg");
        background-size: 1520px 1100px;
        

    }
</style> -->
<header id="header" class=" bg-slate-50 bg-opacity-5 shadow-lg rounded "style="background-color: white; z-index: 1;">
  <div class="container mx-auto px-2 flex justify-between items-center ">

    <!-- logo -->
    <div class="mr-auto md:w-48 flex-shrink-0 pl-1">
      <a href="index.php">
        <img class=" w-20 h-20" src="images/logo.png" alt="">

      </a>
    </div>

    <!-- buttons -->
    <nav class=" flex justify-end">
      <ul class="ml-4 xl:w-48 flex items-center justify-end">
      
        <!-- alert -->
        <li class=" relative inline-block">
        <?php 
				$select_rows = mysqli_query($conn, "SELECT * FROM `alert` WHERE member_id = '".$_SESSION['id']."'") or die('query failed');
				$row_count = mysqli_num_rows($select_rows);
			?>
          <a class="" href="alert.php">
          <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm"><?php echo $row_count; ?></div>
          <svg class="h-9 lg:h-10 p-2 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"> <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/> </svg>
          </a>
        </li>
        <!-- icon cart -->
        <li class=" relative inline-block ">
        <?php 
				$select_rows = mysqli_query($conn, "SELECT * FROM `basket` WHERE member_id1 = '".$_SESSION['id']."'") or die('query failed');
				$row_count = mysqli_num_rows($select_rows);
			?>
          <a class="" href="shoppingCart.php">
            <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm"><?php echo $row_count; ?></div>
            <svg class="h-9 lg:h-10 p-2 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"> <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> </svg>
          </a>
        </li>
       
        <!-- profile -->
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

  <div x-data="{ open: false }" class="bg-white  dark:bg-white w-64  shadow flex justify-center items-center mr-6 ml-5">
      <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
        <div class="flex justify-center items-center space-x-3 cursor-pointer">
          <div class=" w-7 h-7rounded-full overflow-hidden border-2 dark:border-white  border-white">
            <img src="images/<?php echo $_SESSION['img']; ?>" alt="" class="w-full h-full object-cover">
          </div>
          <div class="font-semibold  dark:text-black text-gray-900 text-xl">
            <div class="cursor-pointer"><?php echo $_SESSION['username'] ; ?></div>
          </div>
        </div>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-40 px-5 py-3 dark:bg-amber-400  bg-white rounded-lg shadow border dark:border-transparent mt-5">
          <ul class="space-y-3 dark:text-white">
            <li class="font-medium">
              <a href="profileCustomer.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                <div class=" mr-3">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                Account
              </a>
            </li>
            <li class="font-medium">
              <a href="setting.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                <div class="mr-3">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                Setting
              </a>
            </li>
            <hr class="dark:border-gray-700">
            <li class="font-medium">
              <a href="logout.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                <div class="mr-3 text-red-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </div>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
  </div>



      </ul>
    </nav>

    

    <script src="header.js">

    </script>
  
  <hr>
</header>

</body>
</html>