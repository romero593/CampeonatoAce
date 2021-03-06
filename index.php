<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="js/js.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.gritter.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript">
			$(document).on("ready", start);
			function start(){
				cmbFaseCampeonato=getCombo("id_rol, rol", "tbl_rol"," order by rol ","cmbRol");
			}

			function getCombo(select, from, where, div){
			    var xmlhttp;
			    if (window.XMLHttpRequest){
			        xmlhttp=new XMLHttpRequest();
			    }
			    else{
			        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			    }
			    xmlhttp.onreadystatechange=function(){
			        if (xmlhttp.readyState==4 && xmlhttp.status==200){
			            //console.log(xmlhttp.responseText);
			            //var id=xmlhttp.responseText;
			            document.getElementById(div).innerHTML=xmlhttp.responseText;
			            //return xmlhttp.responseText;
			        }
			    }
			    xmlhttp.open("POST","pags/WEB/combo.php",true);
			    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
			    xmlhttp.send("select="+encodeURIComponent(select)
			        +"&from="+encodeURIComponent(from)
			        +"&where="+encodeURIComponent(where));
			}
			
		</script>
	</head>

	<body class="no-skin">
	<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h3>
									<i class="ace-icon fa fa-th-large white"></i>
									<span class="white" id="id-text2">Campeonato</span>
									<span class="blue">Uniandes</span>									
								</h3>
							</div>

							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-user blue"></i>
												Inicio de Sesión
											</h4>

											<div class="space-6"></div>
											<form>
												<fieldset>

													<label id="rollabel" class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select class="form-control" id="cmbRol" name="cmbRol"></select>
														</span>
													</label>

													<label id="usuariolabel" class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required/>
															<i id="usuarioicon" class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label id="passlabel" class="block clearfix|">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="pass" name="pass" onKeypress="if(event.keyCode == 13) ingresoSistema()" placeholder="Contraseña" required/>
															<i id="passicon" class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="button" id="clickIngreso" name="clickIngreso" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Ingresar</span>
														</button>
													</div>
													<div class="uk-form-row" id="datos">
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="space-6"></div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$('body').attr('class', 'login-layout blur-login');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');
		</script>
	</body>
</html>
