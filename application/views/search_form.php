<html> 
<head>
<style>
/* Elegant Aero */
.elegant-aero {
    margin-left:auto;
    margin-right:auto;

    
    background: #D2E9FF;
    padding: 20px 20px 20px 20px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #666;
}
.elegant-aero h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 10px 10px 10px 20px;
    display: block;
    background: #C0E1FF;
    border-bottom: 1px solid #B8DDFF;
    margin: -20px -20px 15px;
}
.elegant-aero h1>span {
    display: block;
    font-size: 11px;
}

.elegant-aero label>span {
    float: left;
    margin-top: 10px;
    color: #5E5E5E;
}
.elegant-aero label {
    display: block;
    margin: 0px 0px 5px;
}
.elegant-aero label>span {
    float: left;
    width: 20%;
    text-align: right;
    padding-right: 15px;
    margin-top: 10px;
    font-weight: bold;
}

</style>
</head>
<body>
<font size="3" color="red">
<?php if($this->session->flashdata('status')): echo $this->session->flashdata('status'); endif; ?> </font>
<fieldset>
    <legend><h1>IPGSD query form:</h1></legend>
<!-- <form class="elegant-aero" name="input" action="http://10.10.10.226/dev/index.php/ipgsd/start" method="POST">   -->
<form class="elegant-aero" name="input" action="http://localhost/ipgsd_query/index.php/ipgsd/start" method="POST">
<strong>Account#: (8 DIGITS, NO DASHES or SPACES) </strong> <input type="text" name="account_num"><br><br> 
<strong>Date Range:</strong>
From: (dd/mm/yy)
<select name="from_day">

<?php
$i = 1;
while ($i <= 31 ) {print "<option value=".$i.">".$i."</option>";
$i++;}


 ?>

</select>

<select name="from_month">
<?php
$i = 1;
while ($i <= 12 ) {print "<option value=".$i.">".$i."</option>";
$i++;}


 ?>

</select>

<select name="from_year">
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>
To:
<select name="to_day">

<?php
$i = 1;
while ($i <= 31 ) {print "<option value=".$i.">".$i."</option>";
$i++;}


 ?>

</select>

<select name="to_month">
<?php
$i = 1;
while ($i <= 12 ) {print "<option value=".$i.">".$i."</option>";
$i++;}


 ?>

</select>

<select name="to_year">
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>
<br><br>
Report:


<select name="report">
<option value="1">CASH FLOW</option>
<option value="2">INTEREST & DIVIDENDS</option>
<option value="3">JOURNALS, ADVISORY FEES AND OTHER FEES</option>
<option value="4">ALL TRANSACTIOEN</option>
</select>
<br><br>
<input type="submit" value="Submit">
</fieldset>
</form>
</body>
</html>
