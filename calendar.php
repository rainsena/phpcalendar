<?php
/*-----------------------
 日付の設定
------------------------*/
// 現在の年月
$year  = date('Y');
$month = date('m');
// 当月の日数を取得
$countDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// 当月1日の曜日を取得
$firstDay = date('w', strtotime($year . $month . '01'));
// 当月最終日の曜日を取得
$lastDay = date('w', strtotime($year . $month . $countDays));

/*-----------------------
 カレンダー出力
------------------------*/
// タイトル
$title = $year . "年" . $month . "月";
// カレンダー
function printCalendar($firstDay, $lastDay, $countDays) {
    $calendar = [];
    // 月初の空白部分
    for ($i = 1; $i < $firstDay + 2; $i++) {
        $calendar[$i] = "<td></td>";
    }
    // 日付
    $count = count($calendar);
    for ($i = 0; $i < $countDays; $i++) {
        $date = $i + 1;
        $calendar[$count + $i] = "<td>" . $date . "</td>";
    }
    // 月末の空白部分
    $countAll = count($calendar);
    $lastBlank = 6 - $lastDay;
    for ($i = 1; $i < $lastBlank + 1; $i++) {
        $calendar[$countAll + $i] = "<td></td>";
    }
    // 出力
    foreach ($calendar as $key => $val) {
        echo $val;
        if ($key % 7 == 0) {
            echo "</tr><tr>";
        }
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <style>
        body {
            text-align: center;
        }
        .sun {
            color: red;
        }
        .sat {
            color: blue;
        }
    </style>
</head>
<body>
    <p><?= $title; ?></p>
    <table rules="all" border="1" align="center">
        <tr>
            <td class="sun">SUN</td>
            <td>MON</td>
            <td>TUE</td>
            <td>WED</td>
            <td>THU</td>
            <td>FRI</td>
            <td class="sat">SAT</td>
        </tr>
        <tr>
            <?php printCalendar($firstDay, $lastDay, $countDays); ?>
        </tr>
    </table>
</body>
</html>
