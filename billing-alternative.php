<?php
    require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo APP_NAME ?>:Dirección de Envio</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Inicio</a></li>
  <li><a href="foodzone.php">Menu</a></li>
  <li><a href="specialdeals.php">Ofertas Especiales</a></li>
  <li><a href="member-index.php">Mi Cuenta</a></li>
  <li><a href="contactus.php">Contactanos</a></li>
  </ul>
  </div>
<div id="header">
  <div id="logo"> <a href="index.php" class="blockLink"></a></div>
  <div id="company_name"><?php echo APP_NAME ?> Restaurante</div>
</div>
<div id="center">
<h1>Dirección de Envio</h1>
<hr>
<p>Descubrimos que no tiene una dirección de facturación en su cuenta. Agregue una dirección de facturación en el formulario a continuación. Es la misma dirección que se utilizará para entregar sus pedidos de comida. Tenga en cuenta que SOLO se deben utilizar direcciones físicas / postales correctas para garantizar la entrega sin problemas de sus pedidos de alimentos. Para más información <a href="contactus.php">Click Here</a> to Contactanos.</p>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<form id="billingForm" name="billingForm" method="post" action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return billingValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
  <CAPTION><h3>AÑADIR DIRECCIÓN DE ENTREGA / FACTURACIÓN</h3></CAPTION>
    <tr>
        <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Campos requeridos</td>
    </tr>
    <tr>
      <th>Dirección </th>
      <td><font color="#FF0000">* </font><input name="sAddress" type="text" class="textfield" id="sAddress" /></td>
    </tr>
    <!--<tr>
      <th>P.O. Box No </th>
      <td><font color="#FF0000">* </font><input name="box" type="text" class="textfield" id="box" /></td>
    </tr>-->
    <tr>
      <th>Ciudad </th>
      <td><font color="#FF0000">* </font><input name="city" type="text" class="textfield" id="city" /></td>
    </tr>
    <tr>
      <th width="124">Nº de Celular</th>
      <td width="168"><font color="#FF0000">* </font><input name="mNumber" type="text" class="textfield" id="mNumber" /></td>
    </tr>
    <tr>
      <th>Nº de telefono fijo</th>
      <td>&nbsp;&nbsp;&nbsp;<input name="lNumber" type="text" class="textfield" id="lNumber" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Add" /></td>
    </tr>
</table>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
