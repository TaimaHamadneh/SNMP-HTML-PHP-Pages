<!Doctype Html>  
<Html>     
<?php
/*
Page1:
- Display the contents of all of the System Group
- The sysContact and the sysLocation should be editable (Changeable). Provide a page
or a section to change the values

***********************************
Note : If u use the xamPP Control Panel this file should be in htdocs folder , But If u use the wampserver64 this file should be in WWW folder .


*/
 $ip="127.0.0.1:161";
if (isset($_POST['location']) || isset($_POST['contact']))
{   
  snmp2_set($ip,"public","1.3.6.1.2.1.1.6.0","s",$_POST['location']);
  snmp2_set($ip,"public","1.3.6.1.2.1.1.4.0","s",$_POST['contact']);
}
?>

	<?php
    $desc = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.1.0");
    $id = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.2.0");
    $time=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.3.0");
    $name=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.5.0");
    $location=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.6.0");
    $contact=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.4.0");
    ?>

<Head>      
<Title> 
      
System Information
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




form {
  
  border: 3px solid #EE6983;
}

input[type=text]{
  width: 100%;
  padding: 10px 15px;
  margin: 5px 0;
  display: inline-block;
  border: 1.5px solid #EE6983;
  box-sizing: border-box;
  box-shadow: #EE6983;
}
button {
  background-color: #850E35;
  color: white;
  padding: 14px 15px;
  margin: 5px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.9;
  box-shadow:#9E7676;
}

.container {
  padding: 16px;
 
}
#inf { 
  width: 100%;
	border-radius: 7px;
  cursor: pointer;
}
#inf td, #inf th {
            border: 1px #EE6983;
            padding: 8px;
        }

#inf tr:nth-child(even)
    {background-color: #850E35;
    color :white;
}


#inf th {
  padding-top: 10px;
  padding-bottom: 12px;
  text-align: left;
  color: #594545;
  background-color:#f1f1f1;
  border-color:white;
  text-align:left;
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

<h3>Contacts of the System Group ...</h1>

<div style="height:320px;width:100%;">
        <table id="inf">
             <tr>
                <th>Information about System Group</th>
                <th>Information</th>
            </tr>
            <tr>
                <td>SysDescr</td>
                <td><?php echo $desc?></td>
            </tr>
            <tr>
                <td>SysObjectID</td>
                <td><?php echo $id?></td>
            </tr>
            <tr>
                <td>SysUpTime</td>
                <td><?php echo $time?></td>
            </tr>
            <tr>
                <td>SysContact</td>
                <td><?php echo $contact?></td>
            </tr>
            <tr>
                <td>SysName</td>
                <td><?php echo $name?></td>
            </tr>
            <tr>
                <td>SysLocation</td>
                <td><?php echo $location?></td>
            </tr>
        </table>
    </div>
    <form action="page1.php" method="post">
      <div class="container">
        <label for="Contact"><b>System Contact</b></label>
        <input type="text" placeholder="Enter Contact Name" name="contact">
    
        <label for="psw"><b>System Location</b></label>
        <input type="text" placeholder="Enter Location" name="location">
    
        <button type="submit">Submit</button> 
      </div>
    </form>
    

</Body>   
</Html>