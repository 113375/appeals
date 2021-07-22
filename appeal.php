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
    <link rel="stylesheet" href="css/modalWin.css">

</head>

<body>
    <div class="container">
        <?php require "templates/header.php" ?>
        <?php require "base.php" ?>
        <!-- Основной контент-->
        <div class="head-block-content">
            <div class="text-block">
                <!-- левый блок с текстом и кнопкой перехода к обращению-->
                <div class="header-text">
                    <div class="purple">Пресеки нарушение</div>
                    <div class="green"> Подай обращение</div>
                </div>
            </div>

        </div>
        <div class="points appeal">
            <!-- Поля для формы-->
            <div class="points-block-appeal">
                <!--выбор района-->
                <div class="icon ">
                    <div class="image purple">
                        <img src="icons/map.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple list" type-win="choice-area">
                    Выбрать район
                </div>
                <div class="appeal-margin-left appeal-choice-text">
                    <!-- То, что было выбрано-->
                </div>
            </div>

            <div class="points-block-appeal">
                <!-- выбор темы-->

                <div class="icon">
                    <div class="image green little">
                        <img src="icons/list.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button green list" type-win="choice-topic">
                    Выбрать тему обращения
                </div>
                <div class="appeal-margin-left appeal-choice-text">
                    <!-- То, что было выбрано-->
                </div>
            </div>

            <div class="points-block-appeal">
                <!-- выбор адресатов-->
                <div class="icon">
                    <div class="image purple">
                        <img src="icons/checkmark.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple list" type-win="choice-dest">
                    Отметь адресатов
                </div>
                <div class="appeal-margin-left appeal-choice-text">
                    <!-- То, что было выбрано-->
                </div>
            </div>

            <div class="points-block-appeal textarea">
                <!-- описание проблемы -->
                <div class="icon">
                    <div class="image green">
                        <img src="icons/keyboard.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left textarea-apppeal-block">
                    <textarea placeholder="Опишите проблему" id="" rows="9"></textarea>
                </div>
            </div>

            <div class="points-block-appeal img-button-block">
                <!-- выбор фотографии-->
                <div class="icon">
                    <div class="image purple little">
                        <img src="icons/photo.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left appeal-button button purple photo">
                    Добавить фото или видео
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

            <div class="points-block-appeal img-button-block">
                <!-- Другие данные о пользователе-->
                <div class="icon">
                    <div class="image purple little">
                        <img src="icons/person.png" alt="">
                    </div>
                </div>
                <div class="appeal-margin-left all-inputs">
                    <!-- Набор всех input внизу страницы-->
                    <div>
                        <input type="text" name="" placeholder="Фамилия">
                    </div>
                    <div>
                        <input type="text" name="" placeholder="Имя">
                    </div>
                    <div>
                        <input type="text" name="" placeholder="Отчество(если есть)">
                    </div>
                    <div>
                        <input type="text" name="" placeholder="Должность(если есть)">
                    </div>
                    <div>
                        <input type="email" name="" placeholder="Электронная почта">
                    </div>

                </div>
            </div>


        </div>
        <div class="button-block">
            <div class="button-to-appeals button purple bottom-button letter big">
                Отправить обращение
            </div>
        </div>

        <?php require "templates/footer.php"?>

    </div>
    </div>
    <!-- Первое окно -->
    <?php require "templates/parts/choiceArea.php"?>
    <!-- второе окно -->
    <?php require "templates/parts/choiceDestination.php"?>
    <!-- третье окно -->
    <?php require "templates/parts/choiceTopic.php"?>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/base.js"></script>
    <script src="js/appeal.js"></script>
    <script src="typehead/bootstrap3-typeahead.js"></script>
    <script src="js/modalWin.js"></script>



</body>

</html>