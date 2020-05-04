<form action="" method="post" >

  <table  border="0" align="center">

    <tr>

      <td width="215"> Validation code:</td>

      <td width="162">

<?php

$arr= array_merge(range(0,9),range("A","Z"));

//print_r($arr);

for($i=1;$i<=5;$i++)

{
	$ch = $arr[array_rand($arr)];

	@$captcha=$captcha.$ch;

	@$fc=$fc.$ch.",";

}

//echo $fc."<br>";
$nar = explode(",",$fc);

for($i=0;$i<5;$i++)

{

echo $nar[$i];
//echo "<img src='$nar[$i].GIF'/>";

}

if(isset($_POST['match']))

{

    if($_POST['img']==$_POST['hid'])

     {

      echo  "<br/><font color='blue'>security code matched</font>";

     }

    else

    {

	echo "<br/><font color='red'> try again</font>";

    }

}

?>

    <tr>

        <td>Enter the  above code here :</td>

       <td> <input name="img" type="text">

        </td>

    </tr>

    <tr>

      <td colspan="2" align="center">

	  <input name="match" type="submit"  value="Submit Security code"></td>

    </tr>

  </table>

<input type="hidden" value="<?php echo $captcha; ?>" name="hid"/>

</form>

</pre>

</div><br/>
