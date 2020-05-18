<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGiftCodeRequest;
use Illuminate\Http\Request;
use App\Model\giftcode1 ;
use App\Model\allgiftcode ;
use App\Model\reward;
use App\Model\mailbox;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Support\Facades\Str;

class GiftCode extends Controller
{
    //
     public function getgiftcode()
    {
        # code...
        $data['giftcode'] = giftcode1::all();
        $reward = giftcode1::select('reward')->get();
        //dd($reward);
        return view('giftcode.giftcode',$data);
    }
    public function getcrgiftcode(){
        $allgifcode= allgiftcode::where('isuse',0)->take(5)->get();
        //dd($allgifcode);
        $data['a']=array();
        foreach($allgifcode as $all){
            array_push($data['a'],$all['giftcode']);
        }

        return view('giftcode.creatgiftcode',$data);
    }
    public function postcrgiftcode(CreateGiftCodeRequest $request){
        $giftcode= new giftcode1();
        $giftcode->giftcode = $request['giftcode'];
        $giftcode->playerid = $request['playerid'];
        $giftcode->reward = $request['reward'];
        $giftcode->status = $request['status'];
        $giftcode->save();
        // cập nhật isuse cho giftcode
        allgiftcode::where('giftcode',$request['giftcode'])->update(['isuse'=>1]);
        return redirect()->intended('gc');

    }
    public function geteditgiftcode($id){
        $data['giftcode'] = giftcode1::find($id);
        return view('giftcode.editgiftcode',$data);
    }
    public function posteditgiftcode(CreateGiftCodeRequest $request,$id){
        $giftcode = giftcode1::find($id);
        $giftcode->playerid = $request['playerid'];
        $giftcode->reward = $request['reward'];
        $giftcode->status = $request['status'];
        $giftcode->save();
        return redirect()->intended('gc');
    }
    public function deletegiftcode($id){
        giftcode1::destroy($id);
        return redirect()->intended('gc');
    }
    public function getallgiftcode(){
        $data['giftcode'] = allgiftcode::byIsuse()->orderBy('createdate', 'desc')->paginate(100);
        return view('giftcode.allgiftcode',$data);
    }


