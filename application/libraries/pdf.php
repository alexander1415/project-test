<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf {

    var $_dompdf = NULL;

    function __construct() {
        require_once("dompdf/dompdf_config.inc.php");
        spl_autoload_register('DOMPDF_autoload');
        if (is_null($this->_dompdf)) {
            $this->_dompdf = new DOMPDF();
        }
    }

    function generar_pdf($html, $filename = '', $stream = TRUE) {
        $this->_dompdf->load_html($html);
        $this->_dompdf->render();
        if ($stream) {
            $this->_dompdf->stream($filename);
        } else {
            return $this->_dompdf->output();
        }
    }

}