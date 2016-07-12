<?php
/**
 * Created by PhpStorm.
 * User: Galux
 * Date: 6/7/2016
 * Time: 10:12 μμ
 */

    function checkCredentials($user,$pass)
    {
        $mysql_host = 'gstam.ddns.net';
        $mysql_user = 'hloukas';
        $mysql_password = 'hloukas1';
        $connect = mysqli_connect($mysql_host,$mysql_user,$mysql_password) or die("Oops! Something went wrong!");

        $text = "Hello World!<br/>";

        echo $text;

        $query = "SELECT * FROM orderSys.Credentials";
        $result = $connect->query($query);

        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                if(($row["username"]==$user) and ($row["password"]==$pass))
                {
                    echo "Hello " . $user . "!<br/>";
                    return 1;
                }
                else
                {
                    echo "Not you.<br/>";
                }
            }

            echo "I don't know who you are.<br/>";
            return 0;
        }
        else
        {
            echo "No registered users!<br/>";
            return 0;
        }
    }

    

    checkCredentials("aggelos", "aggelos1");
?>