<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoalContent extends Model
{
    use HasFactory;
    protected $table = 'goal_content';
    
    public function setContent($request,$today,$goal_id)
    {
        $data = $request->all();
       
       $goal_id = (int)$goal_id;

        DB::beginTransaction();
        try {
            

            $goalContent = new GoalContent();
            $goalContent->goal_id = $goal_id;
            $goalContent->goal_content = $data['content'];
            $goalContent->month = $today;
       
            $goalContent->save();


            DB::commit();
    
        } catch (Throwable $e) {
            DB::rollBack();
           
        }
     
        return;




    }
}
