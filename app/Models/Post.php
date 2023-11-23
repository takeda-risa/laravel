<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Post extends Model
{
    use HasFactory;
 
    protected $fillable = ['user_id', 'comment'];
    
    public function user(){
      return $this->belongsTo(User::class);
    }    
    
    public function scopeRecommend($query, $self_id){
        return $query->where('user_id', $self_id)->latest()->limit(10);
    }    
}

