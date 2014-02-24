<?php
if ( filter_input(INPUT_POST, 'submit') )
{
	die('<pre>' . print_r($_POST, TRUE) . '</pre>');
}