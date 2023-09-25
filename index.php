<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
            <!-- <a href="https://github.com/Dinara203/js.git" class="title">Ссылка на GitHub</a> -->
        </div>
    </header>
    <div class="banner">
        <div class="container">
            <div class="forma">
                <h1 class="title">Заполните форму</h1><br>
                <form class="form" method="POST">
                    <input type="text" name="name" class="name" placeholder="Ваше имя" value="<?=$name?>">
                    <input type="text" name="email" class="email" placeholder="email" value="<?=$email?>">
                    <input type="number" name="number" class="number" placeholder="номер телефона" value="<?=$number?>">
                    <input type="submit" class="btn" id="btn" name="btn" value="Отправить">
                    <i><?=$errorname?></i>
                    <i><?=$erroremail?></i>
                    <i><?=$errornumber?></i>
                    
                </form>
                <?php
            if(isset($_POST['btn'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $number = $_POST['number'];

                function valName($name){
                    if(empty($name)){
                        return  '<p class="errorname">Введите имя</p>';
                    }
                    if(iconv_strlen($name)<2){
                        return '<p class="errorname">Имя не менее 2 символов</p>';
                    }
                }

                function valEmail($email){
                    if (empty($email)) {
                        return '<br><br><p class="erroremail">Email не может быть пустым</p>';
                    }
                    if (strlen($email) < 3 || strlen($email) > 50) {
                        return '<br><br><p class="erroremail">Неверная длина email</p>';
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return '<br><br><p class="erroremail">Неверный формат email</p>';
                    }
                }

                function valNumber($number){
                    if (empty($number)) {
                        return  '<p class="errornumber">Введите номер телефона</p>';
                    }
                    if (strlen($number) != 11) {
                        return  '<p class="errornumber">Неверное количество символов в номере телефона</p>';
                    }
                }

                $errorname = valName($name);
                if (!empty($errorname)) {
                    echo $errorname;
                    return;
                }

                $erroremail = valEmail($email);
                if (!empty($erroremail)) {
                    echo $erroremail;
                    return;
                }

                $errornumber = valNumber($number);
                if (!empty($errorumber)) {
                    echo $errornumber;
                    return;
                }
               echo '<p class="good">Форма успешно отправлена</p>';

            }
        ?>
            </div>
        </div>
        
    </div>
</body>
</html>