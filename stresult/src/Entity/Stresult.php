<?php

namespace Drupal\stresult\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the stresult entity.
 *
 * @ContentEntityType(
 *   id = "stresult",
 *   label = @Translation("stresult"),
 *   base_table = "stresult",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "subject" = "subject",
 *     "rollnumber" = "rollnumber",
 *     "score" = "score"
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\ContentEntityForm",
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "add_stresult" = "Drupal\stresult\Form\StresultForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *     "canonical" = "/stresult/{stresult}",
 *     "add-page" = "/stresult/add",
 *     "add-form" = "/stresult/add/{stresult_type}",
 *     "edit-form" = "/stresult/{stresult}/edit",
 *     "delete-form" = "/stresult/{stresult}/delete",
 *     "collection" = "/admin/content/stresults",
 *   },
 *   admin_permission = "administer site configuration",
 *   bundle_entity_type = "stresult_type",
 *   field_ui_base_route = "entity.stresult_type.edit_form",
 * )
 */
class Stresult extends ContentEntityBase implements ContentEntityInterface {
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
  $fields = parent::baseFieldDefinitions($entity_type);



  $fields['subject'] = BaseFieldDefinition::create('string');
    // Settings and constraints for this field

  $fields['rollnumber'] = BaseFieldDefinition::create("integer");
    // Settings and constraints for this field

  $fields['score'] = BaseFieldDefinition::create('integer');
    // Settings and constraints for this field



  return $fields;
}
}
