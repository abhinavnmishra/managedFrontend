$(function () {
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs());
});

function getChartJs() {

    let getAllInfoAjaxSettings = {
        "url": "https://digigrad.herokuapp.com/open/getReport",
        "method": "GET",
        "timeout": 0,
        "headers": {
        },
    };

    var config = {};
    let reportData = [];
    let valuesArr = [];
    let skills = [];
    function makeData(value, index, array){
        if(!(valuesArr.length > 3)){
            valuesArr.push(value.value);
            skills.push(value.skill);
        }
    }

    $.ajax(getAllInfoAjaxSettings).done(function (response) {
        reportData = response;
        reportData.forEach(makeData);

    }).fail(function (error) {
        console.log(error);
    });

    console.log(valuesArr);
    console.log(skills);

    var near = [7,7,6,4];

    config = {
        type: 'pie',
        data: {
            datasets: [{
                data: near,
                backgroundColor: [
                    "rgb(233, 30, 99)",
                    "rgb(255, 193, 7)",
                    "rgb(0, 188, 212)",
                    "rgb(139, 195, 74)"
                ],
            }],
            labels: skills
        },
        options: {
            responsive: true,
            legend: false
        }
    }

    console.log(config);
    return config;

}