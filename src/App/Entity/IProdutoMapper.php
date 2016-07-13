<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 13/07/2016
 * Time: 10:56
 */

namespace App\Entity;


interface IProdutoMapper
{
    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object);

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object);

}