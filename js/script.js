//will be true, when user will choose valid data for them
let xValid = false;
let yValid = false;
let RValid = false;
// document.addEventListener('DOMContentLoaded', function () {
//Hooking the value of the input
const xRadioButtons = document.querySelectorAll(".x");
const Y = document.getElementById("yValue");
const RButtons = document.querySelectorAll(".R")
const submitButton = document.getElementById("button");
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
    submitButton.disabled = !(xValid && yValid && RValid);
    console.log("Валидация не пройдена:" +
        "xValid=" + xValid + " " +
        "yValid=" + yValid + " "+
        "RValid=" + RValid);
}


// window.onload = () => {
//     const btn = document.getElementById("submit");
//     btn.setAttribute('disable', '')
// }
function isValidY(event){
    let y = event.target.value;
    console.log("someData" + event.target.textContent)
    console.log("Введенное значение y: " + event.target.value + " " +
        "тип введеного значения: " + typeof(event.target.value));
    if(isNaN(y) || y.trim() === ""){
        yValid = false;
        checkEverythingIsValid();
        return false;
    }else if(y >= -3 && y <= 5){
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
function isClickedX(event){
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

$(document).ready(function () {
    $("#button").click(function () {
        let localTime = new Date().getTimezoneOffset()
        ; // Получаем локальное время пользователя
        let formData = $("#coordinatesForm").serialize();

        formData += "&localTime=" + localTime

        $.ajax({
            type: "POST",
            url: "php/index.php",
            data: formData,
            success: function (result) {
                $(".result").append(result);
            },
            error: function (error) {
                console.error("Error while getting data from server");
            }
        });
    });
});
