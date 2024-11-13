<?php

require_once('../model/Order.php');
require_once "../model/OrderRepository.php";
require_once "../vendor/autoload.php";

class OrderController
{

    public function Order(): void {
        require_once "../view/partials/_header.php";
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('customerName', $_POST)) {

                try {
                    // Création d'un nouvel objet Order avec le nom du client
                    $order = new Order($_POST['customerName']);
                    // Instancie un nouvel objet OrderRepository
                    $orderRepository = new OrderRepository();
                    // Enregistre la commande
                    $orderRepository->persistOrder($order);
                    $message = 'Commande créée';
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }

            }
        }
        // je créé la config de twig en lui indiquant le chemin pour accéder aux templates
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        // je charge twig avec la configuration
        // ça me permet d'avoir une variable $twig qui contient une instance
        // de la classe twig
        // et donc pouvoir utiliser les méthodes public que twig crées
        $twig = new \Twig\Environment($loader);
        echo $twig->render('order.twig', ['message' => $message]);
    }

// Nouvelle méthode addProduct
    public function addProduct(): void
    {
        require_once "../view/partials/_header.php";
        $message = null;
        // On instancie OrderRepository
        $orderRepository = new OrderRepository();
        // On récupère la commande depuis notre "pseudo" BDD
        $order = $orderRepository->findOrder();
        try {
            $order->addProduct();
            // On a crée une nouvelle commande et on la sauvegarde
            $orderRepository->persistOrder($order);
            $message = "Vous avez bien ajouté le nouveau produit";

        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('add-product.twig', [
            'message' => $message,
            'order' => $order
        ]);
    }

    // Nouvelle méthode pour supprimer un produit de notre commande
    public function removeProduct(): void {
        require_once "../view/partials/_header.php";
        $message = null;
        // On crée une nouvelle instance OrderRepository()
        $orderRepository = new OrderRepository();
        // On récupère la commande via la "BDD"
        $order = $orderRepository->findOrder();
        try {
            $order->removeProduct();
            // On supprime un produit de la commande et on sauvegarde la manipulation
            $orderRepository->persistOrder($order);
            $message = "Le produit à bien été supprimé de la commande";
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('remove-product.twig', ['message' => $message]);
    }

    public function setShippingAddress(): void {
        require_once "../view/partials/_header.php";
        $message = null;
        // On crée une nouvelle instance
        // Pour pouvoir utiliser ses méthodes
        $orderRepository = new OrderRepository();
        // ON récupère la commande via notre "BDD", existante
        $order = $orderRepository->findOrder();
        // On vérifie si le formulaire à bien été soumis et récupère ces données
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // On vérifie que shippingAddress existe
            if (key_exists('shippingAddress', $_POST)) {
                try {
                    // On définit l'adresse de livraison
                    $order->setShippingAddress($_POST['shippingAddress']);
                    // Message de validation
                    $message = "Adresse de livraison ajoutée avec succès";
                    // On sauvegarde
                    $orderRepository->persistOrder($order);

                } catch (Exception $exception) {
                    // Message d'erreur
                    $message = $exception->getMessage();
                }
            }
        }
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('set-shipping-address.twig', [
            'message' => $message,
            'order' => $order
        ]);
    }
    // Méthode pour gérer le paiement
    public function pay(): void {
        require_once "../view/partials/_header.php";
        $message = null;
        // On crée une instance d'OrderRepository
        $orderRepository = new OrderRepository();
        // On récupère la commande depuis notre "pseudo" BDD
        $order = $orderRepository->findOrder();
        try {
            // Tente de payer la commande
            $order->pay();
            // Sauvegarde l'état mis à jour
            $orderRepository->persistOrder($order);
            $message = "Paiement réussi !";
        } catch (Exception $exception) {
            // En cas d'erreur, affiche un message d'erreur
            $message = $exception->getMessage();
        }
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('pay.twig', [
            'message' => $message,
            'order' => $order
        ]);
    }

}