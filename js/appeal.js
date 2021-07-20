let choiceAreaButton = function () {
    let allButtons = document.querySelectorAll(".appeal-button");
    allButtons.forEach(button => {
        button.addEventListener("click", showModalWin)
    });

    function showModalWin() {
        let modWin = this.getAttribute("type-win")
        let darkLayer = document.createElement('div'); // слой затемнения
        darkLayer.id = 'shadow'
        document.body.appendChild(darkLayer);

        let modalWin = document.getElementById(modWin);
        modalWin.classList.add("visible");

        darkLayer.onclick = function () {
            darkLayer.parentNode.removeChild(darkLayer);
            modalWin.classList.remove("visible");
            return false;
        };
    }
}

choiceAreaButton()
