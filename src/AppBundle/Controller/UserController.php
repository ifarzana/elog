<?php

namespace AppBundle\Controller;

use AppBundle\Form\FilterType\Model\ListFilter;
use Knp\Component\Pager\Pagination\AbstractPagination;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 */
class UserController extends AbstractApiController
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $filter = new ListFilter();
        $form = $this->createForm('AppBundle\Form\FilterType\ListFilterType', $filter, ['method' => 'GET']);
        $form->handleRequest($request);

        if ($this->getErrors($form)) {
            return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST, $filter->getSerialisationGroups());
        }

        /** @var AbstractPagination $pagination */
        $pagination = $this->get('knp_paginator')->paginate(
            $this
                ->getDoctrine()
                ->getRepository(User::class)
                ->filterAndReturnQuery($filter),
            $filter->getPage(),
            $filter->getLimit()
        );

        return $this->returnCollectionViewResponse(
            $pagination,
            Response::HTTP_OK,
            $filter->getSerialisationGroups()
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\Type\UserType', $user, ['method' => 'POST']);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->returnViewResponse($user, Response::HTTP_CREATED);
        }
        return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST);

    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getAction(User $user)
    {
        return $this->returnViewResponse($user);
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/edit/{id}")
     * @Method("PUT")
     */
    public function putAction(Request $request, User $user)
    {
        $form = $this->createForm('AppBundle\Form\Type\UserType', $user, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->returnViewResponse($user, Response::HTTP_CREATED);
        }

        return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST);
    }
}
