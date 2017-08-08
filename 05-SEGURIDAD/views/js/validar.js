
//#)- Validación de Registro		| --------------------------------------------------------------------------------------#

	//  Var Globales

	var expresiones = /^[a-zA-Z0-9]*$/;
	var expresionesMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	function validarRegistro(){

		//  Leemos los datos que ingresa el usuario al Form

		var usuario = document.querySelector('#usuarioR').value;
		var password = document.querySelector('#passwordR').value;
		var email = document.querySelector('#emailR').value;
		var terminos = document.querySelector('#terminosR').checked;

		//  Validamos que los campos tengan, datos

		if(usuario != "")
		{
			//  Leemos cuando caracteres a ingresado el usuario.
			var caracUsuario = usuario.length;
			var caracPassword = password.length;
			var caracEmail = email.length;


			console.log(caracUsuario, caracPassword, caracEmail);

			// Validamos que los caracteres sean solo los pemitidos por el desarrolllo
			if(caracUsuario > 10 | caracPassword > 10 | caracEmail > 30)
			{
				document.querySelector('.msnForm').innerHTML += "Lo sentimos acaba de exceder el número máximo de caracteres";
				return false;
			}

			//  Validamos que no existan caracteres especiales dentro del formulario

			if (!expresiones.test(usuario)) {
				document.querySelector('.msnForm').innerHTML += "No puede ingresar caracteres especiales";
				return false;
			}

			if (!expresionesMail.test(email)) {
				document.querySelector('.msnForm').innerHTML += "Lo sentimos, porfavor rebice el nombre de su correo";
				return false;
			}

			//  Validar Términos

			if (!terminos)
			{
				document.querySelector('.msnForm').innerHTML += "Debe aceptar los términos y condiciones";
				document.querySelector('#usuarioR').value = usuario;
				document.querySelector('#passwordR').value = password;
				document.querySelector('#emailR').value = email;


				return false;
			}
		}
		return true;
	}

	//)- End |----------------------------------------------------------------------------------------------------------------#

//#)- Validación de Ingreso		| --------------------------------------------------------------------------------------#

	function validarIngreso()
	{
		var usuario = document.querySelector('#usuarioI').value;
		var password = document.querySelector('#passwordI').value;

		//  Validamos que los campos tengan, datos.

		if(usuario != "")
		{
			//  Leemos cuando caracteres a ingresado el usuario.
			var caracUsuario = usuario.length;
			var caracPassword = password.length;

			// Validamos que los caracteres sean solo los pemitidos por el desarrolllo
			if(caracUsuario > 10 | caracPassword > 10 | caracEmail > 30)
			{
				document.querySelector('.msnForm').innerHTML += "Lo sentimos acaba de exceder el número máximo de caracteres";
				return false;
			}

			//  Validamos que no existan caracteres especiales dentro del formulario

			if (!expresiones.test(usuario)) {
				document.querySelector('.msnForm').innerHTML += "No puede ingresar caracteres especiales";
				return false;
			}

		}
		return true;
	}

//)- End |----------------------------------------------------------------------------------------------------------------#

//#)- Validación Editar Usuario	| --------------------------------------------------------------------------------------#

	function validarEditar(){

		var usuario = document.querySelector('#usuarioE').value;
		var password = document.querySelector('#passwordE').value;
		var email = document.querySelector('#emailE').value;
		// Validamos que los campos tengan datos.
		if(usuario != "")
		{
			//  Leemos cuando caracteres a ingresado el usuario.
			var caracUsuario = usuario.length;
			var caracPassword = password.length;

			// Validamos que los caracteres sean solo los pemitidos por el desarrolllo
			if(caracUsuario > 10 | caracPassword > 10 )
			{
				document.querySelector('.msnForm').innerHTML += "Lo sentimos acaba de exceder el número máximo de caracteres";
				return false;
			}

			//  Validamos que no existan caracteres especiales dentro del formulario

			if (!expresiones.test(usuario)) {
				document.querySelector('.msnForm').innerHTML += "No puede ingresar caracteres especiales";
				return false;
			}
			if (!expresionesMail.test(email)) {
				document.querySelector('.msnForm').innerHTML += "Lo sentimos, porfavor rebice el nombre de su correo";
				return false;
			}
		}
		return true;
	}

//)- End |----------------------------------------------------------------------------------------------------------------#