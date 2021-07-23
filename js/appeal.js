let choiceAreaButton = function() {
    let allButtons = document.querySelectorAll(".appeal-button-win");
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

        let showAreaId = this.getAttribute("show-area-id")

        darkLayer.onclick = function() {
            darkLayer.parentNode.removeChild(darkLayer);
            modalWin.classList.remove("visible");
            try {
                let showArea = document.querySelector(`#${showAreaId}`)
                let inputId = showArea.getAttribute("input-id")
                showArea.textContent = document.querySelector(`#${inputId}`).value
                return false;
            } catch (e) {
                console.log(e);
                return false
            }

        };
    }
}

choiceAreaButton()