//js для главной страницы
let buttonToAppeal = function() {
    //Эта функция реализует переход на страницу подачи обращения
    let buttons = document.querySelectorAll(".button-to-appeals")
    buttons.forEach(button => {
        button.addEventListener("click", toAppeal)
    })

    function toAppeal() {
        window.location.href = "appeal.php";
    }
}

buttonToAppeal();