<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Candev 2020</title>
</head>
<body>
    <!--FLEXBOX-->
    <div class="container">

        <!-- Column 1 - nav-->
        <div class="column" id="navigation">
            <!-- Nav search -->
            <div id="search_container">
                <form action="">
                    <select name="search">
                        <option value="AgricultureAndAgri-Food">Agriculture and Agri-Food</option>
                        <option value="CanadianFoodInspectionAgency">Canadian Food Inspection Agency</option>
                        <option value="AtlanticCanadaOpportunitiesAgency">Atlantic Canada Opportunities Agency</option>
                        <option value="CanadaRevenueAgency">Canada Revenue Agency</option>
                        <option value="NationalFilmBoard">National Film Board</option>
                        <option value="OfficeoftheCo-ordinator-StatusofWomen">Office of the Co-ordinator - Status of Women</option>
                        <option value="CanadianHeritage">Canadian Heritage</option>
                        <option value="LibraryandArchivesofCanada">Library and Archives of Canada</option>
                        <option value="CitizenshipAndImmigration">Citizenship and Immigration</option>
                        <option value="EconomicDevelopmentAgencyofCanada">Economic Development Agency of Canada</option>
                        <option value="Environment">Environment</option>
                        <option value="CanadianEnvironmentalAssessmentAgency">Canadian Environmental Assessment Agency</option>
                        <option value="ParksCanadaAgency">Parks Canada Agency</option>
                        <option value="Finance">Finance</option>
                        <option value="FinancialTransactionsAndReportsAnalysisCentre">Financial Transactions and Reports Analysis Centre</option>
                        <option value="FisheriesAndOceans">Fisheries and Oceans</option>
                    </select>
                    <input type="submit">
                </form>
            </div>

            <!-- nav buttons -->
            <div id="button_navigation">
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
                <div class="button"></div>
            </div>
        </div>

        <!-- Column 2 - DATA VISUALIZATION -->
        <div class="column" id="showcase">
            <script>
                window.onload = function () {
                 
                var dataPoints = [];
                 
                var chart = new CanvasJS.Chart("showcase", {
                    animationEnabled: true,
                    exportEnabled: true,
                    title:{
                        text: "Branch"
                    },
                    axisY: {
                        title: "Count",
                        includeZero: false
                    },
                    data: [{
                        type: "column",
                        toolTipContent: "{y} Countries",
                        dataPoints: dataPoints
                    }]
                });
                 
                $.get("./EmployeesSalary.csv", getDataPointsFromCSV);
                 
                //CSV Format
                //Year,Volume
                function getDataPointsFromCSV(csv) {
                    let countColumn = new Array();
                    var csvLines = points = [];
                    csvLines = csv.split(/[\r?\n|\r|\n]+/);
                    for (var i = 0; i < csvLines.length; i++) {
                        if (csvLines[i].length > 0) {
                            points = csvLines[i].split(",");
                            countColumn.push(points);
                            for (let a=0; a<countColumn.length; a++)
                            dataPoints.push({
                                label: countColumn[0],
                                //y: parseFloat(points[6])
                                y: countColumn.length
                            });
                        }
                    }
                    chart.render();
                }
                 
                }
                </script>
                <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
</body>
</html>