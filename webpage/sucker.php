<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php

$sName = $_POST["name"];
$sSection = $_POST["section"];
$sCredit = $_POST["CreditCard"];
$sType = $_POST["cardType"];


if(empty($_POST["name"]) ||  empty($_POST["section"])|| empty($_POST["CreditCard"]) || empty( $_POST["cardType"]))
{
    ?>
<h1> Sorry </h1>
<p> You didnt fill out the form completely. <a href="buygrade.html">Try again?</a></p>


<?php
}
 else {
?>



<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd> <?= $_POST["name"]?> </dd>

    <dt>Section</dt>
    <dd><?= $_POST["section"]?></dd>

    <dt>Credit Card</dt>
    <dd><?= $_POST["CreditCard"]?>  (  <?=$_POST["cardType"]?>)</dd>
</dl>

<?php


file_put_contents("suckers.txt","\n".$sName.";",FILE_APPEND );
file_put_contents("suckers.txt",$sSection.";",FILE_APPEND );
file_put_contents("suckers.txt",$sCredit.";",FILE_APPEND );
file_put_contents("suckers.txt",$sType.";",FILE_APPEND );

?>

<p> Here Are All the suckers who have submitted here </p>
    <pre>
        <?php
        $txtData = file("suckers.txt" );
        foreach ($txtData as $sucker) {
            print_r($sucker);
        }
        ?>
    </pre>

    <?php
 }
    ?>




</body>
</html>