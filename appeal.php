<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обращение</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/appeal.css">

</head>
<body>
    <div class="container">
        <?php require "templates/header.php" ?>
        <!-- Основной контент-->
        <div class="head-block-content">
            <div class="text-block">
                <!-- левый блок с текстом и кнопкой перехода к обращению-->
                <div class="header-text">
                    <div class="purple" >Пресеки нарушение</div>
                    <div class="green">  Подай обращение</div>
                </div>
            </div>
            
        </div>
        <div class="points appeal">
            <!-- Поля для формы-->
            <div class="points-block-appeal">
                <div class="icon ">
                    <div class="image purple">
                        <img src="icons/map.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple list">
                    Выбрать район
                </div>
            </div>

            <div class="points-block-appeal">
                <div class="icon">
                    <div class="image green little">
                        <img src="icons/list.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button green list">
                    Выбрать тему обращения
                </div>
            </div>

            <div class="points-block-appeal">
                <div class="icon">
                    <div class="image purple">
                        <img src="icons/checkmark.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple list">
                    Отметь адресатов
                </div>
            </div>

            <div class="points-block-appeal textarea">
                <div class="icon">
                    <div class="image green">
                        <img src="icons/keyboard.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left textarea-apppeal-block">
                    <textarea placeholder="Опишите проблему" id=""  rows="9"></textarea>
                </div>
            </div>

            <div class="points-block-appeal img-button-block">
                <div class="icon">
                    <div class="image purple little">
                        <img src="icons/photo.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple photo">
                    Отметь адресатов
                </div>
            </div>

            <div class="points-block-appeal block-for-img">
                <div class="icon" style="width: 100px; height: 100px;">
                    
                </div>
                <div class="appeal-margin-left img-icons-block">
                    <?php for($i = 0; $i < 4; $i++):?>
                    <div class="image-block image purple">
                        <img class="icon-img-photo" src="icons/photo.png" alt="">
                    </div>
                    <?php endfor ?>
                </div>
            </div>

            

        </div>
        <?php require "templates/footer.php"?>

        </div>




    </div>
    <script src="js/base.js"></script>

</body>
</html>