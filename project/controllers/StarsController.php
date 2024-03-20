<?php
namespace Project\Controllers;
use Core\Controller;

class StarsController extends Controller
{
    private $starfalls ;
    private $date ;
    public function __construct(){
      $this->date = date('d-m-Y');
      $this->starfalls = [
        1 =>[
                'name' =>'Квадрантиды',
                'date' =>'03.01.2024',
                'color' => 'default',
                'info' =>' 28 декабря - 12 января'
            ],
        2 =>[
            'name' =>'Лириды',
            'date' =>'22.04.2024',
            'color' => 'default',
            'info' =>'14-30 апреля'
            ],
        3 =>[
            'name' =>'Эта-Аквариды',
            'date' =>'05.05.2024',
            'color' => 'default',
            'info' =>'19 апреля - 28 мая'
            ],
        4 =>[
                'name' =>'Дневные Ариетиды',
                'date' =>'07.06.2024',
                'color' => 'default',
                'info' =>'с 20 мая по 2 июня'
            ],
        5 =>[
            'name' =>'Июньские Боотиды',
            'date' =>'22.06.2024',
            'color' => 'default',
            'info' =>'22 июня  - 2 июля'
            ],
        6 =>[
                'name' =>'Персеиды',
                'date' =>'11.08.2024',
                'color' => 'default',
                'info' =>'17 июля - 24 августа'
            ],
        7 =>[
                'name' =>'Ориониды',
                'date' =>'21.10.2024',
                'color' => 'default',
                'info' =>'2 октября - 7 ноября'
            ],
        8 =>[
                'name' =>'Леониды',
                'date' =>'17.11.2024',
                'color' => 'default',
                'info' =>'6-30 ноября'
            ],
        9 =>[
                'name' =>'Геминиды',
                'date' =>'14.12.2024',
                'color' => 'default',
                 'info' =>'4-20 декабря'
            ],
        10 =>[
                'name' =>'Урсиды',
                'date' =>'22.12.2024',
                'color' => 'default',
                'info' =>'17-26 декабря'
            ]
        ];
    }
    public function calendar(){
     $soon = $this->soon();
     $count = $this->countDays();
     $this->title = 'Звездопады 2024';
     return $this->render('stars/calendar',
         [
             'stars'=>$this->colorDate(),
             'soon'=>$soon,
             'count'=>$count
         ]
     );
    }

    public function showInfo($id){
        $name = $this->starfalls[$id['id']]['name'];
        $info = $this->starfalls[$id['id']]['info'];
       return $this->render('stars/info',['name'=>$name,'info'=>$info]);
    }

// метод soon возвращает массив с ближайшей датой звездопада и его названием
    public function soon(){
        $soon= ['name'=>'Новогодний фейерверк!','date'=>'31.12.2024', 'id'=> 11]; // для случая,когда все звездопады уже прошли

        foreach($this->starfalls as $id => $star){
            if(strtotime($this->date) <= strtotime($star['date'])){
                $soon = ['name' =>$star['name'], 'date'=>$star['date'],'id' =>$id] ;
                break;
            }
        }return $soon;
    }
    public function countDays(){
        $from = date('z', strtotime($this->date));
        $soon = $this->soon()['date'];
        $to = date('z', strtotime($soon));
        $count = $to - $from;
        $days= $this->days($count);
        return "$count  $days";
    }
    public function days($days)
    {
        if ($days % 10 == 1 && ($days % 100 > 19 || $days < 11)) {
            return "день";
        } elseif ($days % 10 > 1 && $days % 10 < 5 && ($days % 100 > 19 || $days < 11)) {
            return "дня";
        } else {
            return "дней";
        }
    }
     public function colorDate()
     {
         $soon_id = $this->soon()['id'];
         $color_stars=[];
         foreach ($this -> starfalls as $id => $star) {
             if($soon_id <= $id){
                 $color_stars[$id] = ['name' => $star['name'],'date' =>$star['date'],'color' =>'white'];
             }else{
                 $color_stars[$id] = ['name' => $star['name'],'date' =>$star['date'],'color' =>'black'];
             }
         } return $color_stars;
     }
}

