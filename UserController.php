<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\college_list;
Use DB;
use App\tbt_status_complete;
use Log;

class UserController extends Controller
{
    public function index()
    {
/*    	$name = "Hello World";
    	return view ('welcome')->with('name',$name);
*/
/*    	$college_list=college_list::get();
    	echo "<pre>";
    	print_r($college_list);
    	die;
*/
    	/*$college_lists = college_list::orderBy('college_id','asc')->paginate(10);*/
        $college_lists = college_list::orderBy('college_id','asc')->get();
    	return view ('welcome',['college_list'=>$college_lists]);

    }

    public function collegelist(Request $request)
    {
    	$data=$request->all();
    	if (!empty($data))
    	{
    		try {

    		/*college_list::create(['college_id'=>$data['college_id'],
    			'college_name'=>$data['college_name'],
    			'region'=>$data['region'],
    			'lab_inaugurated'=>$data['lab_inaugurated']]);*/

/*    			$college_list=new college_list();
    			$college_list->college_name=$data['college_name'];
    			$college_list->college_id=$data['college_id'];
    			$college_list->region=$data['region'];
    			$college_list->lab_inaugurated=$data['lab_inaugurated'];
    			$college_list->save();*/


    		}
    			catch (\Exception $e) {
    				$request->session()->flash('alert-danger',$e->getMessage());
    				return redirect()->back();
    			}
    				$request->session()->flash('alert-success','College added successfully');
    				return redirect()->back();
    }
    	else {
    		$request->session()->flash('alert-danger',$e->getMessage());
    		return redirect()->back();
    	}	

    }

    public function edit_college($college_id)
    {
        $college_id=convert_uudecode(base64_decode($college_id));
    	$college_data=college_list::where('college_id',$college_id)->first()->toArray();
    	return view('editcollege',['college_data'=>$college_data]);
    }

    public function update_college(Request $request)
    {
        $data=$request->all();
/*        echo "<pre>";
        print_r($data);
        die;*/

        try {
            college_list::where('college_id',$data['college_id'])->update(['college_name'=>$data['college_name'],
                                                                        'region'=>$data['region'],
                                                                    'lab_inaugurated'=>$data['lab_inaugurated']]);        
            $request->session()->flash('alert-success','College updated successfully');
        }

        catch (\Exception $e)
        {
            $request->session()->flash('alert-danger',$e->getMessage());
        }
        return redirect()->to('/');
    }

    public function edit_status($team_id)
    {
        $team_id=convert_uudecode(base64_decode($team_id));
        $tbt_status=tbt_status_complete::where('team_id',$team_id)->first();
        return view('edit_status',['tbt_status'=>$tbt_status]);
    }
    
    public function update_status(Request $request)
    {
        //return 'Hello world';
        $tbt_status=$request->all();

                
        try {
            tbt_status_complete::where('team_id',$tbt_status['team_id'])->update(['tbt_completed'=>$tbt_status['tbt_completed']]);

            $request->session()->flash('alert-success','TBT status updated successfully');
        }

        catch(\Exception $e)
        {
            $request->session()->flash('alert-danger',$e->getMessage());
        }

        return redirect()->to('/tbt_status');
    }

    public function delete_college(Request $request, $college_id)
    {
        $college_id=convert_uudecode(base64_decode($college_id));
        try
        {
            college_list::where('college_id',$college_id)->delete();
            $request->session()->flash('alert-success','College deleted successfully');
        }
        catch(\Exception $e)
        {
            $request->session()->flash('alert-danger',$e->getMessage());   
        }
        return redirect()->to('/');        
    }

    public function tbt_status()
    {

   /*     return 'Hello world';*/

        $tbt_status = tbt_status_complete::orderBy('team_id','asc')->get();
        return view ('tbt_status_complete',['tbt_status'=>$tbt_status]);
    }

}	