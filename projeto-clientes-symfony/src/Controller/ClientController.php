<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class ClientController extends AbstractController
{

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function index(ClientRepository $clientRepository)
    {
        try {
            return $this->render("clients/index.html.twig", [
                "clients" => $clientRepository->findAll()
            ]);
        } catch (Exception $e) {
            throw $this->createNotFoundException($e);
        }
    }

    public function getErrorMessages(Form $form)
    {
        $errors = array();

        foreach ($form->all() as $key => $child) {
            foreach ($child->getErrors() as $error) {
                $errors[$key] = $error->getMessage();
            }
        }
        return $errors;
    }

    public function new(Request $request)
    {
        try {
            $client = new Client();

            $form = $this->createForm(ClientType::class, $client);

            $form->handleRequest($request);

            $errors = $this->getErrorMessages($form);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->doctrine->getManager();

                $em->persist($client);

                $em->flush();

                $this->addFlash("success", "O cliente foi adicionado com sucesso");

                return $this->redirectToRoute("client_index");
            } else {
                return $this->render("clients/new.html.twig", [
                    "client" => $client,
                    "form" => $form->createView(),
                    "errors" => $errors
                ]);
            }
        } catch (Exception $e) {
            throw $this->createNotFoundException($e);
        }
    }


    public function show($id)
    {
        try {
            $em = $this->doctrine->getManager();

            $clientRepository = $em->getRepository(Client::class);

            $client = $clientRepository->find($id);

            if (is_null($client)) {
                throw $this->createNotFoundException("Cliente não encontrado para id" . $id);
            } else {
                return $this->render("clients/show.html.twig", ["client" => $client]);
            }
        } catch (Exception $e) {
            throw $this->createNotFoundException($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $em = $this->doctrine->getManager();

            $clientRepository = $em->getRepository(Client::class);

            $client = $clientRepository->find($id);

            $old = clone $client;

            $form = $this->createForm(ClientType::class, $client);

            $form->handleRequest($request);

            $errors = $this->getErrorMessages($form);

            if ($form->isSubmitted() && $form->isValid()) {

                if (is_null($client)) {
                    throw $this->createNotFoundException("Cliente não encontrado para id" . $id);
                }

                if ($client == $old) {
                    return $this->redirectToRoute("client_index");
                } else {
                    $em = $this->doctrine->getManager();

                    $em->persist($client);

                    $em->flush();

                    $this->addFlash("success", "O cliente foi editado com sucesso");

                    return $this->redirectToRoute("client_index");
                }
            }
            return $this->render("clients/edit.html.twig", [
                "client" => $client,
                "form" => $form->createView(),
                "errors" => $errors
            ]);
        } catch (Exception $e) {
            throw $this->createNotFoundException($e);
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $em = $this->doctrine->getManager();

            $clientRepository = $em->getRepository(Client::class);

            $client = $clientRepository->find($id);

            if ($this->isCsrfTokenValid("delete" . $client->getId(), $request->request->get("_token"))) {
                if (is_null($client)) {
                    return $this->createNotFoundException("Cliente não encontrado para id" . $id);
                }
                $em->remove($client);

                $em->flush();

                $this->addFlash("success", "O cliente foi excluído com sucesso");

                return $this->redirectToRoute("client_index");
            }
        } catch (Exception $e) {
            throw $this->createNotFoundException($e);
        }
    }
}
