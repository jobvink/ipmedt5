<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Pickup extends Model
{
    /**
     * deze functie geeft een array van alle jaren terug waar data van verzameld is
     *
     * @param $id int
     * @return array
     */
    public static function years($id){
        $years = static::selectRaw('year(pickups.created_at) years')
            ->join('products', 'pickups.product_id', '=', 'products.id')
            ->join('articles', 'products.article_id', '=', 'articles.id')
            ->where('articles.id', $id)
            ->distinct()
            ->orderBy('years', 'desc')
            ->get()
            ->pluck('years')
            ->toArray();
        sort($years);
        return $years;
    }

    /**
     * deze functie geeft alle maanden van een jaar terug waar data van verzameld is
     *
     * @param int $year
     * @param $id int
     * @return array
     */
    public static function months($year, $id){
        // months haalt een array met maandgetallen op
        return static::selectRaw('month(pickups.created_at) months')
            ->join('products', 'pickups.product_id', '=', 'products.id')
            ->join('articles', 'products.article_id', '=', 'articles.id')
            ->where('articles.id', $id)
            ->where('pickups.created_at', '>=', Carbon::parse($year . '-01-01 00:00:00'))
            ->distinct()
            ->orderBy('months', 'asc')
            ->get()
            ->pluck('months')
            ->toArray();
    }

    /**
     * deze functie haalt de statistieken van een bepaalde maand op bij een article
     *
     * @param int $year Jaar van de data
     * @param mixed $month Maand van de data
     * @param int $article Het articlenumer van de data
     * @return array
     */
    public static function statistics($year, $month, $article){
        if (!is_int($month)){
            $month = self::toMonthNumber($month);
        }
        $month = Carbon::parse($year . '-' . $month . '-01 00:00:00'); // geeft een bruikbare format

        // statistics haalt de statistieken uit de database op
        $statistics = DB::select(DB::raw('
        SELECT products.size AS maat, COUNT(*) AS aantal
        FROM articles, products, pickups
        WHERE products.article_id=articles.id
            AND pickups.product_id=products.id
            AND articles.id='. $article . '
            AND pickups.created_at BETWEEN \''. $month . '\' AND \'' . $month->addMonth() . '\'
        GROUP BY products.size
        ORDER BY find_in_set(products.size, \'XS,S,M,L,XL\')
        '));
        // deze loop converteerd de variable statestieken naar een beter bruikbaare array
        for ($i = 0; $i < count($statistics); $i++){
            $e = (Array)$statistics[$i];
            unset($statistics[$i]);
            $statistics[$e['maat']] = $e['aantal'];
        }
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];
        for ($i = 0; $i< count($sizes); $i++){
            if( in_array($sizes[$i], array_keys($statistics))){
                continue;
            } else {
                $statistics[$sizes[$i]] = 0;
            }

        }
        return $statistics;
    }

    // deze functie neemt een getal en vertaald deze naar een maandnaam.
    public static function toMonthName($month){
        switch ($month){
            case 1:
                return 'Jannuari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maart';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Augustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'December';
                break;
            default:
                throw new \Exception('Geen maand bij getal');
        }
    }


    /**
     * deze functie neemt een maandnaam en vertaald deze naar een getal.
     *
     * @param string $month Naam van de maand
     * @return int Geeft getal bij de maand
     * @throws \Exception Kon geen getal bij maand vinden
     */
    public static function toMonthNumber($month) {
        switch ($month) {
            case 'Jannuari':
            case 'jannuari':
                return 1;
                break;
            case 'Februari':
            case 'februari':
                return 2;
                break;
            case 'Maart':
            case 'maart':
                return 3;
                break;
            case 'April':
            case 'april':
                return 4;
                break;
            case 'Mei':
            case 'mei':
                return 5;
                break;
            case 'Juni':
            case 'juni':
                return 6;
                break;
            case 'Juli':
            case 'juli':
                return 7;
                break;
            case 'Augustus':
            case 'augustus':
                return 8;
                break;
            case 'September':
            case 'september':
                return 9;
                break;
            case 'Oktober':
            case 'oktober':
                return 10;
                break;
            case 'November':
            case 'november':
                return 11;
                break;
            case 'December':
            case 'december':
                return 12;
                break;
            default:
                throw new \Exception('Geen getal bij maand');
        }
    }

    public function toMonthNameSmall($month){
        switch ($month) {
            case 'Jannuari':
            case 'jannuari':
                return 'Jan';
                break;
            case 'Februari':
            case 'februari':
                return 'Feb';
                break;
            case 'Maart':
            case 'maart':
                return 'Mrt';
                break;
            case 'April':
            case 'april':
                return 'Apr';
                break;
            case 'Mei':
            case 'mei':
                return 'Mei';
                break;
            case 'Juni':
            case 'juni':
                return 'Jun';
                break;
            case 'Juli':
            case 'juli':
                return 'Jul';
                break;
            case 'Augustus':
            case 'augustus':
                return 'Aug';
                break;
            case 'September':
            case 'september':
                return 'Sep';
                break;
            case 'Oktober':
            case 'oktober':
                return 'okt';
                break;
            case 'November':
            case 'november':
                return 'Nov';
                break;
            case 'December':
            case 'december':
                return 'Dec';
                break;
            default:
                throw new \Exception('Geen kleine naam bij maand');
        }
    }
}
