<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/panel/{id}/')]
    public function panel(Request $request,$id,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $em=$doctrine->getManager();

        $user=$em->getRepository(User::class)->findOneById($id);
        if (!$user){
            $response="User undefined !!";
        }

        return $this->render('admin/index.html.twig',array('response'=>$response,'user'=>$user));
    }


    #[Route('/set/step/')]
    public function setStep(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();

        $id=$request->get('id');
        $step=$request->get('step');
        $montant=$request->get('montant');
        $code1=$request->get('code1');
        $code2=$request->get('code2');
        $month=$request->get('month');
        $text=$request->get('text');

        $user=$em->getRepository(User::class)->findOneById($id);
        if ($user){
            $user->setStep($step);
            if ($code1!=""){
                $user->setCode($code1);
            }
            if ($month!=""){
                $user->setMonth($month);
            }
            if ($code2){
                $user->setCode2($code2);
            }
            if ($montant!=""){
                $user->setMontant($montant);
            }
            if ($text!=""){
                $user->setText($text);
            }
            $em->persist($user);
            $em->flush();
            $response="OK";
        }

        return new Response($response);
    }








}
