<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Goal;
use App\Models\GoalContent;
use App\Models\StudyContent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function registerTime(Request $request)
    {
        $today = date("2202");
       
        
        $user_id = Auth::id();
        $goalModel = new Goal();
        $goalModel->setGoal($request,$user_id,$today);
        
        return;
        
    }
    public function registerContent(Request $request)
    {
        $today = date("2202");

        $goalModel = new Goal();
        $goal = $goalModel->getGoalId($today);
        $goal_id = $goal['month'];
        
        
        $user_id = Auth::id();
        $goalContentModel = new GoalContent();
        $goalContentModel->setContent($request,$today,$goal_id);
        
        return;
        
    }

    public function fetchThisGoal(Request $request)
    {
        $today = date("ym");

        $goalModel = new Goal();
        $thisGoal[] = Goal::where('month',$today)->get();
        $thisGoal[] = GoalContent::where('month',$today)->get();

        
        return $thisGoal;
        
    }
    public function submitStudy(Request $request)
    {
        $today = date("ym");
        $user_id = Auth::id();
        

        $studyContentModel = new StudyContent();
        $studyContentModel->setStudyContent($request,$today,$user_id);

        

        
        return;
        
    }
    public function fetchStudyContent(Request $request)
    {
       
        $user_id = Auth::id();
        $today = date("ym");
        

        $studyContentModel = new StudyContent();
        $studyContent = StudyContent::where('month',$today)->where('user_id',$user_id)->where('del_flg',false)->get();

        

        
        return $studyContent;
        
    }
    public function editStudy(Request $request)
    {
       
        $user_id = Auth::id();
        $today = date("ym");
        
        
        

        $studyContentModel = new StudyContent();
        $studyContentModel->editStudy($request,$user_id);
       
        $studyContent = StudyContent::where('month',$today)->where('user_id',$user_id)->where('del_flg',false)->get();


        

        
        return $studyContent;
        
    }
    public function deleteStudy(Request $request)
    {
       
       
        $user_id = Auth::id();
        $today = date("ym");
        

        $studyContentModel = new StudyContent();
        $studyContentModel->deleteStudy($request);
       
        $studyContent = StudyContent::where('month',$today)->where('user_id',$user_id)->where('del_flg',false)->get();


        

        
        return $studyContent;
        
    }

    public function fetchContentperMonth(Request $request)
    {
       
       
        $user_id = Auth::id();
        $today = date("ym");


        $contents = array(); 

        $Goals[] = Goal::where('user_id',$user_id)->where('del_flg',false)->get();
        $Goals = $Goals[0];
       
        for ( $i = 0; $i< count($Goals); $i++ ) {
           // let month = $Goal['month'];
           
          


            $content[] = Goal::where('user_id',$user_id)->where('del_flg',false)->get();
            $content[] = GoalContent::where('goal_id',$Goals[$i]['id'])->where('month',$Goals[$i]['month'])->get();
            $content[] = StudyContent::where('user_id',$user_id)->where('del_flg',false)->where('month',$Goals[$i]['month'])->get();



            array_push($contents,$content);





            

            
        }

      
        
       
    

        

        
        return $contents;
        
    }


}
