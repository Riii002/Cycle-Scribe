<?php
    include_once 'dbConfig.php';
    function filterData(&$str)
    {
        $str = preg_replace("/\t/","\\t", $str);
        $str = preg_replace("/\r?\n/","\\n", $str);
        if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"';
    }

    $fileName = "user-report-data_" . date('Y-m-d') . ".xls";
    $fields = array('User Name','Email','Password','Total Orders','Profile Pic');
    $excelData = implode("\t",array_values($fields)) . "\n";

    $query = $db->query("SELECT u.*,u.userid,u.userName,COUNT(orderId) AS totalOrders FROM tblOrder o INNER JOIN tblUser u on o.userId=u.userid GROUP BY userId ORDER BY totalOrders DESC LIMIT 20;");
    if($query->num_rows > 0)
    {
        while($row = $query->fetch_assoc()){
            $lineData = array(
                            $row['userName'],
                            $row['email'],
                            $row['password'],
                            $row['totalOrders'],
                            $row['profilePic']);  
            $excelData .= implode("\t",array_values($lineData)) . "\n";
        }
    }
    else
    {
        $excelData .= "No records found.." . "\n"; 
    }

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    echo $excelData;

    exit();

?>