<?php

namespace App\Controller;

use App\Entity\Aloite;
use App\Form\LinkkiFormType;
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
        //Luodaan linkki -olio
        $aloite = new Aloite();
        //Luodaan lomake
        $form = $this->createForm(
            LinkkiFormType::class,
            $aloite, [
                'action' => $this->generateUrl('pelote_uusi'),
                'attr' => ['class' => 'form-signin'],
            ]
        );
//käsitellään lomakkeelta tulleet tiedot
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            // Talletetaan lomakettiedot muutujaan
            $aloite = $form->getData();
            // Talletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aloite);
            $entityManager->flush();
            return $this->redirectToRoute('pelote_lista');
        }
        // Kutsutaan index-kontrolleria
        return $this->render('Aloite/uusi.html.twig', [
            'form1' => $form->createView(),
        ]);
    }
    /**
     * @Route("/pelote/nayta/{id}", name="pelote_nayta")
     */
    public function nayta($id) {
        $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);
        return $this->render('Aloite/nayta.html.twig', ['aloite' => $aloite,
        ]
        );
    }
    /**
     * @Route("/pelote/muokkaa/{id}", name="pelote_muokkaa" )
     */
    public function muokkaa(Request $request, $id) {
        $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);

        $form = $this->createForm(
            LinkkiFormType::class,
            $aloite, [
                'attr' => ['class' => 'form-signin'],
            ]
        );

        // Käsitellään lomakkeelta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            // Talletetaan lomaketiedot muuttujaan
            $aloite = $form->getData();

            // Talletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            // Kutsutaan index-kontrolleria
            return $this->redirectToRoute('pelote_lista');
        }

        return $this->render('Aloite/muokkaa.html.twig', [
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
