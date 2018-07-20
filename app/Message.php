<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Esto se asigna si aparece un error tipo MassAssignmentException
    //Add [content] to fillable property to allow mass assignment on [App\Message].
    //Agregamos esto para indicar que campos vamos a proteger, ej: contraseña, etc, en este caso no vamos a proteger ningun campo
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($image)
    {
        if (!$image || starts_with($image, 'http')) {
            return $image;
        }

        return \Storage::disk('public')->url($image);
    }
}
