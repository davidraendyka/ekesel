<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>e-KeSel - Login</title>
<link href="assets/style/style.css" rel="stylesheet" type="text/css">
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/function.js" type="text/javascript"></script>
</head>
<body>
<div class="tes">
  
    <table class="table-content-wrapper">
      <tbody>
        
        <tr>
          <td width="28%" height="79" ></td>
          <td width="47%">&nbsp;</td>
          <td width="25%">
          </td>
        </tr>
        <tr>
			<td height="516" colspan="3"><div class="content-body">
				<a href="index.php"><img src="assets/image/logo.png" width="160px" height="80px" alt="" class="logolog"/></a>
			  <div class="content-body-in">
			    <br>Login<br>
                            <form action="login-proccess.php" method="post" name="loginform">
                            <table class="tabel-input-login" width="80%" border="0">
			    <tbody>
			      <tr>
			        <td><select class="input-select" name="select-login-type">
						<option value="admin">Administrator</option>
						<option value="guru">Teacher</option>
						<option value="siswa">Student</option>
						</select></td>
		          </tr>
			      <tr>
                                  <td><input type="text" name="input-login-username" class="input-text" placeholder="Username" autocomplete="off"></td>
		          </tr>
			      <tr>
			        <td><input type="password" name="input-login-password" class="input-text" placeholder="Password" autocomplete="off"></td>
		          </tr>
					<tr>
			        <td style="padding-top: 10px;"><input type="submit" name="submit-login" class="submit-button" value="Login"></td>
		          </tr>
		        </tbody>
		      </table>
                            </form>
			  </div>
			</div></td>
        </tr>
        <tr>
          <td height="54">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </tbody>
      </table>
		</div>


</body>
</html>