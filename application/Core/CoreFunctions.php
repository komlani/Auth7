<?php

namespace Auth7\Controller;

function view(string $file, array $data = []){
    extract($data);
    require sprintf('%sView/%s.php', APP, $file);
}

function redirect($path) {
    header('location: ' . URL . $path);
}