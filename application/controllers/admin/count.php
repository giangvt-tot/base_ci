<?php

class Count extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Đếm số file có trong folder
        $fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
        var_dump(iterator_count($fi));
        
        //Liệt kê các file có trong folder
        foreach (new DirectoryIterator(__DIR__) as $file) {
            if ($file->isFile()) {
                print $file->getFilename() . "\n";
            }
        }
    }

}
