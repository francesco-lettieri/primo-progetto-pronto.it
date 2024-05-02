<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{

    use WithFileUploads;
    public $title;
    public $price;
    public $description;
    public $category= 1;
    public $images = [];
    public $temporary_images =[];
    
    // public $categories;

    // public function mount(){
    //     $this->categories=Category::all();
    // }

    protected $rules = [
        'title' => 'required',
        'price' => 'required',
        'description' => 'required|min:10',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images' => 'required|max:1024',
     ];

   public function messages()
     {
         return [
        'title.required'=> __('ui.mex1') ,
        'price.required'=> __('ui.mex2'),
        'description.required'=> __('ui.mex3'),
        'temporary_images.image'=>__('ui.mex6'),
        'temporary_images.max'=>__('ui.mex5'),
        'temporary_images.required' =>  __('ui.mex4'),
        'images.max' => __('ui.mex5'),
    ];
}



    public function updatedTemporaryImages(){
        if($this->validate([
            "temporary_images.*"=>"image|max:1024",
        ])){
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){

        if (in_array($key,array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }



    public function save(){
        
        // $this->validate();


        // $category=Category::find($this->category);

    //    $announcement = $category->announcements()->create([
            // 'title'=>$this->title,
            // 'price'=>$this->price,
            // 'description'=>$this->description,
            // 'categories'=>$this->categories,
            // 'user_id' => Auth::user()->id,
        // ]);
     $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store('images','public')]);

                
                RemoveFaces::withChain([
                new ResizeImage($newImage->path, 400, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)

                ])->dispatch($newImage->id);
                
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        Auth::user()->announcements()->save($this->announcement);

        return redirect()->route('homePage')->with('message',__("ui.messageAccept"));
    }

    // public function resetInput(){
    //     $this->title='';
    //     $this->price='';
    //     $this->description='';
    //     $this->categories='';
    // }


    public function render()
    {
        return view('livewire.create-announcement');
    }
    
}
