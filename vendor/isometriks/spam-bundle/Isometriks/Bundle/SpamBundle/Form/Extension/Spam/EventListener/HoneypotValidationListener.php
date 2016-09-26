<?php

namespace Isometriks\Bundle\SpamBundle\Form\Extension\Spam\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;
use Symfony\Component\Translation\TranslatorInterface;

class HoneypotValidationListener implements EventSubscriberInterface
{
    private $translator;
    private $translationDomain;
    private $fieldName;
    private $errorMessage;

    public function __construct(TranslatorInterface $translator,
                                $translationDomain,
                                $fieldName,
                                $errorMessage)
    {
        $this->translator = $translator;
        $this->translationDomain = $translationDomain;
        $this->fieldName = $fieldName;
        $this->errorMessage = $errorMessage;
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if ($form->isRoot() && $form->getConfig()->getOption('compound')) {
            if(!isset($data[$this->fieldName]) || !empty($data[$this->fieldName])){
                $errorMessage = $this->errorMessage;

                if (null !== $this->translator) {
                    $errorMessage = $this->translator->trans($errorMessage, array(), $this->translationDomain);
                }

                $form->addError(new FormError($errorMessage));
            }

            if(is_array($data)){
                unset($data[$this->fieldName]);
            }
        }

        $event->setData($data);
    }

    public static function getSubscribedEvents()
    {
        $event = defined('FormEvents::PRE_SUBMIT') ? FormEvents::PRE_SUBMIT : FormEvents::PRE_BIND;
        
        return array(
            $event => 'preSubmit',
        );
    }
}