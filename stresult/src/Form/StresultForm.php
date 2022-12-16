<?php
/**
 * @file
 * Contains \Drupal\stresult\Form\stresultForm.
 */
namespace Drupal\stresult\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class StresultForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'stresult_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['subject'] = array(
      '#type' => 'textfield',
      '#title' => t('Enter Subject Name:'),
      '#required' => TRUE,
    );
    $form['rollnumber'] = array(
      '#type' => 'number',
      '#title' => t('Enter rollnumber'),
      '#required' => TRUE,
    );
    $form['score'] = array (
      '#type' => 'number',
      '#title' => t('Enter score'),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('SAVE'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    /*if(strlen($form_state->getValue('stresult_rollno')) < 8) {
      $form_state->setErrorByName('stresult_rollno', $this->t('Please enter a valid Enrollment Number'));
    }*/
    /*if(strlen($form_state->getValue('contact_number')) < 10) {
      $form_state->setErrorByName('contact_number', $this->t('Please enter a valid Contact Number'));
    }*/
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $field = $form_state->getValues();
    $entity->subject->value = $field['subject'];
    $entity->rollnumber->value = $field['rollnumber'];
    $entity->score->value = $field['score'];
    $entity->save();
    \Drupal::messenger()->addMessage(t("Scored Entered!"));
	     foreach ($form_state->getValues() as $key => $value) {
	  \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
  }

}
