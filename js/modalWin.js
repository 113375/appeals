let modalWinArea = function (){
    //механика первого модального окна 
    $.ajax({
        url: `data/choiceArea.txt`,
        dataType: 'text',
        success: function(data) {
            makeTypeHead(data)
        }
    })
        
    function makeTypeHead(data){
        let $input = $(".choice-area");

        $input.typeahead({    
        source: makeDictionary(data),
        autoSelect: true
        });
        $input.change(function() {
        var current = $input.typeahead("getActive");
        if (current) {
            if (current.name == $input.val()) {
            } else {
            }
        } else {
        }
        });


        function makeDictionary(data){
            data = data.split("\n")
            let all = [{id:"", name:"fdafadsf"}]
            for(let i = 0; i < data.length; i++){
                all[i] = {id: data[i], name: data[i]};
            }
            return all;
        }
    }
    
    
}

modalWinArea()