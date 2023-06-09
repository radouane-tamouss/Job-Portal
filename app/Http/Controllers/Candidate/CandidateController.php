<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\CandidateEducation;
use App\Models\CandidateSkill;
use App\Models\CandidateResume;
use App\Models\CandidateExperience;
use App\Models\CandidateAppliedJob;
use App\Models\CandidateBookmark;
use App\Mail\Websitemail;
use Auth;
use Hash;
use Illuminate\Validation\Rule;


class CandidateController extends Controller
{
    public function index(){
        $recently_applied_jobs = CandidateAppliedJob::where('candidate_id',Auth::guard('candidate')->user()->id)->take(4)->get();
        $nb_applied_jobs = CandidateAppliedJob::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','applied')->count();
        $nb_approved_jobs = CandidateAppliedJob::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','approved')->count();
        $nb_bookmarked_jobs = CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->count();
        return view('candidate.dashboard',compact('recently_applied_jobs','nb_applied_jobs','nb_bookmarked_jobs','nb_approved_jobs'));
    }

    public function edit_profile(){
        $candidate = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        return view('candidate.edit_profile',compact('candidate'));
    }

    public function edit_password(){
        return view('candidate.edit_password');
    }
    public function candidate_edit_password_update(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        if(!Hash::check($request->old_password, $obj->password)){
            return redirect()->back()->with('error', 'Ancien mot de passe incorrect');
        }else{
            $obj->password = hash::make($request->new_password);
            $obj->update();
            return redirect()->back()->with('success','Le mot de passe a été mis à jour avec succès');
        }
        
    }

