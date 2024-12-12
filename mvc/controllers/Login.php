<?php

class Login extends Controller
{
    function Show($a)
    {
        $this->view("login", [
            "Page" => $a,
        ]);
    }
    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/live/Home/Show");
    }
}
