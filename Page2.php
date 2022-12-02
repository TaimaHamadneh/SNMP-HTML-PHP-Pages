<!Doctype Html>  
<Html>     
<?php
/*
Page 2:
-Display the content of the ipAddrTable and the ipNetToMediaTable

***********************************
Note : If u use the xamPP Control Panel this file should be in htdocs folder , But If u use the wampserver64 this file should be in WWW folder .

*/
$ipNetToMediaIfIndex = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.1");
$ipNetToMediaPhysAddress = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.2");
$ipNetToMediaNetAddress= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.3");
$ipNetToMediaType= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.4");

$ipAdEntAddr= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.20.1.1");
$ipAdEntIfIndex= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.20.1.2");
$ipAdEntNetMask= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.20.1.3");
$ipAdEntBcastAddr= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.20.1.4");
$ipAdEntReasmMaxSize= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.20.1.5");
?>
<Head>      
<Title>     
IP
</Title>  
<style type=text/css>   
body   
{  
height: 125vh;  
margin-top: 80px;  
padding: 30px;  
background-size: cover;  
font-family: Georgia, serif;

}  
h2{
    font-family: Georgia, serif;
}
header {  
  
background-color: #850E35;  
position: fixed;  
left: 0;  
right: 0;  
top: 10px;  
height: 40px;  
display: flex;  
align-items: center;  
box-shadow: 0 0 50px 0 #9E7676;  
width: 100%;
justify-content: space-between;
}  
header * {  
display: inline;  
}  
header li {  
margin: 20px;  
}  
header li a {  
color: White;  
text-decoration: none;  

}  
header li a:hover{
 
  text-decoration: underline;  

}

#inf { 
    width: 100%;
	border-radius: 7px;
    cursor: pointer;
  }

#inff {
    width: 100%;
    border-radius: 7px;
    cursor: pointer;
}
    #inf td, #inf th {
            border: 1px #850E35;
            padding: 8px;
        }

#inff td, #inff th {
    border: 1px #04AA6D;
    padding: 8px;
}
    #inf tr:nth-child(even)
    {background-color: #850E35;
    }
#inff tr:nth-child(even){background-color: #850E35;}
    #inf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: #850E35;
			background-color:#f1f1f1;
			border-color:white;
			text-align:center;
        }


#inff th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    color: #850E35;
    background-color:#f1f1f1;
    border-color:white;
    text-align:center;
}
</style>   
</Head>  
<Body>   
<header>  
<nav>  
<ul>  
<li>  
    <a href="page1.php" style="color:White" id="page1">System Group </a>  
</li>  
<li>  
<a href="page2.php" style="color:White" id="page2"> IP Address & IP Net To Media </a>  
</li>  
<li>  
<a href="page3.php" style="color:White" id="page3"> TCP Connection </a>  

</ul>  
</nav>  
</header>
<h2 algin="center">
    IP Address Table
</h1>
<table id="inff">
    <tr>
        <th>Index</th>
        <th>ipAdEntAddr</th>
        <th>ipAdEntIfIndex</th>
        <th>ipAdEntNetMask</th>
        <th>ipAdEntBcastAddr</th>
        <th>ipAdEntReasmMaxSize</th>
    </tr>

    <?php
    for($i = 0; $i < count($ipAdEntIfIndex); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $i?></td>
            <td><?php echo $ipAdEntAddr[$i]?></td>
            <td style="text-align:center;"><?php echo $ipAdEntIfIndex[$i]?></td>
            <td style="text-align:center;"><?php echo $ipAdEntNetMask[$i]?></td>
            <td style="text-align:center;"><?php echo $ipAdEntBcastAddr[$i]?></td>
            <td style="text-align:center;"><?php echo $ipAdEntReasmMaxSize[$i]?></td>
        </tr>


        <?php
    }
    ?>

</table>




<h2 algin="center">
IP Network To Media Table
</h1>

 <table id="inf">
            <tr>
                <th>Index</th>
                <th>ipNetToMediaIfIndex</th>
			    <th>ipNetToMediaPhysAddress</th>
                <th>ipNetToMediaNetAddress</th>
                <th>ipNetToMediaType</th>

            </tr>

            <?php
            for($i = 0; $i < count($ipNetToMediaIfIndex); $i++)
            {
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo $i?></td>
                    <td style="text-align:center;"><?php echo $ipNetToMediaIfIndex[$i]?></td>
                    <td style="text-align:center;"><?php echo $ipNetToMediaPhysAddress[$i]?></td>
                    <td style="text-align:center;"><?php echo $ipNetToMediaNetAddress[$i]?></td>

                    <td style="text-align:center;"><?php echo $ipNetToMediaType[$i]?></td>
                </tr>


                <?php
            }
            ?>

        </table>



</Body>   
</Html>  
</Html>  