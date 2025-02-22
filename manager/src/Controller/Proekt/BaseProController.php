<?php

declare(strict_types=1);

namespace App\Controller\Proekt;

use App\Model\Adminka\Entity\Uchasties\Personas\Id as PersonaId;
use App\Model\Adminka\Entity\Uchasties\Personas\PersonaRepository;
use App\Model\Adminka\Entity\Uchasties\Uchastie\Id;
use App\Model\Adminka\Entity\Uchasties\Uchastie\UchastieRepository;
use App\Model\Mesto\Entity\InfaMesto\Id as MestoNomerId;
use App\Model\Mesto\Entity\InfaMesto\MestoNomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseProController extends AbstractController
{
    /**
     * @Route("/app/proekts/basepro", name="app.proekts.basepro")
     * @param MestoNomerRepository $mestoNomers
     * @param UchastieRepository $uchasties
     * @param PersonaRepository $personas
     * @return Response
     */
    public function index(Request $request,
                          UchastieRepository $uchasties,
                          PersonaRepository $personas,
                          MestoNomerRepository $mestoNomers
    ): Response
    {
        $idUser = $this->getUser()->getId();

        $uchastie = $uchasties->has(new Id($idUser));
        $persona = $personas->has(new PersonaId($idUser));
        $mestoNomer = $mestoNomers->has(new MestoNomerId($idUser));

        return $this->render('app/proekts/basepro.html.twig',
         compact( 'uchastie', 'persona', 'mestoNomer')
        );
    }
}
