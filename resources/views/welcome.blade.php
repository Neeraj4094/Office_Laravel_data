<?php
$checkid = $userloggedin = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
  <script src="https://cdn.tailwindcss.com"></script>
    <title>User Dashboard</title>
</head>

<body class="grid grid-cols-12 grid-rows-6 w-full h-full">
    <aside class=" row-span-6 col-span-2 border h-full sm:hidden lg:block">
        <?php include 'app.php' ?>
    </aside>
    <main class="row-span-6 col-span-10  sm:col-span-12 lg:col-span-10 ">
        <div class="flex justify-between items-center border-b-2 py-2 px-2 ">
            <p class="font-medium text-lg">Welcome Admin, <span class="font-bold">
                    
                </span></p>
            <div class="w-10 h-10 rounded-full border">
                <?php
                $col = '<svg class="w-full h-full object-cover text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>';
                echo "$col<br>";
                ?>
            </div>
        </div>
        <div class="p-2 ">
            <h1 class="text-2xl font-semibold py-2">Manage Customers</h1>
            <div class="flex items-center justify-between ">
                <div class="flex items-center relative">
                    <form action="admin" method="post" class="flex items-center gap-1 relative">
                        <input type="search" name="search" id="search"
                            class="border shadow rounded-lg outline-none p-2 w-96" placeholder="Search...">
                        <button type="submit" class="p-2 pt-3 bg-slate-50 border rounded-r-lg absolute right-0 top-0">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
                <a href="admin_registeration"
                    class=" uppercase px-4 py-2 bg-blue-600 text-white rounded-lg"><span
                        class="font-bold text-xl">+</span> Add Admins</a>
            </div>
        </div>
        <div class="px-2 border-t">
            <div class="px-2 h-80 space-y-3 overflow-y-scroll">
                
                    <div
                        class="gap-2 py-2 mt-2  rounded-md border w-full shadow">
                        <div class=" flex justify-between items-center p-2 gap-4 w-full ">
                            <div class=" flex justify-between items-center gap-4">
                                <div class=" w-10 h-10 flex items-center justify-center">
                                    <?php

                                    $col = '<div class= "flex items-center justify-center w-8 h-8"><svg class="w-full h-full text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg></div>';
                                    echo "$col<br>";
                                    ?>
                                </div>
                                <div class=" w-full">
                                    <div class="flex gap-20 items-center">
                                        <div>
                                            <div class="flex items-center gap-1">
                                                <h2 class="">
                                                    
                                                </h2>

                                            </div>
                                            <p>
                                                
                                            </p>
                                            <p>
                                                <?php echo "Phone Number :- " ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-6">
                                <p class=" bg-purple-500 text-white px-3 py-1 rounded-full">
                                    <?php echo "Position :- "?>
                                </p>
                                <form action="admin_update_data" method="post" id="update">
                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Edit"
                                        class="px-1 rounded-lg bg-slate-100 text-black">
                                        <?php echo $userloggedin ?>

                                    </button>
                                </form>

                                <button id="<?php echo 'showBookBtn_' ?>" class=" border-2 px-4 py-1 rounded-md">
                                    
                                </button>
                                <script>
                                    document.getElementById('<?php echo 'showBookBtn_' . $checkid ?>').addEventListener('click', function () {
                                        var box = document.getElementById('<?php echo 'bookData_' . $checkid ?>');
                                        box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
                                    });
                                </script>

                                <div id="<?php echo 'bookData_' . $checkid ?>" class="hidden">

                                    <div
                                        class=" w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
                                        <div
                                            class="w-80 h-36 grid font-semibold place-items-center border rounded-xl py-2 shadow z-20 bg-white text-black relative">
                                            <form action="admin" method="post"
                                                class="font-bold text-2xl text-slate-400 absolute right-2 top-2">
                                                <button type="submit">
                                                    <svg class="w-6 h-6" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path
                                                            d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="grid place-items-center gap-4 pb-2">
                                                <h2 class="px-6 font-semibold pt-3 text-black text-center">Are you sure u
                                                    want to delete this account</h2>
                                                <form action="delete_admin_account?id=<?php echo $checkid ?>" method="post"
                                                    class="">
                                                    <button type="submit"
                                                        class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <span>
                </span>
            </div>
        </div>
    </main>
</body>

</html>