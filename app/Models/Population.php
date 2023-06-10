<?php

namespace App\Models;

use App\Observers\OperationsObserver;


class Population extends Model
{
  protected static $tableName = 'populations';
  public function __construct()
  {
    $this->observer(new OperationsObserver);
  }


  /**
   * this function for maamoura, saknia
   * @return ["S"=>_,"M"=>_]
   */
  public function getPopulationLast12Month()
  {
    $m = $this->select(
      fields: ['number', 'month(date) as month'],
      groupBy: "month",
      condition: "type = 'M' and is_deleted = false and date >= DATE_SUB(NOW(),INTERVAL 12 MONTH) and date <= NOW()",
      orderBy: "date desc"
    );
    if ($m) {
      $m_numbers = array_column($m, 'number');
      $m = array_sum($m_numbers) / count($m_numbers);
    } else {
      $m = 0;
    }
    // the same thing for Saknia
    $s = $this->select(
      fields: ['number', 'month(date) as month'],
      groupBy: "month",
      condition: "type = 'S' and is_deleted = false and date >= DATE_SUB(NOW(),INTERVAL 12 MONTH) and date <= NOW()",
      orderBy: "date desc"
    );
    if ($s) {
      $s_numbers = array_column($s, 'number');
      $s = array_sum($s_numbers) / count($s_numbers);
    } else {
      $s = 0;
    }
    $result = [
      'M' => $m,
      'S' => $s,
    ];
    return $result;
  }


  /**
   * this function for hommes and femmes
   * @return ["S"=>_,"M"=>_]
   */
  public function getPopulationLast6Month()
  {

    $populations = $this->select(
      fields: ['month(date) month', 'sum(number) as number', 'type'],
      groupBy: 'month',
      orderBy: "date asc",
      condition: "type in ('H','F') and date >= DATE_sub(NOW(),INTERVAL 6 MONTH) and date <= NOW() and is_deleted = false"
    ) ?? [];
    $last6months = $this->getLast6months();

    $data = [];
    foreach ($last6months as $month) {
      $data['H'][] = b_array_find($populations, function ($p) use ($month) {
        return $p['month'] == $month && $p['type'] == 'H';
      })['number'] ?? 0;
      $data['F'][] = b_array_find($populations, function ($p) use ($month) {
        return $p['month'] == $month && $p['type'] == 'F';
      })['number'] ?? 0;
      $data['months'][] = $this->getMonthAr($month);
    }

    // dd($data);
    return $data;
  }


  private function getLast6months()
  {
    // Get the current date and time
    $months = array();
    for ($i = 5; $i >= 0; $i--) {
      $months[] = (int) date('m', strtotime("-$i months"));
    }
    return $months;
  }


  private function getMonthAr(int $month)
  {
    $months = array(
      1 => "يناير",
      2 => "فبراير",
      3 => "مارس",
      4 => "أبريل",
      5 => "مايو",
      6 => "يونيو",
      7 => "يوليو",
      8 => "أغسطس",
      9 => "سبتمبر",
      10 => "أكتوبر",
      11 => "نوفمبر",
      12 => "ديسمبر"
    );
    return $months[$month];
  }



}