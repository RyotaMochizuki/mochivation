<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goal extends Model
{
    use HasFactory;
    protected $table = 'goal';
    protected $fillable = [
        'id', 'user_id', 'goal_time','month','goal_flg','create_at','update_at',
    ];
    public function setGoal($request,$user_id,$today)
    {
        $data = $request->all();
       $data = (int)$data;
       

        DB::beginTransaction();
        try {
            

            $goal = new Goal();
            $goal->goal_time = $data;
            $goal->user_id = $user_id;
            $goal->month = $today;
       
            $goal->save();


            DB::commit();
    
        } catch (Throwable $e) {
            DB::rollBack();
           
        }
     
        return;




    }

    public function getGoalId($today)
    {

        return Goal::where('month',$today)->first();

    }

    public function fetchThisGoal()
    {
        $thisGoal = Goal::join('goal','goal_content.goal_id','=','goal.id')
        ->select('goal_content.goal_content','goal.goal_time')
        ->get();

        return $thisGoal;
        
    }
}
