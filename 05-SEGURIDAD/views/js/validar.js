function validarRegistro(){

	//  Leemos los datos que ingresa el usuario al Form
	//
	var usuario = document.querySelector('#usuarioR').value;
	var password = document.querySelector('#passwordR').value;
	var email = document.querySelector('#emailR').value;

	//  Validamos que los campos tengan, datos

	if(usuario != "")
	{
		//  Leemos cuando caracteres a ingresado el usuario.
		var caracUsuario = usuario.length;
		var caracPassword = password.length;
		var caracEmail = email.length;

		var expresiones = /^[a-zA-Z0-9]*$/;

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
	}

	return true;
}