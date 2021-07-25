//базовый js, он во всех файлах (для header)
let returnToMain = function() {
    // переход на главную страницу
    let logo = document.querySelector(".logo")
    logo.addEventListener("click", toMain)

    function toMain() {
        window.location.href = "index.php";
    }
}

returnToMain();