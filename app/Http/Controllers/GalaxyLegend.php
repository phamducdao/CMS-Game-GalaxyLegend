<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth ;
use App\Model\campain ;
use App\Model\reward ;
use App\Model\Player ;
use App\Model\playecamp ;
use App\Model\rankingcampreward ;
use App\Model\playercampreward ;
use Illuminate\Support\Facades\Gate;
use App\User ;
use  App\Http\Requests\CampaignRequest;
use App\Http\Requests\EditCampainRequest;

class GalaxyLegend extends Controller
{
    //
    public function getreward(){
        $data['reward']=DB::table('reward')->simplePaginate(20) ;

        return view('reward',$data);
    }
    public function searchreward(){
        $output = '';
        $rewards = reward::searchable('name','namevi')->simplePaginate(20);
        if ($rewards) {
            foreach ($rewards as $key => $product) {
                $output .= '<tr>
                <td>' . $product->id . '</td>
                <td>' . $product->name . '</td>
                <td>' . $product->namevi . '</td>
                <td>
                          <a href="crw"><i class="fas fa-plus-circle"></i></a>
                          <a href="editcrw/'.$product->id.'"> <i class="fas fa-edit"></i></a> 
                          <a href="deletecrw/'.$product->id.'"> <i class="far fa-trash-alt"></i></a>
                </td>
                </tr>';
            }
        }
        return response()->json($output);
    }
    public function creatreward(){
       $data['name'] = campain::select('name')->get();
       $data['name1'] = reward::select('name')->get();
       
       return view('createreward',$data) ;
    }
    public function postcreatreward(Request $req){
        $name= $req['campainid'];
        $data = DB::table('campaign')->select('id')->where('name','=',$name)->get();
        $data['campainid'] =$data[0]->id;
        $name1 = $req['rewardid'];
        $data1 = DB::table('reward')->select('id')->where('name','=',$name1)->get();
        $data['rewardid'] = $data[0]->id ;
        $data['ranking'] = $req['ranking'] ;
        $data['amount'] = $req['amount'];
        $rankingcampreward = new rankingcampreward();
        $rankingcampreward->campid = $data['campainid'] ;
        $rankingcampreward->rewardid = $data['rewardid'] ;
        $rankingcampreward->ranking = $data['ranking'] ;
        $rankingcampreward->amount = $data['amount'] ;
        $rankingcampreward->save() ;
        return redirect()->intended('rcw') ;
        
        

    }
    public function getplayer(){
        
       $data['player']=DB::table('player')->simplePaginate(50);

      return view('player',$data);
     
    }
    public function getplayercamp(){
       //$data['playercamp']= DB::table('playercamp')->simplePaginate(50) ;
       $data['playercamp'] = playecamp::with('player','campain')->get();
      //dd($data['playercamp']->toArray());
        return view('playercamp',$data) ;
    }
    public function create(){
        if (Gate::allows('permission')) {
            // User hiện tại có quyền truy cập quản trị User...
            return view('createcampain') ;
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
    }
    public function postcreat(CampaignRequest $req){
      $data['name'] = $req->input('name') ;
      $data['showdate'] = $req->input('showdate');
      $data['startdate'] = $req->input('startdate');
      $data['enddate'] = $req->input('enddate') ;
      $data['rewardtime'] = $req->input('rewardtime') ;
      $data['isactive'] = $req->input('isactive') ;
      $data['limitplay'] = $req->input('limitplay') ;
      $data['countryvalidate'] = $req->input('countryvalidate') ;
      $data['counfree'] = $req->input('counfree') ;
      $data['bonustype'] = $req->input('bonustype') ;
      $data['countad'] = $req->input('countad') ;
      $data['shipid'] = $req->input('shipid') ;
      $data['league'] = $req->input('league') ;
      $data['datewave'] = $req->input('datewave') ;
      $data['createdate'] = $req->input('createdate') ;
      $campain= new campain();
      $campain->name = $data['name'];
      $campain->showdate = $data['showdate'] ;
      $campain->startdate = $data['startdate'] ;
      $campain->enddate =$data['enddate'] ;
      $campain->rewardtime = $data['rewardtime'] ;
      $campain->isactive = $data['isactive'] ;
      $campain->limitplay = $data['limitplay'] ;
      $campain->countryvalidate =$data['countryvalidate'] ;
      $campain->countfree = $data['counfree'] ;
      $campain->countad = $data['countad'] ;
      $campain->shipid = $data['shipid'] ;
      $campain->league = $data['league'] ;
      $campain->datawave = $data['datewave'] ;
      $campain->createdate = $data['createdate'] ;
      $campain->life = $req['life'] ;
      $campain->gold = $req['gold'] ;
      $campain->bonustype = $req['bonustype'];
      $campain -> save();
      return redirect()->intended('cp');
    }
    public function edit($id){
        if (Gate::allows('permission')) {
            $data['campain'] = campain::find($id) ;
            return view('editcampain',$data);
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
     
    }
    public function postedit(EditCampainRequest $request,$id){ 

      $campain= campain::find($id) ;
      $campain->name = $request['name'];
      $campain->showdate = $request['showdate'] ;
      $campain->startdate = $request['startdate'] ;
      $campain->enddate =   $request['enddate'] ;
      $campain->createdate = $request['createdate'];
      $campain->rewardtime = $request['rewardtime'] ;
      $campain->isactive = $request['isactive'] ;
      $campain->limitplay = $request['limitplay'] ;
      $campain->countryvalidate =$request['countryvalidate'] ;
      $campain->countfree = $request['counfree'] ;
      $campain->countad = $request['countad'] ;
      $campain->shipid = $request['shipid'] ;
      $campain->league = $request['league'] ;
      $campain->datawave = $request['datewave'] ;
      $campain->life = $request['life'];
      $campain->gold = $request['gold'];
      $campain->bonustype = $request['bonustype'];
      $campain -> save();
      
      return redirect()->intended('cp');
    }
    public function deletecampian($id){
        if (Gate::allows('permission')) {
            campain::destroy($id);
            return back();
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
        
    }
    public function getplayercampreward(){
       // $data['playercampreward'] = DB::table('playercampreward')->simplePaginate(50);
       $data['playercampreward'] = playercampreward::with('campain')->simplePaginate(50);
      // dd($data['playercampreward']->toArray());
        return view('playercampreward',$data);
    }
    public function search1(){
        $output = '';
        $players = playercampreward::with('player','campain')->searchable1('campid')->paginate(50);
       // dd($player);
    //    / dd($players);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product);
                $output .= '<tr>
                <td>' . $product->campid . '</td>
                <td>' . $product->campain['name'] . '</td>
                <td>'.$product->playerid.'</td>
                <td>'.$product->player['name'].'</td>
                <td>' . $product->score . '</td>
                <td>' . $product->wave . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->isreceiver . '</td>
                <td>' . $product->ranking . '</td>
                <td>' . $product->timeplay . '</td>

                </tr>';
            }
        }
        return response()->json($output);
    }
    public function search2(){
        $output = '';
        $players = playercampreward::with('player','campain')->searchable1('playerid')->paginate(50);
       // dd($player);
    //    / dd($players);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product);
                $output .= '<tr>
                <td>' . $product->campid . '</td>
                <td>' . $product->campain['name'] . '</td>
                <td>'.$product->playerid.'</td>
                <td>'.$product->player['name'].'</td>
                <td>' . $product->score . '</td>
                <td>' . $product->wave . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->isreceiver . '</td>
                <td>' . $product->ranking . '</td>
                <td>' . $product->timeplay . '</td>

                </tr>';
            }
        }
        return response()->json($output);
    }
    public function search3(){
        $output = '';
        $players = playercampreward::with('player','campain')->searchable1('ranking')->paginate(50);
       // dd($player);
    //    / dd($players);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product);
                $output .= '<tr>
                <td>' . $product->campid . '</td>
                <td>' . $product->campain['name'] . '</td>
                <td>'.$product->playerid.'</td>
                <td>'.$product->player['name'].'</td>
                <td>' . $product->score . '</td>
                <td>' . $product->wave . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->isreceiver . '</td>
                <td>' . $product->ranking . '</td>
                <td>' . $product->timeplay . '</td>

                </tr>';
            }
        }
        return response()->json($output);
    }
    public function getlog(){
        $data['log'] = DB::table('logplayercamp')->simplePaginate(50);
        return view('logplayercamp',$data) ;
    }
    public function getranking(){
        $data['rank']= rankingcampreward::with('campain','reward')->get();
        // dd($data['rank']->toArray());
        return view('rankingcampreward',$data);
    }
    public function editcreatrankingreward($id1,$id2,$r){
       $data['campain']= campain::findOrFail($id1);
       $data['reward'] = reward::findOrFail($id2);
       $data['rcr'] = DB::table('rankingcampreward')->where('campid',$id1)->where('rewardid',$id2)->where('ranking',$r)->get();
       $data['name'] = campain::all();
       $data['name1'] = reward::all();
      // dd($data['name1']);
        return view('editrankingcampreward',$data);
    }
    public function posteditcreatrankingreward(Request $request,$id1,$id2,$r){
        
        $campname=$request->campainid;
        $campid=DB::table('campaign')->select('id')->where('name',$campname)->get();
        $id3=$campid[0]->id;    
        $rewardname=$request->rewardid;
        $rewardid=DB::table('reward')->select('id')->where('name',$rewardname)->get();
        $id4=$rewardid[0]->id;
        $ranking=rankingcampreward::where('campid',$id1)->where('rewardid',$id2)->where('ranking',$r)->update([
            'campid' => $id3,
            'rewardid'=>$id4,
            'amount'=>$request['amount'],
            'ranking'=>$request['ranking']
             ]);
        //dd($ranking);
        return redirect()->intended('rcw');
    }
    public function delrank($id1,$id2,$r){
        
        rankingcampreward::where('campid',$id1)->where('rewardid',$id2)->where('ranking',$r)->delete();
        return back();
    }
    public function getcampain(){
        $data['campain'] = DB::table('campaign')->get() ;
        
        return view('campain',$data) ;
    }
    public function getlogin(){
        return view('login1') ;
    }
    public function postlogin(Request $req ){
        
    $data['email']=$req->input('email') ;
     $data['pass'] = $req->input('password') ;
     if(Auth::attempt(['email' =>$data['email'] , 'password' => $data['pass']])){
        return redirect()->intended('admin');
          
     }
     else{
         return back()->withInput()->with('error','Email hoặc mật khẩu chưa đúng');
     }

    }
    public function getlogout(){
      Auth::logout();
      return redirect()->intended('log');
    }
    public function getper(){
        if (Gate::allows('permission')) {
            $data['permission'] = DB::table('user')->get();
            return view('permission',$data);         }
        
        else{
            echo "ban ko co quyen truy cap";
        }
       
  
    }
    public function getcreateper(){
        if (Gate::allows('permission')) {
            // User hiện tại có quyền truy cập quản trị User...
            return view('creatper');        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
       
    }
    public function postcreateper(Request $req){
        $data['email'] = $req['email'];
        $data['pass'] = bcrypt($req['password']) ;
        $data['per'] = $req['permission'];
        $data['name'] = $req['name'] ;
        $user= new User();
        $user->email = $data['email'] ;
        $user->password = $data['pass'] ;
        $user->permission = $data['per'];
        $user->name = $data['name'] ;
        $user->save();
        return redirect()->intended('permission');
    }
    public function getcrw(){
        if (Gate::allows('permission')) {
            // User hiện tại có quyền truy cập quản trị User...
            return view('createreward1');       
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
       
    }
    public function postcrw(Request $request){
        $name=$request['name'];
        $namevi=$request['namevi'];
        $reward= new reward();
        $reward->name=$name;
        $reward->namevi=$namevi;
        $reward->save();
        return redirect()->intended('reward');
    }
    public function geteditcrw($id){
        if (Gate::allows('permission')) {
            // User hiện tại có quyền truy cập quản trị User...
            $data['rcw'] = reward::find($id);
            return view('editcreatreaward1',$data);      
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }

        
    }
    public function posteditcrw(Request $request,$id){
        $reward= reward::find($id);
        $reward->name =  $request['name'];
        $reward->namevi = $request['namevi'];
        $reward->save();
        return redirect()->intended('reward');
    }
    public function deleterw($id){
        if (Gate::allows('permission')) {
            // User hiện tại có quyền truy cập quản trị User...
            reward::destroy($id);
            return back();     
        }
        
        else{
            echo "ban ko co quyen truy cap";
        }
        
    }
    public function index1(){
        $data['player'] =  DB::table('player')->simplePaginate(50);
        return view('seard',$data);
    }
    public function search()
    {
        $output = '';
        $players = Player::searchable('name')->paginate(50);
        //dd($players);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }
    public function searchlevel()
    {
        $output = '';
        $players = Player::searchable1('level')->paginate(50);
        //dd($players);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }
    public function searchscore()
    {
        $output = '';
        $players = Player::searchable1('score')->paginate(50);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }
    public function searchcreatedate()
    {
        $output = '';
        $players = Player::searchable('createdate')->paginate(50);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }
    public function searchupdatedate()
    {
        $output = '';
        $players = Player::searchable('updatedate')->paginate(50);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }
    public function searchcountrycode()
    {
        $output = '';
        $players = Player::searchable1('countrycode')->paginate(50);
        if ($players) {
            foreach ($players as $key => $product) {
               // dd($product->id)
               
                $output .= '<tr>
                <td>' . $product->name . '</td>
                <td>' . $product->score . '</td>
                <td>' . $product->level . '</td>
                <td>' . $product->countrycode . '</td>
                <td>' . $product->deviceid . '</td>
                <td>' . $product->createdate . '</td>
                <td>' . $product->updatedate . '</td>
                <td>' . $product->linkavarar . '</td>
                <td>' . $product->ban . '</td>
                <td><a href="ban/'.$product->id.'"><i class="fas fa-ban"></i></a></td>
                </tr>';
            }
        }
        return response()->json($output, 200);
    }

    public function getban($id){
        $data['player'] = Player::find($id);
        return view('ban',$data);
    }
    public function postban(Request $request,$id){
        $player = Player::find($id);
        $player->ban=$request['ban'];
        $player->save();
        return redirect()->intended('/');
    }
    public function getlife($id){
        $data['life'] = campain::find($id);
        return view('life',$data);
    }
    public function postlife(Request $request,$id){
        $data['life'] = campain::find($id) ;
        $data['life']->life = $request['life'];
        $data['life']->save();
        return redirect()->intended('cp');
    }

    
}