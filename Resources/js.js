window.onload = start;
let inputCant;

function start() {
    inputCant = document.querySelectorAll('.cant.input');
    let more = document.querySelectorAll('.icon.more');//Almacena todos los botones de + en Array
    let less = document.querySelectorAll('.icon.less');//Almacena todos los botones de  en Array
    
    more.forEach(element => {
        element.addEventListener('click',add);
    });

    less.forEach(element => {
        element.addEventListener('click',minus);
    });
}

function add(e) {
    $nowValue = inputCant[e.target.id].value;
    $nowValue++;
    inputCant[e.target.id].value = $nowValue;
}

function minus(e) {
    $nowValue = inputCant[e.target.id].value;
    $nowValue--;
    if($nowValue < 1){
        false;    
    }else{
        inputCant[e.target.id].value = $nowValue;
    }
    
}