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
            <?php
            require 'DepartmentDAO.php';
            $DAO = new DepartmentDAO();
            $rows = $DAO->getDepartments();
            
                echo '<table>'.
                        '<thead>'.
                            '<tr>'
                            .
                            '<th>id</th>
                             <th>paymentAmount</th>
                             <th>country</th>
                             <th>city</th>
                             <th>departmentName</th>
                             <th>departmentNumber</th>
                             <th>fiscalYear</th>
                             <th>minc</th>
                             <th>mine</th>
                             <th>province</th>
                             <th>description</th>
                             <th>address</th>
                             <th>totalCurrentYearAmount</th>
                             </tr>
                        </thead>
                        <tbody>';
                        if ($rows[0] != null){
                            for ($i = 0; $i < 25; $i++){
                                echo '
                                <tr>
                                    <td>'.$rows[$i]->getId().'</td>
                                    <td>'.$rows[$i]->getPaymentAmount().'</td>
                                    <td>'.$rows[$i]->getCountry().'</td>
                                    <td>'.$rows[$i]->getCity().'</td>
                                    <td>'.$rows[$i]->getDepartmentName().'</td>
                                    <td>'.$rows[$i]->getDepartmentNumber().'</td>
                                    <td>'.$rows[$i]->getFiscalYear().'</td>
                                    <td>'.$rows[$i]->getMinc().'</td>
                                    <td>'.$rows[$i]->getMine().'</td>
                                    <td>'.$rows[$i]->getProvince().'</td>
                                    <td>'.$rows[$i]->getDescription().'</td>
                                    <td>'.$rows[$i]->getAddress().'</td>
                                    <td>'.$rows[$i]->getTotalCurrentYearAmount().'</td>
                                </tr>
                                ';
                            }
                        } else {
                            echo '<tr><td>No Customers in Mailing List</td></tr>';
                        }#end of if

                        echo '</tbody>
                                </table>';
                        
            ?>
            
                <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
</body>
</html>
