<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hypervisor;

/**
 * Description of HypervisorController
 *
 * @author gmaric
 */
class HypervisorController extends Controller {

    //put your code here /{description}/{isdefault}/{isshared}/{type}/{identifier}/{pool}

    /**
     * @Route("/hypervisor/setHypervisorData", name="apiHypervisor", methods={"POST"})
     */
    public function setHypervisorData(Request $request){//$name, $description, $isdefault, $isshared, $type, $identifier, $pool) { 
       
        $entityManager = $this->getDoctrine()->getManager();

        $hypervisor = new Hypervisor();
        //$hypervisor->setValues($request->get('name'), $request->get('description'), $request->get('isdefault'), $request->get('isshared'), $request->get('type'), $request->get('identifier'), $request->get('pool'));
        $hypervisor->setValues($request->request->get('name'), $request->request->get('description'), $request->request->get('isdefault'), $request->request->get('isshared'), $request->request->get('type'), $request->request->get('identifier'), $request->request->get('pool'));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($hypervisor);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response($request->request->get('name'));
    }
    
    /**
     * @Route("/hypervisor/send", name="snedReq")
     */
    public function sendPost(){
    // set post fields
        $post = [
            'name' => 'Name2',
            'description' => 'Description2',
            'isdefault'   => 1,
            'isshared'   => 1,
            'type'   => 1,
            'identifier'   => 'Identifier2',
            'pool'   => 'Pool2',
        ];

        $ch = curl_init('http://local.symfony-test:8080/hypervisor/setHypervisorData');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response
        return new Response($response);
    }
}
