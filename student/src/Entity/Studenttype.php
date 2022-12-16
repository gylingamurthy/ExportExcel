<?php
namespace Drupal\student\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
/**
 * student Type
 *
 * @ConfigEntityType(
 *   id = "student_type",
 *   label = @Translation("student Type"),
 *   bundle_of = "student",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_prefix = "student_type",
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\student\Form\StudentTypeEntityForm",
 *       "add" = "Drupal\student\Form\StudentTypeEntityForm",
 *       "edit" = "Drupal\student\Form\StudentTypeEntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *       "add_student" = "Drupal\student\Form\StudentForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer site configuration",
 *   links = {
 *     "canonical" = "/admin/structure/student_type/{student_type}",
 *     "add-form" = "/admin/structure/student_type/add",
 *     "edit-form" = "/admin/structure/student_type/{student_type}/edit",
 *     "delete-form" = "/admin/structure/student_type/{student_type}/delete",
 *     "collection" = "/admin/structure/student_type",
 *   }
 * )
 */
class StudentType extends ConfigEntityBundleBase {}
