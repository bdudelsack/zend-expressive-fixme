<?php
/**
 * Created by IntelliJ IDEA.
 * User: bdudelsack
 * Date: 09.12.16
 * Time: 12:05
 */

namespace App\Guestbook;

use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Zend\InputFilter\InputProviderInterface;

class GuestbookForm extends Form implements InputProviderInterface
{
    public function __construct()
    {
        parent::__construct('guestbook-form');

        // TODO make it an input
        $this->add([
            'type' => 'text',
            'name' => 'name',
            'options' => [
                'label' => 'Please enter your name'
            ]
        ]);

        // TODO make it an input
        $this->add([
            'type' => 'email',
            'name' => 'email',
            'options' => [
                'label' => 'Please enter your email',
            ]
        ]);

        $this->add([
            'type' => 'textarea',
            'name' => 'content',
            'required' => true,
            'options' => [
                'label' => 'Please enter your text'
            ]
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Abschicken'
            ]
        ]);
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInput()}.
     *
     * @return array
     */
    public function getInputSpecification()
    {
        return [
            'content' => [
                'required' => true,
                'filters'  => array(
                    ['name' => 'Zend\Filter\StringTrim'],
                )
            ]
        ];
    }
}
