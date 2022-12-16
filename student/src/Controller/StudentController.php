<?php

namespace Drupal\student\Controller;

use Drupal\Core\Database\Driver\mysql\Connection;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Returns responses for qued_test routes.
 */
class StudentController extends ControllerBase {

 
  /**
 * The student handler service.
 *
 * @var \Drupal\Core\Database\Driver\mysql\Connection
 */
  protected $connect;

  /**
   * Constructs a StudentController object
   *
   * @param \Drupal\Core\Database\Driver\mysql\Connection
   *   The module handler service.
   */
  public function __construct(Connection $connection) {
    $this->connect = $connection;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }
  /**
   * Builds the response.
   */
  public function build() {


    $rows = $this->getData();
    $furl = Url::fromUserInput('/excel-export');
    return [
      '#theme' => 'students_list',
      '#items' => $rows,
      '#title' => $this->t('All students'),
      '#elink' => Link::fromTextAndUrl('export', $furl)->toString(),
     ];

  }

  /**
   * Builds the response.
   */
  public function getReport() {

    header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=my_excel_filename.xls");
      header("Pragma: no-cache");
      header("Expires: 0");

      $rows = $this->getData();

      echo implode("\t", array_keys($rows)) . "\n";
      foreach($rows as $item) {
         echo implode("\t", array_values($item)) . "\n";
      }


      exit();

  }

  public function getData() {
    $query = $this->connect->query("SELECT name,rollnumber,subject,score FROM student n INNER JOIN stresult m ON m.rollnumber=n.id");
    $result = $query->fetchAll();


    foreach ($result as $row => $content) {

        $rows[] = ['name' => $content->name,'rollnumber' => $content->rollnumber,'subject' => $content->subject, 'score' => $content->score];

     }
     return $rows;

  }

}
