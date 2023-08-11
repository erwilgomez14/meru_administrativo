<?php
// Rutas de las imagenes 
    $logos = public_path('img/fondonorma.jpg');
    $logos = "data:image/png;base64," . base64_encode(file_get_contents($logos));

?>