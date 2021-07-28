// логика модальных окон 
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
let allFilesPath = [] // массив со всеми файлами


let addPhotoButton = function() {
    // для открытия окна выбора файла 
    let button = document.querySelector("#photo-add-button")

    let inputFile = document.createElement("input")
    inputFile.type = "file"
    button.addEventListener("click", openFileChoice)

    function openFileChoice() {
        inputFile.click();
    }
    // <div class="image-block image purple">
    //     <img class="icon-img-photo" src="icons/photo.png" alt="">
    // </div>
    let blockImg = document.querySelector(".img-icons-block")

    inputFile.onchange = e => {
        var file = e.target.files[0];
        blockImg.childNodes[0].remove()
        if (allFilesPath.length <= 4) {
            blockImg.childNodes[0].remove()
        }

        allFilesPath[allFilesPath.length] = file


        let img = document.createElement("img")
        img.classList.add("image-show")
        var reader = new FileReader();
        reader.onload = function(event) {
            img.src = event.target.result;
        };

        reader.readAsDataURL(file);

        blockImg.appendChild(img)

    }


}

choiceAreaButton()
addPhotoButton()