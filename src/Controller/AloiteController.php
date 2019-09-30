<?php

namespace App\Controller;

use App\Form\AloiteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AloiteController extends AbstractController {

    /**
     * @Route("/linkki", name="linkki_lista")
     */

    public function index() {
        // Hakee kaikki linkit tietokannasta
        $linkit = $this->getDoctrine()->getRepository(Aloite::class)->findAll();

//Pyydetään näkymää näyttämään kaikki linkit
        return $this->render('aloite/index.html.twig', ['aloitteet' => $aloitteet]);
    }

    /**
     * @Route("/linkki/uusi", name="linkki_uusi")
     */
    public function uusi(Request $request) {
        //luodaan linkki-olio
        $aloite = new Aloite();

        //luodaan lomake
        $form = $this->createForm(
            LinkkiFormType::class,
            $linkki, [
                'action' => $this->generateURL('linkki_uusi'),
                'attr' => ['class' => 'form-signin'],
            ]
        );

        //käsitellään lomakkeelta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            //Talletetaan lomaketiedot muuttujaan
            $linkki = $form->getData();

            //Talletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($linkki);
            $entityManager->flush();

            //Kutsutaan index-kontrolleria
            return $this->redirectToRoute('linkkilista');
        }

        //pyydetään näkymää näyttämään lomake
        return $this->render('linkki/uusi.html.twig', [
            'form1' => $form->createView(),
        ]);
    }
    /**
     * @Route("/linkki/nayta/{id}", name="linkki_nayta")
     */
    public function nayta($id) {
        $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);
        return $this->render('linkki/nayta.html.twig');
    }
    /**
     * @Route("/linkki/muokkaa/{id}", name="linkki_muokkaa")
     */
    public function muokkaa(request $request, $id) {
        return $this->render('linkki/muokkaa.html.twig');
    }
    /**
     * @Route("/linkki/poista/{id}", name="linkki_poist")
     */
    public function poista(Request $request, $id) {
        return $this->render('linkki/poista.html.twig');
    }

}