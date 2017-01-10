<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
	<head>
		<title>APInfo App</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<style rel="stylesheet" type="text/css">
			body 		{ padding: 0; margin: 0; background: #f1f1f1; font: 12px Calibri, Arial; }
			label 		{ display: block; margin-top: 30px; clear: both; }
			textarea 	{ width: 700px; height: 350px; padding: 5px; }
			button 		{ border: 1px #ccc solid; padding: 2px 10px; font-weight: bold; color: #666; font-size: 11px; margin: 5px 0; cursor: pointer; margin-left: 10px; }
			form 		{ margin-bottom: 30px; display: block; overflow: hidden; }
			
			.right		{ float: right; }
			.count		{ background: #666; color: #fc0; display: block; float: left; font-size: 15px; font-weight: bold; padding: 5px; display: none; }
			
			#content	{ width: 710px; margin: 15px auto; }
		</style>
		<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
		<script language="javascript">
			$(function(){
				
				// Limpa o HTML -> Devolve os E-mails
				$("#filter").click(function(eve){
					eve.preventDefault();
					var $out = $("#code").val().match(/mailto:[^"?]+/g);
					$out = $out.toString().replace(/mailto:/g, "").replace(/,/g, ", ");
					
					$("#codeOut").val(decodeURI($out));
				});
				
				// Combina os e-mails da Lista atual com os novos e devolve uma lista
				$("#okMails").click(function(eve){
					eve.preventDefault();
					
					var $outConc = concatArrs();
					$("#resultMails").val($outConc.unique().toString().replace(/,/g, ", ").replace(/[\s]+/g," ").toLowerCase());

					$(".count").text($outConc.unique().length + " e-mails.").fadeIn();
				});
				
				// Mostra os e-mails repetidos
				$("#filterMails").click(function(eve){
					eve.preventDefault();
					
					var $outConc = concatArrs();
					$("#resultMails").val($outConc.showDuplicated().toString().replace(/,/g, ", ").toLowerCase());
					
				});
				
				$(".clear_all").click(function(eve){
					eve.preventDefault();
					$("form")[0].reset();
				});
			});
			
			// Concatena as Listas
			function concatArrs(){
				var $actual	 = $("#actualMails").val().match(/[\._\-\w\d]+[@][\._\-\w\d]+.*[a-z]+.[a-z]+/g).toString().split(",");
				var $codeOut = $("#codeOut").val().split(", ");
				var $out 	 = $actual.concat($codeOut);
				return $out;
			}
			
			//exibe os itens duplicados do Array 
			Array.prototype.showDuplicated = function(a){
				return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)>=0
			});
			
			//remove os itens duplicados do Array - a:valor / b:posicao / c:array
			Array.prototype.unique = function(a){
				return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
			});

		</script>
	</head>
	<body>
		<div id="content">
			<form name="myform">
				<button class="clear_all right">Limpar Campos</button>
				
				<label for="code">HTML da Página:</label>
				<textarea id="code"></textarea>
				<button id="filter" class="right">Filtrar</button>
				
				<br clear="all" />
				
				<label for="codeOut">Resultado 01:</label>
				<textarea id="codeOut"></textarea>
				
				<br clear="all" />
				<h3>Tratamento de E-mails repetidos</h3>
				
				<label for="actualMails">Lista atual de E-Mails:</label>
				<textarea id="actualMails"></textarea>
				
				<button id="okMails" class="right">Processar Lista de E-mails</button>
				<button id="filterMails" class="right">Mostrar Repetidos</button>
				<button class="clear_all right">Limpar Campos</button>
				
				<label for="resultMails">Resultado:</label>
				<textarea id="resultMails"></textarea>
				<div class="count"><!-- 221 e-mails. --></div>
				
				<button class="clear_all right">Limpar Campos</button>
			</form>
		</div>
	</body>
</html>