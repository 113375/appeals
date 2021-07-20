let names = ["choice-area"]

let modalWin = function (){
    //механика первого и второго модального окна, выбор чекбоксов 
    names.forEach(name => {
        let inputs = document.getElementsByName(name)
    inputs.forEach(radio =>{
        radio.addEventListener("change", changeInput)
    })

    function changeInput(){
        inputs.forEach(radio => {
            let id = radio.getAttribute("input-id")
            let inp = document.querySelectorAll(`#${id}`)
            //TODO исправить ошибку с disabled
            if(radio.checked){
                inp.disabled = false
            }else{
                inp.disabled = true
            }
        })
    }

    })
    
}

modalWin();