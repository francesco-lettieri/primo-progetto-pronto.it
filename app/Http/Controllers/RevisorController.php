<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
   public function index()
   {
    $announcement_to_check = Announcement::where('is_accepted', null)->first();
    return view('revisor.index',compact('announcement_to_check'));
   }



   public function acceptAnnouncement(Announcement $announcement)
   {
     $announcement->setAccepted(true);
     return redirect()->back()->with('message',__("ui.messageAcceptRevisor"));
   }



   public function rejectAnnouncement(Announcement $announcement)
   {
     $announcement->setAccepted(false);
     return redirect()->back()->with('message',__("ui.messageRejectRevisor"));
   }


   public function becomeRevisor()
   {
      Mail::to('presto@presto.it')->send(new BecomeRevisor(Auth::user()));
      return redirect()->back()->with('message',__("ui.RevisorEmail"));
   }


   public function makeRevisor(User $user){
      Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
      return redirect()->route('homePage')->with('message',__("ui.RevisorConfirm"));
   }


   // FUNZIONE ANNUNCI ACCETTATI
   public function indexRevisor(){

      $announcementsAccepted=Announcement::where('is_accepted', true)->orderBy('created_at','desc')->get();
      $announcementsRejected=Announcement::where('is_accepted', false)->orderBy('created_at','desc')->get();

      return view('revisor.indexRevisor',compact('announcementsAccepted','announcementsRejected'));
   }


   public function nullableAnnouncement(Announcement $announcement){

      $announcement->setAccepted(null);
      return redirect()->route('indexRevisor');
   }
}
