<?php

namespace Drupal\student\Form;

use Drupal\Core\Entity\BundleEntityFormBase;
use Drupal\Core\Form\FormStateInterface;

class StudentTypeEntityForm extends BundleEntityFormBase {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $entity_type = $this->entity;
    $content_entity_id = $entity_type->getEntityType()->getBundleOf();

    /*$form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $entity_type->label(),
      '#description' => $this->t("Label for the %content_entity_id entity type (bundle).", ['%content_entity_id' => $content_entity_id]),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $entity_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\advertiser\Entity\AdvertiserType::load',
      ],
      '#disabled' => !$entity_type->isNew(),
    ];*/
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Enter Name:'),
      '#required' => TRUE,
    );
    $form['class'] = array(
      '#type' => 'number',
      '#title' => t('Enter class:'),
      '#required' => TRUE,
    );
    $form['contact_number'] = array (
      '#type' => 'tel',
      '#title' => t('Enter Contact Number'),
    );

    return $this->protectBundleIdElement($form);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $messenger = \Drupal::messenger();
    $entity_type = $this->entity; var_dump($enitty_type);die;
    $status = $entity_type->save();
    $message_params = [
      '%name' => $entity_type->label(),
      '%class' => $entity_type->class(),
      '%contact_number' => $entity_type->contact_number(),
      '%content_entity_id' => $entity_type->getEntityType()->getBundleOf(),
    ];

    // Provide a message for the user and redirect them back to the collection.
    switch ($status) {
      case SAVED_NEW:
        $messenger->addMessage($this->t('Created the %label %content_entity_id entity type.', $message_params));
        break;

      default:
        $messenger->addMessage($this->t('Saved the %label %content_entity_id entity type.', $message_params));
    }

    $form_state->setRedirectUrl($entity_type->toUrl('collection'));
  }
}
