<?php
/*function log_errors($number, $message, $file, $line, $vars)
{
	if (DISPLAY_LOGS) {
		$message_view = "<strong> %s </strong> %s <strong>".$line."</strong> %s <strong>".$file."</strong> &raquo; [".$message."]";
		echo '<div class="alert alert-error">'.sprintf($message_view, TEXT_FATAL_ERROR, TEXT_LINE, TEXT_IN_FILE).'</div>';
	}
	if (WRITE_LOGS) {
		$message_write = "Le ".date('d-m-Y')." à ".date('H:i:s'). "\t\t%s%s ".$line.", %s ".$file."\t\t====>>\t\t[ ".$message." ]\n";
		$fichier =  LOGS."/log_".date("d-m-Y").".log";
		error_log(sprintf($message_write, TEXT_FATAL_ERROR, TEXT_LINE, TEXT_IN_FILE),3,$fichier);
	}
}

set_error_handler('log_errors');*/




?>