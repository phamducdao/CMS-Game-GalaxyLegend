<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',function(){
    return view('index') ;
})->name('admin')->middleware('Checklogout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('player','GalaxyLegend@getplayer')->name('player')->middleware('Checklogout');
Route::get('playercamp','GalaxyLegend@getplayercamp')->name('playercamp')->middleware('Checklogout');
Route::get('playercampreward','GalaxyLegend@getplayercampreward')->name('playercampreward')->middleware('Checklogout');
Route::get('test1-campid','GalaxyLegend@search1');
Route::get('test1-playerid','GalaxyLegend@search2');
Route::get('test1-ranking','GalaxyLegend@search3');
Route::get('logplayercamp','GalaxyLegend@getlog')->name('logplayercamp')->middleware('Checklogout');
Route::get('rcw','GalaxyLegend@getranking')->name('rcw')->middleware('Checklogout');
Route::get('reward','GalaxyLegend@getreward')->name('reward')->middleware('Checklogout');
Route::get('searchreward','GalaxyLegend@searchreward');
Route::get('createrw','GalaxyLegend@creatreward')->name('createrw')->middleware('Checklogout');
Route::post('createrw','GalaxyLegend@postcreatreward');
Route::get('cp','GalaxyLegend@getcampain')->name('cp')->middleware('Checklogout');
Route::get('log','GalaxyLegend@getlogin')->name('log')->middleware('Checklogin');
Route::get('logout','GalaxyLegend@getlogout')->name('logout');
Route::post('sbm','GalaxyLegend@postlogin')->name('sbm') ;
Route::get('creat','GalaxyLegend@create')->name('creat')->middleware('Checklogout');
Route::post('creat1','GalaxyLegend@postcreat')->name('creat1');
Route::get('edit/{id}','GalaxyLegend@edit')->name('edit')->middleware('Checklogout');
Route::post('edit/{id}','GalaxyLegend@postedit')->name('edit')->middleware('Checklogout'); 
Route::get('delete/{id}','GalaxyLegend@deletecampian')->middleware('Checklogout');
Route::get('permission','GalaxyLegend@getper')->name('permission')->middleware('Checklogout');
Route::get('creatpermission','GalaxyLegend@getcreateper')->name('creatpermission')->middleware('Checklogout');
Route::post('creatpermission','GalaxyLegend@postcreateper');
Route::get('editrcr/{id1}/{id2}/{r}','GalaxyLegend@editcreatrankingreward')->name('editrcr');
Route::post('editrcr/{id1}/{id2}/{r}','GalaxyLegend@posteditcreatrankingreward')->name('editrcr');
Route::get('delete/{id1}/{id2}/{r}','GalaxyLegend@delrank');
Route::get('crw','GalaxyLegend@getcrw')->name('crw');
Route::post('crw','GalaxyLegend@postcrw')->name('crw');
Route::get('editcrw/{id}','GalaxyLegend@geteditcrw')->name('editcrw');
Route::post('editcrw/{id}','GalaxyLegend@posteditcrw')->name('editcrw');
Route::get('deletecrw/{id}','GalaxyLegend@deleterw')->name('deletecrw');
Route::get('ban/{id}','GalaxyLegend@getban')->name('ban')->middleware('Checklogout');
Route::post('ban/{id}','GalaxyLegend@postban')->name('ban');
Route::get('/','GalaxyLegend@index1')->middleware('Checklogout');;
Route::get('/search','GalaxyLegend@search')->name('search');
Route::get('/searchlevel','GalaxyLegend@searchlevel')->name('searchlevel');
Route::get('/searchscore','GalaxyLegend@searchscore')->name('searchscore');
Route::get('/searchcreatedate','GalaxyLegend@searchcreatedate')->name('searchcreatedate');
Route::get('/searchupdatedate','GalaxyLegend@searchupdatedate')->name('searchupdatedate');
Route::get('/searchcountrycode','GalaxyLegend@searchcountrycode')->name('searchcountrycode');
Route::get('life/{id}','GalaxyLegend@getlife')->name('life');
Route::post('life/{id}','GalaxyLegend@postlife')->name('life');


// xử lý GiftCode và Notifacation
Route::get('gc','GiftCode@getgiftcode')->name('gc');
Route::get('crgc','GiftCode@getcrgiftcode')->name('crgc');
Route::post('crgc','GiftCode@postcrgiftcode')->name('crgc');
Route::get('editgc/{id}','GiftCode@geteditgiftcode')->name('editgc');
Route::post('editgc/{id}','GiftCode@posteditgiftcode')->name('editgc');
Route::get('deletegc/{id}','GiftCode@deletegiftcode');
Route::get('allgiftcode','GiftCode@getallgiftcode')->name('allgiftcode');
Route::post('allgiftcode','GiftCode@createGiftcode')->name('giftcode.create');
Route::get('allgc','GiftCode@getallgc')->name('allgc');
Route::get('searchgc','GiftCode@searchgc')->name('searchgc');
Route::get('searchisuse','GiftCode@searchisuse')->name('searchisuse');
Route::get('searchdate','GiftCode@searchdate')->name('searchdate');
Route::get('editallgc/{giftcode}','GiftCode@geteditallgc')->name('editallgc');
Route::post('editallgc/{giftcode}','GiftCode@posteditallgc')->name('editallgc');
Route::get('deleteallgc/{giftcode}','GiftCode@getdeleteallgc');
Route::get('mailbox','GiftCode@getmailbox')->name('mailbox');
Route::get('crmailbox','GiftCode@getcrmailbox')->name('crmailbox');
Route::post('crmailbox','GiftCode@postcrmailbox')->name('crmailbox');
Route::get('editmailbox/{id}','GiftCode@geteditmailbox')->name('editmailbox');
Route::post('editmailbox/{id}','GiftCode@posteditmailbox')->name('editmailbox');
Route::get('deletemailbox/{id}','GiftCode@getdeletemailbox');
Route::get('searchmessage','GiftCode@getsearchmessage')->name('searchmessage');
Route::get('searchisread','GiftCode@getsearchisread')->name('searchisread');
Route::get('searchcreatedate','GiftCode@getsearchcreatedate')->name('searchcreatedate');
Route::get('searchexpiredate','GiftCode@getsearchexpiredate')->name('searchexpiredate');
Route::get('searchtitle','GiftCode@getsearchtitle')->name('searchtitle');

//iap
Route::get('iap','iapController@getiap')->name('iap');
Route::get('trackingiap','iapController@gettrackingiap')->name('trackingiap');
Route::get('trackingistall','iapController@gettrackinginstall')->name('trackingistall');
//thống kế
Route::get('testchart','chartController@getchart1');
Route::get('testchart1','chartController@getchart5');
Route::get('source','chartController@getchart2') ;
Route::get('sourcecustom','chartController@getchartcustomsource') ;
Route::get('customer','chartController@getchart3');
Route::get('totaliap','chartController@totaliap');
Route::get('totaliapcustom','chartController@totaliapcustom');
Route::get('customer1','chartController@getchart4');
Route::get('totalorders','chartController@gettotal');
Route::get('totalorderscustom','chartController@gettotalcustom');
Route::get('customercustom','chartController@getcustomercustom');
Route::get('totalcustomercustom','chartController@gettotalcustomercustom');
Route::get('tylesource','chartController@gettylesource');


Route::get('report','chartController@report');









Auth::routes();