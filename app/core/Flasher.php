<?php

class Flasher
{
    public static function setFlashdata($key, $message, $color)
    {
        $_SESSION['flashdata'] = [
            'key' => $key,
            'message' => $message,
            'color' => $color,
        ];
    }
    public static function getFlashdata()
    {
        if (isset($_SESSION['flashdata'])) {
            echo '<div class="alert alert-' . $_SESSION['flashdata']['color'] . ' alert-dismissible fade show" role="alert">
                    Data Berhasil ' . $_SESSION['flashdata']['message'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            unset($_SESSION['flashdata']);
        }
    }
}
