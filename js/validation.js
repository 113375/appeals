// В этом файле проверка значений полей и отправка данных  на сервер

let sendButton = function() {
    let button = document.querySelector("#send-button")
    button.addEventListener("click", checkForm)

    function checkForm() {
        let area = document.querySelector("#choice-area-input").value
        let instances = getCheckBox()
        let text = document.querySelector("#text-area").value
        let surname = document.querySelector("#input-surname").value
        let name = document.querySelector("#input-name").value
        let patronymic = document.querySelector("#input-patronymic").value
        let position = document.querySelector("#input-position").value
        let email = document.querySelector("#input-email").value
        if (!checkInputs(area, instances, text, surname, name, email)) {
            return
        }
        //делаем запрос на сервер
        let url = "http://localhost:8888/appeals/send.php"
            // TODO на релизе надо будет поменять эту ссылку

        let formData = new FormData()
        allFilesPath.forEach(file => {
            formData.append("file[]", file)
        })
        formData.append("area", area)
        formData.append("instances", instances)
        formData.append("text", text)
        formData.append("surname", surname)
        formData.append("name", name)
        formData.append("patronymic", patronymic)
        formData.append("position", position)
        formData.append("email", email)

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            mimeType: 'multipart/form-data',
            success: function(returndata) {
                alert(returndata);
                location.reload()
            }
        });


    }

    function checkInputs(area, instances, text, surname, name, email) {
        //проверка обязательных полей
        // TODO надо сделать якоря
        if (!area) {
            alert("Введите ваш район")
            return false
        }
        if (instances.length === 0) {
            alert("Выберите адресатов")
            return false
        }
        if (!text) {
            alert("Опишите причину обращения")
            return false
        }
        if (!surname) {
            alert("Введите вашу фамилию")
            return false
        }
        if (!name) {
            alert("Введите ваше имя")
            return false
        }
        if (!email) {
            alert("Введите вашу электронную почту")
            return false
        }
        return true

    }

    function getCheckBox() {
        //Смотрим все выбранные чекбоксы
        let data = []
        let checkbox = document.querySelectorAll(".checkbox")
        checkbox.forEach(check => {
            if (check.childNodes[0].checked) {
                data[data.length] = check.childNodes[0].value
            }
        })
        return data;
    }
}

sendButton()