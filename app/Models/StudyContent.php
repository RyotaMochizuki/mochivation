<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StudyContent extends Model
{
    protected $table = 'study_content';
    use HasFactory;

    public function setStudyContent($request,$today,$user_id)
    {
        $data = $request->all();
       


        DB::beginTransaction();
        try {
            

            $studyContent = new StudyContent();
            $studyContent->user_id = $user_id;
            $studyContent->time = $data['time'];
            $studyContent->month = $today;
            $studyContent->content = $data['content'];
            $studyContent->memo = $data['memo'];

       
            $studyContent->save();


            DB::commit();
    
        } catch (Throwable $e) {
            DB::rollBack();
           
        }
     
        return;




    }
    public function editStudy($request,$user_id)
    {
        $data = $request->all();
        
        $studyContents = $data['studyContents'];
        foreach($studyContents as $studyContent){
       


        DB::beginTransaction();
        try {
            

            StudyContent::where('id','=',$studyContent['id'])->update([
                'time'=> $studyContent['time'],
                'content'=> $studyContent['content'],
                'memo'=> $studyContent['memo'],
            ]);
           


            DB::commit();
    
        } catch (Throwable $e) {
            DB::rollBack();
           
        }

    }
     
        return;




    }
    public function deleteStudy($request)
    {
        $data = $request->all();
        
        $selectedStudyContents = $data['selectedStudyContents'];
        foreach($selectedStudyContents as $selectedStudyContent){
       


        DB::beginTransaction();
        try {
            

            StudyContent::where('id','=',$selectedStudyContent['id'])->update([
                'del_flg'=> true,
                
            ]);
           


            DB::commit();
    
        } catch (Throwable $e) {
            DB::rollBack();
           
        }

    }
     
        return;




    }

}
