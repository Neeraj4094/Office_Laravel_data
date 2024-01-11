<?php
$errmsg = $name = $email = $password = $err_name = $err_email = $err_password = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <h1 class=" text-center w-full bg-green-100 p-1s"><?php echo $errmsg ?></h1>
    <section class="flex items-center justify-center w-full h-screen p-6 border">
        <form action="{{ url('/send_mail') }}" method="post" class="border w-96 p-6 pt-8 rounded-lg space-y-4" enctype= multipart/form-data>
        @csrf
            <div class="grid">
                <label for="name" class="text-lg">Name :-</label>
                <input type="name" name="name" id="name" placeholder="Enter name" value="<?php echo $name ?>" class="border p-1 rounded-lg">
                <small class="text-red-500"><?php echo $err_name ?></small>
            </div>
            <div class="grid">
                <label for="email" class="text-lg">Email :-</label>
                <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo $email ?>" class="border p-1 rounded-lg">
                <small class="text-red-500"><?php echo $err_email ?></small>
            </div>
            <div class="grid">
                <label for="password" class="text-lg">Password :-</label>
                <input type="password" name="password" id="password" placeholder="Enter password" value="<?php echo $password ?>" class="border p-1 rounded-lg">
                <small class="text-red-500"><?php echo $err_password ?></small>
            </div>
            <div class="grid">
                
            </div>
            <input type="submit" name="send_mail" id="register" value="Submit" class="border p-1 px-3 rounded-lg bg-blue-600 text-white">
        </form>
    </section>
    </main>
</body>
</html>