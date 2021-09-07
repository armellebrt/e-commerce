<?php

namespace Application\Helper;

use Exception;

class ImageManager
{
    public function uploadImage()
    {
        try {

            if (!empty($_FILES['image']['tmp_name'])) {
                if ($_FILES['image']['error'] !== 0) {
                    throw new Exception('Une erreur est survenu lors du chargement de l\'image');
                }

                if ($_FILES['image']['size'] > 1000000) {
                    throw new Exception('Image trop lourde. Veuillez la réduire ou en choisir une autre');
                }

                $extention = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $permittedExtentions = ['jpg', 'png', 'gif', 'jpeg'];

                if (in_array($extention, $permittedExtentions)) {
                    $cheminFinal = './images/' . basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], $cheminFinal);
                    return './images/' . basename($_FILES['image']['name']);
                }
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function deleteImage($product)
    {
        $image = $product->getData('image');
        unlink($image);
    }
}
