<?php
namespace Drupal\stresult\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
/**
 * stresult Type
 *
 * @ConfigEntityType(
 *   id = "stresult_type",
 *   label = @Translation("stresult Type"),
 *   bundle_of = "stresult",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_prefix = "stresult_type",
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\stresult\Form\stresultTypeEntityForm",
 *       "add" = "Drupal\stresult\Form\stresultTypeEntityForm",
 *       "edit" = "Drupal\stresult\Form\stresultTypeEntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *       "add_stresult" = "Drupal\stresult\Form\StresultForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer site configuration",
 *   links = {
 *     "canonical" = "/admin/structure/stresult_type/{stresult_type}",
 *     "add-form" = "/admin/structure/stresult_type/add",
 *     "edit-form" = "/admin/structure/stresult_type/{stresult_type}/edit",
 *     "delete-form" = "/admin/structure/stresult_type/{stresult_type}/delete",
 *     "collection" = "/admin/structure/stresult_type",
 *   }
 * )
 */
class StresultType extends ConfigEntityBundleBase {}
