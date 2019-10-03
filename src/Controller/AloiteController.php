<?php

namespace App\Controller;

use App\Entity\Aloite;
//use App\Form\AloiteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AloiteController extends AbstractController {

    /**
     * @Route("/pelote", name="pelote_lista")
     */
    public function index() {
        // Hakee kaikki aloitteet tietokannasta
        $aloitteet = $this->getDoctrine()->getRepository(Aloite::class)->findAll();

        // Pyydetään näkymää näyttämään kaikki aloitteet
        return $this->render('Aloite/index.html.twig', [
            'aloitteet' => $aloitteet,
        ]);
    }

    /**
     * @Route("/pelote/uusi", name="pelote_uusi")
     */
    public function uusi(Request $request) {
        // Luodaan aloite-olio
        $aloite = new Aloite();

        $form = $this->createForm(
            LinkkiFormType::class,
            $linkki, [
                'attr' => ['class' => 'form-signin'],
            ]
        );
        //lomakkeen käsittely
        $form->handleRequest($request);
        //Painettiinko lähetä nappia
        if ($form->isSubmitted()) {
            //if true , käsitellään lomaketiedot
            // var_dump($henkilo);
            $aloite = $form->getData();
            // return new Response($henkilo->getEtunimi());
            // return new JsonResponse((Array)$henkilo);
            // return $this->redirectToRoute('valmis');
            return $this->render('lomakeLahetetty.html.twig', [
                'pvm' => $aloite->getKirjauspvm()]
            );
        }
        //Luo näkymän joka näyttää lomakkeen
        return $this->render("Aloite/uusi.html.twig", [
            'form1' => $form->createView(),
        ]);
    }
    /**
     * @Route("/pelote/poista/{id}", name="pelote_poista")
     */
    public function poista(Request $request, $id) {

        // Luo linkki-olion ja palauttaa sen tiedoilla täytettynä.
        $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);

        // Poistetaan linkki tietokannasta
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($aloite);
        $entityManager->flush();

        return $this->redirectToRoute('pelote_lista');

        return $this->render('Aloite/poista.html.twig');
    }
}
