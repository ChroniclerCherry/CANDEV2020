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