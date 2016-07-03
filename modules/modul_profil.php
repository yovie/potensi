<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	