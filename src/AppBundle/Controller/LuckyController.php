<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
     /**
     * @Route("/lucky/{id}", name="lucky" , requirements={"id" = "\d+"})

     */
    public function numberAction($id)
    {
        // replace this example code with whatever you need

        //return $this->render('lucky/number.html.twig',[
            //'id'=>$id
            //]

        //);
        return new Response(
            '<html><body>Lucky number: '.$id.'</body></html>'
        );
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction()
    {
        // replace this example code with whatever you need

        return $this->render('lucky/home.html.twig'

        );
    }
    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function aboutusAction()
    {
        // replace this example code with whatever you need

        return $this->render('lucky/aboutus.html.twig'

        );
    }
    /**
     * @Route("/carrer", name="carrer")
     */
    public function carrerAction()
    {
        // replace this example code with whatever you need

        return $this->render('lucky/carrer.html.twig'

        );
    }
    /**
     * @Route("/client", name="client")
     */
    public function clientAction()
    {
        // replace this example code with whatever you need

        return $this->render('lucky/client.html.twig'

        );
    }

}
