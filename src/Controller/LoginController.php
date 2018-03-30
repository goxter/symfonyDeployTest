<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of LoginController
 *
 * @author gmaric
 */
class LoginController {
    //put your code here
    
    public function login()
    {
        return new Response(
            '<html><body>Lucky number: TEST</body></html>'
        );
    }
}
