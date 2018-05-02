<?php
		$conn = new mysqli('localhost','root','xixi1996@','dypj');
        if (mysqli_connect_errno()) {
            echo "数据库连接失败:".mysql_connect_errno();
            exit;
        }
?>