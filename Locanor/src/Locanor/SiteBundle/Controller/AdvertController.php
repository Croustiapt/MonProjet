<?php

namespace Locanor\SiteBundle\Controller;

use Locanor\SiteBundle\Entity\client;
use Locanor\SiteBundle\Form\clientType;
use Locanor\SiteBundle\Entity\Voiture;
use Locanor\SiteBundle\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;



class AdvertController extends Controller
{

      public function FormAction(Request $request)
      {

        $Client = new Client();

        $form = $this->get('form.factory')->create(clientType::class, $Client);

         if($request->isMethod('POST'))
         {
          
          $form->handleRequest($request);

          if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $Client->setDateDebut($_GET['dateDebutLocation']);
            $Client->setHeuredebut($_GET['heureDebutLocation']);
            $Client->setDateFin($_GET['dateFinLocation']);
            $Client->setHeureFin($_GET['heureFinLocation']);
            $Client->setvoiture($_GET['voiture']);
            $em->persist($Client);
            $em->flush();

            $Currentemail = $form->getData()->getemail();
           // echo $Currentemail;
 
            return $this->redirectToRoute('locanor_site_Recapitulatif',array('Currentemail'=> $Currentemail));
          }

         }

        return $this->render('LocanorSiteBundle:Advert:form.html.twig',array('form' => $form->createView()));         

      }

      public function addVehiculeAction(Request $request)
      
    {

      if(!$this->get('security.authorization_checker')->isGranted('ROLE_USER')){

        throw new AccessDeniedexception('Accès Réservé aux Modérateurs du Site.');
        
      }

        $voiture = new Voiture();

        $form = $this->get('form.factory')->create(VoitureType::class, $voiture);

         if($request->isMethod('POST'))
         {
          
          $form->handleRequest($request);

          if($form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();

             
             }

           }

            return $this->render('LocanorSiteBundle:Advert:AjouterVehicule.html.twig',array('form' => $form->createView())); 
    }

    public function editImageAction($voitureId)
    {
        $em = $this->getDoctrine()->getManager();

        $voiture = $em->getRepository('LocanorSiteBundle:Voiture')->find($voitureId);

        $voiture->getImage()->setURL('');

        $em->flush();
        return new Response('Image Modifier');
    }

    
    public function HomeAction(Request $request)
    {
        if($request->isMethod('POST'))
        {
          
          $request->request->get('dateDebutLocation', 'dateFinLocation', 'heureDebutLocation', 'heureFinLocation');

        $DateDebut = $_POST['dateDebutLocation'];
        $HeureDebut = $_POST['heureDebutLocation'];
        $DateFin = $_POST['dateFinLocation'];
        $HeureFin = $_POST['heureFinLocation'];

          //var_dump($DateDebut);
         
         return $this->redirectToRoute('locanor_site_Reservation',array('dateDebutLocation'=> $DateDebut,'heureDebutLocation'=>$HeureDebut, 'dateFinLocation'=>$DateFin,'heureFinLocation'=>$HeureFin ));

         }
           
        $contentHome = $this->get('templating')->render('LocanorSiteBundle:Advert:home.html.twig');
        return new Response($contentHome);
    }



    public function AboutAction()
    {

        $content = $this->get('templating')->render('LocanorSiteBundle:Advert:About.html.twig');

        return new Response($content);
    }


        public function NosVehiculesCAction(Request $request,$dateDebutLocation,$heureDebutLocation,$dateFinLocation,$heureFinLocation)
    {

   //var_dump($heureDebutLocation);

        if($request->isMethod('POST'))
        {

          $voiture=$_POST['voiture'];

        return $this->redirectToRoute('locanor_site_Formulaire',array('dateDebutLocation'=> $dateDebutLocation,'heureDebutLocation'=>$heureDebutLocation, 'dateFinLocation'=>$dateFinLocation,'heureFinLocation'=>$heureFinLocation, 'voiture'=>$voiture ));
          }
          
           return $this->render('LocanorSiteBundle:Advert:NosVehicules.html.twig');
    }



               public function RecapitulatifAction($Currentemail)
    {
      
      $repository = $this ->getDoctrine()->getManager()->getRepository('LocanorSiteBundle:client');

        $CurrentUser = $repository->findOneBy(array('email' => $Currentemail));

        if(null===$Currentemail){
          throw new NotFoundHttpException("Probleme de recuperation BDD ");
          
        }

        /* faire condition si jamais le cleint fait retour pour modifier les données rentrées


      else{
            $repository = $this ->getDoctrine()->getManager()->getRepository('LocanorSiteBundle:client');

        $CurrentUser->setEmail()=$_POST['email'];
        $CurrentUser->setName()=$_POST['nom'];
        persist($CurrentUser);

        $repository->flush();


      }


        */

var_dump($CurrentUser);

        $Currentvoiture=$CurrentUser->getVoiture();
        $CurrentDateDebut=date_create($CurrentUser->getDateDebut());
        $CurrentDateFin=date_create($CurrentUser->getDateFin());
        $NbJoursLocation= date_diff($CurrentDateDebut, $CurrentDateFin)->days;

        switch ($Currentvoiture) {
          case 'Sandero':
            if ($NbJoursLocation<=7) {
              $prix= $NbJoursLocation*33;

            }elseif ($NbJoursLocation<=8 && $NbJoursLocation<=15) {
              $prix= $NbJoursLocation*32;

            }elseif ($NbJoursLocation<=16 && $NbJoursLocation<=22) {
              $prix= $NbJoursLocation*30;

            }elseif ($NbJoursLocation<=22 && $NbJoursLocation<=30) {
              $prix= $NbJoursLocation*26;

            }elseif ($NbJoursLocation>30) {
              $prix= $NbJoursLocation*25;

            }
            break;

            case 'Logan':
            if ($NbJoursLocation<=7) {
              $prix= $NbJoursLocation*33;

            }elseif ($NbJoursLocation<=8 && $NbJoursLocation<=15) {
              $prix= $NbJoursLocation*32;

            }elseif ($NbJoursLocation<=16 && $NbJoursLocation<=22) {
              $prix= $NbJoursLocation*30;

            }elseif ($NbJoursLocation<=22 && $NbJoursLocation<=30) {
              $prix= $NbJoursLocation*26;

            }elseif ($NbJoursLocation>30) {
              $prix= $NbJoursLocation*25;

            }
            break;

            case 'i20':
            if ($NbJoursLocation<=7) {
              $prix = $NbJoursLocation*32;

            }elseif ($NbJoursLocation<=8 && $NbJoursLocation<=15) {
              $prix = $NbJoursLocation*30;

            }elseif ($NbJoursLocation<=16 && $NbJoursLocation<=22) {
              $prix = $NbJoursLocation*27;

            }elseif ($NbJoursLocation<=22 && $NbJoursLocation<=30) {
              $prix = $NbJoursLocation*25;

            }elseif ($NbJoursLocation>30) {
              $prix = $NbJoursLocation*24;
            }
            break;

            case 'yaris':
            if ($NbJoursLocation<=7) {
              $prix = $NbJoursLocation*32;

            }elseif ($NbJoursLocation<=8 && $NbJoursLocation<=15) {
              $prix = $NbJoursLocation*30;

            }elseif ($NbJoursLocation<=16 && $NbJoursLocation<=22) {
              $prix = $NbJoursLocation*27;

            }elseif ($NbJoursLocation<=22 && $NbJoursLocation<=30) {
              $prix = $NbJoursLocation*25;

            }elseif ($NbJoursLocation>30) {
              $prix = $NbJoursLocation*24;
            }
            break;

          case 'i10t':
                        if ($NbJoursLocation<=7) {
              $prix= $NbJoursLocation*27;

            }elseif ($NbJoursLocation<=8 && $NbJoursLocation<=15) {
              $prix = $NbJoursLocation*25;

            }elseif ($NbJoursLocation<=16 && $NbJoursLocation<=22) {
              $prix = $NbJoursLocation*23;

            }elseif ($NbJoursLocation<=22 && $NbJoursLocation<=30) {
              $prix = $NbJoursLocation*2;

            }elseif ($NbJoursLocation>30) {
              $prix = $NbJoursLocation*21;
            }
            break;
        }
        
       // var_dump($prix);

            $em = $this->getDoctrine()->getManager();
            $CurrentUser->setMontantLoc($prix);

      $content =  $this->get('templating')->render('LocanorSiteBundle:Advert:Recapitulatif.html.twig',array('User'=> $CurrentUser));


        return new Response($content);


    }   
               public function SuccessAction($Currentemail)
    {

         $repository = $this ->getDoctrine()->getManager()->getRepository('LocanorSiteBundle:client');

        $CurrentUser = $repository->findOneBy(array('email' => $Currentemail));

        if(null===$Currentemail){
          throw new NotFoundHttpException("Probleme de recuperation BDD ");

        echo ("Votre réservation n'est pas prise en compte, vous allez être redirigé vers l'acceuil.");

        sleep(4);

        return $this->redirectToRoute('locanor_site_homepage');
          
        }else{
         
         $message = \Swift_Message::newInstance()
         ->setSubject('Confirmation de Reservation Locanor')
         ->setFrom('contact@locanor-martinique.com')
         ->setTo($Currentemail)
         //->setBcc('sougner.claire@gmail.com')
         ->attach(\Swift_Attachment::fromPath('LOCANOR_LOGO.png')  
         ->setDisposition('inline'))
         ->setBody(
             $this->renderView('Emails\registration.html.twig',
              array('CurrentUser'=>$CurrentUser )),
             'text/html');



         $this->get('mailer')->send($message);



          $message2 = \Swift_Message::newInstance()
         ->setSubject('Confirmation de Reservation Locanor')
         ->setFrom('contact@locanor-martinique.com')
         ->setTo('patricelotaut@gmail.com')
         //->setBcc('sougner.claire@gmail.com')
         ->attach(\Swift_Attachment::fromPath("voiture/".$CurrentUser->getvoiture().".png")  
         ->setDisposition('inline'))
         ->setBody(
             $this->renderView('Emails\reservation.html.twig',
              array('CurrentUser'=>$CurrentUser )),
             'text/html');

         $this->get('mailer')->send($message2);

//var_dump($message2);
       }

       return $this->render('LocanorSiteBundle:Advert:Success.html.twig');
    }


    public function NosVehiculesAction()
    {

       return $this->render('LocanorSiteBundle:Advert:Nos-Vehicules.html.twig');
    }
            public function NousTrouverAction()
    {

       return $this->render('LocanorSiteBundle:Advert:NousTrouver.html.twig');
    }

            public function BonPlansAction()
    {


       return $this->render('LocanorSiteBundle:Advert:BonPlans.html.twig');
    }


                public function Modifier_VehiculeAction()
    {


       return $this->render('LocanorSiteBundle:Advert:Modifier_Vehicule.html.twig');
    }

  }

  