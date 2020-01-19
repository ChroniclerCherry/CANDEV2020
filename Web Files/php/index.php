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
                    <select name="search" id="search_bar">
                        <option value="Agriculture And Agri-Food">Agriculture and Agri-Food</option>
                        <option value="Canadian Food Inspection Agency">Canadian Food Inspection Agency</option>
                        <option value="Atlantic Canada Opportunities Agency">Atlantic Canada Opportunities Agency</option>
                        <option value="Canada Revenue Agency">Canada Revenue Agency</option>
                        <option value="National Film Board">National Film Board</option>
                        <option value="Office of the Co-ordinator - Status of Women">Office of the Co-ordinator - Status of Women</option>
                        <option value="Canadian Heritage">Canadian Heritage</option>
                        <option value="Library and Archives of Canada">Library and Archives of Canada</option>
                        <option value="Citizenship And Immigration">Citizenship and Immigration</option>
                        <option value="Economic Development Agency of Canada">Economic Development Agency of Canada</option>
                        <option value="Environment">Environment</option>
                        <option value="Canadian Environmental Assessment Agency">Canadian Environmental Assessment Agency</option>
                        <option value="Parks Canada Agency">Parks Canada Agency</option>
                        <option value="Finance">Finance</option>
                        <option value="Financial Transactions and Reports Analysis Centre">Financial Transactions and Reports Analysis Centre</option>
                        <option value="Fisheries and Oceans">Fisheries and Oceans</option>
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
            if (!isset($_GET['search'])){
                $rows = $DAO->getDepartments();
            } else {
                $rows = $DAO->getByDepartment($_GET['search']);
            }
                echo '<table>'.
                        '<thead>'.
                            '<tr>'
                            .
                            '<th>ID</th>
                             <th>PA</th>
                             <th>COUNTRY</th>
                             <th>CITY</th>
                             <th>DEP NAME</th>
                             <th>DEP NUM</th>
                             <th>FSCL YR</th>
                             <th>MINC</th>
                             <th>MINE</th>
                             <th>PROV</th>
                             <th>DESC</th>
                             <th>ADDRESS</th>
                             <th>TCYA</th>
                             </tr>
                        </thead>
                        <tbody>';
                        if ($rows[0] != null){
                            for ($i = 0; $i < 25; $i++){
                                if ($i < count($rows)){
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
                                } else {
                                break;
                                }
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
