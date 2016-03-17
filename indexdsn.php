<?php
$data_source='sqlconn';
$user='directorio';
$password='Directori0';

$conn=odbc_connect($data_source,$user,$password);
if (!$conn){
    if (phpversion() < '4.0'){
      exit("Connection Failed: . $php_errormsg" );
    }
    else{
      exit("Connection Failed:" . odbc_errormsg() );
    }
}

$sql="SELECT * FROM V_PASS_NOM";

$rs=odbc_exec($conn,$sql);

if (!$rs){
    exit("Error in SQL");
}
while (odbc_fetch_row($rs)){
    $col1=odbc_result($rs, "nombre");
    echo "$col1\n";
}

odbc_close($conn);
?>