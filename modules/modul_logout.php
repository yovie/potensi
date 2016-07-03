<?php

	if(!defined( "APPLICATION_BASE" )) die( "Error" );
	
	remove_session();
	
	redirect( "login" );