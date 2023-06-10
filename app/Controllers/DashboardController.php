<?php


namespace App\Controllers;

use App\Database\DB;
use App\Middlewares\LoginMiddleware;

use App\Models\Article;
use App\Models\Connexion;
use App\Models\Operation;
use App\Models\Population;
use App\Models\Rapport;
use App\Models\User;
use App\Utils\View;


class DashboardController extends Controller
{
  private User $user;
  private Article $article;
  private Rapport $rapport;
  private Connexion $connexion;
  private Operation $operation;
  private Population $population;

  public function __construct()
  {
    $this->registerMiddleware(new LoginMiddleware());
    $this->user = new User();
    $this->article = new Article();
    $this->rapport = new Rapport();
    $this->connexion = new Connexion();
    $this->operation = new Operation();
    $this->population = new Population();
  }


  public function index()
  {
    $user_role = auth()->user()['role']['code'];
    $con = 'is_deleted = false'; // condition
    $counts = [];
    if (in_array($user_role, ['SA'])) {
      $counts['users'] = ['total' => $this->user->count($con), 'icon' => "people-fill"];
    }
    if (in_array($user_role, ['SA', "CS", "ART"])) {
      $counts['articles'] = ['total' => $this->article->count($con), 'icon' => "newspaper"];
    }
    if (in_array($user_role, ['SA', "CS", "RPT"])) {
      $counts['rapports'] = ['total' => $this->rapport->count($con), 'icon' => "clipboard"];
    }
    if (in_array($user_role, ['SA'])) {
      $counts['connexions'] = ['total' => $this->connexion->count($con), 'icon' => "link"];
    }
    if (in_array($user_role, ['SA'])) {
      $counts['operations'] = ['total' => $this->operation->count($con), 'icon' => "gear"];
    }
    if (in_array($user_role, ['SA', "CS", "STC"])) {
      $counts['populations'] = ['total' => $this->population->count($con), 'icon' => "graph-up"];
    }

    // charts
    $charts = [];
    if (in_array($user_role, ['SA', "CS", "ART"])) {
      $charts['articles'] = $this->getByMonthsNumberOf(Article::table());
    }
    if (in_array($user_role, ['SA', "CS", "RPT"])) {
      $charts['rapports'] = $this->getByMonthsNumberOf(Rapport::table());
    }
    if (in_array($user_role, ['SA', "CS", "STC"])) {
      // $charts['populations'] = $this->getPopulationLast_10_years();
      $charts['populations'] = $this->population->getPopulationLast6Month();
      $charts['katafa'] = $this->population->getPopulationLast12Month();
    }



    return View::make('admin_panel/layout', 'dashboard/index', compact('counts', 'charts'));
  }


  private function getByMonthsNumberOf($table_name)
  {
    $db = DB::instance();
    $op_table_name = Operation::table();

    $query = "
      SELECT month(o.created_at) as month, count(*) as count  from $table_name a 
      inner join $op_table_name o on o.row_id = a.id and o.table_name = '$table_name'
      where a.is_deleted = false 
      and o.created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR) 
      and o.action = 'insert'
      group by month
      order by o.created_at asc
    ";

    $selected_rows = $db->select($query) ?? [];
    $data = [];
    foreach ($this->getMonthsInFr() as $key => $month) {
      $key = $key + 1;
      $data[$month] = b_array_find($selected_rows, function ($item) use ($key) {
        return $item['month'] == $key;
      })['count'] ?? 0;
    }
    return $data;
  }

  private function getMonthsInFr()
  {
    return array(
      "Janvier",
      "Février",
      "Mars",
      "Avril",
      "Mai",
      "Juin",
      "Juillet",
      "Août",
      "Septembre",
      "Octobre",
      "Novembre",
      "Décembre"
    );
  }


}