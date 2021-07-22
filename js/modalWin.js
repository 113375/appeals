let url = "http://localhost:8888/appeals/query.php"

let modalWinArea = function() {
    // TODO на релизе надо будет поменять эту ссылку
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
    let button = document.querySelector("#instances-button")
    button.addEventListener("click", makeRequest)

    function makeRequest() {
        //TODO надо сделать отображение всех общих инстанций и всех для выбранного района
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
        let json = { query: `SELECT * FROM instance i
                            INNER JOIN topic t ON i.topic_id = t.id
                            WHERE i.area_id IN (SELECT id FROM area WHERE name = "*" OR name = "${area}")
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
        let block = document.querySelector(".instances-block")
        let topic = document.querySelector("#select-topic").value
        block.innerHTML = ""
        console.log(data);

        data.forEach(elem => {
            let div = document.createElement("div")
            div.classList.add("checkbox-block")
            let checkbox = document.createElement("input")
            checkbox.type = "checkbox"
            checkbox.setAttribute("value", elem[0]) // пусть будет id инстанции
            let checkBlock = document.createElement("div")
            if (topic === elem[6]) {
                checkbox.checked = true
            }

            checkBlock.classList.add("checkbox")
            checkBlock.appendChild(checkbox)
            let blockForText = document.createElement("div")
            blockForText.textContent = elem["title"]


            div.appendChild(checkBlock)
            div.appendChild(blockForText)
            block.appendChild(div)
        })

    }


}

formInstancesModalWin()
modalWinArea()