    public function edit_profile_update(Request $request){
        $candidate = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        $id = $candidate->id;
        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('candidates')->ignore($id)],
            'username' => ['required',Rule::unique('candidates')->ignore($id)],
            'phone' => 'required',
            'website' => 'url',
        ]);

        if($request->hasfile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif'
            ]);

            if($candidate->photo != ''){
                unlink(public_path('uploads/'.$candidate->photo));
            }
            $ext = $request->file('photo')->extension();
            $final_name = "candidate_profile".time().".".$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $candidate->photo = $final_name;
        }

        $candidate->name  = $request->name;
        $candidate->username = $request->username;
        $candidate->designation = $request->designation;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->biography = $request->biography;
        $candidate->country = $request->country;
        $candidate->address = $request->address;
        $candidate->city = $request->city;
        $candidate->gender = $request->gender;
        $candidate->date_of_birth = $request->date_of_birth;
        $candidate->website = $request->website;
        
        $candidate->update();
        return redirect()->back()->with('success', 'Profil du candidat mis à jour avec succès');
    }

    public function education(){
        $educations = CandidateEducation::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.education',compact('educations'));
    }
    public function education_create(){
        return view('candidate.education_create');
    }

    public function education_store(Request $request){
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required',
        ]);
        $education = new CandidateEducation();
        $education->candidate_id = Auth::guard('candidate')->user()->id;
        $education->level = $request->level;
        $education->institute = $request->institute;
        $education->degree = $request->degree;
        $education->passing_year = $request->passing_year;

        $education->save();

        return redirect()->route('candidate_education')->with('success', 'Formation ajoutée avec succès');
    }

    public function education_edit($id){
        $education = CandidateEducation::where('id',$id)->first();
        return view('candidate.education_edit',compact('education'));
    }
    public function education_update(Request $request, $id){
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required',
        ]);

        $education = CandidateEducation::where('id',$id)->first();
        $education->level = $request->level;
        $education->institute = $request->institute;
        $education->degree = $request->degree;
        $education->passing_year = $request->passing_year;
        $education->update();

        return redirect()->route('candidate_education')->with('success', 'Formation mise à jour avec succès');
    }

    public function education_delete($id){
        $education = CandidateEducation::where('id',$id)->first()->delete();
        return redirect()->back()->with('success', 'Formation supprimée avec succès');
    }

    public function skills(){
        $skills = CandidateSkill::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.skills',compact('skills'));
        
    }
    public function skill_create(){
        return view('candidate.skill_create');
    }

    public function skill_store(Request $request){
        $request->validate([
            'name' => 'required',
            'percentage' => 'required|numeric|between:0,100',
        ]);
        $skill = new CandidateSkill();
        $skill->candidate_id = Auth::guard('candidate')->user()->id;
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
       

        $skill->save();

        return redirect()->route('candidate_skills')->with('success', 'Compétence ajoutée avec succès');
    }

    public function skill_edit($id){
        $skill = CandidateSkill::where('id',$id)->first();
        return view('candidate.skill_edit',compact('skill'));
    }
    public function skill_update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'percentage' => 'required|numeric|between:0,100',
        ]);

        $skill = CandidateSkill::where('id',$id)->first();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->update();

        return redirect()->route('candidate_skills')->with('success', 'Compétence mise à jour avec succès');
    }

    public function skill_delete($id){
        $skill = CandidateSkill::where('id',$id)->first()->delete();
        return redirect()->back()->with('success','skill deleted successfully');
    }

    // Experiences

    public function experience(){
        $experiences = CandidateExperience::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.experiences',compact('experiences'));
    }
    public function experience_create(){
        return view('candidate.experience_create');
    }

    public function experience_store(Request $request){
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $experience = new CandidateExperience();
        $experience->candidate_id = Auth::guard('candidate')->user()->id;
        $experience->company = $request->company;
        $experience->designation = $request->designation;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;

        $experience->save();

        return redirect()->route('candidate_experience')->with('success', 'Expérience ajoutée avec succès');
    }

    public function experience_edit($id){
        $experience = CandidateExperience::where('id',$id)->first();
        return view('candidate.experience_edit',compact('experience'));
    }
    public function experience_update(Request $request, $id){
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $experience = CandidateExperience::where('id',$id)->first();
        $experience->company = $request->company;
        $experience->designation = $request->designation;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->update();

        return redirect()->route('candidate_experience')->with('success', 'Expérience mise à jour avec succès');
    }

    public function experience_delete($id){
        $experience = CandidateExperience::where('id',$id)->first()->delete();
        return redirect()->back()->with('success', 'Expérience supprimée avec succès');
    }

     // resumes

     public function resume(){
        $resumes = CandidateResume::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.resumes',compact('resumes'));
    }
    public function resume_create(){
        return view('candidate.resume_create');
    }

    public function resume_store(Request $request){
        $request->validate([
           'name' => 'required',
           'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $ext = $request->file('file')->extension();
        $final_name = 'file_'.time().'.'.$ext;
        $request->file('file')->move(public_path('uploads/resumes/'),$final_name);

        $resume = new CandidateResume();
        $resume->candidate_id =Auth::guard('candidate')->user()->id;
        $resume->name = $request->name;
        $resume->file = $final_name;

        $resume->save();

        return redirect()->route('candidate_resume')->with('success', 'Document ajouté avec succès');
    }

    public function resume_edit($id){
        $resume = CandidateResume::where('id',$id)->first();
        return view('candidate.resume_edit',compact('resume'));
    }
    public function resume_update(Request $request, $id){
        $resume = CandidateResume::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
         ]);

        if($request->hasFile('file')){
            $request->validate([
                'file' => 'mimes:pdf,doc,docx'
             ]);

             unlink(public_path('uploads/resumes/'.$resume->file));
             $ext= $request->file('file')->extension();
             $final_name = 'file_'.time().'.'.$ext;
             $request->file('file')->move(public_path('uploads/resumes/'),$final_name);
             $resume->file = $final_name;
        }

        $resume->name = $request->name;
        $resume->update();

        return redirect()->route('candidate_resume')->with('success', 'document mis à jour avec succès');
    }

    public function resume_delete($id){
        $resume = CandidateResume::where('id',$id)->first();
        unlink(public_path('uploads/resumes/'.$resume->file));
        CandidateResume::where('id',$id)->first()->delete();
        return redirect()->back()->with('success', 'CV supprimé avec succès');
    }

    public function bookmark_add($id){
        
        $execting_check = CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$id)->count();
        if($execting_check > 0){
            return redirect()->back()->with('error', 'Emploi déjà ajouté aux favoris');
        }

        $obj = new CandidateBookmark();
        $obj->job_id = $id;
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->save();

        return redirect()->back()->with('success', 'Emploi ajouté aux favoris avec succès');
    }

    public function bookmark(){
        $bookmarked_jobs = CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.bookmarked_jobs',compact('bookmarked_jobs'));
    }

    public function bookmark_delete($id){
        CandidateBookmark::where('id',$id)->first()->delete();
        return redirect()->back()->with('success', 'Signet supprimé avec succès');
       
    }
    public function apply($id){
        $execting_check = CandidateAppliedJob::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$id)->count();
        if($execting_check > 0){
            return redirect()->back()->with('error', 'Vous avez déjà postulé à cet emploi !');
        }
        $job = Job::where('id',$id)->first();
        return view('candidate.apply',compact('job'));
    }

    public function apply_submit(Request $request ,$id){

        $request->validate([
            'cover_letter' => 'required'
        ]);
      
        $obj = new CandidateAppliedJob();
        $obj->job_id = $id;
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->cover_letter = $request->cover_letter;
        $obj->save();

       
        $subject = 'Nouvelle candidature pour l\'offre '.$obj->rJob->title;

        $message = '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <title>Nouvelle candidature</title>
        </head>
        <body>
            <div class="container">
                <div class="jumbotron" style="background-color: #f2f3f8;">
                    <h1 class="display-4" style="color: #1e1e2d;">Nouvelle candidature</h1>
                    <p class="lead" style="color: #455056;">Cher ' . $obj->rJob->rCompany->company_name . ',</p>
                    <p style="color: #455056;">Nous tenons à vous informer qu\'une nouvelle candidature a été soumise pour le poste de ' . $obj->rJob->title . '.</p>
                    <hr class="my-4" style="border-color: #cecece;">
                    <h5 style="color: #1e1e2d;">Détails du candidat :</h5>
                    <ul>
                        <li><strong>Nom :</strong> ' . $obj->rCandidate->name . '</li>
                        <li><strong>Email :</strong> ' . $obj->rCandidate->email . '</li>
                        <li><strong>CV :</strong> <a href="'.route('applicant_resume',$obj->candidate_id).'" style="color: #20e277;">Cliquez ici pour voir</a></li>
                    </ul>
                    <p style="color: #455056;">Veuillez examiner la candidature et prendre les mesures nécessaires pour l\'évaluation et la considération ultérieures.</p>
                    <a class="btn btn-primary" href="'.route('job_applicants',$obj->job_id).'" role="button" style="background-color: #20e277; color: #fff; text-transform: uppercase; font-weight: 500; margin-top: 15px; border-radius: 50px;">Voir toutes les candidatures</a>
                    <hr class="my-4" style="border-color: #cecece;">
                    <p style="color: #455056;">Merci de votre attention.</p>
                    <p style="color: #455056;">Cordialement,</p>
                </div>
            </div>
        </body>';
    
            
            \Mail::to($obj->rJob->rCompany->email)->send(new Websitemail($subject,$message));

            return redirect()->route('job', $id)->with('success', 'Vous avez postulé à ce poste avec succès');

    }

    public function applied_jobs(){
        $applied_jobs = CandidateAppliedJob::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.applied_jobs', compact('applied_jobs'));
    }

   
}