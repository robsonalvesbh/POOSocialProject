<?php

/**
 * Função de Autoload, sempre que algum arquivo tenta estanciar um objeto
 * O new dispara o autoload que tenta fazer o require da classe de forma automatica
 *
 * Nesta função tentamos fazer a inclusão de classes que estão dentro da pasta APP, CORE e OUTPUT
 */
spl_autoload_register(function ($class_name) {

	try {
		if ( file_exists( Constantes::PATH_APP . $class_name . ".php" ) )
			require_once( Constantes::PATH_APP . $class_name . ".php" );
		else if ( file_exists( Constantes::PATH_CORE . $class_name . ".php" ) )
			require_once( Constantes::PATH_CORE . $class_name . ".php" );
		else if ( file_exists( Constantes::PATH_DB . $class_name . ".php" ) )
			require_once( Constantes::PATH_DB . $class_name.".php" );
		else if ( file_exists( Constantes::PATH_OUTPUT . $class_name . ".php" ) )
			require_once( Constantes::PATH_OUTPUT . $class_name . ".php" );
	} catch (Exception $e) {
		Resposta::enviar( array("status" => 500, "mensagem" => $e->getMessage()) );
	}

});