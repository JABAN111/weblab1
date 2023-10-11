document.addEventListener("DOMContentLoaded",function () {
    const tableHtml = localStorage.getItem("DataTable");
    if (tableHtml) {
        document.querySelector(".result").innerHTML = tableHtml;
    }
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

    function checkEverythingIsValid() {
        submitButton.disabled = !(xValid && yValid && RValid);
    }

    document.getElementById("yValue").addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    function isValidY(event) {
        let y = event.target.value;
        if (isNaN(y) || y.trim() === "") {
            yValid = false;
            checkEverythingIsValid();
            return false;
        } else if (y >= -3 && y <= 5) {
            yValid = true;
            checkEverythingIsValid();
            return true;
        } else {
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

    function isSelectedR(event) {
        let R = event.target.value;
        if (R !== undefined && R !== "") {
            RValid = true;
            checkEverythingIsValid();
        }
    }

    $(document).ready(function () {
        $("#button").click(function () {
            let localTime = Intl.DateTimeFormat().resolvedOptions().timeZone;// Получаем локальное время пользователя
            let formData = $("#coordinatesForm").serialize();

            formData += "&localTime=" + localTime

            $.ajax({
                type: "POST",
                url: "php/index.php",
                data: formData,
                success: function (result) {
                    $(".result").html(result);
                    table = ""
                    for (let i = 0; i < result.length; i++) {
                        table += result[i];
                    }
                    localStorage.setItem("DataTable",table)
                },
                error: function (error) {
                    console.error("Error while getting data from server");
                }
            }).then(function () {
                // После успешной загрузки данных из сервера
                const tableHtml = localStorage.getItem("DataTable");
                if (tableHtml) {
                    document.getElementsByClassName("result")[0].innerHTML = tableHtml;
                }
                ;
            })
        });
    });
});
