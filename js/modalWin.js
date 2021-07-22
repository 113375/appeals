let modalWinArea = function() {
    // TODO на релизе надо будет поменять эту ссылку
    let url = "http://localhost:8888/appeals/query.php"
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
modalWinArea()