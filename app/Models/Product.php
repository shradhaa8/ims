<?php

namespace App\Models;

use App\Mail\LowStockAlert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Mail;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock'
    ];
    
    public function suppliers(){
        return $this->belongsToMany(Supplier::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
     public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function decreaseStock($qty)
    {
        if ($this->stock < $qty) {
            return false; 
        }
        $this->stock-= $qty;
        $this->save(); 

        if($this->stock <= 5){
            $this->sendLowStockNotification();
        }
        return $this;
    }

    public function increaseStock($qty){
        $this->stock += $qty;
        return $this->save();
    }
    public function sendLowStockNotification(){
        $email_address = 'admin@gmail.com';
        Mail::to($email_address)->send(new LowStockAlert($this));
        $users = User::where('isAdmin', auth()->user()->isAdmin)->get();
        Notification::send($users, new \App\Notifications\LowStockAlert());
    }
    
}
