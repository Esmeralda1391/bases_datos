<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExportController extends BaseController
{
    public function index()
    {
        //
    }

    public function exportDatabase()
    {
        // Ruta donde se guardará el archivo de respaldo
        $backupFilePath = WRITEPATH . 'backups/' . date('Y-m-d_His') . '.sql';

        // Comando mysqldump
        $command = "\"C:\Program Files\MySQL\MySQL Server 8.1\bin\mysqldump.exe\" -u esmeralda -p13122002 -h localhost blog > $backupFilePath 2> error.log";



        exec($command, $output, $return); // Agregamos $output y $return

        
        if ($return !== 0) {
            // var_dump($output);
            // log_message('error', 'Error al ejecutar mysqldump: ' . var_export($output, true));
        }
        
        // Descargar el archivo de respaldo
        if (file_exists($backupFilePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($backupFilePath) . '"');
            readfile($backupFilePath);
            exit;
        }
    }
}

