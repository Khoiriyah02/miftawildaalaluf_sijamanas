<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/uts_oop/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'Sarpras', 'link' => $base . 'data_sarpras'),
            array('text' => 'Request peminjaman', 'link' => $base . 'Datarequest'),
            array('text' => 'User', 'link' => $base . 'User')
        ];
        return $data;
    }
}
