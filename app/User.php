<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->role == 'admin';
    }

    public function isAuthour($article_id) {
        $article = Article::where('id', $article_id)->get();
        return $this->id == $article[0]->user_id;
    }

    public function isAuthourOfAnnouncement($announcement_id) {
        $announcement = Announcement::where('id', $announcement_id)->get();
        return $this->id == $announcement[0]->user_id;
    }

    public static function GetAllNotSelf(User $user) {
        return User::where('id', '!=', $user->id)->get();
    }

    public function article() {
        return $this->hasMany(Article::class);
    }
}
