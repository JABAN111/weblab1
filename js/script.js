//will be true, when user will choose valid data for them
let xValid = false;
let yValid = false;
let RValid = false;
// document.addEventListener('DOMContentLoaded', function () {
//Hooking the value of the input
const xRadioButtons = document.querySelectorAll(".x");
const Y = document.getElementById("yValue");
const RButtons = document.querySelectorAll(".R")
const submitButton = document.getElementById("submit");
//add event for every x-button
for (const element of xRadioButtons) {
    element.addEventListener('change', isClickedX);
}
//add event for every R-selector-button
for (const element of RButtons) {
    element.addEventListener('change', isSelectedR);
}
Y.addEventListener('input', isValidY);

function checkEverythingIsValid(){
    if(xValid && yValid && RValid){
        alert("ВСЕ ВАЛИДНО");
        submitButton.disabled = false;
    }
    console.log("Валидация не пройдена:" +
        "xValid=" + xValid + " " +
        "yValid=" + yValid + " "+
        "RValid=" + RValid);
}


// window.onload = () => {
//     const btn = document.getElementById("submit");
//     btn.setAttribute('disable', '')
// }
function isValidY(event) {
    let y = event.target.value;
    console.log("someData" + event.target.textContent)
    console.log("Введенное значение y: " + event.target.value + " " +
        "тип введеного значения: " + typeof(event.target.value));
    if(isNaN(y) || y.trim() === ""){
        yValid = false;
        checkEverythingIsValid();
        return false;
    }else if(y >= -3 && y <= 5){
        console.log("Введеное значение " + y + " подходит");
        yValid = true;
        checkEverythingIsValid();
        return true;
    }
    else{
        // event.target.setCustomValidity("Значение y должно быть в диапазоне от -3 до 5," +
        //     "ваше значение: " + y + " если nan: " + event.target.value);
        yValid = false;
        checkEverythingIsValid();
        return false;
    }
}
function isClickedX(event) {
    xValid = true;
    checkEverythingIsValid();
    return true;
}
function isSelectedR(event){
    let R = event.target.value;
    if(R !== undefined && R !== ""){
        RValid = true;
        checkEverythingIsValid();
    }
    console.log(R + "- this must be value of R");
}
// console.log(xValid);
// function isClickedX(event) {
//     let x = event.target.value;
//     if(!isNan(x) && parseInt(x, 10) === 3){
//         console.log(x);
//     }
//     if(x !== undefined) {
//         console.log("change " + event.target.value);
//         return true;
//     }
//     else{
//         event.preventDefault()
//     }
// }

// document.getElementById("submit").addEventListener('click',function (event) {
//     alert("why")
//     event.preventDefault();
//     alert("NO U WON'T")
// })



//
// if (isValidY() || isClickedX()) {
//     console.log("someone good");
// }
