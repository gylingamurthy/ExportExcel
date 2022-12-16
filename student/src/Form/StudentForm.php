<?php
/**
 * @file
 * Contains \Drupal\student\Form\StudentForm.
 */
namespace Drupal\student\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class StudentForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'student_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

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

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Register'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    /*if(strlen($form_state->getValue('student_rollno')) < 8) {
      $form_state->setErrorByName('student_rollno', $this->t('Please enter a valid Enrollment Number'));
    }*/
    if(strlen($form_state->getValue('contact_number')) < 10) {
      $form_state->setErrorByName('contact_number', $this->t('Please enter a valid Contact Number'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $field = $form_state->getValues();
    $entity->name->value = $field['name'];
    $entity->class->value = $field['class'];
    $entity->contact_number->value = $field['contact_number'];
    $entity->save();
    \Drupal::messenger()->addMessage(t("Student Registration Done!! Registered Values are:"));
	foreach ($form_state->getValues() as $key => $value) {
	  \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
  }

}
