<!DOCTYPE html>
<html lamg="en">
<head>
<style>
body {
   body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}
.contact_form h2, .contact_form label {font-family:Georgia, Times, "Times New Roman", serif;}
.form_hint, .required_notification {font-size: 11px;}
}

A:link {text-decoration: none}
A:visited {text-decoration: none}
A:active {text-decoration: none}
A:hover {text-decoration: underline; color: red;}


h1 {
    color: maroon;
    margin-left: 40px;
}

#container {
//width: 600px;
margin: auto;
}
table {
  width: 100%;
  border: 1px solid #000;
}

th {
	font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color: #6D929B;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA url(images/bg_header.jpg) no-repeat;
}
td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #6D929B;
}
div.pagination
{
    padding: 3px 0px 3px 3px;
    margin: 3px 0px 3px 3px;
    float:right;
    font-family:'PT Sans', sans-serif;
}

div.pagination a
{
   
    background-color: #E6E6E6;
    border-color: #C7C7C7 #B2B2B2 #B2B2B2 #C7C7C7;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.6) inset, 0 2px 5px rgba(255, 255, 255, 0.5) inset, 0 -2px 5px rgba(0, 0, 0, 0.1) inset;
    color: #555555;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);
    border-radius: 4px 4px 4px 4px;   
    font-size: 14px;
    padding: 8px 8px;
    border:1px solid #C7C7C7;
    background-repeat: no-repeat;
    margin:1px;
    text-shadow:0px 1px 0 #ffffff;
    font-weight: 700;
    background:#f1f1f1;    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f1f1f1', endColorstr='#e8e8e8');
    background:-webkit-gradient(linear, left top, left bottom, from(#f1f1f1), to(#e8e8e8));
    background:-moz-linear-gradient(top,  #f1f1f1,  #e8e8e8);
    background:-o-linear-gradient(top,  #f1f1f1,  #e8e8e8);
    font-family:'PT Sans', sans-serif;   
    font-size: 11px;
    min-height: 22px;
    min-width: 8px;
    outline: 0 none;  
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: baseline;
    white-space: pre-line;
}


div.pagination a:hover, div.pagination a:active
{
    background-color: #C7C7C7;
    border-color: #C7C7C7 #B2B2B2 #B2B2B2 #C7C7C7;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.6) inset, 0 2px 5px rgba(255, 255, 255, 0.5) inset, 0 -2px 5px rgba(0, 0, 0, 0.1) inset;
    color: #555555;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);
    border-radius: 4px 4px 4px 4px;   
    font-size: 14px;
    padding: 9px 8px;
    color:#353535;
    text-shadow:0px 1px 0 #ffffff;
    font-weight: 700;
    background:#E6E6E6;    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#E6E6E6', endColorstr='#000000');
    background:-webkit-gradient(linear, left top, left bottom, from(#E6E6E6), to(#E6E6E6));
    background:-moz-linear-gradient(top,  #E6E6E6,  #E6E6E6);
    background:-o-linear-gradient(top,  #E6E6E6,  #E6E6E6);
    font-family:'PT Sans', sans-serif;   
    font-size: 11px;
    min-height: 22px;
    min-width: 8px;
    outline: 0 none;  
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: baseline;
    white-space: pre-line;
}


</style>
</head>
<body>
<div id="container">
<?php
/* Modifications and Notes
*    1. Change Account # - 10 fieled to Account8
*    
*
*
*
*
 */

echo "[".'Total number of records found:  ' . $num_rows. "]";
?>

<p>
<?php
echo anchor('ipgsd', 'Back to query form', 'title="Search"');
?> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
echo anchor('ipgsd/csvgenerator', '[CSV Format]', 'title="Search"');
?>
</p>
<div class="pagination">
<?php
echo $links;
?>
</div>
<?php
echo br(3);
echo $this->table->generate($q);
echo br(3);
 










?>
</div>
</body>

