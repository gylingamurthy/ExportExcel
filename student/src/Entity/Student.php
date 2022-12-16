<?php

namespace Drupal\student\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the student entity.
 *
 * @ContentEntityType(
 *   id = "student",
 *   label = @Translation("student"),
 *   base_table = "student",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "name" = "name",
 *     "class" = "class",
 *     "contact_number" = "contact_number"
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\ContentEntityForm",
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "add_student" = "Drupal\student\Form\StudentForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *     "canonical" = "/student/{student}",
 *     "add-page" = "/student/add",
 *     "add-form" = "/student/add/{student_type}",
 *     "edit-form" = "/student/{student}/edit",
 *     "delete-form" = "/student/{student}/delete",
 *     "collection" = "/admin/content/students",
 *   },
 *   admin_permission = "administer site configuration",
 *   bundle_entity_type = "student_type",
 *   field_ui_base_route = "entity.student_type.edit_form",
 * )
 */
class Student extends ContentEntityBase implements ContentEntityInterface {
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
  $fields = parent::baseFieldDefinitions($entity_type);



  $fields['name'] = BaseFieldDefinition::create('string');
    // Settings and constraints for this field

  $fields['class'] = BaseFieldDefinition::create("integer");
    // Settings and constraints for this field

  $fields['contact_number'] = BaseFieldDefinition::create('string');
    // Settings and constraints for this field



  return $fields;
}

}
