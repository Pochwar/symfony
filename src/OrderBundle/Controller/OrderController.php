<?php
namespace OrderBundle\Controller;

use OrderBundle\Entity\Cart;
use OrderBundle\Entity\Line;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function orderListAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('OrderBundle:Cart');
        $route = $request->query->get('page', 0);

        $carts = $repo->findAll();

        return $this->render('OrderBundle:Order:list.html.twig',
            [
                'titre' => "Titre de ma page",
                'route' => $route,
                'accueil' => "salut les amis !",
                'carts' => $carts,
            ]
        );
    }

    public function orderCreateAction()
    {
        $cart1 = new Cart();
        $cart1->setNumber('123');
        $cart1->setDate(new \DateTime('-2 days'));
        $cart1->setStatus('pending');

        $em = $this->getDoctrine()->getManager();
        $em->persist($cart1);
        $em->flush();

        return new Response('Created');
    }

    public function orderInfoAction(Request $request)
    {
        $id = $request->attributes->get('id', null);
        $repo = $this->getDoctrine()->getRepository('OrderBundle:Cart');
        $cart = $repo->find($id);
        return $this->render('OrderBundle:Order:cart.html.twig',
            [
                'cart' => $cart,
            ]
        );
    }

    public function orderUpdateAction(Request $request)
    {
        $id = $request->attributes->get('id', null);
        $repo = $this->getDoctrine()->getRepository('OrderBundle:Cart');
        $cart = $repo->find($id);

        $cart->setNumber('654654654');
        $em = $this->getDoctrine()->getManager();
        $em->persist($cart);
        $em->flush();
        return new Response('updated');
    }

    public function orderAddLineAction(Request $request)
    {
        $id = $request->attributes->get('id', null);
        $repo = $this->getDoctrine()->getRepository('OrderBundle:Cart');
        $cart = $repo->find($id);

        $line = new Line();
        $line
            ->setDesignation('super produit')
            ->setPrice(65465)
            ->setQuantity(8)
            ->setCart($cart);

        $em = $this->getDoctrine()->getManager();
        $em->persist($line);
        $em->flush();
        return new Response('line created');
    }

    public function orderDeleteAction(Request $request)
    {
        $id = $request->attributes->get('id', null);
        $repo = $this->getDoctrine()->getRepository('OrderBundle:Cart');
        $cart = $repo->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($cart);
        $em->flush();
        return new Response('deleted');
    }
}
