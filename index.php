<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">

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
                <div class="regular-text">
                    <div>Некачественное благоустройство?</div>
                    <div>Опасный перекрёсток?</div>
                    <div>Шумные работы?</div>
                </div>
                <div class="button-block">
                    <div class="button-to-appeals button purple">
                        Подать обращение
                    </div>
                </div>
            </div>
            <!-- блок с пунктами действия-->
            <div class="image-block">
                
            
            </div>
            <!-- TODO надо доделать выравнивание картинки посередине блока -->
            <!-- TODO надо сделать оптимизацию под мобильные устройства-->
        </div>
        <div class="points">
            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block purple">
                    <div class="header-point-text">
                        Выбери район
                    </div>
                    <div class="regular-point-text">
                        Пока поддерживается только район Раменки. Но мы развиваемся и скоро добавим другие районы.
                    </div>
                </div>
            </div>

            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block green">
                    <div class="header-point-text">
                        Определи тему
                    </div>
                    <div class="regular-point-text">
                        Выбери область, которая лучше всего описывает проблемы. Мы вам предложим адресатов.
                    </div>
                </div>
            </div>

            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block purple">
                    <div class="header-point-text">
                        Опиши проблему
                    </div>
                    <div class="regular-point-text">
                        Подробно опиши проблему.
                    </div>
                </div>
            </div>

            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block green">
                    <div class="header-point-text">
                        Загрузи фото и видео
                    </div>
                    <div class="regular-point-text">
                        Используй фотографии, на которых явно видно нарушение.                    
                    </div>
                </div>
            </div>

            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block purple">
                    <div class="header-point-text">
                        Расскажи о себе
                    </div>
                    <div class="regular-point-text">
                        Укажи фамилию и имя, добавь почту для обратной связи.
                    </div>
                </div>
            </div>

            <div class="points-block">
                <div class="icon">
                    <img src="icons/test.png" alt="">
                </div>
                <div class="text-point-block green">
                    <div class="header-point-text">
                        Отправь
                    </div>
                    <div class="regular-point-text">
                        Отправь обращение и повлияй на проблемы в своём районе!
                    </div>
                    </div>
            </div>
        </div>
        <div class="button-block">
            <div class="button-to-appeals button purple bottom-button">
                Подать обращение
            </div>
        </div>
       

        <?php require "templates/footer.php"?>

    </div>
<script src="js/main.js"></script>
<script src="js/base.js"></script>

</body>
</html>