    public function createGiftcode()
    {
        $count = (int) request()->count;
         $giftcode = [];
         for ($i=0; $i < $count; $i++) { 
             $giftcode[] = ['giftcode' =>strtoupper(str_random(6))];
         }
         if ($giftcode) {
             allgiftcode::insert($giftcode);
         }
        return redirect('allgiftcode?isuse=0');
    }
    public function getallgc(){
        $data['allgc'] = allgiftcode::paginate('100');
        return view('giftcode.allgc',$data);
    }
    public function searchgc(){
        $output = '' ;
        $allgc = allgiftcode::Searchable('giftcode')->simplePaginate(100);
        //dd($allgc);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->giftcode.'</td>
                        <td>'.$g->isuse.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>
                          <a href="allgiftcode"><i class="fas fa-plus-circle"></i></a>
                          <a href="editallgc/'.$g->giftcode.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deleteallgc/'.$g->giftcode.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public function searchisuse(){
        $output = '' ;
        $allgc = allgiftcode::Searchable('isuse')->simplePaginate(100);
        //dd($allgc);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->giftcode.'</td>
                        <td>'.$g->isuse.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>
                          <a href="allgiftcode"><i class="fas fa-plus-circle"></i></a>
                          <a href="editallgc/'.$g->giftcode.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deleteallgc/'.$g->giftcode.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public function searchdate(){
        $output = '' ;
        $allgc = allgiftcode::Searchable('createdate')->simplePaginate(100);
       // dd($allgc);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->giftcode.'</td>
                        <td>'.$g->isuse.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>
                          <a href="allgiftcode"><i class="fas fa-plus-circle"></i></a>
                          <a href="editallgc/'.$g->giftcode.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deleteallgc/'.$g->giftcode.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public function geteditallgc($giftcode){
        $data['allgc']= allgiftcode::where('giftcode',$giftcode)->get();

        return view('giftcode.editallgc',$data);
    }
    public function posteditallgc(Request $request,$giftcode){
        $data['allgc']= allgiftcode::where('giftcode',$giftcode)->update([
            'giftcode' => $request['giftcode'],
            'isuse' => $request['isuse'] 
        ]);
        return redirect()->intended('allgc');

    }
    public function getdeleteallgc($giftcode){
        allgiftcode::where('giftcode',$giftcode)->delete();
        return redirect()->intended('allgc');
    }
    public function getmailbox(){
        $data['mailbox']=mailbox::paginate(50);
        return view('giftcode.mailbox',$data);
    }
    public function getcrmailbox(){
        $allgifcode= allgiftcode::where('isuse',0)->take(5)->get();
        $data['a']=array();
        foreach($allgifcode as $all){
            array_push($data['a'],$all['giftcode']);
        }
        return view('giftcode.crmailbox',$data);
    }
    public function postcrmailbox(Request $request){
        $mailbox = new mailbox();
        $mailbox->message = 'Gif code:' .$request['message'];
        $mailbox->isread = $request['isread'];
        $mailbox->playerid = $request['playerid'];
        $mailbox->expiredate = $request['date'];
        $mailbox->title = $request['title'];
        $mailbox->save();
        // cap nhat trang thai cho gifc7ode
        allgiftcode::where('giftcode',$request['message'])->update(['isuse'=>1]);
        return redirect()->intended('mailbox');
       
    }
    public function geteditmailbox($id){
        $data['mailbox'] = mailbox::find($id);
        return view('giftcode.editmailbox',$data);
    }
    public function posteditmailbox(Request $request,$id){
        $mailbox = mailbox::find($id);
       // $mailbox->message = 'Gift code:'.$request['message'];
        $mailbox->isread = $request['isread'];
        $mailbox->playerid = $request['playerid'];
        $mailbox->expiredate = $request['date'];
        $mailbox->title = $request['title'];
        $mailbox->save();
        return redirect()->intended('mailbox');
    }
    public function getdeletemailbox($id){
        mailbox::destroy($id);
        return redirect()->intended('mailbox');
    }
    public  function getsearchmessage()
    {
        $output = '' ;
        $allgc = mailbox::Searchable('message')->simplePaginate(100);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->id.'</td>
                        <td>'.$g->message.'</td>
                        <td>'.$g->isread.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>'.$g->expiredate.'</td>
                        <td>'.$g->title.'</td>
                        <td>
                          <a href="crmailbox"><i class="fas fa-plus-circle"></i></a>
                          <a href="editmailbox/'.$g->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletemailbox/'.$g->id.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public  function getsearchisread()
    {
        $output = '' ;
        $allgc = mailbox::Searchable('isread')->simplePaginate(100);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->id.'</td>
                        <td>'.$g->message.'</td>
                        <td>'.$g->isread.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>'.$g->expiredate.'</td>
                        <td>'.$g->title.'</td>
                        <td>
                          <a href="crmailbox"><i class="fas fa-plus-circle"></i></a>
                          <a href="editmailbox/'.$g->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletemailbox/'.$g->id.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public  function getsearchcreatedate()
    {
        $output = '' ;
        $allgc = mailbox::Searchable('createdate')->simplePaginate(100);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->id.'</td>
                        <td>'.$g->message.'</td>
                        <td>'.$g->isread.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>'.$g->expiredate.'</td>
                        <td>'.$g->title.'</td>
                        <td>
                          <a href="crmailbox"><i class="fas fa-plus-circle"></i></a>
                          <a href="editmailbox/'.$g->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletemailbox/'.$g->id.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public  function getsearchexpiredate()
    {
        $output = '' ;
        $allgc = mailbox::Searchable('expiredate')->simplePaginate(100);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->id.'</td>
                        <td>'.$g->message.'</td>
                        <td>'.$g->isread.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>'.$g->expiredate.'</td>
                        <td>'.$g->title.'</td>
                        <td>
                          <a href="crmailbox"><i class="fas fa-plus-circle"></i></a>
                          <a href="editmailbox/'.$g->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletemailbox/'.$g->id.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    public  function getsearchtitle()
    {
        $output = '' ;
        $allgc = mailbox::Searchable('title')->simplePaginate(100);
        if( $allgc ){
            foreach($allgc as $g){
                $output .= '
                    <tr>
                        <td>'.$g->id.'</td>
                        <td>'.$g->message.'</td>
                        <td>'.$g->isread.'</td>
                        <td>'.$g->createdate.'</td>
                        <td>'.$g->expiredate.'</td>
                        <td>'.$g->title.'</td>
                        <td>
                          <a href="cmailbox"><i class="fas fa-plus-circle"></i></a>
                          <a href="editmailbox/'.$g->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletemailbox/'.$g->id.'"> <i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
        return response()->json($output);
    }
    
    
   
}
