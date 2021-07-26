// логика каждого всплывающего окна 
let url = "http://localhost:8888/appeals/query.php"
    // TODO на релизе надо будет поменять эту ссылку


let modalWinArea = function() {
    let json = { query: "SELECT * FROM area" }
    fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(json)
    }).then(function(response) {
        return response.json()
    }).then(function(data) {
        makeInput(data)
    })

    function makeInput(data) {
        let $input = $(".choice-area");

        $input.typeahead({
            source: makeDict(data),
            autoSelect: true
        });
        $input.change(function() {
            var current = $input.typeahead("getActive");
            if (current) {
                if (current.name == $input.val()) {} else {}
            } else {}
        });

    }

    function makeDict(data) {
        let dicts = []
        let i = 0
        data.forEach(dict => {
            dicts[i] = { id: dict["name"], name: dict["name"] }
            i += 1
        });

        return dicts;
    }
}

let formInstancesModalWin = function() {
    //Формируем окно модальное (третье с чекбоксами)
    let button = document.querySelector("#instances-button")
    button.addEventListener("click", makeRequest)

    function makeRequest() {
        let block = document.querySelector(".instances-block")
        let area = document.querySelector("#choice-area-input").value
        let topic = document.querySelector("#select-topic").value
        if (!area) {
            //Если не будет выбран район
            let div = document.createElement("div")
            div.classList.add("error-label")
            block.innerHTML = ""
            div.textContent = "Сначала нужно выбрать район"
            block.appendChild(div)
            return
        }
        if (area === block.getAttribute("chosen-area") && topic === block.getAttribute("chosen-topic")) {
            return
        }
        block.innerHTML = ""
        block.setAttribute("chosen-area", area)
        block.setAttribute("chosen-topic", topic)
        let json = { query: `SELECT * FROM instance i
                             JOIN topic_instance ti 
                            ON i.id = ti.instance_id 
                             JOIN topic t on t.id = ti.topic_id
                            WHERE i.area_id in (SELECT id FROM area WHERE name = "*" OR name = "${area}")
                            ORDER BY t.name` }
        fetch(url, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(json)
        }).then(function(response) {
            return response.json()
        }).then(function(data) {
            refactorInstancesModalWin(data)
        })


    }

    function refactorInstancesModalWin(data) {
        // полность переделываем страницу 
        data = refactorData(data)
        let block = document.querySelector(".instances-block")
        let topic = document.querySelector("#select-topic").value
        block.innerHTML = ""
        topic = topic.trim()
        data.forEach(elem => {
            let div = document.createElement("div")
            div.classList.add("checkbox-block")
            let checkbox = document.createElement("input")
            checkbox.type = "checkbox"
            checkbox.setAttribute("value", elem[0]) // пусть будет id инстанции
            let checkBlock = document.createElement("div")
            elem["name"] = elem["name"].trim()
            if (elem["name"].indexOf(topic) !== -1) {
                checkbox.checked = true
            }

            checkBlock.classList.add("checkbox")
            checkBlock.appendChild(checkbox)
            let blockForText = document.createElement("div")
            blockForText.textContent = elem["title"]
                //TODO выбранные всплывают наверх 


            div.appendChild(checkBlock)
            div.appendChild(blockForText)
            block.appendChild(div)

        })

        function refactorData(data) {
            // объединяем темы, убираем лишнее (Чтобы жилищник и управа не повторялись)
            let arr = []
            data.forEach(function(elem, index) {
                if (!arr[elem[0]]) {
                    arr[elem[0]] = elem["name"]
                } else {
                    arr[elem[0]] += `  ${elem["name"]}`
                    data[index] = {}
                }
            })
            let result = []
            let i = 0
            data.forEach(elem => {
                if (elem && arr[elem[0]]) {
                    elem["name"] = arr[elem[0]]
                    result[i] = elem;
                    i++;
                }
            })
            return result
        }





    }


}

formInstancesModalWin()
modalWinArea()